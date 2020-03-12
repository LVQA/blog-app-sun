<?php include('database/database.php') ?>
<?php include('includes/register.php') ?>
<?php require_once('includes/header.php') ?>
    <title>Blog App</title>
    <link rel="stylesheet" href="static/css/sign_up.css">
</head>
<body>
    <div class="container">
    <!-- navbar -->
    <?php require_once('includes/nav.php') ?>
    <!-- end navbar -->
    <!-- content -->
        <div class="content">
            <div class="wrap">
                <div class="card sign-up-card">
                    <h2>Đăng ký</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="text" name="username" placeholder="Username" class="fiel">
                        <input type="email" name="email" id="email" placeholder="Email" class="fiel">
                        <input type="password" name="password" placeholder="Password" class="fiel">
                        <input type="password" name="confirm_password" placeholder="Confirm Password" class="fiel">
                        <input type="file" name="fileToUpload" id="fileToUpload" class="fiel none-border">
                        <div class="fiel none-border">
                        <input type="submit" value="Sign Up" name="signUp" >
                        <a href="index.php" class="button">Back</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="status">
                <?php
                    if (!empty($errors)) {
                    echo "<ul>";
                    foreach ($errors as $error) {
                        echo "<li>{$error}</li>";
                    }
                    echo "</ul>";
                    }
                    if (!empty($success)) {
                    echo $success;
                    }
                ?>
            </div>
        </div>
    <!-- end content -->
    </div>
</body>
</html>