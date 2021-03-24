<?php 
require_once("connect.php");
  session_start();
  $user1=$_POST['user1'];
  $user2=$_POST['user2'];

        $query1 = "CREATE table if not exists requests(id varchar (250), user1 varchar(250), user2 varchar(250))";
        $res1 = mysqli_query($connect, $query1);

        $query2 = "INSERT into requests(id, user1, user2) VALUES ('','$user1','$user2')";
        $res2 = mysqli_query($connect, $query2);



    // date_default_timezone_set("Asia/Kolkata");
    // $dt=date("Y-m-d H:i:s");
    // $usernamed1=$_SESSION['username'];
    //   $usernamed=$us;
    //    $dba= mysqli_connect('localhost','root','',$usernamed)or die("could not connect database..");
    //    $mg=$C;
    //   $sql = "INSERT INTO `notification`(`dat`,`msg`,`user`,`kind`,`stat`) VALUES ('$dt','$mg','$usernamed1','4','unread');";
    //   mysqli_query($dba, $sql);


 
  



  
 
  ?>