<?php
    require_once "env.php";
    session_start();
    error_reporting(E_ALL);
    define("BASE_URL",ENV_BASE_URL);    // URL
    define('DB_SERVER', ENV_DB_SERVER);	// Localhost
    define('DB_DATABASE', ENV_DB_DATABASE);	// Nama Database
    define('DB_USERNAME', ENV_DB_USERNAME);		// Username Database
    define('DB_PASSWORD', ENV_DB_PASSWORD);			// Password

    try{
        $pdo = new PDO("mysql:host=". DB_SERVER .";dbname=".DB_DATABASE, DB_USERNAME, DB_PASSWORD); 
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Print host information
        //echo "Connect Successfully. Host info: ";
        $pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
        //echo "<br>";
    } catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }

    function cutText($text, $length)
    {
        if(strlen($text) > $length){
            return substr($text, 0, $length)." ...";
        }
        else{
            return $text;
        }
    }

    function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
     
    }

    // require('test_input.php');
    // require('access.php');
?>