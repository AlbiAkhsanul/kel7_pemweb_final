<?php

class User_model
{
    private $table_name = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    function addUser($data)
    {
        $nama = ucwords(htmlspecialchars($data['nama']));
        $email = strtolower(htmlspecialchars($data['email']));
        $password = $data['password'];
        $passwordConfirm = $data['password_confirm'];
        $no_telp = $data['no_telp'];
        // Cek email sudah ada apa belum
        $query = "SELECT email_user FROM {$this->table_name} WHERE email_user = :email_user";
        $this->db->query($query);
        $this->db->bind('email_user', $email);

        if ($this->db->resultSet()) {
            echo "
            <script>
                alert('Email Telah Dipakai, Coba Email Lain!');
                
            </script>
        ";
            exit;;
        }

        // cek konfirmasi pass
        if ($password !== $passwordConfirm) {
            echo "
            <script>
                alert('Konfirmasi Password Tidak Sesuai!');
                
            </script>
        ";
            exit;;
        }
        // Enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Memasukan kedalam database
        $query = "INSERT INTO {$this->table_name} (nama_user,email_user,password,no_telp_user,is_admin) VALUES 
                  (:nama_user,:email_user,:password,:no_telp_user,:is_admin)";
        $this->db->query($query);
        $this->db->bind('nama_user', $nama);
        $this->db->bind('email_user', $email);
        $this->db->bind('password', $password);
        $this->db->bind('no_telp_user', $no_telp);
        $this->db->bind('is_admin', false);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function getUserById($id)
    {
        $this->db->query("SELECT * FROM {$this->table_name} WHERE user_id=:user_id");
        // untuk menghindari sql injection
        $this->db->bind('user_id', $id);
        return $this->db->single();
    }
}
