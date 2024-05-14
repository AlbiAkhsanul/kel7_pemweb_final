<?php

class Car_model
{
    private $table_name = 'cars';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllCars()
    {
        $this->db->query("SELECT * FROM {$this->table_name}");
        return $this->db->resultSet();
    }

    public function getCarById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE id=:id");
        // untuk menghindari sql injection
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function createNewCar($data)
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

    public function deleteCarById($id)
    {
        $query = "DELETE FROM {$this->table_name} WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function editCarById($data)
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

    public function getCarsByKeyword()
    {
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM {$this->table_name} WHERE
            name LIKE :keyword OR
            npm LIKE :keyword OR
            email LIKE :keyword OR
            major LIKE :keyword
        ";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
