<?php

class database
{
    private $host = HOST;

    private $username = USERNAME;

    private $database = DATABASE;

    private $password = PASSWORD;

    protected $db;

    protected $Query;

    public function __construct()
    {
        try
        {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->database;
            $this->db = new PDO($dsn, $this->username, $this->password);
            echo "u lidh";
        } catch (PDOException $e)
        {
            echo "Database Connection error: " . $e->getMessage();
        }
    }

    public function Query($query, $options = array())
    {
        if(empty($options))
        {
            $this->Query = $this->db->prepare($query);
            return  $this->Query->execute();
        }
        else
        {
            $this->Query = $this->db->prepare($query);
            return  $this->Query->execute($options);
        }
    }

    public function countData($tableName)
    {
        $this->Query = $this->db->prepare("SELECT * FROM "."$tableName");
        $this->Query->execute();

        return $this->Query->rowCount();
    }

    public function fetchData()
    {
        return $this->Query->fetchAll(PDO::FETCH_OBJ);
    }

    public function singleData()
    {
        return $this->Query->fetch(PDO::FETCH_OBJ);
    }
}
