<?php


abstract class AbstractRepository
{
    private $db;
    private $table;

    public function __construct($table) {
        $this->db = new Database();
        $this->table = $table;
    }

    public function save($params, $id =null)
    {
        if($id==null)
        {
            return $this->create($this->table, $params);
        }
        else
        {
            return $this->update($this->table,$params,$id);
        }
    }

    public function create($table, $params)
    {
        $chave = implode('`, `' ,array_keys($params));
        $valor = ":".implode(", :" ,array_keys  ($params));

        try {
            $query = $this->db->prepare("INSERT INTO $table (`$chave`) VALUES ($valor);");

            foreach ($params as $key => $value) {
                $query->bindValue(":$key", $value);
            }

            $query->execute();
        }
        catch (PDOException $e)
        {
            echo '<script language="javascript">alert("'.$e->getMessage().'");</script>';
        }
    }

    public function tolist()
    {
        $query = null;
        try {
            $query = $this->db->prepare("SELECT * FROM `$this->table`;");

            $query->execute();
        }
        catch (PDOException $e)
        {
            echo '<script language="javascript">alert("'.$e->getMessage().'");</script>';
        }
        return $query;
    }

    public function update($table, $params, $id)
    {
        $valor = ":".implode(", :" ,array_keys  ($params));

        try {
            $chave = NULL;
            foreach($params as $key=> $value) {
                $chave .= "`$key`=:$key,";
            }

            //retirar do final de string
            $chave = rtrim($chave, ',');

            $query = $this->db->prepare("UPDATE $table SET ($chave) WHERE ".$id['id']."=:idval");

            foreach ($params as $key => $value) {
                $query->bindValue(":$key", $value);
            }
            $query->bindValue(":idval", $id['value']);

            $query->execute();
            return true;
        }
        catch (PDOException $e)
        {
            echo '<script language="javascript">alert("'.$e->getMessage().'");</script>';
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $query = $this->db->prepare("DELETE FROM $this->table WHERE ".$id['id']."=:idval;");
            $query->bindValue(":idval", $id['value']);

            $query->execute();
            return true;
        }
        catch (PDOException $e)
        {
            echo '<script language="javascript">alert("'.$e->getMessage().'");</script>';
            return false;
        }
    }


    public function findByID($id)
    {
        try
        {
            $query = $this->db->prepare("SELECT * FROM $this->table WHERE " .$id['id']."=:idval;");
            $query->bindValue(":idval", $id['value']);
            $query->execute();

            return $query->fetchObject();
        }
        catch (PDOException $e)
        {
            echo '<script language="javascript">alert("'.$e->getMessage().'");</script>';
            return false;
        }

    }


    public function getDb(){
        return $this->db;
    }

    public function setDb($db)
    {
        $this->db = $db;
    }
}