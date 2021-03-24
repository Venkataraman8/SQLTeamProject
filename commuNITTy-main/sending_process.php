<?php
    session_start();
        require_once ("connect.php");
    if(isset($_SESSION['username']) and isset ($_GET['username'])){
        if(isset($_POST['text'])){

            if($_POST['text']!=''){

                $sender_name=$_SESSION['username'];
                $receiver_name=$_GET['username'];
                $message=$_POST['text'];
                date_default_timezone_set("Asia/Kolkata");
                $date = date("h:i:sa");

                $query2 = "INSERT into messages(id, sender_name, receiver_name, message_text, dat) VALUES ('','$sender_name', '$receiver_name', '$message', '$date')";
                $res2 = mysqli_query($connect, $query2);

                if($res2){
                    ?>
                    <div class="alert alert-primary" role="alert">
                        <a style="font-size: 17px;" href="#">Me</a>
                        <p style="font-size: 15px;"><?php echo $message ?></p>
                    </div>
                    <?php

                }else{

                    echo $query2;
                }

            }else{
                echo'Pls write something first';
            }

        }else{
            echo 'problem with text';
        }

    }else{


    }