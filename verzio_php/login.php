<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Bejelentkezés</title>
</head>
<body style="background-color: white;">
    <div class="container">
        
        <div class="head"><h1>Bejelentkezés</h1></div> 
    
        <div class="form-group">
            <div id="errDiv" style="color: red;"></div>
            <div id="msgDiv" style="font-weight: bolder;" ></div>
        </div>

        
        
        <form action="login.php" id="logForm">
            
            <div class="form-group">
               <input type="email" class="form-control" id="email" placeholder="E-Mail"> 
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Jelszó">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Bejelentkezés">
                <p style="display: inline-block;">vagy <a href="registration.php">regisztració.</a></p>
            </div>
        </form>

    </div>

    
</body>
<script>
        document.getElementById('logForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const jsonData = JSON.stringify({
                email : document.getElementById('email').value,
                password : document.getElementById('password').value,
                muvelet : "l"
            });
            fetch("users.php", {
                method: "POST",
                header: {"Content-Type" : "application/json"},
                body: jsonData
            })
            .then(response => response.json())
            .then(data => {
                if(data.error) {
                    document.getElementById('errDiv').innerText = data.error;
                }
                else if(data.success) {
                    window.location.href = "theCalculator.php";
                }
                else if(data.msg){
                    document.getElementById('msgDiv').innerText = data.msg;
                }
            })
        });
    </script>
</html>