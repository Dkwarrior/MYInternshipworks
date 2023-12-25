<?php include("header/header.php"); ?>
<section id="One" class="wrapper style3" style="margin-top: -4%;">
    <div class="inner">
        <header class="align-center">
            <p>!!!::: Art Speaks Where Words Are Unable To Explain :::!!!</p>
            <h2>Modify Gallery & Photos</h2>
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
    ?><div class="my-0 mx-2">
        <?php
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {

                $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));


                $sql = "INSERT INTO  g_gallery(imageData)
	VALUES('{$imgData}')";
                $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
                // if(isset($current_id)) {
                // 	header("Location: listImages.php");
                // }
            }
        }
        ?>

        <br><br><br>
        <HTML>

        <HEAD>
            <TITLE>Upload Image to MySQL </TITLE>
            <link href="styleGallery.css" rel="stylesheet" type="text/css" />
        </HEAD>

        <BODY>
            <form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
                <label style="color:blue ;">Upload Image File:</label><br />
                <input name="userImage" type="file" class="inputFile" />
                <input type="submit" value="Submit" class="btnSubmit" />
            </form>
    </div>
    <?php

    $query = "select * from g_gallery";
    $res = run_sql($query);
    while ($row = mysqli_fetch_array($res)) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imageData']) . '" height="250px" width="300px"/>';
    }
    ?>
</BODY>

</HTML>