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

    public function getOrderById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE id=:id");
        // untuk menghindari sql injection
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function createNewOrder($data)
    {
        $query = "INSERT INTO {$this->table_name} VALUES 
                  ('',:name,:npm,:email,:major)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('major', $data['major']);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function deleteOrderById($id)
    {
        $query = "DELETE FROM {$this->table_name} WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function editOrderById($data)
    {
        $query = "UPDATE {$this->table_name} SET 
                  name = :name, 
                  npm = :npm, 
                  email = :email,
                  major = :major
                  WHERE id = :id ";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('major', $data['major']);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }
}
