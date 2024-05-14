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
        $username = strtolower(stripcslashes($data['username']));
        $password = $data['password'];
        $passwordConfirm = $data['passwordConfirm'];
        // Cek username sudah ada apa belum
        $query = "SELECT username FROM {$this->table_name} WHERE Username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);

        if ($this->db->resultSet()) {
            echo "
            <script>
                alert('Username Telah Dipakai, Coba Username Lain!');
                
            </script>
        ";
            return false;
        }

        // cek konfirmasi pass
        if ($password !== $passwordConfirm) {
            echo "
            <script>
                alert('Konfirmasi Password Tidak Sesuai!');
                
            </script>
        ";
            return false;
        }

        // Enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Memasukan kedalam database
        $query = "INSERT INTO {$this->table_name} VALUES 
                  ('',:username,:password)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }
}
