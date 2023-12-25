<?php include("header/header.php"); ?>

<section id="One" class="wrapper style3" style="margin-top: -2%;">
  <div class="inner">
    <header class="align-center">
      <p>!!!::: Art Speaks Where Words Are Unable To Explain :::!!!</p>
      <h2>Gallery & Photos</h2>
    </header>
  </div>
</section>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="styleGallery.css" rel="stylesheet" type="text/css" />
  <title>Gallery</title>


</head>

<body>

  <?php

  require_once "db1.php";
  require_once "galleryView.php";

  ?> <div class="my-4 mx-5">
    <?php
    $query = "select * from g_gallery";
    $res = run_sql($query);
    while ($row = mysqli_fetch_array($res)) {
      echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imageData']) . '" height="250px" width="300px"/>';
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 
</body>

</html>
</div>

<?php include("../footer/footer.php"); ?>