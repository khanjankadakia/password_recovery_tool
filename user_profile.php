        <?php session_start(); ob_start(); ?>
        <style>
            * {
                box-sizing: border-box;
                font-family: 'Consolas';
            }

            .main-container h1 {
                display: flex;
                position: relative;
                align-items: center;
                justify-content: center;
            }

            .header-text {
                display: block;
                position: relative;
                padding: 1rem 0rem;
                color: #999;
                width: 40rem;
                text-align: left;
                font-size: 2rem;
                font-weight: normal;
            }

            .main-container .title-content {
                margin-bottom: 6rem;
                text-align: justify;
                text-justify: inter-word;
                word-spacing: 0.3rem;
                line-height: 1.4rem;
                white-space: normal;
                font-size: 1.1rem;
                color: #888;
            }

            .main-container .title-content i {
                font-size: 1.15rem;
            }

            .column {
                float: left;
                width: 50%;
                display: block;
            }

            .row {
                display: flex;
                flex-flow: row;
                flex-direction: row;
                flex-wrap: wrap;
                width: 100%;
            }

            .main-container .profile {
                width: 98%;
            }

            .main-container .profile .profile-card {
                border: 1px solid lightsteelblue;
                background-color: #fff;
                border-radius: 1rem;
                display: flex;
                flex-direction: column;
            }

            .profile-image {
                z-index: 1;
                position: relative;
                margin-top: -4.5rem;
                margin-left: auto;
                margin-right: auto;
                height: 170px;
                width: 170px;
                border-radius: 50%;
                overflow: hidden;
                border: 1px solid lightsteelblue;
                background-color: #fff;
            }

            #photo {
                height: 100%;
                width: 100%;
            }

            .profile-icon {
                height: 40px;
                width: 100%;
                position: absolute;
                bottom: 0px;
                left: 50%;
                transform: translateX(-50%);
                text-align: center;
                background-color: rgba(0, 0, 0, 0.4);
                color: #fff;
                line-height: 30px;
                cursor: pointer;
                display: none;
                transition: 0.2s;
            }

            .profile-icon i {
                font-size: 1.5rem;
                padding: 0.5rem;
                opacity: 0.9;
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
                z-index: 100;
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

            .main-container .profile .profile-card .profile-content h2 {
                text-align: center;
                font-size: 2rem;
                margin: 0.7rem auto;
                color: #778899;
                font-weight: 500;
            }

            .panel {
                border: 1px solid lightsteelblue;
                border-radius: 1rem;
                padding: 1rem;
                margin-bottom: 1rem;
            }

            .text-info {
                font-size: 1.5rem;
                padding: 1rem;
                color: #708090;
            }

            .panel-info {
                color: #666;
                width: 10rem;
                margin-left: 1rem;
                font-size: 1.1rem;
                padding: 0.1rem 1.1rem;
                border: none;
                outline: none;
            }

            .profile-info .btn-group button {
                font-family: 'Consolas';
                width: 30%;
                padding: 1rem 0.5rem;
                color: white;
                background-color: cornflowerblue;
                cursor: pointer;
                border: none;
                border-radius: 0.5rem;
                transition: 0.5s;
            }

            .profile-info .btn-group button ion-icon {
                padding: 0 1rem;
                font-size: 1.4rem;
                float: left;
            }

            .profile-info .btn-group button span {
                position: relative;
                display: block;
                padding-left: 2.5rem;
                white-space: normal;
                font-size: 1.2rem;
                text-align: left;
            }

            .profile-info .btn-group button:hover,
            .profile-info .btn-group button:active {
                border-top-right-radius: 1.4rem;
                border-bottom-left-radius: 1.4rem;
                transform: opacity;
            }

            input[type=number]::-webkit-outer-spin-button,
            input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            input[type=number] {
            -moz-appearance: textfield;
            }
        </style>
    </head>

    <body>
        <section>
            <div class="main-container">
                <div class="profile-title">
                    <h1 class="container-text-center"><img src="Pictures/contacts_card_scene.png" alt="password-store"
                            height="120">
                        <samp class="header-text">Profile Information</samp>
                    </h1>
                </div>
                <p class="title-content">
                </p>
                <div class="profile">
                    <div class="profile-card">
                        <div class="bg-image"></div>
                        <div class="profile-image" id="profile-image">
                            <?php $usrname=$_SESSION["username"]; ?>
                            <img src="assets/img/Profile_Photos/<?php echo $usrname; ?>" alt="profile-image" id="photo" name="profile_img">
                            <label class="profile-icon" id="open-modal"><i class="fa-solid fa-camera"></i></label>
                        </div>
                        <div class="modal_container" id="modal-container">
                            <div class="modal_content">
                                <div class="modal_close" id="close-modal" title="Close">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                                <h2 class="modal_title">Profile picture</h2>
                                <p class="modal_description">
                                    <i class="fa-solid fa-quote-left"></i> <span>A picture helps people recognize you and
                                        lets you know
                                        when you’re signed in to your account</span> <i class="fa-solid fa-quote-right"></i>
                                </p>
                                <hr>
                                <div class="modal_profile-image">
                                    <img src="assets/img/Profile_Photos/<?php echo $usrname; ?>" class="modal_img" name="profile_img">
                                </div>
                                <form method="POST" id="form1" style="display: none;" enctype="multipart/form-data">
                                    <input type="file" accept="image/*" id="sel_photo" name="uploadfile" onchange="upload_check()" />
                                </form>
                                <div class="btn-group">
                                    <button class="modal_button-change" id="upload_btn" name="upload_btn" style="margin-right: 0.5rem;" onclick="show_img()">
                                        <i class="fa-solid fa-pencil"></i><span id="upload_btn_span">Change</span>
                                    </button>
                                    <button class="modal_button-remove close-modal" id="button-remove" style="margin-left: 0.5rem;" onclick="remove_img()">
                                        <i class="fa-solid fa-trash-can"></i> <span>Remove</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                        if(isset($_SESSION["username"]))
                        {
                            $con=mysqli_connect("localhost", "root", "", "login_page");
                            $query=mysqli_query($con,"select * from login where username='$usrname'");
                            $row=mysqli_fetch_array($query);
                        ?>
                        <div class="profile-content">
                            <h2><?php echo $row["username"]?></h2>
                        </div>
                    </div>

                    <div class="profile-info">
                        <hr style="margin: 1rem 0;">
                        <div class="row">
                            <div class="column">
                                <div class="panel" style="margin-right: 0.5rem">
                                    <label class="text-info">First Name : </label>
                                    <br />
                                    <input onblur="validate_input(0)" readonly required class="panel-info" value='<?php echo $row["first_name"] ?>' />
                                    <span class="err_msg" style="visibility: hidden; font-size: 15px; color: #ff0000">&#9888&nbspPlease fill out this field.</span>
                                </div>
                            </div>
                            <div class="column">
                                <div class="panel" style="margin-left: 0.5rem;">
                                    <label class="text-info">Last Name : </label>
                                    <br />
                                    <input onblur="validate_input(1)" readonly required class="panel-info" value='<?php echo $row["last_name"] ?>' />
                                    <span class="err_msg" style="visibility: hidden; font-size: 15px; color: #ff0000">&#9888&nbspPlease fill out this field.</span>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <label class="text-info">Email ID : </label>
                            <br />
                            <input onblur="validate_input(2)" readonly type="email" style="width: 20rem;" required class="panel-info" value='<?php echo $row["email_id"] ?>' />
                            <span class="err_msg" style="visibility: hidden; font-size: 15px; color: #ff0000">&#9888&nbspPlease fill out this field.</span>
                        </div>
                        <div class="panel">
                            <label class="text-info">Mobile Number : </label>
                            <br />
                            <input onblur="validate_input(3)" readonly type="number" required class="panel-info" value='<?php echo $row["mobile_number"] ?>' />
                            <span class="err_msg" style="visibility: hidden; font-size: 15px; color: #ff0000">&#9888&nbspPlease fill out this field.</span>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="btn-group">
                            <a>
                                <button type="submit" id="update" name="update" onclick="edit_profile()">
                                    <ion-icon name="create-outline"></ion-icon><span class="btn-text" id="btn-text">Edit Profile</span>
                                </button>
                                <?php
                                    if(isset($_POST["update"]) && isset($_FILES["uploadfile"]))
                                    {
                                        $file_pointer = $usrname;
                                        unlink($file_pointer);
                                        $tempname = $_FILES["uploadfile"]["tmp_name"];
                                        $folder = "assets/img/Profile_Photos/".$usrname;
                                        move_uploaded_file($tempname, $folder);
                                        header("Location: headside_user.php");
                                    }
                                ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function validate_input(id)
            {
                if(!document.getElementsByClassName("panel-info")[id].checkValidity())
                {
                    $(".err_msg").eq(id).css("visibility", "visible");
                    return false;
                }
                else
                {
                    $(".err_msg").eq(id).css("visibility", "hidden");
                    return true;
                }
            }
            var update_btn_click=0;
            function edit_profile()
            {
                update_btn_click++;
                if(update_btn_click%2!=0)
                {
                    $("#profile-image").mouseover(function()
                    {
                        $("#open-modal").show();
                    });
                    $("#profile-image").mouseout(function()
                    {
                        $("#open-modal").hide();
                    });
                    $("#update").removeAttr("form");
                    $(".panel-info").removeAttr("readOnly").css("border", "0.1rem solid #000000").css("padding", "0 1rem");
                    $(".panel-info").eq(0).focus();
                    $("[name='create-outline']").attr("name", "save-outline");
                    $("#btn-text").text("Save");
                }
                else
                {
                    for(var i=0; i<4; i++)
                    {
                        if(!validate_input(i))
                        {
                            $(".panel-info").eq(i).focus();
                            update_btn_click--;
                            return false;
                        }
                    }
                    $("[name='save-outline']").attr("name", "create-outline");
                    if($("#sel_photo")[0].files.length!=0)
                    {
                        $("#update").attr("form", "form1");
                        $("#update").attr("formaction", "user_profile.php");
                    }
                    $("#profile-image").mouseover(function()
                    {
                        $("#open-modal").hide();
                    });
                    $(".panel-info").attr("readOnly", "true").css("border", "none").css("padding", "0.1rem 1.1rem");
                    $("#btn-text").text("Edit Profile");
                    var f_name=$(".panel-info").eq(0).val();
                    var l_name=$(".panel-info").eq(1).val();
                    var email=$(".panel-info").eq(2).val();
                    var mobile=$(".panel-info").eq(3).val();
                    $.ajax(
                   {
                        url: "user_profile.php",
                        type: "POST",
                        data: {f_name, l_name, email, mobile},
                        success: function(response)
                        {
                            if(!response.includes("noneedtoupdatedata") || $("#sel_photo")[0].files.length!=0)
                            {
                                alert("Profile updated successfully!");
                                location.reload();
                            }
                        }
                    });
                    <?php
                        if(!empty($_POST["f_name"]) && !empty($_POST["l_name"]) && !empty($_POST["email"]) && !empty($_POST["mobile"]))
                        {
                            ob_clean();
                            $f_name=$_POST["f_name"];
                            $l_name=$_POST["l_name"];
                            $email=$_POST["email"];
                            $mobile=$_POST["mobile"];
                            if($f_name==$row["first_name"] && $l_name==$row["last_name"] && $email==$row["email_id"] && $mobile==$row["mobile_number"])
                                echo "noneedtoupdatedata";
                            else
                                $query1=mysqli_query($con, "update login set first_name='$f_name', last_name='$l_name', email_id='$email', mobile_number='$mobile' where username='$usrname'");
                        }
                    ?>
                }
            }

            var file;
            function upload_check()
            {
                file=event.target.files[0];
                if(event.target.files[0].type.indexOf("image")!=0)
                    alert("Please select an image file only.");
                else
                {
                    $("#upload_btn_span").text("Upload");
                    $(".fa-pencil").addClass("fa-upload").removeClass("fa-pencil");
                    $("[name='profile_img']").eq(2).attr("src", URL.createObjectURL(file));
                }
            }

            var upload_btn_click=0;
            function show_img()
            {
                upload_btn_click++;
                if(upload_btn_click%2!=0)
                    $('#sel_photo').trigger('click');
                else
                {
                    $("#upload_btn_span").text("Change");
                    $(".fa-upload").addClass("fa-pencil").removeClass("fa-upload");
                    $("[name='profile_img']").attr("src", URL.createObjectURL(file));
                    $("#modal-container").hide();
                }
            }

            function remove_img()
            {
                $("[name='profile_img']").attr("src", "assets/img/Profile_Photos/<?php echo $usrname; ?>");
                $("#sel_photo").val("");
            }

            $("#open-modal").click(function()
            {
                $("#modal-container").show();
                $("#open-modal").hide();
            });

            $("#close-modal").click(function()
            {
                $("#modal-container").hide();
            });

            $(window).click(function(event)
            {
                if(event.target == $("html").eq(0) || event.target == $(".container").eq(0) || event.target == $("#modal-container")[0])
                    $("#modal-container").hide();
            });
        </script>
    </body>

</html>