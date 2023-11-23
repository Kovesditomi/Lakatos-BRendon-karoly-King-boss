<?php
    header("Content-Type: text/html; charset=utf-8");
    define("DBHOST", "localhost");
    define("DBUSER", "root"); 
    define("DBPASS", ""); 
    define("DBNAME", "pizzak");
    $dbconn = @mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die("Hiba az adatbázis csatlakozásakor!");
    
    if ($dbconn->connect_error) {

        die("Sikertelen kapcsolódás: " . $dbconn->connect_error);
    
      } else {
    
        echo "Sikeres kapcsolódás.";
    
      }
    
    mysqli_query($dbconn, "SET NAMES utf8");

?>