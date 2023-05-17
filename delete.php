<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $task_id = $_POST['task_id'];

    $sql   = "DELETE FROM `tasks` WHERE `ID` = '$task_id'";
    $query = mysqli_query($CONN, $sql);

    if ($query) {

        header("Location: http://localhost/lasma_test/index.php");
        die();

    } else {
        $errorMessage = "Error deleting task: " . mysqli_error($CONN);
        echo $errorMessage;
    }
}

?>

