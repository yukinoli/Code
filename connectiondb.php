<?php
try
{
  $db = new PDO('mysql:host=localhost;dbname=listeutil;charset=utf8', 'root', 'root');
  $db2 = new PDO('mysql:host=localhost;dbname=glpidb;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
?>
