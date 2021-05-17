 <?php  
 //sort.php  
 $connect = mysqli_connect("localhost", "root", "", "site");  
 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 
 $query = "SELECT * FROM groups ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($connect, $query);  
 $output .= '  
 <table class="table table-striped title3">  
      <tr>  
                               <th><a class="column_sort" id="id" data-order="'.$order.'" href="#">ID</a></th>  
                               <th><a class="column_sort" id="nom" data-order="'.$order.'" href="#">Nom</a></th>  
                               <th><a class="column_sort" id="num" data-order="'.$order.'" href="#">Mobile</a></th>  
                               <th><a class="column_sort" id="contact" data-order="'.$order.'" href="#">Email</a></th>  


                          </tr> 
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr>  
           <td>' . $row["id"] . '</td>  
           <td>' . $row["nom"] . '</td>  
           <td>' . $row["num"] . '</td>  
           <td>' . $row["contact"] . '</td>  


      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?>  