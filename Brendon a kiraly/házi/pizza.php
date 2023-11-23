<?php
//csatlakozas az adatbázishoz
require("connect.php");
$rendez = (isset($_GET['rendez'])) ? $_GET['rendez'] : "nev";
$kifejezes = (isset($_POST['kifejezes'])) ?  $_POST['kifejezes'] : "";

$sql = "SELECT * 
        FROM kategoria
        WHERE (
            ar LIKE '%{$kifejezes}%'
           OR nev LIKE '%{$kifejezes}%'
        )
        ORDER BY {$rendez} ASC";
        
$eredmeny = mysqli_query($dbconn, $sql);

$kimenet ="
<div class='tablazat'>
 <table>
<tr>
    <th>ar</th>
    <th>nev</th>
    <th>Vásárlás</th>
    <th>Darab</th>
</tr>
</div>";

while($sor = mysqli_fetch_assoc($eredmeny)){
    //var_dump($sor);
    $kimenet .=  "<div class='tablazat'>
    <tr>
    <td>{$sor['ar']} ft</td>
    <td>{$sor['nev']}</td>
    <td><a href=\"\">Vásárlás</a></td>
    <td><input type='number'min='0'></td>
   
   </tr>
   </div>";
};
$kimenet .=" </table>";

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pizza</title>
</head>
<body>
    <div class="container">
        <h1>Rendelés</h1>
        <form method="post">
            <label>Pizzakeresés:</label>
            <input type="search" name="kifejezes" id="kifejezes">
        </form>
       
        <?php
        print $kimenet;
        ?>

    </div>
</body>
</html>