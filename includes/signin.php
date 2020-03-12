<?php 
    if(isset($_COOKIE['token'])){
        $token = $_COOKIE['token'];
        $query = "
            SELECT * 
            FROM users 
            WHERE token = '$token'
        ";
        $result = mysqli_query($cnn,$query)or die(mysqli_error($cnn));
        if (mysqli_num_rows($result)==1) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $id_user = $row['id'];
                $_SESSION['email']= $row['email'];
                header("location: dashboard.php?id=$id_user");
            }
        } 
    }
    
        if(!isset($_POST["login"])){
            $_POST["password"] ="";
            $_POST["email"] ="";
            $_POST['remember_me']="";
        }else{
            // khai báo biến 
            $password = mysqli_real_escape_string($cnn,$_POST["password"]);
            $email = mysqli_real_escape_string($cnn,$_POST["email"]) ;
            $hashpw = sha1($password);
            $required = array('email','password');
            foreach ($required as $fieldname) {
                if (!$password || !$email) {
                    $errors[] = "Không được bỏ trống trường <b>{$fieldname}.</b>";
                }
            }
            
            if(empty($errors)){
    
                $query ="
                    SELECT * FROM users
                    WHERE email='$email'
                    AND password='$hashpw'
                    LIMIT 1
                ";
                
                $result = mysqli_query($cnn,$query) or die(mysqli_error($cnn));
                if (mysqli_num_rows($result)==1) {
                    if (isset($_POST['remember_me'])) {
                        if($_POST['remember_me']== "yes"){
                            $date = new dateTime();
                            $timeString = $date->format('Y-m-d H:i:s');
                            $string = $email.$password.$timeString;
                            $token = sha1($string);
                            $queryToken ="
                                UPDATE users SET token = '$token'
                                WHERE email='$email'
                            ";
                             mysqli_query($cnn,$queryToken) or die(mysqli_error($cnn));
                            setcookie('token',$token,time()+(86400*30));
                        }
                    }
                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
    
                         $_SESSION['email']= $row['email'];
                         $id_user = $row['id'];
                         header("location: dashboard.php?id=$id_user");
                    }
                }else{
                    $errors[] = "Tài khoản hoặc mật khẩu không đúng";
                }
                
            }
        }
?>