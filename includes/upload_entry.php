<?php 

    if (isset($_POST['upload'])) {
        $title = addslashes($_POST['title']);
        $body = addslashes($_POST['body']);
        $publiced = $_POST['publiced'];
        $user_id = $_GET['id'];
        
        $query = "INSERT INTO entries ( title, body, created_at, user_id, publiced) 
                    VALUES ('{$title}', '{$body}',now(), '{$user_id}','{$publiced}')";
        mysqli_query($cnn,$query) or die(mysqli_error($cnn));

        $success = "Đã up load entry thành công";
    }
    
?>
<div class="card upload-entry-card">
    <form action="" method="post">
        <input type="text" class="fiel" name="title" placeholder="Tile" >
        <textarea name="body" id="" cols="60" rows="4" class="fiel" placeholder="Nội dung bài viết"></textarea>
        <select name="publiced" id="">
            <option value="1" selected>Publiced</option>
            <option value="0" >Private</option>
        </select>
        <input type="submit" value="upload" name="upload">
       
    </form>
    <div class="status">
        <?php if (isset($success)) {
            echo $success;
        } ?>
    </div>
</div>
