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
        $username = strtolower(stripcslashes($data["username"]));
        $query = "SELECT * FROM {$this->table_name} WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $result = $this->db->single();

        //verify username
        if (!is_null($result)) {
            // verify password
            if (password_verify($data['password'], $result['password'])) {
                setcookie('id', $result['user_id'], time() + 6000000, '/');
                if (isset($data['remember'])) {
                    setcookie('username', $result['username'], time() + 6000000, '/');
                    setcookie('key', hash('sha256', $result['username']), time() + 6000000, '/');
                }
                return $result;
            }
        }
        return false;
    }
}
