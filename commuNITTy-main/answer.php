

<?php
	require_once("connect.php");

	session_start();
	if(isset($_SESSION['username']))
		{ 
			if(isset($_GET['q_id'])){

				if(isset($_SESSION['username'])) {
                    $q_id = $_GET['q_id'];
                    $arr = explode('_', $q_id);
                    $admin = $arr[0];
                    $username = $_SESSION['username'];
                    $query0 = "select * from questable where q_id = '$q_id'";
                    $res0 = mysqli_query($connect, $query0);
                    $count0 = mysqli_num_rows($res0);
                    if (!$res0) {
                        echo mysqli_error($connect);
                    } else {
                        $submit = 0;

                        $query00001 = "CREATE table if not exists anstable(q_id varchar(250),answer varchar(250), ans_id varchar(250), username varchar(250), upvote varchar(250) )";
                        $res101 = mysqli_query($connect, $query00001);

                        $query02 = "CREATE table if not exists notification(sender varchar (250), receiver varchar(250), ty varchar (250), status varchar(100), dat varchar (250), qid varchar(250))";
                        $res02 = mysqli_query($connect, $query02);


                        if (isset($_POST['submit'])) {

                            $ans = $_POST['answer'];

                            $submit = 1;

                            $query07 = "select * from anstable";
                            $res07 = mysqli_query($connect, $query07);
                            $count = mysqli_num_rows($res07);
                            $count = $count + 1;
                            $ans_id = $username . "A_" . $count;
                            $upvote= 0;


                            $query2 = "insert into anstable (q_id,answer,ans_id, username,upvote) values ('$q_id','$ans','$ans_id','$username','$upvote')";
                            $res2 = mysqli_query($connect, $query2);


                            $query0 = "select username from questable where q_id='$q_id'";
                            $res0 = mysqli_query($connect, $query0);
                            $row = mysqli_fetch_array($res0);
                            $rec_id = $row['username'];

                            $query00 = "select username from anstable where ans_id='$ans_id'";
                            $res00 = mysqli_query($connect, $query00);
                            $row0 = mysqli_fetch_array($res00);
                            $send_id = $row0['username'];


                            $type = "Answered the question";
                            $status = "unread";
                            date_default_timezone_set("Asia/Kolkata");
                            $date= date("h:i:sa");

                            $query55="INSERT into notification( sender, receiver, ty, status, dat, qid) VALUES ('$send_id', '$rec_id','$type', '$status','$date', '$q_id')";
                            $res55= mysqli_query($connect,$query55);


                        }
						if (isset($_POST['upvote'])) {
						 $query1234 = "UPDATE anstable
							SET upvote =  upvote +1
							WHERE ans_id='". $_POST['answer_id']."'" ; 
							mysqli_query($connect, $query1234);
						}
                    }
                }
			}
			else
				header('Location:index.php');
	}
	else
		header('Location:login.php');

?>





<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<script>
    var button = document.getElementById('button');
    button.addEventListener('click', function() {
        this.innerHTML = Success!;
    }, false);
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Navbar content -->
    <a class="navbar-brand" href="index.php">CommuNITTy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="answerdisplay.php">Answer</a>
            </li>
            <li class="nav-item">
                <?php

                echo'<a class="nav-link" href="create_3.php?username='.$username.'">Question</a>' ?>
            
            </li>

            <li class="nav-item">
             <?php

                    echo'<a class="nav-link" href="advertisement.php?username='.$username.'">Post Ads</a>' ?>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Notification
                    <?php
                    //                    $query005 = "select qid from notification where receiver='$username' and status='unread'";
                    //                    $res005 = mysqli_query($connect, $query005);
                    //                    $rowaa = mysqli_fetch_array($res005);
                    //                    $q_id = $rowaa['qid'];
                    //
                    //
                    //
                    //                    $query09 = "select username from questable where q_id='$q_id'";
                    //                    $res09 = mysqli_query($connect, $query09);
                    //                    $row = mysqli_fetch_array($res09);
                    //                    $rec_id = $row['username'];
                    //
                    //                    $query099 = "select username from users where username='$rec_id'";
                    //                    $res09 = mysqli_query($connect, $query09);
                    //                    $row = mysqli_fetch_array($res09);

                    $query051 = "select * from notification where receiver='$username' and status='unread'";
                    $res051 = mysqli_query($connect, $query051);

                    if($res051)
                    {$count8 = mysqli_num_rows($res051);

                        if($count8){};?>
                        <span class="badge badge-light"><?php echo $count8 ?></span>
                    <?php }?>



                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">


                    <?php
                    $query05 = "select * from notification where receiver='$username' and status='unread'";
                    $res05 = mysqli_query($connect, $query05);
                    if($res05) {
                        while ($rowa = mysqli_fetch_array($res05)) {
                            echo '<a class="dropdown-item" href="#">';

                            echo $rowa['dat'];
                            echo "</small><br>";
                            echo $rowa['sender'];

                            echo $rowa['ty'];
                            echo "</a>";
                        }
                    }?></i><br>
                    <div class="dropdown-divider"></div>
                    <?php

                    ?>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Search
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="keyword.php?keyword=Technology">Technology</a>
                        <a class="dropdown-item" href="keyword.php?keyword=Life">Life</a>
                        <a class="dropdown-item" href="keyword.php?keyword=Hostel">Hostel</a>
                        <a class="dropdown-item" href="keyword.php?keyword=Highers">Highers</a>
                        <a class="dropdown-item" href="keyword.php?keyword=Academics">Academics</a>
                        <a class="dropdown-item" href="keyword.php?keyword=Transport">Transport</a>
                        <a class="dropdown-item" href="keyword.php?keyword=Mess">Mess</a>
                        <a class="dropdown-item" href="keyword.php?keyword=Fees">Fees</a>
                        <div class="dropdown-divider"></div>
                    </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <div align="right" class="nav-item">
                <a class="nav-link" <?php echo'href="profile.php?username='.$username.'">Profile</a>'?>
            </div>
        </ul>
    </div>
</nav>



	<?php	
		require_once("connect.php");
//		$query3="select * from questable where q_id='$q_id'";
//			$result3=mysqli_query($connect, $query3);
//			while($row3=mysqli_fetch_array($result3))
//			{
//				echo '<br><div align="center" style="font-size: 20px">Question: <span>'.$row3['question'].'</span><br></div>';
//			}
//		echo "<br><br>";
		if(isset($submit)&&$submit==0)
		{
			$query1="select * from questable where q_id='$q_id'";
			$result1=mysqli_query($connect , $query1);
			$count_q=mysqli_num_rows($result1);
			if(!$result1)
				echo mysqli_error($connect);
			
			
			while($row=mysqli_fetch_array($result1))
			{
				echo '<form method="POST">
				<div align="center" style="font-size: 20px"><b>'.$row['question'].'</b><br><br>
				Asked by:&nbsp;<a href="profile.php?username='.$row['username'].'">'.$row['username'].'</a><br>
				
				 Answer <br><input type="text"  name="answer" style=" font-size: 15px; width:700px; height:200px;" required></div><br>';
			}

			echo '<br><div align="center"><input id="submit" type="submit" value="Submit" name="submit" style="font-size: 18px"></div></form>';
		}
		else {
            if ($submit == 1) {
                echo '<div align="center">You have answered the question</div>';
                 }
            }

		echo '<div align="center">________________________________________________________________________________</div><br>';

            echo ' <div align="center"><u>Question Answered by  members</u></div><br>';
		echo '<br>';
            $query102 = "select answer,upvote,ans_id,username  from anstable where q_id='$q_id'";
            $res129 = mysqli_query($connect, $query102);



            //  <img src="..." class="align-self-start mr-3" alt="...">
            while ($row333 = mysqli_fetch_array($res129)) {

                echo '<div align="center">  <div class="card text-center" style="width: 500px; border-style: solid; "><div class="card-header">
                Answered by:&nbsp;<a href="profile.php?username='.$row333['username'].'">'.$row333['username'].'</a></h5>
                </div><a>' . $row333['answer'] . '</a><form method="post">';
				echo '<div><input type="hidden" name="answer_id" value="' . $row333['ans_id'] .'" ></div><br>';
				echo '<button type="submit" id="button" name="upvote" class="btn btn-primary"  onclick="">Upvote <span class="badge badge-light">';
//                $query123 = "select upvote from anstable where ans_id='$ans_id'";
//                $res123 = mysqli_query($connect, $query123);
//                $count12 = mysqli_num_rows($res123);
                echo ' '. $row333['upvote'] .'</span></button></form>              
  </div>
</div>
</div><br>';
}


    ?>
	</body>

