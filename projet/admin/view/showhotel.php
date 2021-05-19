<?php
    session_start();
    require_once '../controller/hotelC.php';

    $hotelC =  new hotelC();

	$hotels = $hotelC->afficherHotel();

	if (isset($_GET['id'])) {
		$hotelC->deleteHotel($_GET['id']);

		header('Location:showhotel.php');
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	 <meta charset="utf-8">

    <title>Les hotels </title>


<?php include_once 'headerd.php'; ?> 

</head>

<body>
	
	<li> <span id="missnom"></span><br></li>    
<?php include_once 'nav-bar.php'; ?>
<!-- Right Panel -->
    <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
      
		 <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="profiladmin.php"><img src="../assets/img/logo.png" alt="Logo" height="42" width="42"></a>
                    <a class="navbar-brand hidden" href="./"><img src="../assets/img/logo.png" alt="Logo" height="42" width="42">></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
 <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                    <?php
                    // Il est bien connecté
                    echo 'Bienvenue admin ', $_SESSION['b'];
                    ?>
 
                </div>
            </div>

   </div>
    </header>







 <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <br>
 
<section class="container">
	 <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                             
                                
                                <table>
                                  
                              </table>
                             
                            
                            
                            <div class="input-group" style="margin-top: 1.5%;">

                                <br>
                                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                <input onkeyup="filterSearch()" placeholder="Chercher des noms ou des adresses ..."  class="form-control" type="text" id="searchInput" >
                            </div>
                        </div>
                        <br>
                        <div class="table-stats order-table ov-h">
                            <table class="table " id="myTable">
                                <thead>
                                <tr>
                                	
                                    <th>nom</th>
                                    <th>prix</th>
                                    <th>adresse </th>
                                    <th>caracteristiques</th>
                                    <th>nombre des chambres</th>
                                    <th>image</th>
                                    <th>Gérer</th>
                                    <th><a  href = "addhotel.php">
									<button  type="button" class="btn btn-outline-success"> <i class="fa fa-plus"></i></button>

                                            </a></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($hotels as $hotel) {  ?>
                                <tr>
                                    <td class="serial"><?php echo $hotel['name']; ?></td>
                                  
                                  
                                    <td>  <span class="name"><?php echo $hotel['prix'];  ?>TND</span> </td>
                                    <td> <span class="name"><?php echo $hotel['adresse'];  ?></span> </td>
                                    <td><span class="name"><?php echo $hotel['caracteristiques'];  ?></span></td>
                                    <td>
                                        <span class="name"><?php echo $hotel['chambre']  ?></span>
                                    </td>
                                     <td class="avatar">
                                        <div class="round-img">
                                            <a  ><img class="rounded-circle" src="images/<?php echo $hotel['image']; ?> " alt=""></a>
                                        </div>
                                    </td>


                                    
                                   <td >   
						<a  href = "updatehotel.php?id=<?= $hotel['id'] ?>">
									<button  type="button" class="btn btn-outline-success"> <i class="fa fa-edit"></i></button>

                                            </a>
			<a href="showhotel.php?id=<?= $hotel['id'] ?>">
		<button type="button" class="btn btn-outline-danger"> <i class="fa fa-trash-o"></i></button></a>

		<a href="addreservation.php?id=<?= $hotel['id'] ?>">
		<button type="button" class="btn btn-outline-danger"> <i class="fa fa-plus-square"></i></button></a>
	</td>
                                </tr>
                                <?php

                                }
                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                             
</body>
                    </div>
                </div>

            </div>
<script type="text/javascript">
	function filterSearch() {
            var input, filter, table, tr, td,td2, i, txtValue,txtValue2;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td2 = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    if ( (txtValue.toUpperCase().indexOf(filter) > -1) || (txtValue2.toUpperCase().indexOf(filter) > -1)  ) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
</script>
</section>




</body>

</html>