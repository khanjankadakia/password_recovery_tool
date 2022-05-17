    <?php
        session_start();
        if(isset($_POST["logout"]))
        {
            session_destroy();
            header('Location: login.php');
            exit;
        }
    ?>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Consolas';
        }

        .main-container .profile-title {
            display: inline-block;
            position: relative;
            padding: 1rem 0rem;
            color: #999;
            width: 40rem;
            text-align: left;
            font-size: 2rem;
            font-weight: normal;
        }

        .main-container_image .profile-card {
            background-color: #fff;
            border-radius: 1rem;
            display: flex;
            flex-direction: column;
        }

        .profile-image {
            z-index: 1;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            height: 150px;
            width: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 1px solid lightsteelblue;
            background-color: #fff;
        }

        #photo {
            height: 100%;
            width: 100%;
        }

        .modal_container {
            position: fixed;
            display: flex;
            flex-direction: column;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            overflow: auto;
            padding: 1rem 0;
            justify-content: center;
            align-items: center;
            display: none;
            z-index: 1000;
            transition: 0.5s;
        }

        .modal_container .modal_content {
            width: 30%;
            margin: 2% auto;
            background-color: #112;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px lightsteelblue;
            transition: 0.3s;
        }

        .modal_container .modal_close {
            float: right;
            cursor: pointer;
            color: #dbe5f0;
            font-size: 1.5rem;
        }

        .modal_container .modal_title {
            color: #f2f8ff;
            font-weight: normal;
        }

        .modal_container .modal_description {
            color: #708090;
            line-height: 1rem;
            font-size: 0.92rem;
        }

        .modal_container .modal_profile-image {
            display: block;
            text-align: center;
            width: 100%;
            text-align: center;
            margin: 3rem auto;
        }

        .modal_container .modal_profile-image img {
            width: 10rem;
            height: 10rem;
            padding: 0.5rem;
            border: 1px solid lightsteelblue;
            border-radius: 50%;
        }

        .modal_container .btn-group {
            display: flex;
            flex-direction: row;
        }

        .modal_container button {
            font-family: 'Consolas';
            width: 50%;
            padding: 0.7rem 0.5rem;
            color: cornflowerblue;
            background-color: transparent;
            cursor: pointer;
            border: 1px solid cornflowerblue;
            border-radius: 0.5rem;
            opacity: 0.7;
            transition: opacity 0.5s;
        }

        .modal_container button i {
            padding: 0 1rem;
            font-size: 1.2rem;
            float: left;
        }

        .modal_container button span {
            position: relative;
            display: block;
            padding-left: 2.5rem;
            white-space: normal;
            font-size: 1.1rem;
            text-align: left;
        }

        .modal_container button:hover,
        .modal_container button:active {
            opacity: 0.8;
            transform: opacity;
        }

        .main-container .profile-card .profile-content h2 {
            text-align: center;
            font-size: 2rem;
            font-weight: 500;
        }

        .main-container .title-content {
            text-align: justify;
            text-justify: inter-word;
            word-spacing: 0.3rem;
            line-height: 1.4rem;
            margin: 1rem auto;
            white-space: normal;
            font-size: 1rem;
            color: #888;
        }

        .main-container .title-content i {
            font-size: 1.15rem;
        }
    </style>

        <section>
            <div class="main-container">
                <div class="main-container_image">
                    <div class="profile-card">
                        <div class="bg-image"></div>
                        <div class="profile-image" id="profile-image">
                            <?php $usrname=$_SESSION["username"]; ?>
                            <img src="assets/img/Profile_Photos/<?php echo $usrname; ?>" alt="profile-image" id="photo">
                        </div>
                        <div class="profile-content">
                            <?php
                                if(isset($_SESSION["username"]))
                                {
                                    $con=mysqli_connect("localhost", "root", "", "login_page");
                                    $query=mysqli_query($con,"select * from login where username='$usrname'");
                                    $row=mysqli_fetch_array($query);
                            ?>

                            <h2>Welcome, 
                                
                            <?php
                                    echo $row["first_name"];
                                    echo " ";
                                    echo $row["last_name"];
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <p class="title-content">
                    <i class="fa-solid fa-quote-left"></i>
                    <span>
                        Only you can see your settings. You might also want to review your settings for Maps, Search,
                        or whichever Our services you use most. Our tool keeps your data private, safe, and
                        secure.
                    </span>
                    <i class="fa-solid fa-quote-right"></i>
                </p>
        </section>
    <script>
        window.onclick = function (event) {
            if (event.target == document.getElementsByTagName("html")[0] ||
                event.target == document.getElementsByClassName("container")[0] ||
                event.target == document.getElementById("modal-container")) {
                document.getElementById("modal-container").style.display = "none";
            }
        }
    </script>