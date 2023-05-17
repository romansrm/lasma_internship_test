<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {

    if(isset($_POST['task_id'])) {

        $task_id      = $_POST['task_id'];
        $title        = $_POST['title'];
        $description  = $_POST['description'];
        $end_date     = $_POST['end-date'];
        $end_time     = $_POST['end-time'];
        $enddatetime  = date('Y-m-d H:i:s', strtotime("$end_date $end_time"));

        $sql   = "UPDATE `tasks` SET `title` = '$title', `description` = '$description', `end-date` = '$enddatetime' WHERE `id` = '$task_id'";
        $query = mysqli_query($CONN, $sql);

        if ($query) {

            header("Location: http://localhost/lasma_test/index.php");
            die();

        } else {
            $errorMessage = "Error updating task: " . mysqli_error($CONN);
            echo $errorMessage;
        }
    } else {
        echo "Invalid task ID.";
    }
}
?>
