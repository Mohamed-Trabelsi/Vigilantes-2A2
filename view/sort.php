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
 $query = "SELECT * FROM user ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($connect, $query);  
 $output .= '  
 <table class="table table-striped title3">  
      <tr>  
                               <th><a class="column_sort" id="idUser" data-order="'.$order.'"href="#">ID</a></th>  
                               <th><a class="column_sort" id="email" data-order="'.$order.'"href="#">email</a></th>  
                               <th><a class="column_sort" id="occupation" data-order="'.$order.'"href="#">occupation</a></th>  
                               <th><a class="column_sort" id="name" data-order="'.$order.'"href="#">name</a></th>  
                                <th><a class="column_sort" id="lastname" data-order="'.$order.'"href="#">lastname</a></th>  
                               <th><a class="column_sort" id="gender" data-order="'.$order.'"href="#">gender</a></th>  

                          </tr> 
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr>  
           <td>' . $row["idUser"] . '</td>  
           <td>' . $row["email"] . '</td>  
           <td>' . $row["occupation"] . '</td>  
           <td>' . $row["name"] . '</td>  
           <td>' . $row["lastname"] . '</td> 
           <td>' . $row["gender"] . '</td> 
          
      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?>  