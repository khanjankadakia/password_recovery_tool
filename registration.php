<?php
session_start();
?>
<!doctype html>
<html lang="zxx">

<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body
        {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('assets/img/login.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .box
        {
            display: flex;
            position: relative;
            margin: auto;
            margin-top: 8rem;
            height: 35rem;
            width: 70rem;
            border: 3px solid #000000;
            border-radius: 20px;
        }

        .field, .field1, .field2, .field3, .field4, .field5, .field6
        {
            outline: none;
            border: 0.5px solid #d3d3d3;
            border-radius: 4px;
            padding-left: 0.8rem;
            height: 3rem;
            font-size: 1rem;
            width: 18rem;
            transition: all 0.5s;
            transition: border 0.01s;
            position: fixed;
            caret-color: transparent;
            background-color: transparent;
            margin-left: 2rem;
            z-index: 0;
        }

        .temptext
        {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -webkit-touch-callout: none;
            -moz-user-select: none;
            -o-user-select: none;
            user-select: none;
            font-size: 1.25rem;
            height: 3rem;
            padding-top: 1.5rem;
            margin-top: -0.6rem;
            margin-left: 3rem;
            position: fixed;
        }

        #forgotpassword:hover
        {
            color: #000000;
        }

        .button
        {
            width: 100%;
            height: 3em;
            background-color: #008800;
            color: #ffffff;
            border: none;
            text-align: left;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 7rem;
        }

        .button:hover
        {
            background-color: #233d63 !important;
        }

        #logintitle
        {
            width: 100%;
            cursor: default;
            outline: none;
            border: none;
            margin-left: 2rem;
            font-size: 2.5rem;
            color: #000000;
            background-color: #ffffff;
            margin-top: 1rem;
            margin-bottom: 3rem;
        }

        .column
        {
            float: left;
            width: 50%;
        }

        .row::after
        {
            contain: "";
            display: table;
            clear: both;
        }
        input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button
        {
            -webkit-appearance: none; 
            margin: 0; 
        }
    </style>

    <?php include "header.php" 
    ?>

    <div style="height: 70 vh;">
        <div class="box">
            <div style="width: 65%; margin: 3rem 0 3rem 0;">
                <form method="post" id="form" autocomplete="off" enctype="multipart/form-data">
                    <input id="logintitle" tabindex="-1" name="logintitle" readOnly="true" value="Admin Registration">
                    <div class="row">
                        <div class="column">
                            <div class="temptext" id="firstname">Firstname</div>
                            <input type="text" required class="field5" tabindex="1" id="firstname" name="firstname" onfocus="f1(this);" onblur="f2(this);" autofocus>
                            <br><br><br><br>
                        </div>
                        <div class="column">
                            <div class="temptext" id="lastname">Lastname</div>
                            <input type="text" required class="field6" tabindex="2" id="lastname" name="lastname" onfocus="f1(this);" onblur="f2(this);">
                            <br><br><br><br>
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class="row">
                        <div class="column">
                            <div class="temptext" id="username">Username</div>
                            <input type="text" required class="field" tabindex="3" id="username" name="username" onfocus="f1(this);" onblur="f2(this);">
                            <br><br><br><br>
                        </div>
                        <div class="column">
                            <div class="temptext" id="mobile">Mobile No.</div>
                            <input type="number" required class="field2" tabindex="4" id="mobile" name="email" onfocus="f1(this);" onblur="f2(this);">
                            <br><br><br><br>
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class="temptext" id="email">E-Mail ID</div>
                    <input type="email" required class="field1" tabindex="5" id="email" style="width: 40.65rem;" name="email" onfocus="f1(this);" onblur="f2(this);">
                    <br><br><br><br>
                    <div class="row">
                        <div class="column">
                            <div class="temptext" id="password">Password</div>
                            <input type="password" required class="field3" tabindex="6" id="password" name="password" onfocus="f1(this);" onblur="f2(this);">
                            <br><br><br><br>
                        </div>
                        <div class="column">
                            <div class="temptext" id="conpassword">Confirm Password</div>
                            <input type="password" required class="field4" tabindex="7" id="conpassword" name="conpassword" onfocus="f1(this);" onblur="f2(this);">
                            <br><br><br><br>
                        </div>
                    </div>
                    <br>
                    <p id="remark" style="text-align: center; width: 100%; color: #ff0000; display: none;"><i class="fa fa-circle-exclamation"></i> Incorrect username or password.</p>
                    <input type="submit" id="login-btn" name="login-btn" class="button" value="Register" style="width: 20%; text-align: center; margin-left: 70%; margin-top: 0rem;">
                </form>
            </div>
            <div style="width: 35%; border-left: 2px solid #000000;  margin: 3rem 0 3rem 0; padding: 4rem 0 0 0">
                <button class="button" style="background-color: #000000;" id="adminlogin" onclick="common(this);adminlogin();">Admin Registration</button>
                <button class="button" style="margin-top: 2rem;" id="userlogin" onclick="common(this);userlogin();">User Registration</button>
                <br><br><br>
                <div style="text-align: center; margin-top: 0.25rem;">Already have an account?<br><a href="login.php">Sign In here</a>.</div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        document.getElementsByName("firstname")[0].focus();

        function f1(ele) {
            function f3() {
                document.getElementsByClassName(ele.className)[0].style.caretColor = "#000000";
            }
            setTimeout(f3, 100);
            document.getElementsByClassName(ele.className)[0].style.border = "2px solid #008800";
            var div = document.getElementById(ele.id).style;
            div.marginLeft = "2.8rem";
            div.padding = "0.1rem 0.4rem 0 0.4rem";
            div.height = "1rem";
            div.backgroundColor = "#ffffff";
            div.color = "#008800";
            div.fontSize = "0.9rem";
            div.transition = "all 0.1s";
            div.zIndex = "1";
        }

        function f2(ele) {
            document.getElementsByClassName(ele.className)[0].style.caretColor = "transparent";
            document.getElementsByClassName(ele.className)[0].style.border = "0.5px solid #d3d3d3";
            var div = document.getElementById(ele.id).style;
            if (document.getElementsByClassName(ele.className)[0].value.length == 0) {
                div.marginLeft = "3rem";
                div.color = "#000000";
                div.backgroundColor = "transparent";
                div.padding = "1.5rem 0 0 0";
                div.height = "3rem";
                div.fontSize = "1.25rem";
                div.zIndex = "-1";
            } else {
                div.color = "#000000";
            }
        }

        function common(ele) {
            document.getElementById(ele.id).style.backgroundColor = "#000000";
        }

        function adminlogin() {
            document.getElementById("userlogin").style.backgroundColor = "#008800";
            document.getElementById("logintitle").value = "Admin Registration";
        }

        function userlogin() {
            document.getElementById("adminlogin").style.backgroundColor = "#008800";
            document.getElementById("logintitle").value = "User Registration";
        }
        <?php
        $flag = 0;
        if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["logintitle"]))
        {
            $con = mysqli_connect('localhost', 'root', '', 'login_page');
            $query = mysqli_query($con, "select * from login");
            $usrname = $_POST["username"];
            $_SESSION["username"] = $usrname;
            $password = $_POST["password"];
            $logintitle = $_POST["logintitle"];
            $pass = md5($password);
            while ($row = mysqli_fetch_array($query)) {
                if ($usrname == $row["username"] && $pass == $row["password"] && $logintitle == "Admin Login" && $row["admin/user"] == "admin") {
                    $flag = 1;
        ?>
                    window.location.href = "adminlogin.php";
                <?php
                } else if ($usrname == $row["username"] && $pass == $row["password"] && $logintitle == "User Login" && $row["admin/user"] == "user") {
                    $flag = 1;
                ?>
                    window.location.href = "userlogin.php";
                <?php
                } else if ($usrname == $row["username"] && $pass != $row["password"]) {
                    $flag = 2;
                }
            }
            if ($flag == 0) {
                ?>
                document.getElementById("remark").style.display = "block";
            <?php
            } else if ($flag == 2) {
            ?>
                document.getElementById("remark").style.display = "block";
                document.getElementById("remark").innerHTML = "<i class='fa fa-circle-exclamation'></i> Invalid Password.";
        <?php
            }
            mysqli_close($con);
        }
        ?>
    </script>
    </body>

</html>