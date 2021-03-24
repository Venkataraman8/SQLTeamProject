<?php

require_once ("connect.php");

if(isset($_POST['user'])){

    $q='SELECT * from users WHERE username= "'.$_POST['user'].'"';
    $r= mysqli_query($connect, $q);

    if($r){
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_assoc($r)){
                $user_name=$row['username'];
                echo'<option value="'.$user_name.'"';
            }

        }else{
            echo'<option value="no user">';

        }
    }else{




    }
}
?>