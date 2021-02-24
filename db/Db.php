<?php

class DataBase extends PDO{
    const host = 'localhost';
    const db = 'receitas';
    const user = 'root';
    const pass = '';
    const charset = 'utf8mb4';

    public $conn;

    const opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];


    function __construct()
    {
        try {
            $dsn = "mysql:host=" . self::host . ";dbname=" . self::db . ";charset=" . self::charset;
            parent::__construct($dsn, self::user, self::pass, self::opt);
        }
        catch (PDOException $e)
        {
            echo '<script language="javascript">alert("'.$e->getMessage().'");</script>';
            exit();
        }
    }
}
?>