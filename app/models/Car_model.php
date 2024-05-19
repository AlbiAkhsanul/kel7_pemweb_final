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
        $this->db->query("SELECT * FROM {$this->table_name} WHERE cAR_ID=:CAR_ID");
        // untuk menghindari sql injection
        $this->db->bind('CAR_ID', $id);
        return $this->db->single();
    }

    public function createNewCar($data)
    {
        $query = "INSERT INTO {$this->table_name} (BRANCH_ID,NAMA_MOBIL,JENIS_MOBIL,TIPE_TRANSMISI,MERK_MOBIL,STATUS_MOBIL,HARGA_SEWA,FOTO_MOBIL) VALUES 
                  (:BRANCH_ID,:NAMA_MOBIL,:JENIS_MOBIL,:TIPE_TRANSMISI,:MERK_MOBIL,:STATUS_MOBIL,:HARGA_SEWA,:FOTO_MOBIL)";
        $this->db->query($query);
        $this->db->bind('BRANCH_ID', $data['branch_id']);
        $this->db->bind('NAMA_MOBIL', $data['nama_mobil']);
        $this->db->bind('JENIS_MOBIL', $data['jenis_mobil']);
        $this->db->bind('TIPE_TRANSMISI', $data['tipe_transmisi']);
        $this->db->bind('MERK_MOBIL', $data['merk_mobil']);
        $this->db->bind('STATUS_MOBIL', $data['status_mobil']);
        $this->db->bind('HARGA_SEWA', $data['harga_sewa']);
        $this->db->bind('FOTO_MOBIL', $data['foto_mobil']);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function deleteCarById($id)
    {
        $query = "DELETE FROM {$this->table_name} WHERE CAR_ID = :CAR_ID";
        $this->db->query($query);
        $this->db->bind('CAR_ID', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function editCarById($data, $id)
    {
        $query = "UPDATE {$this->table_name} SET 
                  BRANCH_ID = :BRANCH_ID, 
                  NAMA_MOBIL = :NAMA_MOBIL, 
                  JENIS_MOBIL = :JENIS_MOBIL,
                  TIPE_TRANSMISI = :TIPE_TRANSMISI,
                  MERK_MOBIL = :MERK_MOBIL, 
                  STATUS_MOBIL = :STATUS_MOBIL,
                  HARGA_SEWA = :HARGA_SEWA,
                  FOTO_MOBIL = :FOTO_MOBIL
                  WHERE CAR_ID = :CAR_ID ";
        $this->db->query($query);
        $this->db->bind('BRANCH_ID', $data['branch_id']);
        $this->db->bind('NAMA_MOBIL', $data['nama_mobil']);
        $this->db->bind('JENIS_MOBIL', $data['jenis_mobil']);
        $this->db->bind('TIPE_TRANSMISI', $data['tipe_transmisi']);
        $this->db->bind('MERK_MOBIL', $data['merk_mobil']);
        $this->db->bind('STATUS_MOBIL', $data['status_mobil']);
        $this->db->bind('HARGA_SEWA', $data['harga_sewa']);
        $this->db->bind('FOTO_MOBIL', $data['foto_mobil']);
        $this->db->bind('CAR_ID', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function getCarsByKeyword()
    {
        $keyword = $_POST['keyword'];

        $query = "UPDATE {$this->table_name} SET 
         NAMA_MOBIL LIKE :KEYWORD OR  
         JENIS_MOBIL LIKE :KEYWORD OR
         TIPE_TRANSMISI LIKE :KEYWORD OR 
         MERK_MOBIL LIKE :KEYWORD OR 
         WHERE CAR_ID = :CAR_ID ";

        $this->db->query($query);
        $this->db->bind('KEYWORD', "%$keyword%");
        return $this->db->resultSet();
    }
}
