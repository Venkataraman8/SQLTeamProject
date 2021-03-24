<?php
require_once("connect.php");
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query001 = "select username from users where username='$username'";
    $res001 = mysqli_query($connect, $query001);
    $row1 = mysqli_fetch_array($res001);
    $username = $row1['username'];
}


    if (isset($_POST) & !empty($_POST)) {


        $fullname = mysqli_real_escape_string($connect, $_POST['name']);
        $dept = mysqli_real_escape_string($connect, $_POST['dept']);
        $year = mysqli_real_escape_string($connect, $_POST['year']);
        $skill = mysqli_real_escape_string($connect, $_POST['skill']);
        $hostel = $_POST['hostel'];

        /** @var TYPE_NAME $query1 */
        $query1 = "UPDATE username
                     SET namme='$fullname', skills='$skill',hostel='$hostel', department='$dept', yearr='$year'
                     WHERE username='$username'";

        $res = mysqli_query($connect, $query1);
        header("Location:index.php");

    }







?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
    body {
        background-image: url("https://d2r55xnwy6nx47.cloudfront.net/uploads/2017/09/CuriosityCode_2880x1620-2880x1620.jpg");
        background-size: contain;

    }
</style>

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
    <a class="navbar-brand" href="index.php">Quora</a>
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

                            $query005="UPDATE notification SET status='read'";
                            $res005=mysqli_query($connect,$query005);
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
<div class="alert alert-success"  style=" box-shadow: #5b9bd1; margin-left:32.5%; margin-right: 32.5%; margin-top: 80px; align-items: center;width: 35%; height: 650px;" role="alert">
    <h4 class="alert-heading"> Hey! Let's build your profile!</h4>
    <p> Enter the following details to get started!</p>

    <hr>
    <p class="mb-0"></p>

    <!--    <form method="post">-->
    <!--      <div align="center">Full Name:&nbsp;  <input type="text" name="name" required></div>-->
    <!---->
    <!--      <div align="center">Department:&nbsp <input type="text" name="dept" required></div>-->
    <!--      <div align="center">Year: &nbsp; <input type="text" name="year" required></div>-->
    <!--            <div align="center">Hostel: &nbsp &nbsp  <input type="text" name="hostel" required></div>-->
    <!--      <div align="center">skills: &nbsp <input type="text" name="skill" required></div>-->
    <!--            <br><br>-->
    <!--      <div align="center"><input id="post" type="submit" name="post" value="Continue"></div>-->
    <!--    </form>-->
    <form method="POST" style="">
        <div class="form-group">
            <label for="formGroupExampleInput">Enter your Name Boss xD : </label>
            <input type="text" class="form-control" id="formGroupExampleInput" name ="name" placeholder="Phunsuk Wangdu" required>
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput2">Enter your Department: </label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name ="dept" placeholder="Department" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Enter your Year of Study: </label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name ="year" placeholder="2nd Year?" required>
        </div>

        <div class="form-group" >
            <label for="inputHostel">Hostel </label>
            <div class="autocomplete" style="width:300px;">
                <input id="myInput" type="text" name="hostel" placeholder="Hostel">
            </div>
            <style>
                .autocomplete-items div:hover {
                    background-color: #e9e9e9;
                }

                .autocomplete-active {
                    background-color: DodgerBlue !important;
                    color: #ffffff;
                }

                .autocomplete-items div {
                    padding: 10px;
                    cursor: pointer;
                    background-color: #fff;
                    border-bottom: 1px solid #d4d4d4;
                }
                input[type=submit] {
                    background-color: DodgerBlue;
                    color: #fff;
                    cursor: pointer;
                }
            </style>
            <script>
                function autocomplete(inp, arr) {

                    var currentFocus;

                    inp.addEventListener("input", function(e) {
                        var a, b, i, val = this.value;

                        closeAllLists();
                        if (!val) { return false;}
                        currentFocus = -1;

                        a = document.createElement("DIV");
                        a.setAttribute("id", this.id + "autocomplete-list");
                        a.setAttribute("class", "autocomplete-items");

                        this.parentNode.appendChild(a);

                        for (i = 0; i < arr.length; i++) {

                            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {

                                b = document.createElement("DIV");

                                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                                b.innerHTML += arr[i].substr(val.length);
                                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                                b.addEventListener("click", function(e) {

                                    inp.value = this.getElementsByTagName("input")[0].value;

                                    closeAllLists();
                                });
                                a.appendChild(b);
                            }
                        }
                    });
                    inp.addEventListener("keydown", function(e) {
                        var x = document.getElementById(this.id + "autocomplete-list");
                        if (x) x = x.getElementsByTagName("div");
                        if (e.keyCode == 40) {

                            currentFocus++;

                            addActive(x);
                        } else if (e.keyCode == 38) { //up

                            currentFocus--;

                            addActive(x);
                        } else if (e.keyCode == 13) {
                            e.preventDefault();
                            if (currentFocus > -1) {
                                if (x) x[currentFocus].click();
                            }
                        }
                    });
                    function addActive(x) {
                        if (!x) return false;
                        removeActive(x);
                        if (currentFocus >= x.length) currentFocus = 0;
                        if (currentFocus < 0) currentFocus = (x.length - 1);
                        x[currentFocus].classList.add("autocomplete-active");
                    }
                    function removeActive(x) {
                        for (var i = 0; i < x.length; i++) {
                            x[i].classList.remove("autocomplete-active");
                        }
                    }
                    function closeAllLists(elmnt) {
                        var x = document.getElementsByClassName("autocomplete-items");
                        for (var i = 0; i < x.length; i++) {
                            if (elmnt != x[i] && elmnt != inp) {
                                x[i].parentNode.removeChild(x[i]);
                            }
                        }
                    }
                    document.addEventListener("click", function (e) {
                        closeAllLists(e.target);
                    });
                }

                var hostels= ["Agate", "Coral", "Diamond", "Jade","Beryl", "Garnet A", "Garnet B", "Garnet C", "Zircon A", "Zircon B", "Zircon C", "Aquamarine A", "Aquamarine B", "Jasper", "Sapphire", "Amber A", "Amber B", "Topaz","Ruby", "Pearl", "Emarald" ]

                /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
                autocomplete(document.getElementById("myInput"), hostels);
            </script>

        </div>

        <div class="form-group">
            <label for="formGroupExampleInput2">What are you skilled at? </label>
            <input type="text" class="form-control" id="formGroupExampleInput4" name ="skill" placeholder="Java, HTML?" required>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" id="post" name="post" value="Continue">
        <br>
    </form>
</div>