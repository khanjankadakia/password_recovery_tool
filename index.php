    <?php $title="Home"; include "header.php"; ?>
        <style>
            body::-webkit-scrollbar
            {
                display: none;
            }
            body
            {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
            .section
            {
                overflow: hidden;
                height: 100vh;
            }
            .section img
            {
                height: 19rem;
            }
            .modules
            {
                position: relative;
                height: 100%;
                width: 43rem;
                margin-right: 10%;
                float: right;
                overflow: scroll;
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
            .modules::-webkit-scrollbar
            {
                display: none;
            }
            .module1, .module2, .module3
            {
                float: right;
                margin-right: 5%;
                transition: all 0.5s;
            }
            .module2, .module3
            {
                margin-top: 4%;
            }
            .module1
            {
                margin-top: 5%;
            }
            .module3
            {
                margin-bottom: 5%;
            }
            .module1:hover, .module2:hover, .module3:hover
            {
                transition: all 0.5s;
                transform: scale(1.1);
            }
            #img2, #img3, #cmnimg
            {
                position: absolute;
                transition: all 0.5s;
                transform-origin: bottom left;
                outline: 0px solid #1f1f1f;
            }
            #cmnimg
            {
                position: relative;
            }
            #cmnimg:hover
            {
                transition: all 0.5s;
                outline: 5px solid #6495ed;
            }
            .module3:hover #img2
            {
                transform: rotate(-1deg);
                transition: 0.5s;
            }
            .module3:hover #img3
            {
                transform: rotate(-2deg);
                transition: 0.5s;
            }
            .module3:hover #cmnimg
            {
                transform: rotate(-3deg);
                transition: 0.5s;
            }
            #module1
            {
                scroll-margin-top: 100px;
            }
        </style>

        <div class="section">
            <div class="modules">
                <div class="module1">
                <?php
                    if(!isset($_SESSION["username"]))
                    {
                ?>
                        <a href="Login.php"><img id="cmnimg" src="assets/img/password-manager.png" height="300rem" width="600rem" onmouseover="scrolltotop()"></a>
                <?php
                    }
                    else
                    {
                ?>
                        <a href="headside_user.php"><img id="cmnimg" src="assets/img/password-manager.png" height="300rem" width="600rem" onmouseover="scrolltotop()"></a>
                <?php
                    }
                ?>
                </div>
                <div class="module2">
                    <a href="Password Cracking.zip" download><img id="cmnimg" src="assets/img/password-cracking.png" height="300rem" width="600rem"></a>
                </div>
                <div class="module3">
                    <img style="position: absolute;" src="assets/img/password-strength.png" height="300rem" width="600rem">
                    <img id="img2" src="assets/img/password-strength.png" height="300rem" width="600rem">
                    <img id="img3" src="assets/img/password-strength.png" height="300rem" width="600rem">
                    <a href="password_strength_detector.php"><img id="cmnimg" src="assets/img/password-strength.png" height="300rem" width="600rem" onmouseover="scrolltobottom()">
                </div>
            </div>
        </div>
        <script>
        sessionStorage.removeItem("key");
        sessionStorage.clear();
        $(".modules").first().scrollTop(130);
        function scrolltotop()
        {
            $(".modules").first().animate({scrollTop: "0"},300);
        }
        function scrolltobottom()
        {
            $(".modules").first().animate({scrollTop: $(".modules").first().innerHeight()},600);
        }
        </script>
    </body>
</html>