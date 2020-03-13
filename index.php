<?php include('database/database.php') ?>
<?php include('includes/signin.php') ?>
<?php require_once('includes/header.php') ?>
    <title>Blog App</title>

</head>
<body>
    <div class="container">
    <!-- navbar -->
    <?php require_once('includes/nav.php') ?>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
    <?php include('includes/get_public_entry.php') ?>
    <?php  foreach ($posts as $post) { ?>
        <div class="card ">
            <div class="entry-card">
            <div class="title"><h2><?php echo $post['title'] ?></h2></div>
            <div class="body">
                <p class="entry-content">
                    <?php echo $post['body'] ?>
                </p>
                <hr>
            </div>
            <div class="detail">
                 
                 Xuất bản vào: <?php echo $post['created_at'] ?>
                 bởi 
                 <img class="avatar" width="20px" src="static/images/<?php echo $post['avatar'] ?>" alt="">    
                        <h4 class="author"><?php echo $post['username'] ?></h4>
                 
            </div>
            </div>
            
        </div>
   <?php } ?>
        

    </div>
    <!-- end content -->
    </div>
</body>
</html>