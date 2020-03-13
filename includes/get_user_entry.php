<?php

$query = "SELECT et.title, et.body, et.created_at, u.username,u.avatar, et.entry_id
FROM entries et
INNER JOIN users u ON u.id = et.user_id 
WHERE u.id = '{$user_id}'
ORDER BY et.created_at DESC ";
$result = mysqli_query($cnn,$query) or die(mysqli_error($cnn));

$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);


?>
