<?php

class Auth_model
{
    private $table_name = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function verify($data)
    {
        $username = strtolower(stripcslashes($data['username']));
        $password = $data['password'];
        $query = "SELECT * FROM {$this->table_name} WHERE username = :username";

        $this->db->query($query);
        $this->db->bind('username', $username);

        $row = $this->db->single();

        // cek username
        if (!is_null($row)) {
            // cek password
            if (password_verify($password, $row['password'])) {
                // cek session
                $_SESSION['login'] = true;
                // cek remember me 
                if (isset($data['remember'])) {
                    // buat cookie
                    setcookie('num', $row['id'] + 7, time() + 3600); //samaran untuk cookie id
                    setcookie('key', hash('sha256', $row['id'] . $row['username'] . $row['id']), time() + 3600); //samaran untuk cookie username
                }
                // Pindah ke main page
                header("Location:" . BASEURL . "/home/index");
                exit;
            }
        }
        header("Location:" . BASEURL . "/auth/login");
        echo "
                <script>
                    alert('Konfirmasi Password Tidak Sesuai!');

                </script>
            ";
        exit;
        // Nanti pasang flasher
    }
}
