<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/main_style.css">

</head>

<body class="container py-4">
    <button class="btn btn-danger" onclick="logout()">Kijelentkezés</button>
    <div class="foDiv">

        <div class="calculator">
            <div class="display" id="display">0</div>
            <div class="buttons">
                <button id="calcButton" class="clear" onclick="clearDisplay()">C</button>
                <button id="calcButton" class="operator" onclick="appendOperator('/')">/</button>
                <button id="calcButton" class="operator" onclick="appendOperator('*')">×</button>
                <button id="calcButton" class="number" onclick="appendNumber('7')">7</button>
                <button id="calcButton" class="number" onclick="appendNumber('8')">8</button>
                <button id="calcButton" class="number" onclick="appendNumber('9')">9</button>
                <button id="calcButton" class="operator" onclick="appendOperator('-')">-</button>
                <button id="calcButton" class="number" onclick="appendNumber('4')">4</button>
                <button id="calcButton" class="number" onclick="appendNumber('5')">5</button>
                <button id="calcButton" class="number" onclick="appendNumber('6')">6</button>
                <button id="calcButton" class="operator" onclick="appendOperator('+')">+</button>
                <button id="calcButton" class="number" onclick="appendNumber('1')">1</button>
                <button id="calcButton" class="number" onclick="appendNumber('2')">2</button>
                <button id="calcButton" class="number" onclick="appendNumber('3')">3</button>
                <button id="calcButton" class="operator" onclick="deleteLast()">⌫</button>
                <button id="calcButton" class="number zero" onclick="appendNumber('0')">0</button>
                <button id="calcButton" class="equals" onclick="calculate()">=</button>
            </div>
        </div>
    </div>


    <div style="display: none;">
        <h1>Felhasználók kezelése</h1>
        <div id="userActions" class="mb-4">
            <button class="btn btn-primary" onclick="loadUsers()">Felhasználók listázása</button>
            <button class="btn btn-success" onclick="addUserInt()">Felhasználók Hozzáadás</button>
            <button class="btn btn-danger" onclick="logout()">Kijelentkezés</button>
        </div>



        <div id="userAddInt" class="mb-4"
            style="display: none;padding: 20px;box-shadow: gray 0px 5px 5px 2px;border-radius: 20px;">
            <h3>Felhasználók Hozzáadás</h3>
            <form id="regForm">
                <div class="mb-3">
                    <label>Név:</label>
                    <input type="text" class="form-control" id="labName">
                </div>
                <div class="mb-3">
                    <label>Email:</label>
                    <input type="email" class="form-control" id="labEmail">
                </div>
                <div class="mb-3">
                    <label>Jelszó:</label>
                    <input type="password" class="form-control" id="labPassword">
                </div>
                <button type="submit" class="btn btn-success" onclick="addUser()">Hozzáad</button>
            </form>
        </div>

        <div id="usersTable"></div>
    </div>


</body>

<script>
    function loadUsers() {
        fetch('users.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ muvelet: "list" })
        })
            .then(res => res.json())
            .then(data => {
                if (data.error) return alert(data.error);
                let html = '<div id="usersTable" class="table-responsive" style="padding: 20px;box-shadow: gray 0px 5px 5px 2px;border-radius: 20px;"><table class="table table-bordered"><thead><tr><th>ID</th><th>Név</th><th>Email</th><th>Művelet</th></tr></thead><tbody>';
                data.forEach(user => {
                    html += `<tr>
                        <td>${user.id}</td>
                        <td><input class="form-control" value="${user.username}" id="name-${user.id}" disabled></td>
                        <td><input class="form-control" value="${user.email}" id="email-${user.id}" disabled></td>
                        <td>
                            <button class="btn btn-sm btn-warning" onclick="editUser(${user.id})" id="btn-${user.id}">Szerkesztés</button>
                            <button class="btn btn-sm btn-danger" onclick="deleteUser(${user.id})">Törlés</button>
                        </td>
                    </tr>`;
                });
                html += '</tbody></table></div>';
                document.getElementById('usersTable').innerHTML = html;
            });
    }

    function editUser(id) {
        document.getElementById(`email-${id}`).disabled = false;
        document.getElementById(`name-${id}`).disabled = false;
        document.getElementById(`btn-${id}`).innerHTML = "Mentés";
        document.getElementById(`btn-${id}`).onclick = () => saveUser(id);
    }

    function saveUser(id) {
        const name = document.getElementById(`name-${id}`).value;
        const email = document.getElementById(`email-${id}`).value;


        fetch('users.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ muvelet: "edit", id, name, email })
        })

            .then(res => res.json())
            .then(data => {
                alert(data.success || data.error)
                document.getElementById(`email-${id}`).disabled = true;
                document.getElementById(`name-${id}`).disabled = true;
                document.getElementById(`btn-${id}`).innerHTML = "Szerkesztés";
            });

    }

    function deleteUser(id) {
        if (!confirm("Biztosan törlöd?")) return;
        fetch('users.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ muvelet: "delete", id })
        })
            .then(res => res.json())
            .then(data => {
                alert(data.success || data.error);
                loadUsers();
            });
    }

    function logout() {
        fetch('logout.php', {
            method: 'GET',
            headers: { 'Content-Type': 'application/json' }
        })
            .then(location.href = 'login.php');
    }

    function addUserInt() {
        document.getElementById('userAddInt').style.display = 'block';
        document.getElementById('labName').value = "";
        document.getElementById('labEmail').value = "";
        document.getElementById('labPassword').value = "";
    }

    function addUser() {

        const jsonData = JSON.stringify({
            name: document.getElementById('labName').value,
            email: document.getElementById('labEmail').value,
            password: document.getElementById('labPassword').value,
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
                    window.alert("Sikertelen felhasználó hozzáadás.");
                }
                else if (data.msg) {
                    window.alert("Sikeres felhasználó hozzáadás.");
                }
            });
    }



    //számoló

    let display = document.getElementById('display');
    let currentInput = '0';
    let shouldResetDisplay = false;

    function updateDisplay() {
        display.textContent = currentInput;
    }

    function appendNumber(num) {
        if (shouldResetDisplay) {
            currentInput = num;
            shouldResetDisplay = false;
        } else {
            if (currentInput === '0' && num !== '.') {
                currentInput = num;
            } else {
                if (num === '.' && currentInput.includes('.')) {
                    return;
                }
                currentInput += num;
            }
        }
        updateDisplay();
    }

    function appendOperator(op) {
        const lastChar = currentInput[currentInput.length - 1];
        if (['+', '-', '*', '/'].includes(lastChar)) {
            currentInput = currentInput.slice(0, -1) + op;
        } else {
            currentInput += op;
        }
        shouldResetDisplay = false;
        updateDisplay();
    }

    function clearDisplay() {
        currentInput = '0';
        shouldResetDisplay = false;
        updateDisplay();
    }

    function deleteLast() {
        if (currentInput.length > 1) {
            currentInput = currentInput.slice(0, -1);
        } else {
            currentInput = '0';
        }
        updateDisplay();
    }

    function calculate() {
        try {
            const result = eval(currentInput);
            currentInput = result.toString();
            shouldResetDisplay = true;
            updateDisplay();
        } catch (error) {
            currentInput = 'Error';
            shouldResetDisplay = true;
            updateDisplay();
        }
    }

</script>

</html>