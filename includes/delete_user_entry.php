<?php 
    if (isset($_GET['delete_entry'])) {
        $entry_id = $_GET['delete_entry'];

        $query = "
            DELETE FROM `entries` WHERE entry_id = '$entry_id'
        ";
         mysqli_query($cnn,$query) or die(mysqli_error($cnn));
    }

?>