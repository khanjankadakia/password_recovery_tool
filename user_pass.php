    <?php session_start(); ob_start(); ?>
    <style>
    .container-header {
        position: relative;
    }

    .container-text-center {
        display: flex;
        position: relative;
        align-items: center;
        justify-content: center;
    }

    .container-text-center .header-text {
        display: block;
        position: relative;
        padding: 1rem 0rem;
        color: #999;
        width: 40rem;
        text-align: left;
        font-size: 2rem;
        font-weight: normal;
    }

    .table-content table {
        width: 100%;
        border-collapse: separate;
    }

    .table-content table th {
        border: 1px solid cornflowerblue;
        text-align: left;
        color: cornflowerblue;
        padding: 0.5rem;
        font-size: 1.5rem;
        border-radius: 4px;
        font-weight: 500;
    }

    .table-content table tr td {
        border: 1px solid lightsteelblue;
        text-align: left;
        padding: 0.5rem;
        border-radius: 4px;
        font-size: 1.125rem;
    }

    .table-content table .password-visible {
        text-align: center;
        cursor: pointer;
    }

    .table-content table .password-visible ion-icon {
        font-size: 1.4rem;
    }

    .table-content .table-body .icon-bar {
        text-align: center;
        background-color: #fff;
    }

    .row-content {
        position: relative;
        display: flex;
        flex-flow: row;
        margin: 1rem 0;
        padding: 1rem 1rem 1rem 0;
        /* border-left: 1px solid lightsteelblue; */
        border-right: 1px solid lightsteelblue;
    }

    .row-content .column-content {
        float: left;
        display: block;
        width: 50%;
    }

    .add-password {
        float: left;
        position: relative;
    }

    .search .search-form {
        float: right;
        position: relative;
        padding: 0 1rem;
        border-left: 1px solid cornflowerblue;
    }

    .search .search-form input[type=text] {
        position: relative;
        width: 60%;
        box-sizing: border-box;
        border: 1.5px solid lightsteelblue;
        border-radius: 0.4rem;
        font-size: 1rem;
        background-color: transparent;
        padding: 12px 20px 12px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
        box-shadow: 0 0 1rem lightsteelblue;
    }

    .search .search-form input[type=text]:focus {
        width: 100%;
        border: 1.5px solid cornflowerblue;
        outline: cornflowerblue;
    }

    .search .search-form ion-icon,
    .search .search-form i {
        position: absolute;
        left: 1.7rem;
        top: 0.7rem;
        color: steelblue;
        text-decoration: none;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        cursor: pointer;
    }

    .search .search-form ion-icon:hover,
    .search .search-form i:hover {
        color: cornflowerblue;
    }

    .add-password .btn {
        background-color: cornflowerblue;
        border: none;
        color: white;
        width: 2.8rem;
        padding: 10px;
        font-size: 1rem;
        border-radius: 0.3rem;
        cursor: pointer;
        box-shadow: 0 0 1rem lightsteelblue;
        transition: 0.5s;
    }

    .add-password .btn:hover {
        background-color: dodgerblue;
        width: 12rem;
    }

    .add-password .btn:hover .password-text {
        visibility: visible;
        white-space: nowrap;
    }

    .add-password .add-icon {
        position: relative;
        display: block;
        text-align: center;
    }

    .add-password .add-icon i {
        font-size: 1.5em;
        float: left;
    }

    .add-password .password-text {
        position: absolute;
        display: block;
        padding-left: 2.5rem;
        white-space: normal;
        font-size: 1.2rem;
        text-align: left;
        overflow: hidden;
        visibility: hidden;
    }

    .add-modal_container,
    .edit-modal_container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        overflow: auto;
        padding: 1rem 0;
        justify-content: center;
        align-items: center;
        z-index: 100;
        opacity: 0;
        visibility: hidden;
        transform: scale(1.1);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
    }

    .add-modal_container .modal_content,
    .edit-modal_container .modal_content {
        width: 31.5%;
        margin: 3% auto;
        background-color: #112;
        padding: 1rem 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 0 10px lightsteelblue;
        transition: 0.3s ease-out;
    }

    .add-modal_container .modal_close,
    .edit-modal_container .modal_close {
        float: right;
        cursor: pointer;
        color: #dbe5f0;
        font-size: 1.5rem;
    }

    .add-modal_container .modal_title,
    .edit-modal_container .modal_title {
        color: #f2f8ff;
        font-weight: normal;
    }

    .add-modal_container .modal_description,
    .edit-modal_container .modal_description {
        color: #708090;
        line-height: 1rem;
        font-size: 0.92rem;
    }

    .add-modal_container .modal-body-form,
    .edit-modal_container .modal-body-form {
        display: block;
        position: relative;
        text-align: center;
        width: 100%;
        text-align: center;
        margin: 2rem auto;
    }

    .add-modal_container .modal-body-form .form-group,
    .edit-modal_container .modal-body-form .form-group {
        width: 100%;
        position: relative;
        display: block;
    }

    .add-modal_container .modal-body-form .form-group input[type=text],
    .add-modal_container .modal-body-form .form-group input[type=password],
    .edit-modal_container .modal-body-form .form-group input[type=text],
    .edit-modal_container .modal-body-form .form-group input[type=password] {
        background-color: transparent;
        width: 100%;
        height: 0.5rem;
        padding: 1.35rem 0.5rem;
        display: block;
        border-radius: 4px;
        border: 1px solid cornflowerblue;
        outline: none;
        font-size: 1.1rem;
        color: #f9f9f9;
    }

    .add-modal_container .modal-body-form .form-group ::placeholder,
    .edit-modal_container .modal-body-form .form-group ::placeholder {
        color: lightslategrey;
    }

    .add-modal_container .modal-body-form .form-group .form-label,
    .edit-modal_container .modal-body-form .form-group .form-label {
        color: #B0C4DE;
        margin: 1rem 0;
        font-size: 1.2rem;
        display: flex;
        font-weight: normal;
    }

    .add-modal_container .btn-group,
    .edit-modal_container .btn-group {
        display: flex;
        flex-direction: row;
    }

    .add-modal_container button,
    .edit-modal_container button {
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

    .add-modal_container button i,
    .edit-modal_container button i {
        padding: 0 1rem;
        font-size: 1.2rem;
        float: left;
    }

    .add-modal_container button span,
    .edit-modal_container button span {
        position: relative;
        display: block;
        padding-left: 2.5rem;
        white-space: normal;
        font-size: 1.1rem;
        text-align: left;
    }

    .add-modal_container button:hover,
    .add-modal_container button:active,
    .edit-modal_container button:hover,
    .edit-modal_container button:active {
        opacity: 0.9;
        transform: opacity;
    }

    .table-content .table-body .icon-bar .navbar-icon {
        width: 0.4rem;
        height: 1.5rem;
        border-radius: 10px;
        cursor: pointer;
        margin: 0 auto;
        transition: 0.5s;
        background-color: #f9f9f9;
    }

    .table-content .table-body .icon-bar .active-navbar-icon {
        width: 3.8rem;
        height: 10.5rem;
        padding: 0.5rem;
        transition-delay: 0.3s;
        background-color: #f9f9f9;
    }

    .table-content .table-body .icon-bar .navbar-icon span {
        position: absolute;
        width: 0.4rem;
        height: 0.4rem;
        background-color: #112;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 30%;
        transform: translate(calc(9px * var(--x)), calc(9px * var(--y)));
        transition: transform 0.5s, width 0.5s, height 0.5s, background-color 0.5s;
        transition-delay: calc(.1s * var(--i));
    }

    .table-content .table-body .icon-bar .active-navbar-icon span {
        width: 2.8rem;
        height: 2.8rem;
        background-color: #fff;
        transform: translate(calc(54px * var(--x)), calc(54px * var(--y)));
    }

    .table-content .table-body .icon-bar .navbar-icon span ion-icon {
        font-size: 0;
    }

    .table-content .table-body .icon-bar .active-navbar-icon span ion-icon {
        font-size: 1.4em;
        align-items: center;
        justify-content: center;
        color: cornflowerblue;
        transition: 0.2s;
    }

    .table-content .table-body .icon-bar .active-navbar-icon span ion-icon:hover {
        color: cornflowerblue;
        filter: drop-shadow(0 0 5px cornflowerblue) drop-shadow(0 0 13px cornflowerblue) drop-shadow(0 0 21px cornflowerblue);
    }

    .login-modal-container {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: auto;
        padding: 1rem 0;
        z-index: 100;
        opacity: 0;
        visibility: hidden;
        transform: scale(1.1);
        transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
    }

    .login-modal-container .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 32.5%;
        background-color: #112;
        padding: 1rem 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 5px 25px lightsteelblue;
    }

    .login-modal-container .modal-header {
        line-height: 1.2rem;
        padding: 0.2rem 0;
    }

    .login-modal-container .modal-header .modal_close {
        float: right;
        cursor: pointer;
        color: #dbe5f0;
    }

    .login-modal-container .modal-header .modal_close i {
        font-size: 1.5rem;
    }

    .login-modal-container .modal-header .modal_title {
        color: #f2f8ff;
        font-weight: normal;
    }

    .login-modal-container .modal_description {
        color: #708090;
        line-height: 1rem;
        font-size: 0.92rem;
    }

    .login-modal-container .modal-body-form {
        display: block;
        position: relative;
        text-align: center;
        width: 100%;
        text-align: center;
        margin: 1rem auto;
    }

    .login-modal-container .modal-body-form .form-group-title {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        text-align: center;
        width: 100%;
        padding: 1rem 0;
    }

    .login-modal-container .modal-body-form .group-title {
        color: #B0C4DE;
        font-weight: 500;
        padding: 0 1rem;
        border-left: 1px solid cornflowerblue;
        margin-left: 1rem;
    }

    .login-modal-container .modal-body-form .group-title-logo {
        display: flex;
        position: relative;
        height: 4rem;
        width: auto;
        border-right: 1px solid cornflowerblue;
    }

    .login-modal-container .modal-body-form .form-group {
        width: 100%;
        position: relative;
        display: block;
    }

    .login-modal-container .modal-body-form .form-group input[type=email],
    .login-modal-container .modal-body-form .form-group input[type=password] {
        background-color: transparent;
        width: 92%;
        height: 0.5rem;
        padding: 1rem 0.5rem;
        display: block;
        border-radius: 4px;
        border: 1px solid cornflowerblue;
        outline: none;
        font-size: 0.95rem;
        color: #f9f9f9;
    }

    .login-modal-container .modal-body-form .form-group ::placeholder {
        color: lightslategrey;
    }

    .login-modal-container .modal-body-form .form-group .form-label {
        color: #B0C4DE;
        margin: 1rem 0;
        font-size: 1.2rem;
        display: flex;
        font-weight: normal;
    }

    .login-modal-container .error-message {
        display: flex;
        flex-direction: row;
    }

    .login-modal-container .error-message button {
        font-family: 'Consolas';
        width: 100%;
        
        padding: 0.7rem 0.5rem;
        color: cornflowerblue;
        background-color: transparent;
        cursor: pointer;
        border: 1px solid cornflowerblue;
        border-radius: 0.5rem;
        opacity: 0.7;
        transition: opacity 0.5s;
    }

    .login-modal-container .error-message button i {
        padding: 0 1rem;
        font-size: 1.2rem;
        float: left;
    }

    .login-modal-container .error-message button span {
        position: relative;
        display: block;
        padding-left: 2.5rem;
        white-space: normal;
        font-size: 1.1rem;
        text-align: left;
    }

    .login-modal-container .error-message button:hover,
    .login-modal-container .error-message button:active {
        opacity: 0.8;
        transform: opacity;
    }

    .login-modal-container .modal-body-form .form-group-link {
        width: 100%;
        padding: 0.2rem 0;
        display: flex;
    }

    .login-modal-container .modal-body-form .forgot-password-link {
        color: #B0C4DE;
    }

    .login-modal-container .modal-body-form .forgot-password-link a {
        color: cornflowerblue;
        text-decoration: none;
    }

    .login-modal-container .modal-body-form .forgot-password-link a:hover {
        color: red;
        text-decoration: underline;
    }

    .show-pin-modal {
        opacity: 1;
        visibility: visible;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
    }
    .show-modal-container{
        opacity: 1;
        visibility: visible;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
    }
    </style>
        <div class="container">
            <section>
                <div class="main-container">
                    <div class="main-container_section">
                        <div class="content-password_store">
                            <div class="container-header">
                                <h1 class="container-text-center"><img src="Pictures/password_checkup.svg"
                                        alt="password-store">
                                    <samp class="header-text">Password Manager</samp>
                                </h1>
                            </div>
                            <div class="row-content">
                                <div class="column-content">
                                    <div class="add-password" onclick="open_add_pass_modal()">
                                        <button type="button" class="btn">
                                            <div class="add-icon">
                                                <i class="fa-solid fa-circle-plus"></i>
                                            </div>
                                            <span class="password-text">Add Password</span>
                                        </button>
                                    </div>
                                    <div class="add-modal_container" id="modal-container">
                                        <div class="create-password">
                                            <div class="modal_content">
                                                <div class="modal_close" id="close-modal" title="Close" onclick="close_modal()">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <h2 class="modal_title">Create Password</h2>
                                                <hr>
                                                <div class="modal-body-form">
                                                <div class="form-group">
                                                        <label for="add_site" class="form-label">Site :</label>
                                                        <input type="text" class="form-control-text" id="add_site"
                                                            name="add_site" placeholder="Eg. Google">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="add_user" class="form-label">Username :</label>
                                                        <input type="text" class="form-control-text" id="add_user"
                                                            name="add_user" placeholder="Enter username">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="add_pass" class="form-label">Password :</label>
                                                        <input type="password" class="form-control-text" id="add_pass"
                                                            name="add_pass" placeholder="Enter password">
                                                    </div>
                                                </div>
                                                <p class="modal_description">
                                                    <span> Do you want to save the particular credentials?</span>
                                                </p>
                                                <div class="btn-group">
                                                    <button class="modal_button-change" id="close-modal"
                                                        style="margin-right: 0.5rem;" onclick="close_modal()">
                                                        <i class="fa-brands fa-xing"></i> <span>Cancel</span>
                                                    </button>
                                                    <button class="modal_button-remove close-modal" id="button-remove"
                                                        style="margin-left: 0.5rem;" onclick="add_pass()">
                                                        <i class="fa-solid fa-clone"></i> <span>Save </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-content">
                                    <div class="search">
                                        <div class="search-form">
                                            <input type="text" name="search" placeholder="Search..." onkeyup="search_pass()" id="search">
                                            <ion-icon name="at-outline"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-content">
                                <table class="table" id="datatable">
                                    <thead class="table-header">
                                        <tr>
                                            <th>Site</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        <div class="row">
                                            <?php
                                                $con=mysqli_connect("localhost", "root", "", "login_page");
                                                if(isset($_SESSION["username"]))
                                                {
                                                    $usrname=$_SESSION["username"];
                                                    $query1=mysqli_query($con,"select * from login where username='$usrname'");
                                                    $row1=mysqli_fetch_array($query1);
                                                    $srno=$row1["Serial_Number"];
                                                    $query_f="select * from passwords where Serial_Number='$srno'";
                                                    $result=mysqli_query($con,$query_f);
                                                    $i=-1;
                                                }
                                                else
                                                {
                                                    header('Location: login.php');
                                                    exit;
                                                }
                                                if($row1["admin/user"]=="admin")
                                                {
                                                    session_destroy();
                                                    header('Location: login.php');
                                                    exit;
                                                }
                                                while($row2=mysqli_fetch_array($result))
                                                {
                                                    $i++;
                                                ?>
                                                <tr class="column">
                                                    <td><?php echo $row2["Site"] ?></td>
                                                    <td><?php echo $row2["Username"] ?></td>
                                                    <td>
                                                        <input type="password" name="password" class="passwordinput"
                                                            value="**********" readonly
                                                            style="background-color: transparent; border: none; outline: none; font-size: 1.125rem; padding: 0;">
                                                    </td>
                                                    <td class="password-visible">
                                                        <ion-icon name="eye-outline" class="togglepassword" onclick="togglepassword(<?php echo $i ?>)"></ion-icon>
                                                    </td>
                                                    <td class="icon-bar">
                                                        <div class="navbar-icon" id="navbar" onclick="active_navbar_icon(<?php echo $i ?>)">
                                                            <!-- 1 -->
                                                            <span style="--i:0;--x:0;--y:0;">
                                                                <ion-icon name="copy-outline"></ion-icon>
                                                            </span>
                                                            <!-- 2 -->
                                                            <span style="--i:1;--x:0;--y:1;">
                                                                <ion-icon name="create-outline" onclick="open_edit_modal(this)"></ion-icon>
                                                            </span>
                                                            <!-- 3 -->
                                                            <span style="--i:3;--x:0;--y:2;">
                                                                <ion-icon name="trash-bin-outline" id="toggleDeleteBtn" class="toggleDeleteBtn" 
                                                                onclick="delete_pass(<?php echo $i ?>)">
                                                                </ion-icon>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                if($i==(-1) && $row2===null)
                                                {
                                            ?>
                                                    <tr class="column">
                                                        <td colspan="3">No records found!</td>
                                                    </tr>;
                                            <?php
                                                }
                                                mysqli_close($con);
                                            ?>
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                            <div class="edit-modal_container" id="edit-modal-container">
                                <div class="edit-password">
                                    <div class="modal_content">
                                        <div class="modal_close" id="close-edit-modal" title="Close" onclick="close_modal()">
                                            <i class="fa-solid fa-xmark"></i>
                                        </div>
                                        <h2 class="modal_title">Edit Password</h2>
                                        <p class="modal_description">
                                            <i class="fa-solid fa-quote-left"></i> <span> Do you want to update your
                                                password on this
                                                account?</span> <i class="fa-solid fa-quote-right"></i>
                                        </p>
                                        <hr>
                                        <div class="modal-body-form">
                                            <div class="form-group">
                                                <label for="username" class="form-label">UserName :</label>
                                                <input type="text" class="form-control-text" id="username" name="username"
                                                    placeholder="srutesh_dholakiya_">
                                            </div>

                                            <div class="form-group">
                                                <label for="password" class="form-label">Password :</label>
                                                <input type="password" class="form-control-text" id="pass_update"
                                                    name="pass_update" placeholder="*********">
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <button class="modal_button-change" id="button-change"
                                                style="margin-right: 0.5rem;" onclick="close_modal()">
                                                <i class="fa-brands fa-xing"></i> <span>Close</span>
                                            </button>

                                            <button class="modal_button-remove close-modal" id="button-remove"
                                                style="margin-left: 0.5rem;">
                                                <i class="fa-solid fa-clone"></i> <span>Update </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="login-modal-container" id="login-modal-container">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <span class="modal_close" id="close-login-modal" title="Close" onclick="close_modal()">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                        <h2 class="modal_title">Password Security</h2>
                                    </div>
                                    <p class="modal_description">
                                        <i class="fa-solid fa-quote-left"></i>
                                        <span> Tool is trying to show passwords. Type your account Password to allow
                                            this...</span>
                                        <i class="fa-solid fa-quote-right"></i>
                                    </p>
                                    <div class="modal-body-form">
                                        <div class="form-group-title">
                                            <img class="group-title-logo" src="Pictures/signin_scene.png" alt="Logo">
                                            <h2 class="group-title"> PIN </h2>
                                        </div>

                                        <div class="form-group" style="display: flex; width: 100%;">
                                            <input type="password" class="form-control-text" name="pin"
                                                onkeydown="next(this,5,event)" placeholder="*" style="margin-right: 0.5rem;" maxlength="1">
                                            <input type="password" class="form-control-text" name="pin"
                                                onkeydown="next(this,6,event)" placeholder="*" style="margin: 0 0.5rem;" maxlength="1">
                                            <input type="password" class="form-control-text" name="pin"
                                                onkeydown="next(this,7,event)" placeholder="*" style="margin: 0 0.5rem;" maxlength="1">
                                            <input type="password" class="form-control-text" name="pin"
                                                onkeydown="next(this,8,event)" placeholder="*" style="margin-left: 0.5rem;" maxlength="1">
                                        </div>
                                        <div class="form-group-link">
                                            <p class="forgot-password-link"><a href="" style="float: left;">Forgot PIN!</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script>
            var id_pi=-1, id_g=-1, tries=0, lock=null;
            lock=sessionStorage.getItem("lock");
            function togglepassword(id)
            {
                if(id_pi!=-1)
                {
                    if($(".togglepassword")[id].name=="eye-off-outline")
                    {
                        $(".togglepassword")[id].name="eye-outline";
                        $(".passwordinput")[id].type="Password";
                    }
                    else
                    {
                        $(".passwordinput")[id].type="Text";
                        $(".togglepassword")[id].name="eye-off-outline";
                    }
                }
                else
                {
                    if(lock==null)
                    {
                        $("#login-modal-container").toggleClass("show-pin-modal");
                        $("[name='pin']")[0].focus();
                    }
                    else if(lock=="true")
                        alert("Too many invalid PIN attempted!!\nPlease reset your PIN!");
                }
                id_g=id;
            }
            function next(ele,id,e)
            {
                // $.ajax(
                // {
                //     url: "user_pass.php",
                //     type: "POST",
                //     data:{lock}
                // });
                //  $_SESSION["lock"]=$_POST["lock"]; ?>
                if(lock=="true")
                    alert("Too many invalid PIN tried!!\nPlease reset your pin!");
                var element = document.getElementsByClassName(ele.classList[0]);
                if(window.event)
                {
                    if(e.key=="Backspace")
                    {
                        if(element[id].value=="")
                            element[id-1].focus();
                        if(id==5)
                            element[id].focus();
                    }
                    else if(e.key==0||e.key==1||e.key==2||e.key==3||e.key==4||e.key==5||e.key==6||e.key==7||e.key==8||e.key==9)
                    {
                        if(id==8)
                        {
                            element[id].focus();
                            var search_str= $("#search").val();
                            setTimeout(function()
                            {
                                var pin1 = $("[name='pin']")[0].value;
                                var pin2 = $("[name='pin']")[1].value;
                                var pin3 = $("[name='pin']")[2].value;
                                var pin4 = $("[name='pin']")[3].value;
                                var pin_f = pin1 + pin2 + pin3 + pin4;
                                $.ajax(
                                {
                                    url: "user_pass.php",
                                    data: {pin_f},
                                    type: "POST",
                                    success: function(msg)
                                    {
                                        if(msg.includes("piniscorrect"))
                                        {
                                            id_pi=id_g;
                                            var id_s=id_pi+1;
                                            $("#login-modal-container").toggleClass("show-pin-modal");
                                            togglepassword(id_pi);
                                            search_pass();
                                            console.log(msg);
                                        }
                                        else if(msg.includes("pinisincorrect"))
                                        {
                                            alert("Invalid PIN!");
                                            tries++;
                                            if(tries>=3)
                                            {
                                                sessionStorage.setItem("lock", "true");
                                                $("#login-modal-container").removeClass("show-pin-modal");
                                                alert("Too many invalid PIN attempted!!\nPlease reset your PIN!");
                                                location.reload();
                                            }
                                        }
                                    }
                                });
                                <?php
                                    $con=mysqli_connect("localhost", "root", "", "login_page");
                                    if(isset($_POST["pin_f"]))
                                    {
                                        ob_clean();
                                        $pin=$_POST["pin_f"];
                                        $usrname=$_SESSION["username"];
                                        $query1=mysqli_query($con,"select pin from login where username='$usrname'");
                                        $row1=mysqli_fetch_array($query1);
                                        if($pin==$row1["pin"])
                                            echo "piniscorrect";
                                        else
                                            echo "pinisincorrect";
                                    }
                                    mysqli_close($con);
                                ?>
                            }, 200);
                        }
                        else
                            setTimeout(function() {element[id+1].focus();}, 10);
                    }
                    else
                        e.preventDefault();
                }
            }
            function active_navbar_icon(id)
            {
                $(".navbar-icon").eq(id).toggleClass("active-navbar-icon");
            }
            function search_pass()
            {
                var search_string= $("#search").val();
                var pin1 = $("[name='pin']")[0].value;
                var pin2 = $("[name='pin']")[1].value;
                var pin3 = $("[name='pin']")[2].value;
                var pin4 = $("[name='pin']")[3].value;
                var pin_f = pin1 + pin2 + pin3 + pin4;
                $.ajax(
                {
                    url: "user_pass.php",
                    data: {search_string, pin_f},
                    type: "POST",
                    dataType: "html",
                    success: function(data)
                    {
                        $(".table-body").empty();
                        $(".table-body").append(data.substring(0,data.lastIndexOf("</tr>")+6));
                        if(!data.includes('value="**********"') && !data.includes("No records found!"))
                        {
                            togglepassword(id_pi);
                            id_pi="";
                        }
                        console.log(data.substring(0,data.lastIndexOf("</tr>")+6));
                    }
                });
                <?php
                    $con=mysqli_connect("localhost", "root", "", "login_page");
                    $usrname=$_SESSION["username"];
                    $query1=mysqli_query($con,"select * from login where username='$usrname'");
                    $row1=mysqli_fetch_array($query1);
                    $srno=$row1["Serial_Number"];
                    if(isset($_POST["search_string"]))
                    {
                        $searchstring=$_POST["search_string"];
                        $query_f="select * from passwords where Serial_Number='$srno' and (Site like '%$searchstring%' or Username like '%$searchstring%')";
                        if(isset($_SESSION["username"]))
                        {
                            $i=-1;
                            $result=mysqli_query($con,$query_f);
                            ob_clean();
                        }
                        else
                        {
                            header('Location: login.php');
                            exit;
                        }
                        if($row1["admin/user"]=="admin")
                        {
                            session_destroy();
                            header('Location: login.php');
                            exit;
                        }
                        while($row2=mysqli_fetch_array($result))
                        {
                            $i++;
                            echo '<tr class="column">
                                    <td>'.$row2["Site"].'</td>
                                    <td>'.$row2["Username"].'</td>
                                    <td>';
                                    if(!empty($_POST["pin_f"]) && isset($_POST["pin_f"]))
                                    {
                                        echo '<input type="password" name="password" class="passwordinput"
                                            value="'.$row2["Password"].'" readonly
                                            style="background-color: transparent; border: none; outline: none; font-size: 1.125rem; padding: 0;">';
                                    }
                                    else
                                    {
                                        echo '<input type="password" name="password" class="passwordinput"
                                            value="**********" readonly
                                            style="background-color: transparent; border: none; outline: none; font-size: 1.125rem; padding: 0;">';
                                    }
                                    echo '</td>
                                    <td class="password-visible">
                                        <ion-icon name="eye-outline" class="togglepassword" onclick="togglepassword('.$i.')"></ion-icon>
                                    </td>
                                    <td class="icon-bar">
                                        <div class="navbar-icon" id="navbar" onclick="active_navbar_icon('.$i.')">
                                            <!-- 1 -->
                                            <span style="--i:0;--x:0;--y:0;">
                                                <ion-icon name="copy-outline"></ion-icon>
                                            </span>
                                            <!-- 2 -->
                                            <span style="--i:1;--x:0;--y:1;">
                                                <ion-icon name="create-outline" onclick="open_edit_modal(this)"></ion-icon>
                                            </span>
                                            <!-- 3 -->
                                            <span style="--i:3;--x:0;--y:2;">
                                                <ion-icon name="trash-bin-outline" id="toggleDeleteBtn" class="toggleDeleteBtn" 
                                                onclick="delete_pass('.$i.','.$row2["Sr_No"].')">
                                                </ion-icon>
                                            </span>
                                        </div>
                                    </td>
                                </tr>';
                        }
                        if($i==(-1) && $row2===null)
                        {
                            echo '<tr class="column">
                                    <td colspan="3">No records found!</td>
                                </tr>';
                        }
                    }
                    mysqli_close($con);
                ?>
            }
            function delete_pass(id, srnum)
            {
                var id=id+1;
                var element = $(".toggleDeleteBtn")[id];
                const msg = new String("Are you sure you want to delete this password?");
                if(confirm(msg) == false)
                    return false;
                else
                    var del="yes";
                $.ajax(
                {
                    url: "user_pass.php",
                    data: {srnum, del},
                    type: "POST",
                    success: function()
                    {
                        alert("Password deleted successfully!");
                        location.reload();
                    }
                });
                <?php
                    $con=mysqli_connect("localhost", "root", "", "login_page");
                    if(isset($_POST["srnum"]) && isset($_POST["del"]))
                    {
                        $srnum=$_POST["srnum"];
                        $query1=mysqli_query($con,"select * from login where username='$usrname'");
                        $row1=mysqli_fetch_array($query1);
                        $srno=$row1["Serial_Number"];
                        $query2=mysqli_query($con,"delete from passwords where Sr_no='$srnum'");
                        // $query2=mysqli_query($con,"delete from passwords where Sr_No in (select a.Sr_No from (select p.Sr_No, @rownum := @rownum + 1 as row_num from passwords p, (select @rownum := 0) r) a where a.row_num='$id')");
                    }
                    mysqli_close($con);
                ?>
            }
            var focussed_ele="";
            function open_add_pass_modal()
            {
                $("#modal-container").addClass("show-modal-container");
                setTimeout(function()
                {
                    if(focussed_ele=="")
                        $("#add_site").focus();
                    else
                        $(focussed_ele.id).focus();
                },100);
            }
            function open_edit_modal(ele)
            {
                $("#edit-modal-container").addClass("show-modal-container");
            }
            function close_modal()
            {
                $("#add_site").val("");
                $("#add_user").val("");
                $("#add_pass").val("");
                $("[name='pin']").val("");
                $("#update_site").val("");
                $("#update_user").val("");
                $("#update_pass").val("");
                $("#modal-container").removeClass("show-modal-container");
                $("#edit-modal-container").removeClass("show-modal-container");
                $("#login-modal-container").removeClass("show-pin-modal");
            }
            function add_pass()
            {

                if($("#add_site").val()=="")
                {
                    alert("Please enter a site name!");
                    $("#add_site").focus();
                }
                else if($("#add_user").val()=="")
                {
                    alert("Please enter a username!");
                    $("#add_user").focus();
                }
                else if($("#add_pass").val()=="")
                {
                    alert("Please enter a password!");
                    $("#add_pass").focus();
                }
                else
                {
                    var site=$("#add_site").val();
                    var username=$("#add_user").val();
                    var password=$("#add_pass").val();
                    $.ajax(
                    {
                        url: "user_pass.php",
                        data: {site, username, password},
                        type: "POST",
                        success: function()
                        {
                            alert("Password saved successfully!");
                            close_modal();
                            location.reload();
                        },
                        error: function()
                        {
                            alert("Duplication Error!!\nPassword for the same Site having the same Username already exists! Please search for the password or enter different detalils.");
                        }
                    });
                    <?php
                        $con=mysqli_connect("localhost", "root", "", "login_page");
                        if(isset($_POST["site"]) && isset($_POST["username"]) && isset($_POST["password"]))
                        {
                            $flag=0;
                            $sitename=$_POST["site"];
                            $username=$_POST["username"];
                            $password=$_POST["password"];
                            $query1=mysqli_query($con,"select Serial_Number from login where username='$usrname'");
                            $row1=mysqli_fetch_array($query1);
                            $srno=$row1["Serial_Number"];
                            $query2=mysqli_query($con,"select * from passwords where Serial_Number='$srno'");
                            while($row2=mysqli_fetch_array($query2))
                            {
                                if($sitename==$row2["Site"] && $username==$row2["Username"])
                                {
                                    header('HTTP/1.0 400 Bad error');
                                    $flag=1;
                                }
                            }
                            if($flag==0)
                                $query3=mysqli_query($con,"insert into passwords values('NULL', '$srno', '$sitename', '$username', '$password')");
                        }
                        mysqli_close($con);
                    ?>
                }
            }
            window.addEventListener("click", function()
            {
                if(event.target.classList == "create-password" || event.target.id === "modal-container")
                {
                    $("#modal-container").removeClass("show-modal-container");
                    // focussed_ele=$("");
                    
                    // alert(focussed_ele.id);
                }
                if(event.target.id === "login-modal-container")
                    $("#login-modal-container").removeClass("show-pin-modal");
                if (event.target.classList == "edit-password" || event.target.id === "edit-modal-container")
                        $("#edit-modal-container").removeClass("show-modal-container");
            });
        </script>