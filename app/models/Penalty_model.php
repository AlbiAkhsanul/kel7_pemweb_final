<?php

class Penalty_model
{
    private $table_name = 'penalties';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPenalties()
    {
        $this->db->query("SELECT * FROM {$this->table_name}");
        return $this->db->resultSet();
    }

    public function createNewPenalty($data, $dataImg)
    {
        // $currentTime = date('Y-m-d H:i');
        $currentTime = date('Y-m-d');
        $penaltyImg = $this->uploadPenaltyImg($dataImg, $currentTime);
        $query = "INSERT INTO {$this->table_name} (order_id,jenis_penalty,biaya_penalty,foto_penalty,status_penalty) VALUES 
                  (:order_id,:jenis_penalty,:biaya_penalty,:foto_penalty,:status_penalty)";
        $this->db->query($query);
        $this->db->bind('order_id', $data['order_id']);
        $this->db->bind('jenis_penalty', $data['jenis_penalty']);
        $this->db->bind('biaya_penalty', $data['biaya_penalty']);
        $this->db->bind('foto_penalty', $penaltyImg);
        $this->db->bind('status_penalty', $data['status_penalty']);

        $this->db->execute();
        return $this->db->affectedRowCount();
    }

    public function uploadPenaltyImg($dataImg, $seconds)
    {
        $fileName = $dataImg['foto_penalty']['name'];
        $fileSize = $dataImg['foto_penalty']['size'];
        $fileError = $dataImg['foto_penalty']['error'];
        $fileTmpLocation = $dataImg['foto_penalty']['tmp_name'];

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
        move_uploaded_file($fileTmpLocation, 'img/penalties/' . $fileNameNew);
        return $fileNameNew;
    }

    public function getPenaltyById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE penalty_id=:penalty_id");
        // untuk menghindari sql injection
        $this->db->bind('penalty_id', $id);
        return $this->db->single();
    }

    public function getAllPenaltiesByOrderId($id)
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE order_id = :order_id");
        $this->db->bind('order_id', $id);
        return $this->db->resultSet();
    }

    public function getPenaltiesyByOrderId($order_id)
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE order_id=:order_id");
        // untuk menghindari sql injection
        $this->db->bind('order_id', $order_id);
        return $this->db->resultSet();
    }

    public function editPenaltyById($data, $dataImg, $id)
    {
        if ($dataImg['foto_penalty']['error'] === 4) {
            $penaltyImg = $data['old_foto_penalty'];
        } else {
            $currentTime = date('Y-m-d');
            $this->unlinkPenaltyImg($id);
            $penaltyImg = $this->uploadPenaltyImg($dataImg, $currentTime);
        }

        $query = "UPDATE {$this->table_name} SET 
                  order_id = :order_id, 
                  jenis_penalty = :jenis_penalty,
                  biaya_penalty = :biaya_penalty, 
                  foto_penalty = :foto_penalty,
                  WHERE penalty_id = :penalty_id ";
        $this->db->query($query);
        $this->db->bind('order_id', $data['order_id']);
        $this->db->bind('jenis_penalty', $data['jenis_penalty']);
        $this->db->bind('biaya_penalty', $data['biaya_penalty']);
        $this->db->bind('foto_penalty', $penaltyImg);
        $this->db->bind('penalty_id', $id);

        $this->db->execute();
        return $this->db->affectedRowCount();
    }

    // public function deletePenaltyById($id)
    // {
    //     $this->unlinkPenaltyImg($id);
    //     $query = "DELETE FROM {$this->table_name} WHERE penalty_id = :penalty_id";
    //     $this->db->query($query);
    //     $this->db->bind('penalty_id', $id);

    //     $this->db->execute();

    //     return $this->db->affectedRowCount();
    // }

    public function unlinkPenaltyImg($id)
    {
        // Mencari Lokasi foto
        $query = "SELECT foto_penalty FROM {$this->table_name} WHERE penalty_id = :penalty_id";
        $this->db->query($query);
        $this->db->bind('penalty_id', $id);

        $row = $this->db->single();
        $string = 'img/penalties/' . $row['foto_penalty'];
        // Menghapus foto
        unlink($string);
    }

    public function closePenalty($id)
    {
        $query = "UPDATE {$this->table_name} SET 
                  status_penalty = :status_penalty 
                  WHERE penalty_id = :penalty_id ";
        $this->db->query($query);
        $this->db->bind('status_penalty', "Closed");
        $this->db->bind('penalty_id', $id);
        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function rejectPenalty($id)
    {
        $query = "UPDATE {$this->table_name} SET 
                  status_penalty = :status_penalty 
                  WHERE penalty_id = :penalty_id ";
        $this->db->query($query);
        $this->db->bind('status_penalty', "Cancelled");
        $this->db->bind('penalty_id', $id);
        $this->db->execute();

        return $this->db->affectedRowCount();
    }
}
