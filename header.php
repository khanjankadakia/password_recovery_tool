<?php
    session_start();
    if(isset($_POST["logout"]))
    {
        session_destroy();
        if(basename($_SERVER['PHP_SELF'])=="headside_user.php")
            header('Location: login.php');
        else
            header("Refresh:0");
        exit;
    }
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ?></title>
        <script src="https://kit.fontawesome.com/878433a650.js" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/b84efdfc46.js"></script>
        <script src="assets/js/jquery-3.6.0.js"></script>
        <link rel="stylesheet" href="assets/css/header.css">
    </head>

    <body>
        <nav class="navbar-horizontal">
            <div id="navbar" class="content">
                <div class="navbar-logo">
                    <a href="index.php" id="logo" class="navbar-menu">
                        <span class="title" href="index.php">
                            <i class="fa-brands fa-dashcube"></i> Password Recovery Tool
                        </span>
                    </a>
                </div>
                <div id="navbar-right" class="navbar-right-menu">
                <?php
                    if(isset($_SESSION["username"]))
                    {
                        $usrname=$_SESSION["username"];
                        $con=mysqli_connect("localhost", "root", "", "login_page");
                        $query=mysqli_query($con,"select * from login where username='$usrname'");
                        $row=mysqli_fetch_array($query);
                ?>
                    <div class="navbar-menu" onclick="show_hide()">
                        <span class="sub-title">
                            <div class="navbar-profile-image" id="navbar-profile-image">
                                <img src="assets/img/Profile_Photos/<?php echo $usrname; ?>" alt="profile-image" id="navbar-photo" name="profile_img">
                            </div>
                        </span>
                    </div>
                    <div class="menu" id="menu">
                        <h3 class="menu-title">
                            <span class="menu-title-text">
                                <?php
                                    echo $row["first_name"];
                                    echo " ";
                                    echo $row["last_name"];
                                ?>
                            </span>
                            <a class="menu-title-link">
                                <?php
                                    echo $row["email_id"];
                                ?>
                            </a>
                        </h3>
                        <ul class="menu-content">
                            <li class="menu-list">
                                <a href="headside_user.php" class="menu-link" onclick="sessionStorage.setItem('key', '#profile');">
                                    <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                                    <span class="menu-text">Profile</span>
                                </a>
                            </li>
                            <li class="menu-list">
                                <a href="#" class="menu-link">
                                    <div class="icon"><i class="fa-solid fa-question"
                                            style="padding-right: 0.7rem;"></i></div>
                                    <span class="menu-text">Help</span>
                                </a>
                            </li>
                            <li class="menu-list">
                                <form class="menu-link" method="post" autocomplete="off" enctype="multipart/form-data">
                                    <div class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                                    <button class="menu-text" name="logout">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                <?php
                    }
                    else if(!isset($_SESSION["username"]))
                    {
                ?>
                    <a href="Login.php">Login</a>
                <?php
                        // session_destroy();
                        // header('Location: login.php');
                        // exit;
                    }
                        // if($row["admin/user"]=="admin")
                        // {
                        //     session_destroy();
                        //     header('Location: login.php');
                        //     exit;
                        // }
                ?>
                </div>
            </div>
        </nav>
        <div class="scrollBottom-to-Top">
            <button class="topScrollBtn" id="topScrollBtn"><i class="fa-solid fa-up-long"></i></button>
        </div>
        <script>
            window.onscroll = function () {
                if (document.body.scrollTop > 45 || document.documentElement.scrollTop > 45) {
                    document.getElementById("navbar").style.padding = "1.5rem 1rem";
                    document.getElementById("navbar").style.backgroundColor = "#ffffff";
                    document.getElementById("navbar").style.boxShadow = "0 0 0 2px cornflowerblue";
                    document.getElementById("logo").style.fontSize = "1.7rem";
                } else {
                    document.getElementById("navbar").style.padding = "3rem 2rem";
                    document.getElementById("navbar").style.backgroundColor = "transparent";
                    document.getElementById("navbar").style.boxShadow = "none";
                    document.getElementById("logo").style.fontSize = "2rem";
                }
                var scrollButton = document.querySelector("#topScrollBtn");
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    scrollButton.style.display = "block";
                } else {
                    scrollButton.style.display = "none";
                }
            };
            $("#topScrollBtn").click(function()
            {
                $("html, body").animate({scrollTop:0}, 300);
            });
            function show_hide()
            {
                $("#menu").toggleClass("active");
            }
        </script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>