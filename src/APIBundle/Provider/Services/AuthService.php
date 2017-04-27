<?php
namespace APIBundle\Provider\Services;

class AuthService extends DBService
{

    public function getUserIDByUsernameAndPassword($username, $password) {
        $sql = 'SELECT "ID" FROM "User" WHERE "Username" = ? AND "Password" = ?';
        $res = $this->db->fetchAssoc($sql, array($username, $password));
        return $res;
    }

    public function getUserIDByUsername($username) {
        $sql = 'SELECT "ID" FROM "User" WHERE "Username" = ?';
        $res = $this->db->fetchAssoc($sql, array($username));
        return $res;
    }


}