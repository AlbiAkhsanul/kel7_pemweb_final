<?php

class Penalty
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPenalties($orderID)
    {
        $query = "SELECT * FROM penalties WHERE order_id = :order_id";
        $this->db->query($query);
        $this->db->bind('order_id', $orderID);
        return $this->db->resultSet();
    }

    public function addPenalty($data)
    {
        $query = "INSERT INTO penalties (order_id, jenis_penalty, biaya_penalty, foto_penalty)
                  VALUES (:order_id, :type, :amount, :photo)";
        $this->db->query($query);
        $this->db->bind('order_id', $data['order_id']);
        $this->db->bind('type', $data['penalty_type']);
        $this->db->bind('amount', $data['penalty_amount']);
        $this->db->bind('photo', $data['penalty_photo']);
        return $this->db->execute();
    }

    // Tambahkan metode lain yang diperlukan, seperti mengupdate atau menghapus penalty
}