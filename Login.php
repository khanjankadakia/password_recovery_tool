    <?php $title="Login"; include "header.php"; ?>
    <link rel="stylesheet" href="assets/css/login.css">
        <div style="height: 70vh;">
            <div class="box">
                <div style="width: 55%; margin: 3rem 0 3rem 0;">
                    <form method="post" id="form" autocomplete="off" enctype="multipart/form-data">
                        <input id="logintitle" tabindex="-1" name="logintitle" readOnly="true" value="User Login">
                        <div class="temptext" id="username">Username/Email</div>
                        <input type="text" required class="field" tabindex="1" id="username" name="username" onfocus="f1(this);" onblur="f2(this);">
                        <br><br><br><br>
                        <div class="temptext" id="password">Password</div>
                        <input type="password" required class="field1" tabindex="2" id="password" name="password" onfocus="f1(this);" onblur="f2(this);">
                        <br><br><br><br>
                        <a href="forgot_password.php" id="forgotpassword" style="margin-left: 2rem; text-decoration: none; width: 8.2rem;">Forgot Password?</a>
                        <br>
                        <p id="remark" style="text-align: center; width: 100%; color: #ff0000; display: none;"><i class="fa fa-circle-exclamation"></i> Incorrect username or password.</p>
                        <input type="submit" id="login-btn" name="login-btn" class="button" value="Login" style="width: 20%; text-align: center; margin-left: 70%; margin-top: 0rem;">
                    </form>
                </div>
                <div style="width: 45%; border-left: 2px solid #000000;  margin: 3em 0 3em 0;">
                    <button class="button" id="adminlogin" onclick="common(this);adminlogin();">Admin Login</button>
                    <button class="button" style="margin-top: 2rem; background-color: #000000;" id="userlogin" onclick="common(this);userlogin();">User Login</button>
                    <br><br><br>
                    <div style="text-align: center; margin-top: 0.25rem;">Not a member?<br><a href="registration.php">Register here</a>.</div>
                </div>
            </div>
        </div>

        <script>
            sessionStorage.removeItem("key");
            $("[name='username']").eq(0).focus();
            function f1(ele)
            {
                function f3()
                {
                    document.getElementsByClassName(ele.className)[0].style.caretColor="#000000";
                }
                setTimeout(f3,100);
                document.getElementsByClassName(ele.className)[0].style.border="2px solid cornflowerblue";
                var div=document.getElementById(ele.id).style;
                div.marginLeft="2.8rem";
                div.padding="0.1rem 0.4rem 0 0.4rem";
                div.height="1rem";
                div.backgroundColor="#ffffff";
                div.color="cornflowerblue";
                div.fontSize="0.9rem";
                div.transition="all 0.1s";
                div.zIndex="1";
            }
            function f2(ele)
            {
                document.getElementsByClassName(ele.className)[0].style.caretColor="transparent";
                document.getElementsByClassName(ele.className)[0].style.border="0.5px solid #d3d3d3";
                var div=document.getElementById(ele.id).style;
                if(document.getElementsByClassName(ele.className)[0].value.length==0)
                {
                    div.marginLeft="3rem";
                    div.color="#000000";
                    div.backgroundColor="transparent";
                    div.padding="1.5rem 0 0 0";
                    div.height="3rem";
                    div.fontSize="1.25rem";
                    div.zIndex="-1";
                }
                else
                {
                    div.color="#000000";
                }
            }
            function common(ele)
            {
                document.getElementById(ele.id).style.backgroundColor="#000000";
            }
            function adminlogin()
            {
                document.getElementById("userlogin").style.backgroundColor="cornflowerblue";
                document.getElementById("logintitle").value="Admin Login";
            }
            function userlogin()
            {
                document.getElementById("adminlogin").style.backgroundColor="cornflowerblue";
                document.getElementById("logintitle").value="User Login";
            }
            <?php
                $flag=0;
                if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["logintitle"]))
                {
                    $con= mysqli_connect('localhost', 'root', '', 'login_page');
                    $query=mysqli_query($con,"select * from login");
                    $usrname=$_POST["username"];
                    $_SESSION["username"]=$usrname;
                    $password=$_POST["password"];
                    $logintitle=$_POST["logintitle"];
                    $pass=md5($password);
                    while($row=mysqli_fetch_array($query))
                    {
                        if($usrname==$row["username"] && $pass==$row["password"] && $logintitle=="Admin Login" && $row["admin/user"]=="admin")
                        {
                            $flag=1;
            ?>
                            window.location.href="headside_admin.php";
            <?php
                        }
                        else if($usrname==$row["username"] && $pass==$row["password"] && $logintitle=="User Login" && $row["admin/user"]=="user")
                        {
                            $flag=1;
            ?>
                            window.location.href="headside_user.php";
            <?php
                        }
                        else if($usrname==$row["username"] && $pass!=$row["password"])
                        {
                            $flag=2;
                        }
                    }
                    if($flag==0)
                    {
            ?>
                        document.getElementById("remark").style.display="block";
            <?php
                    }
                    else if($flag==2)
                    {
            ?>
                        document.getElementById("remark").style.display="block";
                        document.getElementById("remark").innerHTML="<i class='fa fa-circle-exclamation'></i> Invalid Password.";
            <?php
                    }
                    mysqli_close($con);
                }
            ?>
        </script>
    </body>
</html>