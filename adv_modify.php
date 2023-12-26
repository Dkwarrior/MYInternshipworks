<?php $page="adv_add" ?>
<?php require_once 'header.php';?>
<?php
check_login();
$query="select * from  adv where id = $_REQUEST[id]";
$r=run_sql($query);
$orow = mysqli_fetch_array($r);
if(isset($_POST["p_name"])){
    $orow= $_POST;
}
$err="";
if(isset($_POST["p_name"])){
    if(empty ($_POST["p_name"])){
        $err = "Product is req!!";
    }
    else if(empty ($_POST["p_category"]) || "Select"==$_POST["p_category"]){
        $err = "Category is req!!";
    }
    else if(empty ($_POST["p_desc"])){
        $err = "Description is req!!";
    }
    else if($_POST["price"]==""){
        $err = "Price is req!!";
    }
    else if(!filter_var($_POST["price"], FILTER_VALIDATE_FLOAT) && $_POST["price"]!=0){
        $err = "Price is incorrect!!";
    }
    else if(empty ($_POST["city"])){
        $err = "City is req!!";
    }
    else if(empty ($_POST["phone_no"])){
        $err = "Phone no is req!!";
    }
    else if(preg_match("/^0?[6-9]{1}\d{9}$/", $_POST["phone_no"])==false){
        $err = "Phone no is incorrect";
    }
    else if(check_img()!=null){
        $err = check_img();
    }
    else {
        if(!is_admin()){
        $whr = " and email = '$_SESSION[email]' ";
        }
        $query = "update `adv` set 
            `p_name` = '$_POST[p_name]', 
            `p_desc` = '$_POST[p_desc]', 
            `price` = $_POST[price], 
            `city` = '$_POST[city]', 
            `phone_no` = '$_POST[phone_no]', 
            `p_category` = '$_POST[p_category]'
            where id = $_REQUEST[id] 
            $whr
    ";
    $r =run_sql($query);    
$lid = $_REQUEST["id"];
if(isset($_FILES["at1"]) && empty($_FILES["at1"]["name"])!=true){
    move_uploaded_file($_FILES["at1"]["tmp_name"], "upload/$lid.jpg");
}
     redirect("index.php?msg=1");
    }
}
?>
<div class="row">    
    <div class="col-sm-10 col-sm-offset-1">    
        <h1>Modify Ad</h1>
<form method="post" enctype="multipart/form-data" class="form-horizontal">
      <div class="form-group">
      <label for="pname">Product:</label>
      <input class="form-control" type="text" value="<?php echo $orow["p_name"]?>" name="p_name"/>
      </div>
      <div class="form-group">
      <label for="p_cate">Category:</label>
      <select class="form-control" name="p_category">
            <option>Select</option>
            <?php
            $query = "select * from cate";
            $r = run_sql($query);
            while ($row = mysqli_fetch_array($r)) {
                $sel = "";
                if($orow["p_category"]==$row[cate_name]){
                    $sel="selected='selected'";
                }
                echo "<option $sel>$row[cate_name]</option>";
            }            
            ?>
      </select>
      </div>
      <div class="form-group">
      <label for="p_desc">Description:</label>
      <textarea class="form-control" name="p_desc" id='p_desc' rows="6" cols="60"><?php echo $orow["p_desc"]?></textarea>      
      </div>
      <div class="form-group">
      <label for="price">Price:</label>
        <input class="form-control" type="text" value="<?php echo $orow["price"]?>" name="price"/>      
      </div>
      <div class="form-group">
      <label for="city">City:</label>
      <input class="form-control" type="text" value="<?php echo $orow["city"]?>" name="city"/>
      </div>
      <div class="form-group">
      <label for="pn">Phone No:</label>
      <input class="form-control" type="text" value="<?php echo $orow["phone_no"]?>" name="phone_no"/>
      </div>
      <div class="form-group">
      <label for="at1">Photo:</label>
                <?php
                if(file_exists("upload/$_REQUEST[id].jpg")){
                        echo "<img style='width: 100%' src='upload/$_REQUEST[id].jpg' />";        
                    }
                ?>
              <input class="form-control" type="file" name="at1"/>
      </div>
    <div  class="form-group">
       <h4 style="color: red;"><?php echo $err;?></h4>
    </div>    
  <div class="form-group"> 
      <button type="submit" class="btn btn-primary" style="background-color: #660000">Post Add</button>
  </div>
  <div class="form-group"> 
      <a class="btn btn-primary" style="background-color: #660000" href="adv_modify.php?id=$_REQUEST[id]">Reset</a>
  </div>    
  <div class="form-group"> 
        <a class="btn btn-danger" style="background-color: #660000"  href='index.php'>Back</a>
  </div>    
</form>
        </div>
</div>        
<?php require_once 'footer.php';?>
