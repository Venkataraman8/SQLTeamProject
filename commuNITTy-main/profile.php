<?php
require_once("connect.php");
session_start();
?>


<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>

<script src="jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<style>

    body {
        background: rgb(242,241,250);
        background: linear-gradient(90deg, rgba(242,241,250,1) 0%, rgba(186,200,215,1) 53%, rgba(149,161,244,1) 100%);
    }

    /* Profile container */
    .profile {
        margin: 20px 0;
    }

    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: rgb(242,241,250);
        background: linear-gradient(90deg, rgba(242,241,250,1) 0%, rgba(188,200,214,1) 53%, rgba(78,80,98,1) 100%);
    }

    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 50%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }

    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 2px;
        font-weight: 700;
        margin-bottom: 7px;
    }

    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 30px;
    }

    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }

    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }

    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
        border-bottom: none;
    }

    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }

    /* Profile Content */
    .profile-content {
        padding: 20px;
        background: rgb(242,241,250);
        background: linear-gradient(90deg, rgba(242,241,250,1) 0%, rgba(188,200,214,1) 53%, rgba(78,80,98,1) 100%);
        min-height: 460px;
    }
</style>



<script>


    function request(user1,user2)
    {
        $.ajax({

            url:"request1.php",
            method:"post",
            data:{user1:user1,
                user2:user2,
            },
            success:function(res){
                console.log(res);
            }


        })


        document.getElementById('friends').innerHTML= "You are friends now!";






    }


</script>








<?php

if(isset($_SESSION['username'])) {
    if (isset($_GET['username'])) {
        if ($_GET['username'] != $_SESSION['username']) {
            $username = $_GET['username'];
            ?>
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

                    echo'<a class="nav-link" href="advertisement.php">Post Ads</a>' ?>
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
                    }
                    ?>
                    <br>

                    <!--<div class="dropdown-divider"></div>-->
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
            <li>
            <div class="nav-item">
                <a class="nav-link" <?php echo'href="profile.php?username='.$username.'">Profile</a>'?>
            </div>
            </li>
        </ul>
    </div>
</nav>
<?php
            $query1 = "select namme,skills,hostel,department,yearr from username where username1='$username'";
            $res1 = mysqli_query($connect, $query1);

            $row01 = mysqli_fetch_array($res1);
            echo' 
          
<div style= "overflow: no-display;" class="container-fluid">
    <div  style= "overflow: no-display;" class="row profile">
		<div style="margin-left: 40%; overflow: hidden; background-color: white;" >
			<div align="center">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic"  style="width: 350px; height: 350px; margin-top: 5%; overflow: hidden;">
					<img src="https://cdn3.iconfinder.com/data/icons/business-round-flat-vol-1-1/36/user_account_profile_avatar_person_student_male-512.png" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->    
				<!-- SIDEBAR USER TITLE -->
				<div class= align="center">
					<div class="profile-usertitle-name" style="font-size: 15px; margin-top: unset;">';
            echo $row01['namme'];
            echo ' </div>
					<div class="profile-usertitle-job">';
            echo $row01['yearr'];
            echo "<br>";
            echo $row01['department'];
            echo '</div>

                <div class="profile-usertitle-job">';
            echo "Lives in ";
            echo $row01['hostel'];
            echo "<br>";
            echo '</div>

            <div class="profile-usertitle-job">';
            echo "Skilled at:  ";
            echo $row01['skills'];
            echo "<br>";
            echo '</div>
                
            
				</div>
				
				<div class="profile-userbuttons">
					<a type="button" target="_blank" href="messaging.php?username='.$username.'" class="btn btn-danger btn-sm" >Message</a>
                </div>
                <div class="profile-userbuttons">';
                ?>

				<button id="request" type="submit" onclick="request('<?php echo $_SESSION['username'] ?>', '<?php echo $username ?>');" class="btn btn-danger btn-sm" >Friends</button>
                <div id="friends"></div>
				<?php
                 
                 echo'</div>

        
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div style="margin-left: 10%" class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a target="_blank" href="friends.php?username='.$username.'" >
							<i class="glyphicon glyphicon-user"></i>
							View Friends </a>
						</li>
						<li>
							<a href="maps.php" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Direct to Hostel </a>
						</li>	
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		</div>
	</div>
</div>
<center>

</center>
<br>
<br>>
  ';

        } else {
            $username = $_GET['username'];?>
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

                    echo'<a class="nav-link" href="advertisement.php">Post Ads</a>' ?>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Notification
                    <?php


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
            <li>
            <div class="nav-item">
                <a class="nav-link" <?php echo'href="profile.php?username='.$username.'">Profile</a>'?>
            </div>
            </li>
        </ul>
    </div>
</nav>
<?php
            $query1 = "select namme,skills,hostel,department,yearr from username where username1='$username'";
            $res1 = mysqli_query($connect, $query1);

            $row01 = mysqli_fetch_array($res1);
            echo '

           
<div style= "overflow: no-display;" class="container-fluid">
    <div  style= "overflow: no-display;" class="row profile">
		<div style="margin-left: 40%; overflow: hidden; background-color: white;" >
			<div align="center">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic"  style="width: 350px; height: 350px; margin-top: 5%; overflow: hidden;">
					<img src="https://cdn3.iconfinder.com/data/icons/business-round-flat-vol-1-1/36/user_account_profile_avatar_person_student_male-512.png" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->    
				<!-- SIDEBAR USER TITLE -->
				<div class= align="center">
					<div class="profile-usertitle-name" style="font-size: 15px; margin-top: unset;">';
            echo $row01['namme'];
            echo ' </div>
					<div class="profile-usertitle-job">';
            echo $row01['yearr'];
            echo "<br>";
            echo $row01['department'];
            echo '</div>

                <div class="profile-usertitle-job">';
            echo "Lives in ";
            echo $row01['hostel'];
            echo "<br>";
            echo '</div>

            <div class="profile-usertitle-job">';
            echo "Skilled at:  ";
            echo $row01['skills'];
            echo "<br>";
            echo '</div>
                
            
				</div>
				
				<div class="profile-userbuttons">
					
            <a type="button" target="_blank" href="messaging.php?username='.$username.'" class="btn btn-danger btn-sm" >Message</a>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div style="margin-left: 10%" class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="profile_edit.php">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a target="_blank" href="friends.php?username='.$username.'" >
							<i class="glyphicon glyphicon-user"></i>
							View Friends </a>
						</li>
						<li>
							<a href="maps.php" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Direct to Hostel </a>
						</li>	
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		</div>
	</div>
</div>
<center>

</center>
<br>
<br>
  ';
        }
    }



}?>




<br>
<br>
