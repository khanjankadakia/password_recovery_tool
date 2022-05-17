    <?php session_start(); ob_start(); ?>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Consolas';
        }

        .main-container {
            padding: 1rem;
        }

        .container-header {
            position: relative;
        }

        .container-text-center {
            display: flex;
            position: relative;
            align-items: center;
            justify-content: center;
        }

        .container-text-center img {
            position: relative;
            display: flex;
            padding: 1rem 1rem 1rem 0;
            margin-right: 1rem;
        }

        .container-text-center .header-text {
            display: block;
            position: relative;
            padding: 1rem 0rem 1rem 1rem;
            margin-left: 1rem;
            color: #999;
            width: 40rem;
            text-align: left;
            font-size: 2rem;
            font-weight: normal;
        }

        .create-modal-container,
        .change-modal-container {
            position: fixed !important;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
            padding: 1rem 0;
            z-index: 99999;
            opacity: 0;
            visibility: hidden;
            transform: scale(1.1);
            transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
        }

        .create-modal-container .modal-content,
        .change-modal-container .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 32%;
            background-color: #191919;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 1rem cornflowerblue;
        }

        .create-modal-container .modal-header,
        .change-modal-container .modal-header {
            line-height: 1.2rem;
            padding: 0.2rem 0;
        }

        .create-modal-container .modal-header .modal_close,
        .change-modal-container .modal-header .modal_close {
            float: right;
            cursor: pointer;
            color: #dbe5f0;
        }

        .create-modal-container .modal-header .modal_close i,
        .change-modal-container .modal-header .modal_close i {
            font-size: 1.5rem;
        }

        .create-modal-container .modal-header .modal_title,
        .change-modal-container .modal-header .modal_title {
            color: #f2f8ff;
            font-weight: normal;
        }

        .create-modal-container .modal_description,
        .change-modal-container .modal_description {
            color: #708090;
            line-height: 1rem;
            font-size: 0.92rem;
        }

        .create-modal-container .modal-body-form,
        .change-modal-container .modal-body-form {
            display: block;
            position: relative;
            text-align: center;
            width: 100%;
            text-align: center;
            margin: 1rem auto;
        }

        .create-modal-container .modal-body-form .form-group-title,
        .change-modal-container .modal-body-form .form-group-title {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            text-align: center;
            width: 100%;
            padding: 1rem 0;
        }

        .create-modal-container .modal-body-form .group-title,
        .change-modal-container .modal-body-form .group-title {
            color: #B0C4DE;
            font-weight: 500;
            padding: 0 1rem;
            border-left: 1px solid cornflowerblue;
            margin-left: 1rem;
        }

        .create-modal-container .modal-body-form .group-title-logo,
        .change-modal-container .modal-body-form .group-title-logo {
            display: flex;
            position: relative;
            height: 4rem;
            width: auto;
            border-right: 1px solid cornflowerblue;
        }

        .create-modal-container .modal-body-form .form-group,
        .change-modal-container .modal-body-form .form-group {
            width: 100%;
            position: relative;
            display: block;
            margin: 0 0 2rem 0;
        }

        .create-modal-container .modal-body-form .form-group input[type=email],
        .create-modal-container .modal-body-form .form-group input[type=password],
        .create-modal-container .modal-body-form .form-group input[type=text],
        .change-modal-container .modal-body-form .form-group input[type=email],
        .change-modal-container .modal-body-form .form-group input[type=password],
        .change-modal-container .modal-body-form .form-group input[type=text] {
            background-color: transparent;
            width: 100%;
            height: 0.5rem;
            padding: 1rem 0.5rem;
            display: block;
            border-radius: 4px;
            border: 1px solid cornflowerblue;
            outline: none;
            font-size: 0.95rem;
            color: cornflowerblue;
        }

        .create-modal-container .modal-body-form .form-group ::placeholder,
        .change-modal-container .modal-body-form .form-group ::placeholder {
            color: lightsteelblue;
        }

        .create-modal-container .modal-body-form .form-group .form-label {
            color: #B0C4DE;
            margin: 0.5rem 0;
            font-size: 1.2rem;
            display: flex;
            font-weight: normal;
        }

        .create-modal-container .modal-btn-group {
            display: flex;
            flex-direction: row;
        }

        .create-modal-container .modal-btn-group button {
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

        .create-modal-container .modal-btn-group button i {
            padding: 0 1rem;
            font-size: 1.2rem;
            float: left;
        }

        .create-modal-container .modal-btn-group button span {
            position: relative;
            display: block;
            padding-left: 2.5rem;
            white-space: normal;
            font-size: 1.1rem;
            text-align: left;
        }

        .create-modal-container .modal-btn-group button:hover,
        .create-modal-container .modal-btn-group button:active {
            opacity: 0.8;
            transform: opacity;
        }

        .change-modal-container .modal-body-form .form-label {
            color: #B0C4DE;
            margin: 1rem 0;
            font-size: 1.2rem;
            display: flex;
            font-weight: normal;
        }

        .change-modal-container .modal-btn-group {
            display: flex;
            flex-direction: row;
        }

        .change-modal-container .modal-btn-group button {
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

        .change-modal-container .modal-btn-group button i {
            padding: 0 1rem;
            font-size: 1.2rem;
            float: left;
        }

        .change-modal-container .modal-btn-group button span {
            position: relative;
            display: block;
            padding-left: 2.5rem;
            white-space: normal;
            font-size: 1.1rem;
            text-align: left;
        }

        .change-modal-container .modal-btn-group button:hover,
        .change-modal-container .modal-btn-group button:active {
            opacity: 0.8;
            transform: opacity;
        }

        .show-modal,
        .show-change-modal {
            opacity: 1;
            visibility: visible;
            transform: scale(1.0);
            transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
        }

        .include-text .switch {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 3.75rem;
            height: 2.125rem;
            margin: 0.2rem;
        }

        .include-text .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: lightsteelblue;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 1.625rem;
            width: 1.625rem;
            left: 0.25rem;
            bottom: 0.25rem;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: cornflowerblue;
            box-shadow: 0 0 0.5rem lightsteelblue;
        }

        input:focus+.slider {
            box-shadow: 0 0 1rem cornflowerblue;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 0.4rem;
        }

        .slider.round:before {
            border-radius: 20%;
        }

        .main_security {
            position: relative;
            display: block;
            padding: 0.5rem;
            margin: 1rem 0.5rem;
            border-top: 1px solid cornflowerblue;
            border-bottom: 1px solid cornflowerblue;
            border-radius: 0.4rem;
        }

        .main_security .include-text {
            position: relative;
            display: flex;
            flex-flow: row;
            padding: 0.5rem 0;
            margin: 1rem 0.5rem;
            border-left: 1px solid cornflowerblue;
            border-right: 1px solid cornflowerblue;
            border-radius: 0.4rem;
        }

        .include-text .include-logo-text {
            width: 90%;
            padding: 0.5rem 1rem;
            font-size: 1.2rem;
        }

        .include-logo-text .switch-logo {
            line-height: 1.2rem;
            font-size: 1.2rem;
            text-align: center;
        }

        .include-logo-text .switch-logo i {
            font-size: 1.25em;
            float: left;
            color: lightslategray;
        }

        .include-logo-text .switch-text {
            padding-left: 1rem;
            white-space: normal;
            font-size: 1.3rem;
            text-align: left;
        }

        .main_security .password-length {
            padding: 1rem 0;
        }

        .password-length .field {
            display: flex;
            height: 100%;
            position: relative;
            padding: 0 1rem;
        }

        .field .field-text {
            padding-left: 1rem;
            white-space: normal;
            font-size: 1.3rem;
            text-align: left;
            color: #888;
        }

        .field .value {
            position: absolute;
            display: flex;
            font-size: 1.2rem;
            color: cornflowerblue;
            background-color: #f1f1f1;
            border-radius: 0.4rem;
            font-weight: 500;
            padding: 0.5rem;
            align-items: center;
            justify-content: center;
        }

        .field .value.right {
            width: 25%;
            top: -0.5rem;
            right: 0.8rem;
        }

        .include-text .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 3rem;
            padding: 0.75rem;
            text-decoration: none;
            background-color: cornflowerblue;
            color: #fff;
            border: none;
            outline: none;
            text-align: center;
            cursor: pointer;
            border-radius: 0.4rem;
            transition: 0.3s;
            margin: 0 0.8rem;
        }

        .include-text .btn:hover {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px cornflowerblue;
        }

        .w-20 {
            width: 20%;
        }

        .w-30 {
            width: 30%;
        }

        .w-50 {
            width: 50%;
        }
        .w-35 {
            width: 35%;
        }

        .w-40 {
            width: 40%;
        }

        .ml-auto {
            margin-left: auto;
        }

        .btn .btn-text {
            white-space: normal;
            text-align: left;
            font-size: 1.05rem;
        }

        .form-step {
            display: none;
            transform-origin: top;
            animation: animate 0.5s;
        }

        .form-step-active {
            display: block;
        }

        @keyframes animate {
            from {
                transform: scale(1, 0);
                opacity: 0;
            }

            to {
                transform: scale(1, 1);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <section>
            <div class="main-container">
                <div class="main-container_section">
                    <div class="content-password_store">
                        <div class="container-header">
                            <h1 class="container-text-center"><img src="Pictures/securitycheckup_scene.png" alt="Security" height="130">
                                <span class="header-text">Security</span>
                            </h1>
                        </div>
                        <div class="main_security" id="createPin">
                            <div class="include-text">
                                <label class="include-logo-text">
                                    <span class="switch-logo"><i class="fa-solid fa-link"></i></span>
                                    <span class="switch-text">Create PIN</span>
                                </label>
                                <label class="switch">
                                    <input type="checkbox" id="togglePIN">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="password-length">
                                <div class="field">
                                    <span class="field-text">Last create PIN</span>
                                    <div class="value right" id="length-val">
                                        1 day ago
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main_security" id="changePIN">
                            <div class="include-text">
                                <label class="include-logo-text">
                                    <span class="switch-logo"><i class="fa-solid fa-link"></i></span>
                                    <span class="switch-text">Change PIN</span>
                                </label>
                                <button type="button" id="changeBtn" class="btn w-20 ml-auto">
                                    <div class="btn-text">Change PIN</div>
                                </button>
                            </div>
                            <div class="password-length">
                                <div class="field">
                                    <span class="field-text">Last change PIN</span>
                                    <div class="value right" id="length-val">
                                        0 day ago
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main_security" id="changeUSerName">
                            <div class="include-text">
                                <label class="include-logo-text">
                                    <span class="switch-logo"><i class="fa-solid fa-link"></i></span>
                                    <span class="switch-text">Change USerName</span>
                                </label>
                                <button type="button" id="change-username" class="btn w-30 ml-auto">
                                    <div class="btn-text">Change USerName</div>
                                </button>
                            </div>
                            <div class="password-length">
                                <div class="field">
                                    <span class="field-text">Last change UserName</span>
                                    <div class="value right" id="length-val">
                                        5 day ago
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main_security">
                            <div class="include-text">
                                <label class="include-logo-text">
                                    <span class="switch-logo"><i class="fa-solid fa-globe"></i></span>
                                    <span class="switch-text">Change password</span>
                                </label>
                                <button type="button" id="change-password" class="btn w-30 ml-auto">
                                    <div class="btn-text">Change Password</div>
                                </button>
                            </div>
                            <div class="password-length">
                                <div class="field">
                                    <span class="field-text">Last change password</span>
                                    <div class="value right" id="length-val">
                                        3 day ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-modal-container" id="create-modal-container">
                        <div class="modal-content">
                            <form action="" method="get">
                                <div class="modal-header">
                                    <span class="modal_close" id="close-login-modal" title="Close">
                                        <i class="fa-brands fa-xing"></i>
                                    </span>
                                    <h2 class="modal_title">Password Security</h2>
                                </div>
                                <p class="modal_description">
                                    <i class="fa-solid fa-quote-left"></i>
                                    <span> Tool is trying to show passwords. Create your account PIN to allow
                                        this...</span>
                                    <i class="fa-solid fa-quote-right"></i>
                                </p>
                                <div class="modal-body-form">
                                    <div class="form-group-title">
                                        <img class="group-title-logo" src="Pictures/signin_scene.png" alt="Logo">
                                        <h2 class="group-title"> PIN </h2>
                                    </div>

                                    <div class="form-group">
                                        <label for="emailId" class="form-label">E-Mail Id :</label>
                                        <input type="email" class="form-control-text" id="emailId" name="emailId"
                                            value="shruteshdholakiya2001.sd@gmail.com" readonly
                                            style="border: none; padding: 1rem 0; margin-bottom: -1.8rem;">
                                    </div>

                                    <div class="form-group" id="otp" style="display: flex; width: 100%;">
                                        <input type="text" class="form-control-text" id="first" name="password"
                                            placeholder="*" style="margin-right: 0.5rem;" maxlength="1"
                                            onkeyup="tabChange(1)">
                                        <input type="text" class="form-control-text" id="second" name="password"
                                            placeholder="*" style="margin: 0 0.5rem;" maxlength="1"
                                            onkeyup="tabChange(2)">
                                        <input type="text" class="form-control-text" id="third" name="password"
                                            placeholder="*" style="margin: 0 0.5rem;" maxlength="1"
                                            onkeyup="tabChange(3)">
                                        <input type="text" class="form-control-text" id="fourth" name="password"
                                            placeholder="*" style="margin-left: 0.5rem;" maxlength="1"
                                            onkeyup="tabChange(4)">
                                    </div>
                                </div>
                                <div class="modal-btn-group">
                                    <button type="button" class="modal_button-close" id="button-change"
                                        style="margin-right: 0.5rem;">
                                        <i class="fa-brands fa-xing"></i> <span>Close</span>
                                    </button>

                                    <button type="submit" class="modal_button-remove close-modal" id="button-remove"
                                        style="margin-left: 0.5rem;">
                                        <i class="fa-solid fa-sliders"></i> <span>Create </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="change-modal-container" id="change-modal-container">
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="modal_close" id="close-change-modal" title="Close">
                                    <i class="fa-brands fa-xing"></i>
                                </span>
                                <h2 class="modal_title">Password Security</h2>
                            </div>
                            <p class="modal_description">
                                <i class="fa-solid fa-quote-left"></i>
                                <span>Change your account PIN to allow this...</span>
                                <i class="fa-solid fa-quote-right"></i>
                            </p>
                            <div class="modal-body-form">
                                <form action="" method="get">
                                    <div class="form-group-title">
                                        <img class="group-title-logo" src="Pictures/signin_scene.png" alt="Logo">
                                        <h2 class="group-title"> PIN </h2>
                                    </div>
                                    <div class="form-step form-step-active">
                                        <label for="oldPIN" class="form-label">Old PIN :</label>
                                        <div class="form-group" id="otp" style="display: flex; width: 100%;">
                                            <input type="text" class="form-control-text" id="fifth" name="password"
                                                placeholder="*" style="margin-right: 0.5rem;" maxlength="1"
                                                onkeyup="tabChange(5)">
                                            <input type="text" class="form-control-text" id="six" name="password"
                                                placeholder="*" style="margin: 0 0.5rem;" maxlength="1"
                                                onkeyup="tabChange(6)">
                                            <input type="text" class="form-control-text" id="seven" name="password"
                                                placeholder="*" style="margin: 0 0.5rem;" maxlength="1"
                                                onkeyup="tabChange(7)">
                                            <input type="text" class="form-control-text" id="eight" name="password"
                                                placeholder="*" style="margin-left: 0.5rem;" maxlength="1"
                                                onkeyup="tabChange(8)">
                                        </div>
                                        <div class="modal-btn-group">
                                            <button type="button" class="modal_button-close" id="button-change"
                                                style="margin-right: 0.5rem;">
                                                <i class="fa-brands fa-xing"></i> <span>Close</span>
                                            </button>

                                            <button type="button" class="btn-next" id="button-remove"
                                                style="margin-left: 0.5rem;">
                                                <i class="fa-solid fa-shuffle"></i> <span>Next </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-step">
                                        <label for="newPIN" class="form-label">New PIN :</label>
                                        <div class="form-group" id="otp" style="display: flex; width: 100%;">
                                            <input type="text" class="form-control-text" id="nine" name="password"
                                                placeholder="*" style="margin-right: 0.5rem;" maxlength="1"
                                                onkeyup="tabChange(9)">
                                            <input type="text" class="form-control-text" id="ten" name="password"
                                                placeholder="*" style="margin: 0 0.5rem;" maxlength="1"
                                                onkeyup="tabChange(10)">
                                            <input type="text" class="form-control-text" id="eleven" name="password"
                                                placeholder="*" style="margin: 0 0.5rem;" maxlength="1"
                                                onkeyup="tabChange(11)">
                                            <input type="text" class="form-control-text" id="twelel" name="password"
                                                placeholder="*" style="margin-left: 0.5rem;" maxlength="1"
                                                onkeyup="tabChange(12)">
                                        </div>
                                        <div class="modal-btn-group">
                                            <button type="button" class="btn-prev" id="button-change"
                                                style="margin-right: 0.5rem;">
                                                <i class="fa-solid fa-left-long"></i> <span>Prev </span>
                                            </button>

                                            <button type="submit" class="modal_button-remove" id="button-remove"
                                                style="margin-left: 0.5rem;">
                                                <i class="fa-solid fa-screwdriver-wrench"></i> <span>Change </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        const prevBtn = document.querySelectorAll(".btn-prev");
        const nextBtn = document.querySelectorAll(".btn-next");
        const formSteps = document.querySelectorAll(".form-step");

        let formStepsNum = 0;

        nextBtn.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum++;
                updateFormSteps();
            });
        });

        prevBtn.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum--;
                updateFormSteps();
            });
        });

        function updateFormSteps() {
            formSteps.forEach((formStep) => {
                formStep.classList.contains("form-step-active") &&
                    formStep.classList.remove("form-step-active");
            });
            formSteps[formStepsNum].classList.add("form-step-active");
        }
    </script>
    <script>
        let tabChange = function (val) {
            let ele = document.querySelectorAll('#otp input');

            if (ele[val - 1].value != '') {
                ele[val].focus();
            } else if (ele[val - 1].value == '') {
                ele[val - 2].focus();
            }
        }

        const modal = document.querySelector("#create-modal-container");
        const closeButton = document.querySelector("#close-login-modal");
        const togglePIN = document.getElementById("togglePIN");

        togglePIN.addEventListener("click", function () {
            if (togglePIN.checked == true) {
                modal.classList.toggle("show-modal");
            }
        });
        closeButton.addEventListener("click", function () {
            modal.classList.toggle("show-modal");
            togglePIN.checked = false;
        });
        window.addEventListener("click", function () {
            if (event.target === modal) {
                modal.classList.toggle("show-modal");
                togglePIN.checked = false;
            }
        });

        const modalChange = document.querySelector("#change-modal-container");
        const closeBtn = document.querySelector("#close-change-modal");

        document.getElementById("changeBtn").addEventListener("click", function () {
            modalChange.classList.toggle("show-change-modal");
        });
        closeBtn.addEventListener("click", function () {
            modalChange.classList.toggle("show-change-modal");
        });
        window.addEventListener("click", function () {
            if (event.target === modalChange) {
                modalChange.classList.toggle("show-change-modal");
            }
        });
    </script>
    <script>
        document.querySelector(".navbar").onclick = function () {
            document.querySelector(".navbar").classList.toggle("active-navbar");
        };

        document.getElementById("navbar-profile-image").onclick = function () {
            document.querySelector('.menu').classList.toggle('active');
        };

        const navItems = document.querySelectorAll('.vertical-menu');

        for (var i = 0; i < navItems.length; i++) {
            navItems[i].addEventListener("click", function () {
                var currentItem = document.querySelector(".active-vertical-navbar");
                if (currentItem) {
                    currentItem.classList.remove('active-vertical-navbar');
                }
                this.classList.add('active-vertical-navbar');
            });
        };

        window.onscroll = function () {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                document.getElementById("navbar").style.boxShadow = "0 0 0.5rem cornflowerblue";
                document.getElementById("navbar").style.backgroundColor = "#f9f9f9";
                document.getElementById("navbar").style.padding = "1.5rem 1rem";
                document.getElementById("logo").style.fontSize = "1.7rem";
                document.getElementById("logo").style.transition = "all 0.6s";
            } else {
                document.getElementById("navbar").style.boxShadow = "none";
                document.getElementById("navbar").style.backgroundColor = "#fff";
                document.getElementById("navbar").style.padding = "3rem 2rem";
                document.getElementById("logo").style.fontSize = "2rem";
                document.getElementById("logo").style.transition = "all 0.6s";
            }
        };
    </script>

</body>

</html>