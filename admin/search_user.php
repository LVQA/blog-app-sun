<?php include('../database/database.php') ?>
<?php include('../includes/get_user.php')?>
<?php require_once('../includes/header.php') ?>
    <title>Blog App| Search user </title>
    <link rel="stylesheet" href="../static/css/search_user.css">
</head>
<body>
    <div class="container">
    <!-- navbar -->
    <?php require_once('../includes/nav.php') ?>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
        <div class="card form-search">
            <form action="" method="post">
            <input type="email" name="email" placeholer="email" id="" class="search-fiel">
            <input type="submit" value="Search" name="search">
            </form>
        </div>

        <?php foreach ($users as $user) { ?>
            <?php $check_follow = checkFollow($user_id,$user['id'])?>
                    <div class="card user-infor">
                    
                        <img class="avatar" src="<?php echo BASE_URL."static/images/".$user['avatar'] ?>" width="100px" alt="">

                    <div class="detail">
                    <div class="title">
                    <h3 class="name"><?php echo $user['username'] ?></h3>
                    <span>
                        <a href="<?php echo BASE_URL."admin/search_user.php?id=".$_GET['id']."&".$check_follow."=".$user['id'] ?>" class="btn <?php echo $check_follow ?> "><?php echo $check_follow ?></a>
                    </span>
                    </div>
                    <p>
                        Email: <?php echo $user['email'] ?>
                        | Follower
                    </p>
                    </div>
                    </div>
       <?php  } //end foreach?>
    </div>
    <!-- end content -->
    </div>
</body>
</html>