<?php $user_id = $_GET['id'] ?>
<?php   
        
        if (isset($_POST['search'])) {
            $email = $_POST['email'];

            $query = "SELECT ur.username, ur.email, ur.avatar, ur.id
                    FROM users ur 
                    WHERE email = '$email'";
            $result = mysqli_query($cnn, $query) or die(mysqli_erorr($cnn));

            $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
            
        }else{
            $query = "SELECT username, email, avatar, id
                    FROM users WHERE id <> '$user_id'";
            $result = mysqli_query($cnn, $query) or die(mysqli_erorr($cnn));

            $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
            
        }

        if (isset($_GET['follow'])) {
            $follower_id = $_GET['follow'];   
            $query="INSERT INTO follow(user_id, follower_id) VALUES ('$user_id','$follower_id')";
            mysqli_query($cnn,$query) or die(mysqli_erorr($cnn));
            checkFollow($user_id,$follower_id);
        }
        if (isset($_GET['unfollow'])) {
            $follower_id = $_GET['unfollow'];   
            $query="DELETE FROM follow WHERE user_id = '$user_id' AND follower_id = $follower_id";
            mysqli_query($cnn,$query) or die(mysqli_erorr($cnn));
            checkFollow($user_id,$follower_id);
        }


        function checkFollow($user_id,$follower_id){
            global $cnn; 
            $check = "follow";
            $query="SELECT ur.id FROM users ur 
                    LEFT JOIN follow fl ON ur.id=fl.follower_id
                    WHERE fl.user_id = '$user_id'";
            $result = mysqli_query($cnn,$query) ;
            $followers = mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach ($followers as $follower) {
                if ($follower['id'] == $follower_id) {
                    $check = "unfollow";
                }
            }
            return $check;
        }     
        
?>