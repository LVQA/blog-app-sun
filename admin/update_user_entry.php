<?php include('../database/database.php') ?>
<?php include('../includes/get_user_information.php') ?>
<?php
    if (isset($_GET['update_entry'])) {
        $entry_id = $_GET['update_entry'];
        
        $query = "SELECT title, body, created_at, publiced
                    FROM entries 
                    WHERE entry_id = '$entry_id'";
        $result = mysqli_query($cnn, $query) or die(mysqli_error($cnn));

        $value = mysqli_fetch_array($result,MYSQLI_ASSOC);

        
        
    }
    if (isset($_POST['upload'])) {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $publiced = $_POST['publiced'];

        $query = "UPDATE entries SET title = '$title', body = '$body', created_at = now(), publiced = '$publiced' where entry_id = $entry_id ";
        mysqli_query($cnn,$query) or die(mysqli_error($cnn));
        $link = BASE_URL.'admin/user_profile.php?id='.$_GET['id'];
        echo $link;
        header("Location:{$link}");
    }
?>
<?php require_once('../includes/header.php') ?>
    <title>Blog App | User update entry</title>
    <link rel="stylesheet" href="../static/css/user_profile.css">
</head>
<body>
    <div class="container">
    <!-- navbar -->
    <?php require_once('../includes/nav.php') ?>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
    <!-- banner -->
    <div class="banner">
        <div class="infor">
            <div class="avatar">
            <img src="<?php echo BASE_URL."static/images/".$user['avatar'] ?>" width="150px" alt="">
            </div>
            <div class="name">
            <h3><?php echo $user['username'] ?></h3>
            
            <p>
                Email: <?php echo $user['email'] ?>
               | Follower: 
            </p>
            </div>
            
        </div>
    </div>
    <!-- end banner -->
               
     <div class="card upload-entry-card">
    <form action="" method="post">
        <input type="text" class="fiel" name="title" placeholder="Tile" value="<?php echo $value['title'] ?>">
        <textarea name="body" id="" cols="60" rows="4" class="fiel" placeholder="Nội dung bài viết"><?php echo $value['body'] ?></textarea>
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

    </div>
    <!-- end content -->
    </div>
</body>
</html>