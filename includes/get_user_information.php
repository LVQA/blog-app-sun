<?php
    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];
        $query = "
            SELECT username, avatar, email
            FROM users
            WHERE id = {$user_id}
            ";
        $result = mysqli_query($cnn,$query) or die (mysqli_error($cnn));
        $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
       
    }

?>