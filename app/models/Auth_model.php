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
        $email = strtolower(stripcslashes($data['email']));
        $password = $data['password'];
        $query = "SELECT * FROM {$this->table_name} WHERE email_user = :email_user";

        $this->db->query($query);
        $this->db->bind('email_user', $email);

        $row = $this->db->single();

        // cek email
        if (!is_null($row)) {
            // cek password
            if (password_verify($password, $row['password'])) {
                // cek session
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['is_admin'] = $row['is_admin'];
                var_dump($_SESSION);
                // cek remember me 
                if (isset($data['remember'])) {
                    // buat cookie
                    setcookie('num', $row['user_id'] + 7, time() + 3600, '/'); //samaran untuk cookie id
                    setcookie('key', hash('sha256', $row['user_id'] . $row['email_user'] . $row['user_id']), time() + 3600, '/'); //samaran untuk cookie email
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
