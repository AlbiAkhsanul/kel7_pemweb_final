<?php

class Driver_model
{
    private $table_name = 'drivers';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDrivers()
    {
        $this->db->query("SELECT * FROM {$this->table_name}");
        return $this->db->resultSet();
    }

    public function getAllActiveDrivers()
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE status_driver = 1");
        return $this->db->resultSet();
    }

    public function createNewDriver($data)
    {
        // $currentTime = date('Y-m-d H:i');
        $query = "INSERT INTO {$this->table_name} (branch_id,nama_driver,no_telp_driver,status_driver) VALUES 
                  (:branch_id,:nama_driver,:no_telp_driver,:status_driver)";
        $this->db->query($query);
        $this->db->bind('branch_id', $data['branch_id']);
        $this->db->bind('nama_driver', $data['nama_driver']);
        $this->db->bind('no_telp_driver', $data['no_telp_driver']);
        $this->db->bind('status_driver', $data['status_driver']);

        $this->db->execute();
        return $this->db->affectedRowCount();
    }
    public function getDriverById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE driver_id=:driver_id");
        // untuk menghindari sql injection
        $this->db->bind('driver_id', $id);
        return $this->db->single();
    }

    public function editDriverById($data, $dataImg, $id)
    {
        $query = "UPDATE {$this->table_name} SET 
                  branch_id = :branch_id, 
                  nama_driver = :nava_driver,
                  no_telp_driver = :no_telp_driver,
                  status_driver = :status_driver
                  WHERE car_id = :car_id ";
        $this->db->query($query);
        $this->db->bind('branch_id', $data['branch_id']);
        $this->db->bind('nama_driver', $data['nama_driver']);
        $this->db->bind('no_telp_driver', $data['no_telp_driver']);
        $this->db->bind('status_driver', $data['status_driver']);
        $this->db->bind('car_id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function deleteDriverById($id)
    {
        $query = "DELETE FROM {$this->table_name} WHERE driver_id = :driver_id";
        $this->db->query($query);
        $this->db->bind('driver_id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function changeDriverStatusById($data, $id)
    {
        $query = "UPDATE {$this->table_name} SET 
        status_driver = :status_driver, 
        WHERE driver_id = :driver_id ";
        $this->db->query($query);
        $this->db->bind('status_driver', $data['status_driver']);
        $this->db->bind('driver_id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }
}
