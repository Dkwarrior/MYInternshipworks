<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>gallery</title>
  </head>
  <body>
  <?php $page="home" ?>
<?php require_once 'header.php';?>
<?php
    
    $query="select * from  adv $whr order by id desc";
    $r=run_sql($query);
   echo "<table  class='table table-responsive table-striped table-bordered'>";
        echo "<tr>
            <th>Product</th>
            <th>Price</th>
            <th>City</th>
            <th>Category</th>
            <th>Description</th>
            <th>Image</th>
        </tr>";
    while ($row = mysqli_fetch_array($r)) {
        echo "<tr style='color: black; font-size: 18px; opacity: 0.9;'>
            <td><a style='color: blue' href='adv_det.php?id=$row[id]'>$row[p_name]</a></td>
            <td>$row[price]</td>
            <td>$row[city]</td>
            <td>$row[p_category]</td>
            <td>$row[p_desc]</td>
            <td><a style='color: blue' href='adv_det.php?id=$row[id]'><img style='height: 100px; width: 100px;' src='upload/$row[id].jpg' /></a></td>
        </tr>";
    }
    echo "</table>";

    while ($row = mysqli_fetch_array($r)) {
        echo "<div class='panel-group'>
    <div class='panel panel-danger'>
      <div class='panel-heading' style='color: #330000; font-size: 24px; font-weight: bold;'><strong>$row[p_name]</strong></div>
        <div class='panel-body'>      
            <div class='row'>
                <div class='col-sm-3'>
                <a style='color: blue' href='adv_det.php?id=$row[id]'><img class='img-responsive img-circle' style='height: 200px;'  src='upload/$row[id].jpg' /></a>
                </div>
                <div class='col-sm-9'>
                <strong>Price:</strong> &#8377; $row[price]<br>
                <strong>City:</strong> $row[city]<br>
                <strong>Category:</strong> $row[p_category]<br>
                <strong>Description:</strong> $row[p_desc]<br><br>
                <a class='btn btn-lg btn-danger'  style='background-color: #330000;' href='adv_det.php?id=$row[id]'>Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>";
    }
?>
<?php require_once 'footer.php';?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>