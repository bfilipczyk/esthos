<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title> LOGIN PAGE </title>
</head>
<body>
    <div class="container">
        <div class="logo-login">
            <img src="public/img/logo.png" alt="logo" >
        </div>
        <div class="login-container">
            <form class="login" action="login" method="post">
                <div class="messages">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo "<p style='color: #D1BFBF;text-align: center ' >".$message."</p>";
                        }
                    }
                    ?>
                </div>
                <label>
                    <input class="login-input" name="email" type="text" placeholder="email@gmail.com">
                </label>
                <label>
                    <input class="login-input" name="password" type="password" placeholder="password">
                </label>
                <button type="submit">LOGIN</button>
            </form>
        </div>
    </div>
</body>