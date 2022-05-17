        <?php $title="User"; include "header.php";
            if(!isset($_SESSION["username"]))
            {
                session_destroy();
                header('Location: login.php');
                exit;
            }
            // if($row1["admin/user"]=="admin")
            // {
            //     session_destroy();
            //     header('Location: login.php');
            //     exit;
            // }
        ?>
        <style>
        * ::-webkit-scrollbar {
            display: none;
        }
        * {
            scrollbar-width: none;
            box-sizing: border-box;
            font-family: 'Consolas';
        }
        </style>
            <nav class="navbar-vertical">
                <div class="content-vertical">
                    <ul class="vertical-list-menu">
                        <li class="vertical-menu">
                            <a id="home" class="navigation-menu" onclick="home();setactive(this);">
                                <div class="icon"><i class="fa-solid fa-house-user"></i></div>
                                <span class="text">Home</span>
                            </a>
                        </li>
                        <li class="vertical-menu">
                            <a id="profile" class="navigation-menu" onclick="profile();setactive(this);">
                                <div class="icon"><i class="fa-solid fa-id-card-clip"></i></div>
                                <span class="text">Profile info</span>
                            </a>
                        </li>
                        <li class="vertical-menu">
                            <a id="security" class="navigation-menu" onclick="security();setactive(this);">
                                <div class="icon"><i class="fa-solid fa-shield"></i></div>
                                <span class="text">Security</span>
                            </a>
                        </li>
                        <li class="vertical-menu">
                            <a id="pass_store" class="navigation-menu" onclick="pass_store();setactive(this);">
                                <div class="icon"><i class="fa-solid fa-clone"></i></div>
                                <span class="text">Password Manager</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <script>
                var id_r=null;
                window.onload=function()
                {
                    id_r=sessionStorage.getItem("key");
                    if(id_r!=null)
                        $(id_r).trigger('click');
                    else
                        $("#home").trigger("click");
                }
                function home()
                {
                    $.ajax(
                    {
                        type: "POST",
                        url: "user_home.php",
                        dataType: "html",
                        success: function(data)
                        {
                            $(".main-container").empty();
                            $(".main-container").append(data);
                        }
                    });
                }

                function profile()
                {
                    $.ajax(
                    {
                        type: "POST",
                        url: "user_profile.php",
                        dataType: "html",
                        success: function(data)
                        {
                            $(".main-container").empty();
                            $(".main-container").append(data);
                        }
                    });
                }

                function security()
                {
                    $.ajax(
                    {
                        type: "POST",
                        url: "user_security.php",
                        dataType: "html",
                        success: function(data)
                        {
                            $(".main-container").empty();
                            $(".main-container").append(data);
                        }
                    });
                }

                function pass_store()
                {
                    $.ajax(
                    {
                        type: "POST",
                        url: "user_pass.php",
                        dataType: "html",
                        success: function(data)
                        {
                            $(".main-container").empty();
                            $(".main-container").append(data);
                        }
                    });
                }

                function setactive(ele)
                {
                    var id1 = "#"+ele.id;
                    sessionStorage.setItem("key", id1);
                    var id = $(id1).closest(".vertical-menu").index();
                    $(".vertical-menu").removeClass("active-vertical-navbar");
                    $(".vertical-menu").eq(id).addClass("active-vertical-navbar");
                }
            </script>
        </div>
            <section>
                <div class="main-container">
                    
                </div>
            </section>
        </div>
        <div class="scrollBottom-to-Top">
            <button class="topScrollBtn" id="topScrollBtn"><i class="fa-brands fa-uncharted"></i></button>
        </div>
    </body>
</html>