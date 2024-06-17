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

    public function getAllAvailableDrivers($tanggalSewaBaru, $tanggalKembaliSewaBaru)
    {
        $drivers = $this->getAllActiveDrivers();
        $avaliableDrivers = NULL;

        foreach ($drivers as $driver) {
            $this->db->query("SELECT * FROM orders WHERE driver_id = :driver_id");
            $this->db->bind('driver_id', $driver['driver_id']);
            $orders = $this->db->resultSet();
            if (count($orders) > 0) {
                $query = "SELECT * FROM orders WHERE driver_id = :driver_id AND (status_order = 'Pending' OR status_order = 'Accepted') AND(
                    (tanggal_sewa <= :tanggal_sewa_baru AND tanggal_kembali_sewa >= :tanggal_kembali_sewa_baru) OR (tanggal_sewa <= :tanggal_sewa_baru AND tanggal_kembali_sewa <= :tanggal_kembali_sewa_baru) OR (tanggal_sewa >= :tanggal_sewa_baru AND tanggal_kembali_sewa >= :tanggal_kembali_sewa_baru) OR (tanggal_sewa >= :tanggal_sewa_baru AND tanggal_kembali_sewa <= :tanggal_kembali_sewa_baru)
                )";
                $this->db->query($query);
                $this->db->bind('tanggal_sewa_baru', $tanggalSewaBaru);
                $this->db->bind('tanggal_kembali_sewa_baru', $tanggalKembaliSewaBaru);
                $this->db->bind('driver_id', $driver['driver_id']);
                $ordersCrash = $this->db->resultSet();
                if (count($ordersCrash) === 0) {
                    $avaliableDrivers[] = $this->getDriverById($driver['driver_id']);
                }
            } else {
                $avaliableDrivers[] = $this->getDriverById($driver['driver_id']);
            }
        }

        return $avaliableDrivers;
    }

    public function createNewDriver($data)
    {
        // $currentTime = date('Y-m-d H:i');
        $query = "INSERT INTO {$this->table_name} (nama_driver,no_telp_driver,status_driver) VALUES 
                  (:nama_driver,:no_telp_driver,:status_driver)";
        $this->db->query($query);
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

    public function editDriverById($data, $id)
    {
        $query = "UPDATE {$this->table_name} SET 
                  nama_driver = :nama_driver,
                  no_telp_driver = :no_telp_driver,
                  status_driver = :status_driver
                  WHERE driver_id = :driver_id ";
        $this->db->query($query);
        $this->db->bind('nama_driver', $data['nama_driver']);
        $this->db->bind('no_telp_driver', $data['no_telp_driver']);
        $this->db->bind('status_driver', $data['status_driver']);
        $this->db->bind('driver_id', $id);

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

    public function changeDriverStatusById($status, $id)
    {
        $query = "UPDATE {$this->table_name} SET 
        status_driver = :status_driver, 
        WHERE driver_id = :driver_id ";
        $this->db->query($query);
        $this->db->bind('status_driver', $status);
        $this->db->bind('driver_id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }
}
