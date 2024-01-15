<?php
session_start();
class myDB{
    private $host;
    private $charset;
    private $db;
    private $user;
    private $password;
    private $table;

    function __construct($host, $charset, $db, $user, $password, $table){
        $this->host = $host;
        $this->charset = $charset;
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;
        $this->table = $table;
    }

    function dbLogin(){
        $dns = "mysql:host=$this->host; charset=$this->charset; dbname=$this->db";
        return new PDO($dns, $this->user, $this->password);
    }

    function targetToStr($arr, $separator){
        $targetSet = [];
        foreach($arr as $col=>$target){
            array_push($targetSet, "`$col`='$target'");
        }
        return join($separator, $targetSet);
    }

    function search($target){
        $pdo = $this->dbLogin();
        $targetSet = $this->targetToStr($target, "&&");
        $sql = "select * from `$this->table` where $targetSet";

        return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function searchAll($target = [], $option = ""){
        $pdo = $this->dbLogin();
        $sql = "select * from `$this->table`";
        
        if(count($target) > 0){
            $targetSet = $this->targetToStr($target, "&&");
            $sql = "$sql  where $targetSet";
        }
        if(strlen($option) > 0) $sql = "$sql $option";

        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function update($target){
        $pdo = $this->dbLogin();
        $sql = "";

        if(isset($target['id'])){
            $id = $target['id'];
            unset($target['id']);
            $targetSet = $this->targetToStr($target, ",");
            $sql = "update `$this->table` set $targetSet where `id`='$id'";
        }
        else{
            $cols = array_keys($target);
            $values = array_values($target);
            $sql = "insert into `$this->table`(`".join("`,`", $cols)."`) values('".join("','", $values)."')";
        }

        return $pdo->exec($sql);
    }

    function delete($target){
        $pdo = $this->dbLogin();
        $targetSet = $this->targetToStr($target, "&&");
        $sql = "delete from `$this->table` where $targetSet";

        return $pdo->exec($sql);
    }

    function count($target=[]){
        $pdo = $this->dbLogin();
        $sql = "select count(*) from `$this->table`";
        if(count($target) > 0){
            $targetSet = $this->targetToStr($target, "&&");
            $sql = "$sql where $targetSet";
        }
        
        $count = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $count['count(*)'];
    }

    function max($target){
        $pdo = $this->dbLogin();
        $sql = "select max($target) from `$this->table`";

        $max = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $max["max($target)"];
    }

    function sql($sql){
        $pdo = $this->dbLogin();
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

$Poster = new myDB('localhost', 'utf8', 'db15_3', 'root', '', 'poster');
$Movie = new myDB('localhost', 'utf8', 'db15_3', 'root', '', 'movie');
$Order = new myDB('localhost', 'utf8', 'db15_3', 'root', '', 'orders');

$sess = [1=>'14:00 ~ 16:00',
         2=>'16:00 ~ 18:00',
         3=>'18:00 ~ 20:00',
         4=>'20:00 ~ 22:00',
         5=>'22:00 ~ 24:00',
        ];

?>