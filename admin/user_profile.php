<?php include('../database/database.php') ?>
<?php include('../includes/get_user_information.php') ?>
 <?php  include('../includes/delete_user_entry.php') ?> 
<?php require_once('../includes/header.php') ?>
    <title>Blog App | User profile</title>
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
    <?php include('../includes/get_user_entry.php') ?>
    <?php  foreach ($posts as $post) { ?>
        <div class="card ">
            <div class="entry-card">
            <div class="title">
            <span class="">
            <a href="<?php echo BASE_URL.'admin/update_user_entry.php?id='.$_GET['id'].'&update_entry='.$post['entry_id'] ?>" class="fa fa-edit btn edit"></a> 
            <a class="fa fa-trash btn delete" href="<?php echo BASE_URL.'admin/user_profile.php?id='.$_GET['id'].'&delete_entry='.$post['entry_id'] ?>"></a></span>    
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
   <?php } ?>
        

    </div>
    <!-- end content -->
    </div>
</body>
</html>