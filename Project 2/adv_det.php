<?php $page="adv_det" ?>
<?php require_once 'header.php';?>
<?php
    $can_modify = is_admin();
    $query="select * from  adv where id = $_REQUEST[id]";
    $r=run_sql($query);
    if($row = mysqli_fetch_array($r)) {
        $crdate = get_date($row['cr_date']);
        if($_SESSION["email"]==$row["email"]){
            $can_modify=true;
        }
        echo "<h1 class='well well-lg'>$row[p_name]</h1>";
        echo "<div class='panel-group'>
    <div class='panel panel-danger'>
        <div class='panel-body'>      
            <div class='row'>
                <div class='col-sm-6'>
                <a style='color: blue' href='adv_det.php?id=$row[id]'><img class='img-responsive img-circle' style='height: 500px;'  src='upload/$row[id].jpg' /></a>
                </div>
                <div class='col-sm-6'>
                <strong>Price:</strong> &#8377; $row[price]<br>
                <strong>City:</strong> $row[city]<br>
                <strong>Category:</strong> $row[p_category]<br>
                <strong>Description:</strong> $row[p_desc]<br><br>
                <strong>Phone No:</strong> $row[phone_no]<br>
                <strong>EMail:</strong> $row[email]<br>
                <strong>Created Date:</strong> $crdate<br><br><br>
                <a class='btn btn-lg btn-danger'  style='background-color: #330000;' href='index.php?id=$row[id]'>Back</a>";
                if($can_modify){
                    echo "<br><br><a style='background-color: #330000;' class='btn btn-lg btn-danger'  href='adv_modify.php?id=$row[id]'>Modify</a>";
                    echo "&nbsp;&nbsp;&nbsp;<a style='background-color: #330000;' class='btn btn-lg btn-danger'  href='adv_del.php?id=$row[id]'>Delete</a>";
                }
                echo "</div>
                </div>
                </div>
            </div>
        </div>";
    }
?>

<?php require_once 'footer.php';?>
