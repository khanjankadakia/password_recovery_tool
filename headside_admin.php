<?php
    session_start();
    if(isset($_POST["logout"]))
    {
        session_destroy();
        header('Location: login.php');
        exit;
    }
?>
<!doctype html>
<html lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            .header
            {
                height: 8rem;
                width: 100%;
                top: 0;
                background-position: 5% 50%;
                background-image: url("ProjectName");
                background-repeat: no-repeat;
                background-color: #000000;
                position: fixed;
                text-align: right;
            }
            .button
            {
                margin: 2.5rem 10rem 0 0;
                width: 15rem;
                height: 3em;
                background-color: #008800;
                color: #ffffff;
                border: none;
                font-size: 1rem;
                cursor: pointer;
            }
            .hover:hover
            {
                background-color: #ffdddd!important;
                color: #000000;
            }
            .icon 
            {
                color: #000000;
                width: 50px;
                text-align: center;
            }
            .sidebarcontents
            {
                margin-top: 0;
                width: 100%;
                text-align: left;
                background-color: #ffffff;
                color: #000000;
                border-bottom: 1px solid #000000;
            }
            .welcometile
            {
                background-image: url('assets/img/loggedin.jpg');
                width: 100%;
                height: 5rem;
                background-size: cover;
                font-size: 1.4rem;
                text-transform: capitalize;
                font-family: Arial, Helvetica, sans-serif;
            }
        </style>
    
    <?php include "header.php" ?>

        <form class="header" method="post" autocomplete="off" enctype="multipart/form-data">
            <button class="button hover" name="logout">Logout</button>
        </form>
        <div style="margin: 7.5rem 0 0 -0.5rem; height: 97vh; background-color: #ffffff; width: 20rem; position: fixed; z-index: 1;">
            <div class="welcometile">
                <?php
                    if(isset($_SESSION["username"]))
                    {
                        $usrname=$_SESSION["username"];
                        $con=mysqli_connect("localhost", "root", "", "login_page");
                        $query=mysqli_query($con,"select * from login where username='$usrname'");
                        $row=mysqli_fetch_array($query);
                        echo $row["first_name"];
                        echo " ";
                        echo $row["last_name"];
                    }
                    else
                    {
                        header('Location: login.php');
                        exit;
                    }
                    if($row["admin/user"]=="user")
                    {
                        session_destroy();
                        header('Location: login.php');
                        exit;
                    }
                ?>
                <div style="padding: 2.3rem 0 0 0; font-size: 1rem; text-transform: uppercase;">
                    <?php
                        echo $row["admin/user"];
                    ?>
                </div>
            </div>
            <button class="button hover sidebarcontents" onclick="window.location.href='headside_admin.php'"><i class="fa fa-user icon"></i>Home</button>
        </div>
    </body>
</html>