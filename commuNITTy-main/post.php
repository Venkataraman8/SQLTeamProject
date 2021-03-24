<?php
session_start();
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $query = "select fullname from users where username='$username'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $text = $_POST['text'];
    $name= stripslashes ( htmlspecialchars ( $row ['fullname'] ) );

    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$name."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>