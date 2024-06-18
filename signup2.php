<?php
// Form submission handling
$message = ""; // Initialize an empty variable to hold the message
if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST["confirm_password"];

    // Database connection
    $host = 'localhost';
    $user = 'root';
    $pass = ''; // Define the variable for the database password
    $dbname = 'rishidatabase';

    // Insert data into the database
    $conn = mysqli_connect($host, $user, $pass, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 

    // Echo the message here
    $message = "Connected to DataBase Successfully";

    // SQL query
    $sql = "INSERT INTO eventlogin  VALUES ('$username', '$mobile', '$email', '$country', '$password')";

    if ($conn->query($sql) == true) {
        $message .= " New record created successfully";
    } else {
        $message .= " Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Background color for the entire page */
            background-image: url('data:image/jpeg;base64,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'); /* Background image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            padding: 20px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 22px); /* Adjusting width for input fields */
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"].button,
        a.button {
            width: 100%; /* Adjusted width for buttons */
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4caf50; /* Same background color for both buttons */
            color: #fff; /* Same text color for both buttons */
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }
        input[type="submit"].button:hover,
        a.button:hover {
            background-color: #45a049; /* Hover background color */
        }
        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="signup2.php" method="post" onsubmit="return validatePassword()">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
            <div class="error-message" id="password-error"></div>
            <input type="submit" value="Sign Up" class="button">
            <a href="eventmanage.php" class="button">Login</a>
        </form>
    </div>

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var errorDiv = document.getElementById("password-error");
            if (password !== confirmPassword) {
                errorDiv.textContent = "Passwords do not match";
                return false;
            }
            return true;
        }
    </script>
</body>

</html>

