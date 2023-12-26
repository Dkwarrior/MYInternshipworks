<?php include './header.php';?>
<script>
   $(function(){
$('.maps').click(function () {
    $('.maps iframe').css("pointer-events", "auto");
});
$('.maps').mouseleave(function () {
    $('.maps iframe').css("pointer-events", "none");
});       
$('.maps').mouseenter(function () {
    $('.maps iframe').css("pointer-events", "none");
});       
   });
</script>
<div id="cnt" class="container-fluid d1 img_anim">
    <h1 class="well well-lg">Contact</h1>
      <div class="row">
      <div class="col-sm-10 col-sm-offset-1 ">          
          <h3><strong>VIP Complex Shankar Nagar Raipur</strong><br>
<span class="glyphicon  glyphicon-map-marker sm-icon"></span> Shankar, Raipur, Chhattisgarh 492001<br>
<span class="glyphicon glyphicon-phone sm-icon"></span>  +91 7389200000<br>
<span class="glyphicon glyphicon-envelope sm-icon"></span>  info@onlineclassified.com<br>
<span class="glyphicon glyphicon-globe sm-icon"></span>  www.onlineclassified.com</h3>
      </div>
  </div>

  <div class="row">
      <div class="col-sm-10 col-sm-offset-1 maps">        
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14873.968751608838!2d81.6466154!3d21.2519764!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd269268fb9d4fed6!2sPagaria+Complex+Bus+Stand!5e0!3m2!1sen!2sin!4v1495687604460" frameborder="0" style="border:0; width: 100%; height: 500px" allowfullscreen></iframe>          
      </div>
  </div>
</div>

<?php include './footer.php';?>