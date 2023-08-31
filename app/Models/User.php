<?php
namespace Models;
use Libraries\Database;

class User
{
    public function __construct()
    {
        $this->dbc = (new Database())->getInstance();
    }

    function allUsers()
    {
        return $this->dbc->query("SELECT * FROM users where `deleted_at` IS NULL order by id asc");
    }

    function saveUser($first_name, $last_name, $image)
    {
        $rs = $this->dbc->prepare("INSERT INTO users 
            (`first_name`,`last_name`,`image`) 
            VALUES 
            (?,?,?)");

        $rs->execute([
            $first_name,
            $last_name,
            $image
        ]);
    }

    function deleteUser($id)
    {
        $rs = $this->dbc->prepare( "UPDATE users set deleted_at=:date WHERE id =:id" );
        $rs->bindParam(':date', date('Y-m-d H:i:s'));
        $rs->bindParam(':id', $id);
        $rs->execute();
    }

}