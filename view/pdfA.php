<?php
  //require 'connect.php';
  $objectPdo = new PDO('mysql:host=localhost;dbname=site_1_1', 'root', '');
  $pdoStat = $objectPdo->prepare('SELECT * FROM animal ORDER BY nom ASC ');
  $executeIsOK = $pdoStat->execute();
  $animaux= $pdoStat->fetchAll();
  
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
 <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
     <a class="navbar-brand" href="./"><img src="../assets/img/logo.png" alt="Logo" height="60" width="60"></a>
</head>
<br><br>



<h4 align="left">Adoption </h4>
<h1 align="center"><I> <FONT color="#900C3F">Liste des animux</FONT></I></h1>

<br><br>
<body onload="window.print();">
 <table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom </th>
      <th scope="col">Age</th>
      <th scope="col">Sexe</th>
      <th scope="col">Race</th>
      <th scope="col">Refuge</th>
      <th scope="col">Poids</th>
      <th scope="col">Photo</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
          <?php foreach ($animaux as $a): ?> 
              <tr>
                <td ><?PHP echo $a['id']; ?></td>
                <td ><?PHP echo $a['nom']; ?></td>
                <td><?PHP echo $a['age']; ?></td>
                <td><?PHP echo $a['sexe']; ?></td>
                <td><?PHP echo $a['race']; ?></td> 
                <td><?PHP echo $a['refugeId']; ?></td>
                <td><?PHP echo $a['poids']; ?></td>
                <td><img src="../photo/<?=$a['photo'] ?>"height="80" width="80"  ></td>
                <td><?PHP echo $a['description']; ?></td>
                <td>
      
                </td>
                
              </tr>
                  <?php endforeach; 
                  ?>
    </tbody>
</table>
</body>
</html>