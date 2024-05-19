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

    public function createNewCar($data)
    {
        $query = "INSERT INTO {$this->table_name} (branch_id,car_brand_id,nama_mobil,jenis_mobil,tipe_transmisi,harga_sewa,foto_mobil,status_mobil) VALUES 
                  (:branch_id,:car_brand_id,:nama_mobil,:jenis_mobil,:tipe_transmisi,:harga_sewa,:foto_mobil,:status_mobil)";
        $this->db->query($query);
        $this->db->bind('branch_id', $data['branch_id']);
        $this->db->bind('car_brand_id', $data['car_brand_id']);
        $this->db->bind('nama_mobil', $data['nama_mobil']);
        $this->db->bind('jenis_mobil', $data['jenis_mobil']);
        $this->db->bind('tipe_transmisi', $data['tipe_transmisi']);
        $this->db->bind('harga_sewa', $data['harga_sewa']);
        $this->db->bind('foto_mobil', $data['foto_mobil']);
        $this->db->bind('status_mobil', $data['status_mobil']);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function getCarById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE car_id=:car_id");
        // untuk menghindari sql injection
        $this->db->bind('car_id', $id);
        return $this->db->single();
    }

    public function editCarById($data, $id)
    {
        $query = "UPDATE {$this->table_name} SET 
                  branch_id = :branch_id, 
                  car_brand_id = :car_brand_id,
                  nama_mobil = :nama_mobil, 
                  jenis_mobil = :jenis_mobil,
                  tipe_transmisi = :tipe_transmisi,
                  harga_sewa = :harga_sewa,
                  foto_mobil = :foto_mobil,
                  status_mobil = :status_mobil
                  WHERE car_id = :car_id ";
        $this->db->query($query);
        $this->db->bind('branch_id', $data['branch_id']);
        $this->db->bind('car_brand_id', $data['car_brand_id']);
        $this->db->bind('nama_mobil', $data['nama_mobil']);
        $this->db->bind('jenis_mobil', $data['jenis_mobil']);
        $this->db->bind('tipe_transmisi', $data['tipe_transmisi']);
        $this->db->bind('harga_sewa', $data['harga_sewa']);
        $this->db->bind('foto_mobil', $data['foto_mobil']);
        $this->db->bind('status_mobil', $data['status_mobil']);
        $this->db->bind('car_id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function deleteCarById($id)
    {
        $query = "DELETE FROM {$this->table_name} WHERE car_id = :car_id";
        $this->db->query($query);
        $this->db->bind('car_id', $id);

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
