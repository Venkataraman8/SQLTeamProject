<div id="right-col-container">
    <div id="messages-container">
<?php

        $no_message=false;
         if(isset($_GET['username'])){
             $_GET['username']=$_GET['username'];

         }
         else{
             $q='SELECT sender_name, receiver_name FROM messages
                    WHERE sender_name= "'.$_SESSION['username'].'"
                    OR receiver_name = "'.$_SESSION['username'].'"
                    ORDER BY dat DESC LIMIT 1';
             $r=mysqli_query($connect,$q);

             if($r){
                 if(mysqli_num_rows($r)>0){
                     while($row=mysqli_fetch_assoc($r)){
                         $sender_name=$row['sender_name'];
                         $receiver_name=$row['receiver_name'];

                         if($_SESSION['username']==$sender_name){
                             $_GET['username']= $receiver_name;
                         }else{
                             $_GET['username']=$sender_name;

                         }
                     }

                 }else{
                     echo'No messages yet!';
                     $no_message = true;
                 }
             }else{

                 $q;
             }


         }

         if($no_message==false) {
             $q = 'SELECT * FROM messages WHERE sender_name = "' . $_SESSION['username'] . '" and receiver_name = "' . $_GET['username'] . '"
                OR sender_name = "' . $_GET['username'] . '" and receiver_name="' . $_SESSION['username'] . '"';
             $r = mysqli_query($connect, $q);

             if ($r) {
                 while ($row = mysqli_fetch_assoc($r)) {
                     $sender_name = $row['sender_name'];
                     $receiver_name = $row['receiver_name'];
                     $message = $row['message_text'];

                     if ($sender_name == $_SESSION['username']) {
                         ?>
                         <div class="alert alert-primary" role="alert">
                             <a style="font-size: 17px;" href="#">Me</a>
                             <p style="font-size: 15px;"><?php echo $message ?></p>
                         </div>
                         <?php

                     } else {
                         ?>

                         <div class="alert alert-secondary" role="alert">
                             <a style="font-size: 17px;" href="#"><?php echo $sender_name; ?></a>
                             <p style="font-size: 17px;"><?php echo $message ?></p>
                         </div>
                         <?php
                     }

                 }

             } else {
                 echo $q;

             }
         }
        ?>

    </div>
    <form method="post" class="input"id="message-form">
    <textarea  class="textarea" id="message_text" rows="2" cols="30" placeholder="Write your message"></textarea>
<!--        <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>-->
    </form>

    <script src="jquery-3.4.1.min.js"></script>
    <script>
        $("document").ready(function(event){

            $("#right-col-container").on('submit','#message-form', function() {
                    var message_text= $("#message_text").val();
                    $.post("sending_process.php?username=<?php echo $_GET['username'];?>",
                        {
                            text:  message_text,
                        },
                        function (data,status) {

                            $("#message_text").val("");

                            document.getElementById("messages-container")  .innerHTML +=data;
                        }

                    );

            });


        $("#right-col-container").keypress(function (e) {
            if(e.keyCode==13 && !e.shiftKey) {
                $("#message-form").submit();
            }
            });

        });


    </script>

</div>