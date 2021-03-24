<?php
require_once("connect.php");
session_start();
if(isset($_SESSION['username']))
    $username=$_SESSION['username'];
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
<body>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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

                    $query051 = "select * from notification where receiver='$username' and status='unread' ORDER by dat DESC";
                    $res051 = mysqli_query($connect, $query051);

                    if($res051)
                    {$count8 = mysqli_num_rows($res051);

                        if($count8){};?>
                        <span class="badge badge-light"><?php echo $count8 ?></span>
                    <?php }?>



                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">




                    <?php
                    $query05 = "select * from notification where receiver='$username' and status='unread' ORDER by dat DESC"  ;
                    $res05 = mysqli_query($connect, $query05);
                    if($res05) {
                        while ($rowa = mysqli_fetch_array($res05)) {
                            if ($rowa['status'] == 'unread') {

                                echo '<a  style=" font-weight:bold; border-bottom: 1px;" class="dropdown-item" href="answer.php?q_id=' . $rowa['qid'] . '">';
                                echo"<small>";
                                echo $rowa['dat'];
                                echo "</small><br>";
                                echo $rowa['sender'];
                                echo" ";
                                echo $rowa['ty'];
                                echo "<br></a>";

                                $query005="UPDATE notification SET status='read'";
                                $res005=mysqli_query($connect,$query005);

                            }

                        }

                    }

                    ?></i><br>
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
                <a class="nav-link" href="news.php">News</a>
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

$query="select * from questable";




if($result=mysqli_query($connect, $query))


{
    echo '<div align="center" style="font-size: 18px;">Questions asked in Newsfeed</div>';
    if(!$result)
        echo mysqli_error($connect);

    while($row=mysqli_fetch_array($result))
    {

        echo '   <div align="center">
                <div class="card text-center" style="width: 500px; border-style: solid; background: rgb(242,241,250);
                background: linear-gradient(90deg, rgba(242,241,250,1) 0%, rgba(206,255,199,1) 53%, rgba(162,244,149,1) 100%);">
                <div class="card-header">
                Featured:  '.$row['keyword'].'
                </div>
                <div class="card-body">
                 <h5 class="card-title"><a style="color: black" href="answer.php?q_id='.$row['q_id'].'">'.$row['question'].'</a></h5>
                  <small><b>Question posted by: </b>'.$row['username'].' </small><br>
    <a type="button" class="btn btn-outline-success" href="answer.php?q_id='.$row['q_id'].'">Answer</a>
  </div>
</div>
</div>
<br> <br> <br>';



    }

}

?>

</body>
