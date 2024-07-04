<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="index.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            
            $errors = [];

            // Username validation
            if (empty($username)) {
                $errors[] = 'Username is required.';
            } elseif (strlen($username) < 5 || strlen($username) > 15) {
                $errors[] = 'Username must be between 5 and 15 characters.';
            }

            // Email validation
            if (empty($email)) {
                $errors[] = 'Email is required.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Invalid email format.';
            }

            // Password validation
            if (empty($password)) {
                $errors[] = 'Password is required.';
            } elseif (strlen($password) < 8) {
                $errors[] = 'Password must be at least 8 characters long.';
            }

            // Display errors
            if (!empty($errors)) {
                echo '<ul class="errors">';
                foreach ($errors as $error) {
                    echo '<li>' . htmlspecialchars($error) . '</li>';
                }
                echo '</ul>';
            } else {
                // Process the form (e.g., save to database)
                echo '<p>Registration successful!</p>';
            }
        }
        ?>
    </div>
</body>
</html>
