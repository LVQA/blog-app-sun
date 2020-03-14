<?php 
    $errors = array();
    if (!isset($_POST['signUp'])) {
        $_POST['username']="";    
        $_POST['email']="";
        $_POST['password']="";
        $_FILES['fileToUpload']="";
    }else{
        
        $name=addslashes($_POST['username']);
        $email=addslashes($_POST['email']);
        $password=addslashes($_POST['password']);
        $confirm_password=addslashes($_POST['confirm_password']);
        $hashpw = sha1($password);
        $target_dir = "static/images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $required = array('username','password','email');
        $image_name = basename($_FILES["fileToUpload"]["name"]);

        if ($password !== $confirm_password) {
            $errors[] = "Confirm password bị sai";
        }
        
        if (!$_FILES["fileToUpload"]['tmp_name']){ $errors[] = "Bạn phải upload ảnh";}
        else{
        if(getimagesize($_FILES["fileToUpload"]["tmp_name"]) === false) { $errors[] = "File không phải là ảnh"; } 
        }
        foreach ($required as $field){
            if (empty($_POST[$field])){$errors[] = "Bạn phải điền $field.";}
        }
        $query_email = "SELECT email FROM users WHERE email='$email'";
        $result_email = mysqli_query($cnn,$query_email);
        if (mysqli_num_rows($result_email)==1) {
            $errors[] = "Email đã được sử dụng ";
        }
    
        //upload ảnh 
        if(count($errors) == 0){
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);
            $query = "
                INSERT INTO users (email,password,username,avatar,created_at,updated_at)
                VALUE ('{$email}','{$hashpw}','{$name}','{$image_name}',now(),now())
            ";
             mysqli_query($cnn,$query) or die(mysqli_error($cnn)) ;
            $success= "Đăng ký thành công. Trở vè trang <a href='index.php'> Đăng nhập</a>";
        }
    }
?>