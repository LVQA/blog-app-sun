<?php
            $query = "SELECT et.title, et.body, et.created_at, u.username,u.avatar
                    FROM entries et
                    INNER JOIN users u ON u.id = et.user_id 
                    WHERE et.publiced = true
                    ORDER BY et.created_at DESC ";
                    $result = mysqli_query($cnn,$query) or die(mysqli_error($cnn));

                    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

                   
        ?>