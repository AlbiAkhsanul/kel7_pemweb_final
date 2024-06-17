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
        $data['total_harga'] = $data['harga_sewa'] * $_SESSION['durasi_sewa'];

        if ($data['jenis_sewa'] != 0) {
            $data['total_harga'] += 100000 * $_SESSION['durasi_sewa'];
        }

        return $data;
    }

    public function createNewOrder($data)
    {
        $order = $data['order'];
        $driver_id = $data['driver_id'];
        $currentTime = date('Y-m-d H:i');

        $query = "INSERT INTO {$this->table_name} (method_id,driver_id,car_id,user_id,tanggal_order,jenis_sewa,tanggal_sewa,durasi_sewa,tanggal_kembali_sewa,tanggal_transaksi,status_order,total_harga) VALUES 
                  (:method_id,:driver_id,:car_id,:user_id,:tanggal_order,:jenis_sewa,:tanggal_sewa,:durasi_sewa,:tanggal_kembali_sewa,:tanggal_transaksi,:status_order,:total_harga)";
        $this->db->query($query);
        $this->db->bind('method_id', $order['method_id']);
        $this->db->bind('driver_id', $driver_id);
        $this->db->bind('car_id', $order['car_id']);
        $this->db->bind('user_id', $_SESSION['user_id']);
        $this->db->bind('tanggal_order', $currentTime);
        $this->db->bind('jenis_sewa', $order['jenis_sewa']);
        $this->db->bind('tanggal_sewa', $_SESSION['tanggal_sewa']);
        $this->db->bind('durasi_sewa', $_SESSION['durasi_sewa']);
        $this->db->bind('tanggal_kembali_sewa', $_SESSION['tanggal_kembali_sewa']);
        $this->db->bind('tanggal_transaksi', $currentTime);
        $this->db->bind('status_order', "Pending");
        $this->db->bind('total_harga', $order['total_harga']);

        $this->db->execute();
        return $this->db->affectedRowCount();
    }

    public function getOrderById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE order_id=:order_id");
        $this->db->bind('order_id', $id);
        return $this->db->single();
    }

    public function editOrderById($data, $id)
    {
        $query = "UPDATE {$this->table_name} SET 
                  driver_id = :driver_id, 
                  car_id = :car_id
                  WHERE order_id = :order_id ";
        $this->db->query($query);
        $this->db->bind('driver_id', $data['driver_id']);
        $this->db->bind('car_id', $data['car_id']);
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
    }

    public function changeOrderStatus($order_id, $orderStatus)
    {
        $query = "UPDATE {$this->table_name} SET 
                  status_order = :status_order
                  WHERE order_id = :order_id ";
        $this->db->query($query);
        $this->db->bind('status_order', $orderStatus);
        $this->db->bind('order_id', $order_id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }
}
