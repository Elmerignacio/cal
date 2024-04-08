<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="calculator">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="display" id="display" placeholder="0" readonly>
            <div class="buttons">
                <button type="button" onclick="appendToDisplay('7')">7</button>
                <button type="button" onclick="appendToDisplay('8')">8</button>
                <button type="button" onclick="appendToDisplay('9')">9</button>
                <button type="button" class="operator" onclick="appendToDisplay('/')">/</button>
                <button type="button" onclick="appendToDisplay('4')">4</button>
                <button type="button" onclick="appendToDisplay('5')">5</button>
                <button type="button" onclick="appendToDisplay('6')">6</button>
                <button type="button" class="operator" onclick="appendToDisplay('*')">*</button>
                <button type="button" onclick="appendToDisplay('1')">1</button>
                <button type="button" onclick="appendToDisplay('2')">2</button>
                <button type="button" onclick="appendToDisplay('3')">3</button>
                <button type="button" class="operator" onclick="appendToDisplay('-')">-</button>
                <button type="button" onclick="appendToDisplay('0')">0</button>
                <button type="button" onclick="appendToDisplay('.')">.</button>
                <button type="button" class="operator" onclick="appendToDisplay('+')">+</button>
                <button type="button" class="C" onclick="clearDisplay()">C</button>
                <button type="submit" class="sub" name="submit" class="operators">=</button>
            </div>
        </form>

        
        <?php
        // Check if the form has been submitted
        if (isset($_POST['submit'])) {
        // Retrieve the expression entered by the user from the form input field named 'display'
        $expression = $_POST['display'];
        // Initialize the variable $result to store the result of the expression evaluation
        $result = null;

        // Check if the expression entered by the user is not empty
        if (!empty($expression)) {
        // Try evaluating the expression using the eval() function
        try {
        // Evaluate the expression and store the result
         $result = eval('return (' . $expression . ');');
        // Check if the result is false (indicating a syntax error)
        if ($result === false) {
        // Throw an exception with a message in-dicating a syntax error
        throw new Exception('Syntax Error');
        }
        } catch (Throwable $e) {
        // Catch any exceptions or errors that occur during evaluation
         // Display an alert with the error message using JavaScript
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
        // Check if the result is not null
        if ($result !== null) {
        // Update the value of the display input field with the result using JavaScript
         echo "<script>document.getElementById('display').value = $result;</script>";
        }
        }
        }
        ?>
        </div>

    <script>
        // Function to append a value to the display
        function appendToDisplay(value) {
        // Retrieve the display element by its ID
        document.getElementById("display").value += value;
        }

        // Function to clear the display
        function clearDisplay() {
        // Retrieve the display element by its ID and set its value to an empty string
        document.getElementById("display").value = '';
        }
    </script>

</body>
</html>