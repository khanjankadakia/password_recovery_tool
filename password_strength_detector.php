<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Strength Detection</title>
    <script src="https://kit.fontawesome.com/878433a650.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/b84efdfc46.js"></script>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Consolas';
        }

        .password-strength-container {
            position: relative;
            display: grid;
            width: 100%;
            height: 100%;
            margin: auto;
            place-items: center;
        }

        .strength-content {
            width: 35%;
            border-radius: 0.4rem;
            border: 1px solid cornflowerblue;
            padding: 0.5rem;
        }

        .password-strength-header {
            position: relative;
            display: flex;
            flex-flow: column;
            align-items: center;
            justify-content: center;
        }

        .password-strength-header h1 {
            display: flex;
            padding: 1rem;
            color: #999;
            text-align: left;
            font-size: 2rem;
            font-weight: normal;
        }

        .form-group {
            width: 100%;
            position: relative;
            display: block;
        }

        .form-group input[type=password],
        .form-group input[type=text] {
            background-color: transparent;
            width: 100%;
            height: 0.5rem;
            padding: 1.5rem 0.5rem;
            display: block;
            border-radius: 4px;
            border: 1px solid cornflowerblue;
            outline: none;
            font-size: 1.1rem;
            color: cornflowerblue;
        }

        .form-group input::placeholder {
            color: lightsteelblue;
        }

        .form-group .form-label {
            color: #888;
            margin: 1rem 0;
            font-size: 1.4rem;
            display: flex;
            font-weight: normal;
        }

        .display-toggle-btn {
            position: absolute;
            top: 3rem;
            right: 0.5rem;
            height: 2.5rem;
            width: 2.5rem;
            border: none;
            border-radius: 0.4rem;
            padding: 0.15rem;
        }

        .display-toggle-btn ion-icon {
            color: cornflowerblue;
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0.5rem;
        }

        .password-strength-indicator {
            position: relative;
            width: 100%;
            height: 3rem;
            border-radius: 0.4rem;
            margin-top: 1rem;
            text-align: center;
            background: #f2f2f2;
            display: none;
        }

        .password-strength-indicator span:nth-child(1) {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 1rem;
            font-size: 1.2rem;
            line-height: 1.2rem;
            color: #292929;
            z-index: 2;
        }

        .password-strength-indicator span:nth-child(2) {
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            border-radius: 0.4rem;
            z-index: 1;
            transition: all 300ms ease-in-out;
        }

        .password-length {
            padding: 0.5rem 0;
            margin: 0.5rem 0;
            /* border: 1px solid cornflowerblue; */
            border-radius: 0.4rem;
        }

        .field {
            position: relative;
            display: flex;
            height: 100%;
        }

        .password-strength {
            width: 80%;
            color: #797979;
            font-size: 1.2rem;
            padding: 0.5rem 1rem;
        }

        .password-strength-logo {
            line-height: 1.2rem;
            text-align: center;
        }

        .password-strength-logo i {
            font-size: 1.25em;
            float: left;
            color: slategrey;
        }

        .password-strength-text {
            padding-left: 1rem;
            white-space: normal;
            font-size: 1.2rem;
            text-align: left;
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
            top: 0rem;
            right: 0.8rem;
        }
    </style>
</head>

<body>
    <div class="password-strength-container">
        <div class="password-strength-header">
            <img src="Pictures/welcome_scene.svg" alt="password-Strength-DetecTor-logo" height="150">
            <h1 class="password-strength-title">Strength DetecTor</h1>
        </div>
        <div class="strength-content">
            <div class="form-group">
                <label for="password" class="form-label">Enter Password : </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="#########">
                <button class="display-toggle-btn" id="toggle-password">
                    <ion-icon name="eye-off-outline" id="show-hide"></ion-icon>
                </button>
                <div class="password-strength-indicator" id="password-strength-indicator">
                    <span class="strength-indicator text">Weak Password</span>
                    <span class="strength-indicator"></span>
                </div>
            </div>
            <div class="password-length">
                <div class="strength field">
                    <div class="password-strength">
                        <span class="password-strength-logo"><i class="fa-solid fa-check-double"></i></span>
                        <span class="password-strength-text">Password Length : </span>
                    </div>
                    <div class="value right" id="length-val">
                        0
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        function getPasswordStrength(password) {
            let s = 0;
            if (password.length > 6) {
                s++;
            }
            if (password.length > 10) {
                s++;
            }
            if (/[A-Z]/.test(password)) {
                s++;
            }
            if (/[0-9]/.test(password)) {
                s++;
            }
            if (/[^A-Za-z0-9]/.test(password)) {
                s++;
            }
            return s;
        }
        document.querySelector("#password").addEventListener("input", function () {
            document.querySelector("#password-strength-indicator").style.display = "block";
        });
        document.querySelector("#toggle-password").addEventListener("click", function () {
            const input = document.querySelector("#password"),
                showHide = document.querySelector("#show-hide");
            if (input.type === "password") {
                input.type = "text";
                showHide.name = "eye-outline";
            } else {
                input.type = "password";
                showHide.name = "eye-off-outline";
            }
        });

        document.querySelector("#password").addEventListener("keyup", function (e) {
            let length = document.getElementById('password').value.length;
            document.getElementById("length-val").textContent = length;
            let password = e.target.value;
            let strength = getPasswordStrength(password);
            let passwordStrengthSpans = document.querySelectorAll(".strength-indicator");
            strength = Math.max(strength, 1);
            passwordStrengthSpans[1].style.width = strength * 20 + "%";
            if (strength < 2) {
                passwordStrengthSpans[0].innerText = "Weak Password";
                passwordStrengthSpans[0].style.color = "#111";
                passwordStrengthSpans[1].style.background = "lightsteelblue";
            } else if (strength >= 2 && strength <= 4) {
                passwordStrengthSpans[0].innerText = "Medium Password";
                passwordStrengthSpans[0].style.color = "#fff";
                passwordStrengthSpans[1].style.background = "DodgerBlue";
            } else {
                passwordStrengthSpans[0].innerText = "Strong Password";
                passwordStrengthSpans[0].style.color = "#fff";
                passwordStrengthSpans[1].style.background = "cornflowerblue";
            }
        });
    </script>
</body>

</html>