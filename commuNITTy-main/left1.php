<div style="background: steelblue; " id="left-col-container">
        <?php

$q='SELECT DISTINCT receiver_name, sender_name from messages WHERE sender_name="'.$_SESSION['username'].'" 
      OR receiver_name="'.$_SESSION['username'].'"
      ORDER BY dat DESC';


$r=mysqli_query($connect,$q);

if($r) {


    if (mysqli_num_rows($r) > 0) {
        $counter = 0;
        $added_user = array();
        while ($row = mysqli_fetch_assoc($r)) {
            $sender_name = $row['sender_name'];
            $receiver_name = $row['receiver_name'];

            if ($_SESSION['username'] == $sender_name) {

                if (in_array($receiver_name, $added_user)) {

                } else {
                    ?>
                            <div class="media" style="background-color: lightcyan;">
                                <img src="https://cdn3.iconfinder.com/data/icons/business-round-flat-vol-1-1/36/user_account_profile_avatar_person_student_male-512.png" style="size: auto;" class="image" alt="...">
                                <div class="media-body">
                            <h5 class="mt-0" style="color: black;"><?php echo '<a style="font-size: 25px;" href="?username='.$receiver_name.'">';

                                $query7= 'SELECT namme from username where username1="'.$receiver_name.'"';
                                $res7 = mysqli_query($connect,$query7);
                                $rowb=mysqli_fetch_array($res7);
                                $name=$rowb['namme'];

                            echo $name;'</a>'?></h5>


                        </div>
                    </div>


                    <?php

                    $added_user = array($counter => $receiver_name);
                    $counter++;

                }


            } elseif ($_SESSION['username'] == $receiver_name) {

                if (in_array($sender_name, $added_user)) {

                } else {
                    ?>

                    <div class="media" style="background-color: lightcyan;">
                        <img src="https://cdn3.iconfinder.com/data/icons/business-round-flat-vol-1-1/36/user_account_profile_avatar_person_student_male-512.png" style="size: auto;" class="image" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0" style="color: black;"><?php echo '<a style="font-size: 25px;" href="?username='.$sender_name.'">';

                                $query71= 'SELECT namme from username where username1="'.$sender_name.'"';
                                $res71 = mysqli_query($connect,$query71);
                                $rowc=mysqli_fetch_array($res71);
                                $namme=$rowc['namme'];

                                echo $namme;'</a>'?></h5>


                        </div>
                    </div>

                    <?php

                    $added_user = array($counter => $sender_name);
                    $counter++;


                }


            }

        }


    } else {

        echo ' no user ';
    }


}else{
    echo'No Existing Chats!';
}


?>




</div>
