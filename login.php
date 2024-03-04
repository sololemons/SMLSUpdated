<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: Dashboards.html");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>  
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
<link rel="stylesheet" href="login.css">
</head>
<body>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <div class="container">
            <div class="left form">
                <h1>Smart Laundry</h1>
                <h2>Register your Service</h2>
                <p>Manage laundry orders and track their <br> progress</p>

                <form method="post">
                    <fieldset>
                    
                    <input type="email" name="email" id="email" placeholder ="email"  value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" class="inputs">
        
                        <input type="password" name="password" id="password" class="inputs" placeholder="Password">
                        <button type="submit" class="btn green">Login</button>
                        <p>Already have an account? <a href="signup.html">Sign up</a></p>
                    </fieldset>
                </form>
            </div>
            <div class="right">
                <img src="./images/login side image.png" alt="image">
            </div>
        </div>
    
</body>
</html>








