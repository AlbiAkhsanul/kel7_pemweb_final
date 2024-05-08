<?php

class Students_model
{
    private $table_name = 'students';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllStudents()
    {
        $this->db->query('SELECT * FROM ' . $this->table_name);
        return $this->db->resultSet();
    }

    public function getStudentById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table_name . ' WHERE id=:id');
        // untuk menghindari sql injection
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function createNewStudent($data)
    {
        $query = "INSERT INTO students VALUES 
                  ('',:name,:npm,:email,:major)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('major', $data['major']);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function deleteStudentById($id)
    {
        $query = "DELETE FROM students WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function editStudentById($data)
    {
        $query = "UPDATE students SET 
                  name = :name, 
                  npm = :npm, 
                  email = :email,
                  major = :major
                  WHERE id = :id ";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('major', $data['major']);

        $this->db->execute();

        return $this->db->affectedRowCount();
    }

    public function getStudentsByKeyword()
    {
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM students WHERE
            name LIKE :keyword OR
            npm LIKE :keyword OR
            email LIKE :keyword OR
            major LIKE :keyword
        ";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
