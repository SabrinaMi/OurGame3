<?php

class HighscoreModel
{
    public static function getHighscoreList()
    {
        $db = new Database();
        $sql = "SELECT * FROM user ORDER BY points DESC";

        $result = $db->query($sql);
        if($db->numRows($result) > 0){
            $fetchArr = array();
            while($row = $db->fetchAssoc($result)){
                $fetchArr[] = $row;
            }
            return $fetchArr;
        }
        return null;
    }

    public static function setPoints($username, $points){
        $db = new Database();
        $sql = "UPDATE user SET points = " . $points . " WHERE name = '" . $username . "'";
        $db->query($sql);
    }

    public static function getPoints($username){
        $db = new Database();
        $sql = "SELECT * FROM user WHERE name = '" . $username . "'";
        $result = $db->query($sql);
        if($db->numRows($result) > 0){
            return $db->fetchObject($result)->points;
        }
        return 0;
    }
}