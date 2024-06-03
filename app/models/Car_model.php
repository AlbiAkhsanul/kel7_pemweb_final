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

    public function getAllActiveCars()
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE status_mobil = 1");
        return $this->db->resultSet();
    }

    public function createNewCar($data, $dataImg)
    {
        // $currentTime = date('Y-m-d H:i');
        $currentTime = date('Y-m-d');
        $carImg = $this->uploadCarImg($dataImg, $currentTime);
        $query = "INSERT INTO {$this->table_name} (car_brand_id,nama_mobil,jenis_mobil,tipe_transmisi,harga_sewa,foto_mobil,status_mobil) VALUES 
                  (:car_brand_id,:nama_mobil,:jenis_mobil,:tipe_transmisi,:harga_sewa,:foto_mobil,:status_mobil)";
        $this->db->query($query);
        $this->db->bind('car_brand_id', $data['car_brand_id']);
        $this->db->bind('nama_mobil', $data['nama_mobil']);
        $this->db->bind('jenis_mobil', $data['jenis_mobil']);
        $this->db->bind('tipe_transmisi', $data['tipe_transmisi']);
        $this->db->bind('harga_sewa', $data['harga_sewa']);
        $this->db->bind('foto_mobil', $carImg);
        $this->db->bind('status_mobil', $data['status_mobil']);

        $this->db->execute();
        return $this->db->affectedRowCount();
    }

    public function uploadCarImg($dataImg, $seconds)
    {
        $fileName = $dataImg['foto_mobil']['name'];
        $fileSize = $dataImg['foto_mobil']['size'];
        $fileError = $dataImg['foto_mobil']['error'];
        $fileTmpLocation = $dataImg['foto_mobil']['tmp_name'];

        // Cek apakah gambar ada yang diupload
        if ($fileError === 4) {
            echo "
            <script>
                alert('Pilih foto Untuk Mobil');
            </script>
        ";

            exit;
        }

        // Cek apakah yang dikirim merupakan gambar
        $validImagaeExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        // Mengambil bagian ekstensi gambar saja (.jpg dll)
        $imageExtension = strtolower(end($imageExtension)); //Diubah menjadi huruf kecil
        if (!in_array($imageExtension, $validImagaeExtension)) {
            echo "
            <script>
                alert('Gunakan Tipe File Yang Valid (jpg,jpeg,png) ');
            </script>
        ";

            exit;
        }

        // Cek ukuran
        if ($fileSize > 1500000) {
            echo "
            <script>
                alert('Ukuran foto Terlalu Besar');
            </script>
        ";

            exit;
        }

        // Gambar siap diupload
        // Generate nama baru
        $fileNameNew = explode('.', $fileName);
        $fileNameNew = $fileNameNew[0] . $seconds . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . '.' . end($fileNameNew);
        move_uploaded_file($fileTmpLocation, 'img/cars/' . $fileNameNew);
        return $fileNameNew;
    }

    public function getCarById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE car_id=:car_id");
        // untuk menghindari sql injection
        $this->db->bind('car_id', $id);
        return $this->db->single();
    }

    public function editCarById($data, $dataImg, $id)
    {
        if ($dataImg['foto_mobil']['error'] === 4) {
            $carImg = $data['old_foto_mobil'];
        } else {
            $currentTime = date('Y-m-d');
            $this->unlinkCarImg($id);
            $carImg = $this->uploadCarImg($dataImg, $currentTime);
        }

        $query = "UPDATE {$this->table_name} SET 
                  car_brand_id = :car_brand_id,
                  nama_mobil = :nama_mobil, 
                  jenis_mobil = :jenis_mobil,
                  tipe_transmisi = :tipe_transmisi,
                  harga_sewa = :harga_sewa,
                  foto_mobil = :foto_mobil,
                  status_mobil = :status_mobil
                  WHERE car_id = :car_id ";
        $this->db->query($query);
        $this->db->bind('car_brand_id', $data['car_brand_id']);
        $this->db->bind('nama_mobil', $data['nama_mobil']);
        $this->db->bind('jenis_mobil', $data['jenis_mobil']);
        $this->db->bind('tipe_transmisi', $data['tipe_transmisi']);
        $this->db->bind('harga_sewa', $data['harga_sewa']);
        $this->db->bind('foto_mobil', $carImg);
        $this->db->bind('status_mobil', $data['status_mobil']);
        $this->db->bind('car_id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function deleteCarById($id)
    {
        $this->unlinkCarImg($id);
        $query = "DELETE FROM {$this->table_name} WHERE car_id = :car_id";
        $this->db->query($query);
        $this->db->bind('car_id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function unlinkCarImg($id)
    {
        // Mencari Lokasi foto
        $query = "SELECT foto_mobil FROM {$this->table_name} WHERE car_id = :car_id";
        $this->db->query($query);
        $this->db->bind('car_id', $id);

        $row = $this->db->single();
        $string = 'img/cars/' . $row['foto_mobil'];
        // Menghapus foto
        unlink($string);
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
