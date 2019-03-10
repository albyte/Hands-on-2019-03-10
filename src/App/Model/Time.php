<?php
namespace App\Model;

class Time extends \App\Model{
    function findByUserDate($user_id, $date){
        $sth = $this->db->prepare('SELECT * FROM times WHERE $user_id = ? AND target_dt=?');
        /**
         * @var $sth \PDOStatement
         */
        $sth->execute([$user_id, $date]);
        $row = $sth->fetch();
        return $row;
    }
}
