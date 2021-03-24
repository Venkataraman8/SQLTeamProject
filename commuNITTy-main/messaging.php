
<div id="container-fluid">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Welcome to Quora Chatbox!</h4>
        <p style="font-size: 14px;">General Instructions: If the person whom you would like to chat with, is not the left column, Click New Message!</p>

    </div>
<?php
require_once("connect.php");
session_start();
if (isset($_SESSION['username'])) {
   echo' <div id="menu" class="alert alert-info" role="alert">';
           $query7= 'SELECT namme from username where username1="'.$_SESSION['username'].'"';
             $res7 = mysqli_query($connect,$query7);
             $rowb=mysqli_fetch_array($res7);
             $name=$rowb['namme'];
             echo"Welcome ";
             echo $name;'</a></h5>';
    if (isset($_GET['username'])) {

        $usernamee = $_GET['username'];

        $query001 = 'SELECT * FROM messages WHERE sender_name = "' . $_SESSION['username'] . '"  and receiver_name = "' . $_GET['username'] . '"
                OR sender_name = "' . $_GET['username'] . '" and receiver_name="' . $_SESSION['username'] . '"';

        if ($r = mysqli_query($connect,$query001)) {

           echo' <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                New Message
                                </button>
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                         <div class= "new-message" id="new-message">
                       <div class="modal-header">
                    <h4 class="modal-title">New Message</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                   <div class="modal-body">
                    <form  align="center" method="POST">
                       <datalist id="user">
                
                        </datalist><br>
                        <textarea rows="2" cols="30"class="message-input" name="message" placeholder="Write your message"></textarea><br>
                         </div>
                        <div class="modal-footer">
                        <input type="submit" value="send" class="btn btn-primary" id="send" name="send"/>
                         </form>
                   
                
                     </div>
                 </div>
               </div>
              </div>
            </div>
            ';

            if (isset($_POST['send'])) {
                $sender_name = $_SESSION['username'];
                $receiver_name = $usernamee;
                $message = $_POST['message'];
                date_default_timezone_set("Asia/Kolkata");
                $date = date("h:i:sa");

                $query1 = "CREATE table if not exists messages(id varchar (250), sender_name varchar(250), receiver_name varchar(250), message_text varchar(250), dat varchar(250))";
                $res1 = mysqli_query($connect, $query1);

                $query02 = "CREATE table if not exists notification(sender varchar (250), receiver varchar(250), ty varchar (250), status varchar(100), dat varchar (250), qid varchar(250))";
                $res02 = mysqli_query($connect, $query02);

                $type = "Messaged you";
                $status = "unread";
                date_default_timezone_set("Asia/Kolkata");
                $date= date("h:i:sa");
                $q_id="none";

                $query505="INSERT into notification( sender, receiver, ty, status, dat, qid) VALUES ('$sender_name', '$receiver_name','$type', '$status','$date', '$q_id')";
                $res505= mysqli_query($connect,$query505);

                $query2 = "INSERT into messages(id, sender_name, receiver_name, message_text, dat) VALUES ('','$sender_name', '$receiver_name', '$message', '$date')";
                $res2 = mysqli_query($connect, $query2);



                if ($res2) {

                } else {

                }
            }
                
                 } else {

                    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            New Message
                                </button>
                    <div class="modal" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                         <div class= "new-message" id="new-message">
                       <div class="modal-header">
                    <h4 class="modal-title">New Message</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                   <div class="modal-body">
                    <form  align="center" method="POST">
                       <datalist id="user">
                
                        </datalist><br>
                        <textarea rows="2" cols="30"class="message-input" name="message" placeholder="Write your message"></textarea><br>
                         </div>
                        <div class="modal-footer">
                        <input type="submit" value="send" class="btn btn-primary" id="send" name="send"/>
                         </form>
                   
                
                     </div>
                 </div>
               </div>
              </div>
            </div>
              ';

            if (isset($_POST['send'])) {
                $sender_name = $_SESSION['username'];
                $receiver_name = $usernamee;
                $message = $_POST['message'];
                date_default_timezone_set("Asia/Kolkata");
                $date = date("h:i:sa");

                $query1 = "CREATE table if not exists messages(id varchar (250), sender_name varchar(250), receiver_name varchar(250), message_text varchar(250), dat varchar(250))";
                $res1 = mysqli_query($connect, $query1);

                $query2 = "INSERT into messages(id, sender_name, receiver_name, message_text, dat) VALUES ('','$sender_name', '$receiver_name', '$message', '$date')";
                $res2 = mysqli_query($connect, $query2);

                if ($res2) {

                } else {

                }
            }


        }
    }
}

//}
//        ?>
    <head>
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <style>

            <?php require_once ("message.css");?>



        </style>
        <title>ChatBox</title>
    </head>
<script src="jquery-3.4.1.min.js"></script>


    <body>


            </div>

        <div id="left-col">
        <?php require_once ("left1.php") ?>

        </div>

        <div id="right-col">
            <?php require_once ("right1.php")?>






            </div>
    </div>




    </body>
    </html>