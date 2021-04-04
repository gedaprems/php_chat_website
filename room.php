<?php

$roomname = $_GET['roomname'];
include 'partials/db_connect.php';
$sql = "SELECT * FROM `rooms` where chatname ='$roomname'";
$result = mysqli_query($conn, $sql);
if($result){
    if(mysqli_num_rows($result)==0){

        echo '<script type="text/javascript"> ';   
        echo 'alert("The Chatroom name is not exists. Please create chatroom.");'; 
        echo 'window.location="http://localhost/php_chat_web";'; 
        echo '</script>';

    }else{
        echo "Lets Chat";

    }
}else{
    echo "error : ". mysqli_error();
}

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="partials/jquery.min.js.download"></script>
<style>

.bodydiv{
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.chat{
  height: 360px;
  overflow-y : scroll;
}
</style>

<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/product/">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="css/product.css" rel="stylesheet">
</head>
<body>

<!--Navbar -->
<?php include 'partials/_nav.php'; ?>


<!--Chat Body -->

<div class="bodydiv">
<h2>Chat Messages- <?php echo $roomname; ?></h2>

<div class="container">
  <div class="chat">
  <img src="img/bandmember.jpg" alt="Avatar">
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span>
  <br><br>
  </div>
</div>
<input type="text" class="form-control" name="inputmsg" id="inputmsg" placeholder="Add message">
<button class="btn btn-default bg-primary text-light " name="submsg" id="submsg">Send</button>

</div>
<?php include 'partials/_footer.php'; ?>
<script>
  window.onload=function(){
    $("#submsg").click(function(){
    
     var inputmsg = $("#inputmsg").val();
     
      $.post("postmsg.php",{msg:inputmsg , room: '<?php echo $roomname; ?>', ip: '<?php echo $_SERVER['REMOTE_ADDR']; ?>'},function(data){
        document.getElementsByClassName('chat')[0].innerHTML +=  data;  });$("#inputmsg").val('');
         return false;
  });

  }
 
</script>
</body>
</html>
