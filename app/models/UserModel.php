<?php

namespace app\models;

class UserModel extends AbstractModel
{
    /**
     * @param $email
     * @return array|null
     * retrieves all users from a table
     */
    public function find($email) : ?array
    {
        $query = "SELECT * FROM (users) WHERE (email) = '$email'";

        $result = $this->db->query($query);
        $this->checkResult($result);

        return $result->fetch_assoc();
    }

    /**
     * @param $user
     * @return void
     * save bd $user
     */
    public function add($user)
    {
       $query = "INSERT INTO users (login,email,password) VALUES ('$user[login]','$user[email]','$user[password]');";
        $result = $this->db->query($query);
        $this->checkResult($result);

    }
}