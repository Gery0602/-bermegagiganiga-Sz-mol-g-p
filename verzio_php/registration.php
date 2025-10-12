<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Registráció</title>
</head>

<body>
    <div class="container">


        <div class="head">
            <h1>Regisztráció</h1>
        </div>

        <div class="form-group">
            <div id="errDiv" style="color: red;"></div>
            <div id="msgDiv" style="font-weight: bolder;"></div>
        </div>


        <form action="registration.php" id="regForm">
            <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Név">
            </div>

            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="E-Mail">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Jelszó">
            </div>

<!--A faszom kimvan az egészel és még csak most keztem -Kotor-->
            <!--<div class="form-group">
                <select name="roles" id="roles">
                    <option value="0">Admin</option>
                    <option value="1">Moderator</option>
                    <option value="2">User</option>
                </select>
            </div>
-->
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Regisztráció">
                <p style="display: inline-block;">vagy <a href="login.php">bejelentkezés.</a></p>
            </div>
        </form>

    </div>

    <script>
        document.getElementById('regForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const jsonData = JSON.stringify({
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                muvelet: "r"
            });
            fetch("users.php", {
                method: "POST",
                header: { "Content-Type": "application/json" },
                body: jsonData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        document.getElementById('errDiv').innerText = data.error;
                    }
                    else if (data.success) {
                        window.location.href = "login.php";
                    }
                    else if (data.msg) {
                        document.getElementById('msgDiv').innerText = data.msg;
                    }
                })
        });
    </script>


</body>

</html>