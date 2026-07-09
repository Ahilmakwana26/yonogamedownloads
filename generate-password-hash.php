<?php
/**
 * Password Hash Generator
 * Usage: Run this script to generate a secure password hash for admin accounts
 */

// Set your desired password here
$password = 'your_password_here';

// Generate the hash (using PASSWORD_DEFAULT (bcrypt)
$hash = password_hash($password, PASSWORD_DEFAULT);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Hash Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        .container {
            background: #f5f5f5;
            padding: 30px;
            border-radius: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .result {
            margin-top: 30px;
            padding: 20px;
            background: #e8f5e9;
            border-radius: 5px;
        }
        .hash {
            background: white;
            padding: 15px;
            border-radius: 5px;
            font-family: monospace;
            word-break: break-all;
            margin-top: 10px;
            border: 1px solid #ddd;
        }
        .copy-btn {
            background: #2196F3;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Password Hash Generator</h1>
        
        <form method="POST">
            <div class="form-group">
                <label for="password">Enter Password:</label>
                <input type="text" id="password" name="password" placeholder="Enter your password here" required>
            </div>
            <button type="submit">Generate Hash</button>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['password'])): ?>
            <div class="result">
                <h3>Generated Password Hash:</h3>
                <div class="hash" id="hashOutput"><?php echo htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT)); ?></div>
                <button class="copy-btn" onclick="copyHash()">Copy to Clipboard</button>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function copyHash() {
            const hashText = document.getElementById('hashOutput').textContent;
            navigator.clipboard.writeText(hashText).then(function() {
                alert('Hash copied to clipboard!');
            }, function(err) {
                console.error('Copy failed:', err);
            });
        }
    </script>
</body>
</html>
