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

        if ($data['jenis_sewa'] !== 0) {
            $data['total_harga'] += 100000 * $data['durasi_sewa'];
        }

        return $data;
    }

    public function createNewOrder($data)
    {
        $query = "INSERT INTO {$this->table_name} (method_id,driver_id,car_id,user_id,tanggal_order,tanggal_sewa,tanggal_transaksi,status_transaksi,status_order) VALUES 
                  (:method_id,:driver_id,:car_id,:user_id,:tanggal_order,:tanggal_sewa,:tanggal_transaksi,:status_transaksi,:status_order";
        $this->db->query($query);
        $this->db->bind('method_id', $data['method_id']);
        $this->db->bind('driver_id', $data['driver_id']);
        $this->db->bind('car_id', $data['car_id']);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('tanggal_order', $data['tanggal_order']);
        $this->db->bind('tanggal_sewa', $data['tanggal_sewa']);
        $this->db->bind('tanggal_transaksi', $data['tanggal_transaksi']);
        $this->db->bind('status_transaksi', $data['status_transaksi']);
        $this->db->bind('status_order', $data['status_order']);
        $this->db->bind('total_harga', $data['totalHarga']);

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

    public function editCarById($data, $id)
    {
        $query = "UPDATE {$this->table_name} SET 
                  method_id = :method_id,
                  driver_id = :driver_id, 
                  car_id = :car_id,
                  user_id = :user_id,
                  tanggal_order = :tanggal_order,
                  tanggal_sewa = :tanggal_sewa,
                  tanggal_transaksi = :tanggal_transaksi,
                  status_transaksi = :status_transaksi,
                  status_order = :status_order,
                  total_harga = :total_harga
                  WHERE order_id = :order_id ";
        $this->db->query($query);
        $this->db->bind('method_id', $data['method_id']);
        $this->db->bind('driver_id', $data['driver_id']);
        $this->db->bind('car_id', $data['car_id']);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('tanggal_order', $data['tanggal_order']);
        $this->db->bind('tanggal_sewa', $data['tanggal_sewa']);
        $this->db->bind('tanggal_transaksi', $data['tanggal_transaksi']);
        $this->db->bind('status_transaksi', $data['status_transaksi']);
        $this->db->bind('status_order', $data['status_order']);
        $this->db->bind('total_harga', $data['total_harga']);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function deletOrderById($id)
    {
        $query = "DELETE FROM {$this->table_name} WHERE order_id = :order_id";
        $this->db->query($query);
        $this->db->bind('order_id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function acceptOrder($id)
    {
    }

    public function rejectOrder()
    {
    }
}
