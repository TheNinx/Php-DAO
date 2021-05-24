<?php


class Sql extends db_conn
{

    public function query($rawQuery, $params = array()){
        $stmt = db_conn::getConn()->prepare($rawQuery);
        $this->setParams($stmt,$params);
        $stmt->execute();
        return  $stmt;

    }
    private function setParams($statment, $parameters = array()){
        foreach ($parameters as $key => $value){
            $this->setParam($key,$value);
        }
    }
    private function setParam($statment,$key,$value){
        $statment->bindParam($key,$value);
    }

    public function select($rawQuery, $params = array()):array{ //return array
        $stmt = $this->query($rawQuery,$params);
         return $stmt  ->fetchAll(PDO::FETCH_ASSOC);
    }
}