<?php $page="adv_add" ?>
<?php require_once 'header.php';?>
<?php
check_login();
$err="";
if(isset($_POST["pname"])){
    if(empty ($_POST["pname"])){
        $err = "Product is req!!";
    }
    else if(empty ($_POST["p_cate"]) || "Select"==$_POST["p_cate"]){
        $err = "Category is req!!";
    }
    else if(empty ($_POST["p_desc"])){
        $err = "Description is req!!";
    }
    else if(empty ($_POST["price"])){
        $err = "Price is req!!";
    }
    else if(!filter_var($_POST["price"], FILTER_VALIDATE_FLOAT)){
        $err = "Price is incorrect!!";
    }
    else if(empty ($_POST["city"])){
        $err = "City is req!!";
    }
    else if(empty ($_POST["pn"])){
        $err = "Phone no is req!!";
    }
    else if(preg_match("/^0?[6-9]{1}\d{9}$/", $_POST["pn"])==false){
        $err = "Phone no is incorrect";
    }
    else if(check_img()!=null){
        $err = check_img();
    }
    else {
        $query = "INSERT INTO `adv` 
            (`p_name`, `p_desc`, `cr_date`, 
            `price`, `city`, `phone_no`, 
            `p_category`, `email`) 
            VALUES 
            ('$_POST[pname]', '$_POST[p_desc]', '$today', 
            $_POST[price], '$_POST[city]', '$_POST[pn]', 
            '$_POST[p_cate]', '$_SESSION[email]');
    ";
    $r =run_sql($query);    
$lid = mysqli_insert_id($con);
if(isset($_FILES["at1"]) && empty($_FILES["at1"]["name"])!=true){
    move_uploaded_file($_FILES["at1"]["tmp_name"], "upload/$lid.jpg");
}
     redirect("index.php?msg=1");
    }
}
?>
<div class="row">    
    <div class="col-sm-10 col-sm-offset-1">    
        <h1>Add New</h1>
<form method="post" enctype="multipart/form-data" class="form-horizontal">
      <div class="form-group">
      <label for="pname">Product:</label>
      <input class="form-control" type="text" value="<?php echo $_POST["pname"]?>" name="pname"/>
      </div>
      <div class="form-group">
      <label for="p_cate">Category:</label>
      <select class="form-control" name="p_cate">
            <option>Select</option>
            <?php
            $query = "select * from cate";
            $r = run_sql($query);
            while ($row = mysqli_fetch_array($r)) {
                $sel = "";
                if($_POST["p_cate"]==$row[cate_name]){
                    $sel="selected='selected'";
                }
                echo "<option $sel>$row[cate_name]</option>";
            }
            ?>
      </select>
      </div>
      <div class="form-group">
      <label for="p_desc">Description:</label>
      <textarea class="form-control" name="p_desc" rows="6" cols="60"><?php echo $_POST["p_desc"]?></textarea>      
      </div>
      <div class="form-group">
      <label for="price">Price:</label>
        <input class="form-control" type="text" value="<?php echo $_POST["price"]?>" name="price"/>      
      </div>
      <div class="form-group">
      <label for="city">City:</label>
      <input class="form-control" type="text" value="<?php echo $_POST["city"]?>" name="city"/>
      </div>
      <div class="form-group">
      <label for="pn">Phone No:</label>
      <input class="form-control" type="text" value="<?php echo $_POST["pn"]?>" name="pn"/>
      </div>
      <div class="form-group">
      <label for="at1">Photo:</label>
      <input class="form-control" type="file" name="at1"/>
      </div>
    <div  class="form-group">
       <h4 style="color: red;"><?php echo $err;?></h4>
    </div>    
  <div class="form-group"> 
      <button type="submit" class="btn btn-primary" style="background-color: #660000">Post Add</button>
  </div>
  <div class="form-group"> 
      <a class="btn btn-primary" style="background-color: #660000" href="adv_add.php">Reset</a>
  </div>    
</form>
        </div>
</div>    
<?php require_once 'footer.php';?>
