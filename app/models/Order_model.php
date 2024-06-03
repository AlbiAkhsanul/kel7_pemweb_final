<?php

class Order_model
{
    private $table_name = 'orders';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllOrders()
    {
        $this->db->query("SELECT * FROM {$this->table_name}");
        return $this->db->resultSet();
    }

    public function calculateTotalHarga($data)
    {
        $data['total_harga'] = $data['harga_sewa'] * $data['durasi_sewa'];

        if ($data['jenis_sewa'] != 0) {
            $data['total_harga'] += 100000 * $data['durasi_sewa'];
        }

        return $data;
    }

    public function createNewOrder($data)
    {
        $order = $data['POST'];
        $driver_id = $data['driver_id'];
        $car_id = $data['POST']['car_id'];

        $this->changeCarStatus($car_id, 0);

        if ($driver_id != 0) {
            $this->changeDriverStatus($driver_id, 0);
        }

        $currentTime = date('Y-m-d H:i');

        $query = "INSERT INTO {$this->table_name} (method_id,driver_id,car_id,user_id,tanggal_order,jenis_sewa,tanggal_sewa,durasi_sewa,tanggal_transaksi,status_order,total_harga) VALUES 
                  (:method_id,:driver_id,:car_id,:user_id,:tanggal_order,:jenis_sewa,:tanggal_sewa,:durasi_sewa,:tanggal_transaksi,:status_order,:total_harga)";
        $this->db->query($query);
        $this->db->bind('method_id', $order['method_id']);
        $this->db->bind('driver_id', $driver_id);
        $this->db->bind('car_id', $order['car_id']);
        $this->db->bind('user_id', $_SESSION['user_id']);
        $this->db->bind('tanggal_order', $currentTime);
        $this->db->bind('jenis_sewa', $order['jenis_sewa']);
        $this->db->bind('tanggal_sewa', $order['tanggal_sewa']);
        $this->db->bind('durasi_sewa', $order['durasi_sewa']);
        $this->db->bind('tanggal_transaksi', $currentTime);
        $this->db->bind('status_order', "Pending");
        $this->db->bind('total_harga', $order['total_harga']);

        $this->db->execute();
        return $this->db->affectedRowCount();
    }

    public function getOrderById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE order_id=:order_id");
        // untuk menghindari sql injection
        $this->db->bind('order_id', $id);
        return $this->db->single();
    }

    public function editOrderById($data, $id)
    {
        if ($data['old_car_id'] != $data['car_id']) {
            $old_car_id = $data['old_car_id'];
            $car_id = $data['car_id'];

            $this->changeCarStatus($car_id, 0);
            $this->changeCarStatus($old_car_id, 1);
        }
        // $jenisSewa = 0;
        // // $totalHarga = $data['total_harga'];
        // if ($data['driver_id'] != 0) {
        //     $jenisSewa = 1;
        // }

        if ($data['old_driver_id'] != $data['driver_id']) {
            // if ($data['old_driver_id'] === 0 && $jenisSewa === 1) {
            //     $totalHarga = $data['total_harga'] + (100000 * $data['durasi_sewa']);
            // } else {
            //     $totalHarga = $data['total_harga'] - (100000 * $data['durasi_sewa']);
            // }

            if ($data['driver_id'] != 0) {
                $driver_id = $data['driver_id'];
                $this->changeDriverStatus($driver_id, 0);
            }

            $old_driver_id = $data['old_driver_id'];
            $this->changeDriverStatus($old_driver_id, 1);
        }

        $query = "UPDATE {$this->table_name} SET 
                  driver_id = :driver_id, 
                  car_id = :car_id,
                  tanggal_sewa = :tanggal_sewa
                  WHERE order_id = :order_id ";
        $this->db->query($query);
        $this->db->bind('driver_id', $data['driver_id']);
        $this->db->bind('car_id', $data['car_id']);
        $this->db->bind('tanggal_sewa', $data['tanggal_sewa']);
        $this->db->bind('order_id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function acceptOrder($id)
    {
        $query = "UPDATE {$this->table_name} SET 
                  status_order = :status_order 
                  WHERE order_id = :order_id ";
        $this->db->query($query);
        $this->db->bind('status_order', "Accepted");
        $this->db->bind('order_id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function rejectOrder($id)
    {
        $query = "UPDATE {$this->table_name} SET 
                  status_order = :status_order 
                  WHERE order_id = :order_id ";
        $this->db->query($query);
        $this->db->bind('status_order', "Cancelled");
        $this->db->bind('order_id', $id);
        $this->db->execute();

        $order = $this->getOrderById($id);

        if ($order['driver_id'] != 0 && $order['jenis_sewa'] != 0) {
            $driver_id = $order['driver_id'];
            $this->changeDriverStatus($driver_id, 1);
        }

        $car_id = $order['car_id'];
        $this->changeCarStatus($car_id, 1);

        return $this->db->affectedRowCount();
    }

    public function closeOrder($id)
    {
        $query = "UPDATE {$this->table_name} SET 
                  status_order = :status_order 
                  WHERE order_id = :order_id ";
        $this->db->query($query);
        $this->db->bind('status_order', "Closed");
        $this->db->bind('order_id', $id);
        $this->db->execute();

        $order = $this->getOrderById($id);

        if ($order['driver_id'] != 0 && $order['jenis_sewa'] != 0) {
            $driver_id = $order['driver_id'];
            $this->changeDriverStatus($driver_id, 1);
        }

        $car_id = $order['car_id'];
        $this->changeCarStatus($car_id, 1);

        return $this->db->affectedRowCount();
    }

    public function changeDriverStatus($driver_id, $driverStatus)
    {
        $query = "SELECT * FROM drivers WHERE driver_id = :driver_id";

        $this->db->query($query);
        $this->db->bind('driver_id', $driver_id);

        $row = $this->db->single();

        if ($row) {
            $query = "UPDATE drivers SET 
                  status_driver = :status_driver
                  WHERE driver_id = :driver_id ";
            $this->db->query($query);
            $this->db->bind('status_driver', $driverStatus);
            $this->db->bind('driver_id', $driver_id);

            $this->db->execute();
        }
        return $this->db->affectedRowCount();
    }

    public function changeCarStatus($car_id, $carStatus)
    {
        $query = "SELECT * FROM cars WHERE car_id = :car_id";

        $this->db->query($query);
        $this->db->bind('car_id', $car_id);

        $row = $this->db->single();

        if ($row) {
            $query = "UPDATE cars SET 
                  status_mobil = :status_mobil
                  WHERE car_id = :car_id ";
            $this->db->query($query);
            $this->db->bind('status_mobil', $carStatus);
            $this->db->bind('car_id', $car_id);

            $this->db->execute();
        }
        return $this->db->affectedRowCount();
    }
}
