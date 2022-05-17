<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
    <script src="https://kit.fontawesome.com/878433a650.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/b84efdfc46.js"></script>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Consolas';
        }

        .container-checkbox {
            position: relative;
            display: grid;
            width: 100%;
            height: 100%;
            margin: auto;
            place-items: center;
        }

        .checkbox-content {
            width: 35%;
            border-radius: 0.4rem;
            border: 1px solid cornflowerblue;
            padding: 0.5rem;
        }

        .password-generate-header {
            position: relative;
            display: flex;
            flex-flow: column;
            align-items: center;
            justify-content: center;
        }

        .password-generate-header h1 {
            display: flex;
            padding: 1rem;
            color: #999;
            text-align: left;
            font-size: 2rem;
            font-weight: normal;
        }

        .switch {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 3.75rem;
            height: 2.125rem;
            margin: 0.2rem;
        }

        .switch input {
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
            background-color: #e9e9e9;
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
            border-radius: 5rem;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .include-text {
            position: relative;
            display: flex;
            flex-flow: row;
            padding: 0.5rem 0;
            margin: 0.5rem;
            border: 1px solid cornflowerblue;
            border-radius: 0.4rem;
            /* width: 30%; */
        }

        .include-logo-text {
            width: 80%;
            color: #797979;
            padding: 0.5rem 1rem;
            font-size: 1.2rem;
        }

        .switch-logo {
            line-height: 1.2rem;
            text-align: center;
        }

        .switch-logo i {
            font-size: 1.25em;
            float: left;
            color: slategrey;
        }

        .switch-text {
            padding-left: 1rem;
            white-space: normal;
            font-size: 1.2rem;
            text-align: left;
        }

        .field {
            display: flex;
            /* align-items: center; */
            /* justify-content: center; */
            height: 100%;
            position: relative;
            padding: 0 1rem;
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
            width: 15%;
            top: -1rem;
            right: 0.8rem;
        }

        input {
            -webkit-appearance: none;
            width: 70%;
            height: 0.2rem;
            background: #ddd;
            border-radius: 5px;
            outline: none;
            border: none;
            z-index: 2222;
        }

        input::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 1.4rem;
            height: 1.4rem;
            border-radius: 20%;
            background: cornflowerblue;
            border: 1px solid cornflowerblue;
            cursor: pointer;
        }

        .password-length {
            padding: 1.5rem 0;
            margin: 0.5rem;
            border: 1px solid cornflowerblue;
            border-radius: 0.4rem;
        }

        .form-group {
            position: relative;
            display: flex;
            margin: 0.5rem;
            border: 1px solid cornflowerblue;
            border-radius: 0.4rem;
        }

        .form-group input[type=text] {
            background-color: transparent;
            width: 100%;
            height: 0.5rem;
            padding: 1.8rem 0.5rem;
            display: block;
            border-radius: 0.4rem;
            /* border: 1px solid cornflowerblue; */
            outline: none;
            font-size: 1.2rem;
            color: cornflowerblue;
        }

        .form-group input::placeholder {
            color: lightsteelblue;
        }

        .form-group .copy-btn {
            display: flex;
            position: absolute;
            top: 0.25rem;
            right: 4rem;
            height: 3rem;
            width: 3rem;
            border: none;
            border-radius: 0.2rem;
            padding: 0.25rem;
        }

        .copy-btn ion-icon {
            z-index: 10000;
            color: cornflowerblue;
            cursor: pointer;
            font-size: 1.5rem;
            padding: 0.5rem;
        }

        .copy-btn ion-icon:hover {
            color: dodgerblue;
            border-radius: 0.4rem;
        }

        .copy-btn:focus {
            outline: none;
        }

        .form-group .generate-btn {
            display: flex;
            position: absolute;
            top: 0.25rem;
            right: 0.5rem;
            height: 3rem;
            width: 3rem;
            border: none;
            border-radius: 0.2rem;
            padding: 0.25rem;
        }

        .generate-btn ion-icon {
            z-index: 10000;
            color: cornflowerblue;
            cursor: pointer;
            font-size: 1.5rem;
            padding: 0.5rem;
        }

        .generate-btn ion-icon:hover {
            color: dodgerblue;
            border-radius: 0.4rem;
        }

        .generate-btn:focus {
            outline: none;
        }

        /* .form-group .search-btn {
            display: flex;
            position: absolute;
            top: 0.25rem;
            left: -0.26rem;
            color: lightsteelblue;
            cursor: pointer;
            font-size: 2rem;
            padding: 0.5rem;
        } */
    </style>
</head>

<body>
    <div class="container-checkbox">
        <div class="password-generate-header">
            <img src="Pictures/welcome_scene.svg" alt="password-generator-logo" height="150">
            <h1 class="password-generate-title">Password GeneraTor</h1>
        </div>
        <div class="checkbox-content">
            <div class="form-group">
                <!-- <ion-icon name="at-outline" class="search-btn"></ion-icon> -->
                <input type="text" id="password" name="password" maxlength="20" placeholder="############" readonly>
                <button type="button" class="copy-btn" id="clipboard">
                    <!-- <i class="fa-solid fa-copy" id="copyBtn"></i> -->
                    <ion-icon name="bookmark-outline" id="copyBtn"></ion-icon>
                    <ion-icon name="bookmarks-outline" id="activeCopyBtn" style="display: none;"></ion-icon>
                    <!-- <i class="fa-solid fa-paste" id="activeCopyBtn" style="display: none;"></i> -->
                </button>
                <button type="button" class="generate-btn" id="passwordClipboard">
                    <!-- <i class="fa-solid fa-shuffle" id="generatePassword"></i> -->
                    <ion-icon name="git-compare-outline" id="generatePassword"></ion-icon>
                </button>
            </div>
            <div class="password-length">
                <div class="field">
                    <input type="range" id="length" min="8" max="20" value="12" steps="1">
                    <div class="value right" id="length-val">
                        12</div>
                </div>
            </div>

            <div class="include-text">
                <label class="include-logo-text">
                    <span class="switch-logo"><i class="fa-solid fa-check-double"></i></span>
                    <span class="switch-text">Include Symbols</span>
                </label>
                <label class="switch">
                    <input type="checkbox" id="symbol">
                    <span class="slider round"></span>
                </label>
            </div>

            <div class="include-text">
            <label class="include-logo-text">
                <span class="switch-logo"><i class="fa-solid fa-check-double"></i></span>
                <span class="switch-text">Include Numbers</span>
            </label>
            <label class="switch">
                <input type="checkbox" id="numbers">
                <span class="slider round"></span>
            </label>
            </div>

            <div class="include-text">
                <label class="include-logo-text">
                    <span class="switch-logo"><i class="fa-solid fa-check-double"></i></span>
                    <span class="switch-text">Include Uppercase</span>
                </label>
                <label class="switch">
                    <input type="checkbox" id="uppercase">
                    <span class="slider round"></span>
                </label>
            </div>

            <div class="include-text">
                <label class="include-logo-text">
                    <span class="switch-logo"><i class="fa-solid fa-check-double"></i></span>
                    <span class="switch-text">Include Lowercase</span>
                </label>
                <label class="switch">
                    <input type="checkbox" id="lowercase" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<script>
    document.querySelector('#length').addEventListener("input", function () {
        let length = document.getElementById('length').value;
        document.getElementById("length-val").textContent = length;
    });
</script>
<script>
    document.querySelector('#generatePassword').onclick = function () {
        var chars = "";
        const symbols = document.getElementById('symbol');
        const numbers = document.getElementById('numbers');
        const uppercase = document.getElementById('uppercase');
        const lowercase = document.getElementById('lowercase');
        let length = document.getElementById('length').value;
        var passwordLength = length;

        var password = "";

        if (symbols.checked == true) {
            chars += "!@#$%^&*()_+~\'|}{[]:;?><,./-=";
        }

        if (numbers.checked == true) {
            chars += "1234567890";
        }

        if (uppercase.checked == true) {
            chars += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }

        if (lowercase.checked == true) {
            chars += "abcdefghijklmnopqrstuvwxyz";
        }

        if(symbols.checked==false&&numbers.checked==false&&uppercase.checked==false&&lowercase.checked==false)
        {
            lowercase.checked=true;
        }

        for (var i = 0; i < passwordLength; i++) {
            var randomPassword = Math.floor(Math.random() * chars.length);
            password += chars.substring(randomPassword, randomPassword + 1);
        }
        document.getElementById("password").value = password;

        // document.querySelector('.search-btn').style.color = "cornflowerblue";
        document.getElementById('copyBtn').style.display = "block";
        document.getElementById('activeCopyBtn').style.display = "none";
    }
</script>
<script>
    document.querySelector('#clipboard').onclick = function () {
        // document.querySelector('.search-btn').style.color = "#c9c9c9";
        document.getElementById('copyBtn').style.display = "none";
        document.getElementById('activeCopyBtn').style.display = "block";
        var copyText = document.getElementById("password");
        copyText.select();
        document.execCommand("copy");
        alert("Password Is Copied!");
        // document.getElementById('copyBtn').classList.toggle('fa-paste');
        // copyText.value = "";
    }
</script>

</html>