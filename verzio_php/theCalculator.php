<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/main_style.css">
    <title>-bermegagiganiga-Sz-mol-g-p</title>
</head>

<body>
    <div class="navbar">
        <button class="login">Login</button>
    </div>
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



</body>
<script>
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