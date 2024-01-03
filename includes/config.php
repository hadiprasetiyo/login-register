<?php
  session_start();
  $host = 'localhost';
  $db = 'contact_person';
  $user = 'root';
  $pass = '';
  $dsn = "mysql:host=$host;dbname=$db";

  try 
  {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } 
  catch (PDOException $e) 
  {
    die("Connection failed: " . $e->getMessage());
  }
?>
