<?php include('database/database.php') ?>
<?php require_once('includes/header.php') ?>
    <title>Blog App| Admin page </title>

</head>
<body>
    <div class="container">
    <!-- navbar -->
    <?php require_once('includes/nav.php') ?>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
    <?php include('includes/upload_entry.php') ?>
    <?php 
        $query = "SELECT ur.username, ur.avatar, ur.email, et.title, et.body, et.created_at
                    FROM users ur 
                    JOIN entries et ON ur.id = et.user_id
                    WHERE ur.id in (SELECT follower_id From follow where user_id = '$user_id')
                    AND et.publiced = true
                    ORDER BY et.created_at DESC";
        $result = mysqli_query($cnn,$query) or die(mysqli_erorr($cnn));
        $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach ($posts as $post) {
    ?>
             <div class="card ">
            <div class="entry-card">
            <div class="title">
            <h2><?php echo $post['title'] ?></h2>
            
            </div>
            <div class="body">
                <p class="entry-content">
                    <?php echo $post['body'] ?>
                </p>
                <hr>
            </div>
            <div class="detail">
                 
                 Xuất bản vào: <?php echo $post['created_at'] ?>
                 bởi 
                 <img class="avatar" width="20px" src="<?php echo BASE_URL."static/images/".$post['avatar'] ?>" alt="">    
                        <h4 class="author"><?php echo $post['username'] ?></h4>
                 
            </div>
            </div>
            
        </div>
    <?php  } // end foreach ?>
    </div>
    <!-- end content -->
    </div>
</body>
</html>