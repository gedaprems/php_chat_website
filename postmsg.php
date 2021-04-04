<?php 
include 'partials/db_connect.php';
$msg = $_POST['msg'];
$roomname = $_POST['room'];
$ip = $_POST['ip'];

$sql = "INSERT INTO `msgs` ( `msg`, `room`, `ip`, `stime`) VALUES ('$msg', '$roomname', '$ip', current_timestamp())";
if(mysqli_query($conn, $sql)){
echo '<img src="img/bandmember.jpg" alt="Avatar">
<p>'.$msg.'</p>
<span class="time-right">11:00</span><br><br>';
}
mysqli_close($conn);
?>