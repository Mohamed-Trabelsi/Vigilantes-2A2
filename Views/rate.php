<?php
    require_once '../Controller/rating.php';
    require_once '../entities/rating.php';

    $noteG =  new ratingC();
  
    if (isset($_POST['rate'])) 
    {
        $note = new note($_POST['rate']);
        
        $noteG->rate($note,$_GET['idP']);
    }
    ////
?>

<!DOCTYPE html>
<html lang="en">

<head> 
    <?php //include_once 'header.php'; ?>
    
</head>

<body>
    <?php //include_once 'nav-bar.php'; ?>
 <div id="right-panel" class="right-panel">
      <div class="content">
    <?php
        if (isset($_GET['idP'])) {
            $result = $noteG->getproduitById1($_GET['idP']);
            if ($result !== false) {
    ?>
     <div class="container">
      <div class="post">
        <div class="text">
Thanks for rating us!</div>

</div>
<div class="star-widget">
    <form action=""method="POST">
        <input type="radio" name="rate" id="rate-5" value="1">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4" value="2">
        <label for="rate-4" class="fas fa-star" ></label>
        <input type="radio" name="rate" id="rate-3" value="3">
        <label for="rate-3" class="fas fa-star" ></label>
        <input type="radio" name="rate" id="rate-2" value="4">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1" value="5">
        <label for="rate-1" class="fas fa-star"></label>
 <br><br>
<div class="btn">
<button type="submit">Post</button>
</div>
</form>
    <?php
        }
    }
        else {
            header('Location:listeC.php');
        }
    
    ?>
    </div>
</div>
</body>

</html>