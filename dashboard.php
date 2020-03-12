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
    </div>
    <!-- end content -->
    </div>
</body>
</html>