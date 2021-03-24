<?php
require_once("connect.php");

session_start();
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
     $query="select fullname from users where username='$username'";
    $result=mysqli_query($connect , $query);
    $row = mysqli_fetch_array($result);
    $name = $row['fullname'];
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

<style>

.jumbotron h1{
}

img {
    width: 250px;
    height: 250px;
    padding: 10px;
}

.NewsGrid{
    border-radius: 10px;
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(178,178,232,1) 35%, rgba(0,212,255,1) 100%);
    margin: 10px;
    border: 1px solid black;
    padding: 10px;

}

</style>

<div class="container fluid">
 
    <?php

    $url = 'https://newsapi.org/v2/everything?q=general&apiKey=3a8b16b50d9340c7aa6cc83cb9e28236';
    $response = file_get_contents($url);
    $NewsData = json_decode($response);
?>
<div class=jumbotron">
        <h1>News for the Day! </h1>
</div>
<div class="container-fluid">
<?php
     foreach($NewsData->articles as $News){

        ?>
     
     <div class="row NewsGrid" >
        <div class="col-md-3">
            <img src="<?php echo $News->urlToImage ?>" alt="News thumbnail" class="rounded">
            </div>
        <div class="col-md-9">
            <h2><?php echo $News->title ?></h2>
            <h5><?php echo $News->description ?></h5>
            <p><?php echo $News->content ?> </p>
            <h6> Author: <?php echo $News->author ?> </h6>
            <a type="button" class="btn btn-primary" style="padding: 10px;" href=" <?php echo $News->url ?>">Click for More</a>
            </div>
      </div>
        <?php 
        }
        ?>
     </div>
</div>





</body>

