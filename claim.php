    <?php
$room = $_POST['room'];
if(ctype_alnum($room)){
    if(strlen($room)>20 or strlen($room)<2){
        #Checking the length of the chatroom name
        echo '<script type="text/javascript"> ';   
        echo 'alert("Please Choose the name between 2 to 20");'; 
        echo 'window.location="http://localhost/php_chat_web";'; 
        echo '</script>';
    }else{
        #Connect to the database
        include 'partials/db_connect.php';
        
        $sql = "SELECT * FROM `rooms` where chatname ='$room'";
        $result = mysqli_query($conn,$sql);
        if($result){
            if(mysqli_num_rows($result)>0){
                echo '<script type="text/javascript"> ';   
                echo 'alert("Please Choose a different chatroom name. The requested Chat room name is used already");'; 
                echo 'window.location="http://localhost/php_chat_web";'; 
                echo '</script>';
            }else{
                $sql = "INSERT INTO `rooms` ( `chatname`, `chatdate`) VALUES ( '$room', current_timestamp())";
                if(mysqli_query($conn,$sql)){
                    echo '<script type="text/javascript"> ';   
                    echo 'alert("Your Chat room is ready. Go and chat.");'; 
                    echo 'window.location="http://localhost/php_chat_web/room.php?roomname='.$room.'";'; 
                    echo '</script>';
                }else{
                    echo 'error : '.mysqli_error($conn);
                }
            }

        }else{
                 echo "Some Error";
        }
    }

}else{
        #Checking if the chatroom name is alphanumeric or not
        echo '<script type="text/javascript"> ';   
        echo 'alert("Please Choose an alphanumeric chatroom name");'; 
        echo 'window.location="http://localhost/php_chat_web";'; 
        echo '</script>';
}



?>