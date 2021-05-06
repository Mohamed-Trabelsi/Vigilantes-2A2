
<?php 
$dbhandle = new mysqli('localhost','root','', 'site');
 $query = "SELECT name , confirme FROM  user";
 $result = mysqli_query($dbhandle,$query);
 $chart_data ='';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ name:'".$row["name"]."', confirme:".$row["confirme"].", ";
}
$chart_data = substr($chart_data, 0, -2);
    ?>
    
<html>
 <head>
  <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Morris.js chart with PHP & Mysql</h2>
   <h3 align="center">Last 10 Years Profit, Purchase and Sale Data</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

    <script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'name',
 ykeys:['confirme'],
 labels:['confirme'],
 hideHover:'auto',
 stacked:true
});
</script>
