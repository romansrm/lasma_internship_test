<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $task_id = $_POST['task_id'];

    $sql    = "SELECT * FROM `tasks` WHERE `ID` = '$task_id'";
    $result = mysqli_query($CONN, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        ?>
        <form method="post" action="update.php">
            <input type="hidden" name="task_id" value="<?php echo $row["ID"]; ?>">
            
            <label>Title:</label>
            <input type="text" name="title" value="<?php echo $row["title"]; ?>"><br>
            <label>Description:</label>
            <input type="text" name="description" value="<?php echo $row["description"]; ?>"><br>
            <label>End Date:</label>
            <input type="date" name="end-date" value="<?php echo $row["end-date"]; ?>">
            <input type="time" name="end-time" value="<?php echo $row["end-date"]; ?>"><br>
            <input type="submit" name="update" value="Update">
        </form>
        <?php
    } else {
        $errorMessage = "Error retrieving task record: " . mysqli_error($CONN);
        echo $errorMessage;
    }
}

?>
