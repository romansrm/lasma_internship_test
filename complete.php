<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['complete'])) {

    $task_id = $_POST['task_id'];

    $sql   = "UPDATE `tasks` SET `completed` = 1 WHERE `ID` = '$task_id'";
    $query = mysqli_query($CONN, $sql);

    if ($query) {

        header("Location: http://localhost/lasma_test/index.php");
        die();

    } else {
        $errorMessage = "Error updating task: " . mysqli_error($CONN);
        echo $errorMessage;
    }
}
?>
