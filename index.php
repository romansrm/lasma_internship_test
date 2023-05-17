<?php

include 'connection.php';

$sql = "SELECT * FROM tasks";
$all_tasks = $CONN->query($sql);

?>



<!DOCTYPE html>
<html lang="en">
        <meta charset="UTF-8">
            <title>Page Title</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="">

    <body>
        <div class="">
            <button class = "addButton"> + </button>

            <form action = "./upload.php" method = "post">

                <label> starting-date</label>

                <label> Virsraksts</label>
                <input type = "text" name = "title"> 

                <label> end-date</label>
                <input type = "date" name = "end-date">
                <input type = "time" name = "end-time">
                <label> Description</label>
                <input type = "text" name = "description"> 

                <button type="submit" name="submit"> confirm </button>

            </form>
            
            <?php
                while($row = mysqli_fetch_assoc($all_tasks)){ 

                    date_default_timezone_set('Europe/Riga');
                    $currentDateTime = date('Y-m-d H:i:s');

                    $endDateTime = $row["end-date"];

                    if ($row["completed"] == 1 || $endDateTime < $currentDateTime) {
                        continue;
                    }
            ?>
            <div>
                <label name = "title"><?php echo $row["title"] ?></label>
                <label name = "description"><?php echo $row["description"] ?></label>
                <label name = "start-date"><?php echo date('Y-m-d H:i', strtotime($row["start-date"])) ?></label>
                <label name = "end-date"><?php echo date('Y-m-d H:i', strtotime($row["end-date"])) ?></label>

                <form method="post" action="./delete.php">
                    <input type="hidden" name="task_id" value="<?php echo $row["ID"]; ?>">
                    <input type="submit" name="delete" value="Delete">
                </form>
                <form method="post" action="./edit.php">
                    <input type="hidden" name="task_id" value="<?php echo $row["ID"]; ?>">
                    <input type="submit" name="edit" value="Edit">
                </form>
                <form method="post" action="./complete.php">
                        <input type="hidden" name="task_id" value="<?php echo $row["ID"]; ?>">
                        <input type="submit" name="complete" value="Complete">
                </form>

            </div>
            <?php
                }
            ?>

        </div>
    </body>
</html>

