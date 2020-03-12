<?php include('database/database.php') ?>
<?php include('includes/signin.php') ?>
<?php require_once('includes/header.php') ?>
    <title>Blog App</title>
    <link rel="stylesheet" href="static/css/login.css">
</head>
<body>
    <div class="container">
    <!-- navbar -->
    <?php require_once('includes/nav.php') ?>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
        <div class="wrap">
                <div class="card login-card">
                    <h2> Đăng nhập</h2>
                <form action="" method="post">  
                    <input type="text" name="email" placeholder="Email" class="fiel">
                    <input type="password" name="password" class="fiel" placeholder="Password">
                    <input type="checkbox" name="remember_me" id="remember_me" value="yes" ><label for="remember_me"> Remember me</label>
                    <div class="fiel none-border">
                        <button type="submit" name="login" class="button ">Submit</button>
                        <a href="signup.php" class="button " >Sign Up</a>
                    </div>
                </form>
                </div>

            <div class="err">
                <?php
                if(!empty($errors)){
                    echo "<ul>";
                    foreach($errors as $error){
                        echo"<li>{$error}</li>";
                    }
                    echo"</ul>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- end content -->
    </div>
</body>
</html>