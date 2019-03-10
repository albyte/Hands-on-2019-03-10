<?php
namespace App\Model;

class User extends \App\Model{
    function getProfile($user_id, $password){
        $sth = $this->db->prepare('SELECT * FROM users WHERE login_id = ? AND password=?');
        /**
         * @var $sth \PDOStatement
         */
        $sth->execute([$user_id, $password]);
        $row = $sth->fetch();
        return $row;
    }
}
