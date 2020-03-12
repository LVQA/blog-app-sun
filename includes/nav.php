<?php 
$rememberMe = false;
 
if (isset($_GET['id'])) {
        
        $user_id = $_GET['id'];
        $query_token = "
                SELECT token 
                FROM users 
                WHERE ID = '$user_id'
            ";
            $result_token = mysqli_query($cnn,$query_token)or die(mysqli_error($cnn));
            if (mysqli_num_rows($result_token)==1) {
                while($row = mysqli_fetch_array($result_token, MYSQLI_ASSOC)){
                    $token = $row['token'];   
                }
            }
        if (isset($_SESSION['email'])) {$rememberMe = true;}
        if (isset($_COOKIE['tooken'])) {
            if ($_COOKIE['token'] == $token) {$rememberMe = true;}else{$rememberMe = false;}
        }

        if ($rememberMe == true) {
        $query = "
            SELECT email, username, avatar
            FROM users 
            WHERE ID = '$user_id'
            LIMIT 1
        ";
        $result = mysqli_query($cnn, $query) or die(mysqli_error($cnn));
    
        if (mysqli_num_rows($result)==1) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $email = $row['email'];
                $name = $row['username'];
                $avatar = $row['avatar'];
            }
        }  ?>
         <nav>
            <div class="wrap">
            <div class="logo">
                <h1><a href="index.php?id=<? echo $user_id?>">Blog App</a></h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">Xin chào <span><img width="20px" src="static/images/<?php echo $avatar ?>" alt=""></span> <?php echo $name ?></a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="includes/logout.php">Logout</a></li>
                </ul>
            </div>
            </div>
        </nav>
     <?php   }
       

 } 
    
 else{ ?>
        <nav>
            <div class="wrap">
            <div class="logo">
                <h1><a href="index.php">Blog App</a></h1>
            </div>
            <div class="login-index">
                <form action="" method="post">
                    <input type="text" name="email"  >
                    <input type="password" name="password" >
                    <input type="submit" value="login" name="login">
                    <span><a href="signup.php">Sign Up</a></span>
                </form>
                
                    
                
            </div>
            </div>
        </nav>
 <?php }  ?>
