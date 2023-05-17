<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    date_default_timezone_set('Europe/Riga');
    

    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['end-date'])) {

        $title         = $_POST["title"];
        $description   = $_POST['description'];
        $enddate       = $_POST['end-date'];
        $endtime       = $_POST['end-time'];
        $completed     = 0;
        $enddatetime   = date('Y-m-d H:i:s', strtotime("$enddate $endtime"));
        $startdatetime = date('Y-m-d H:i:s'); 

        
        $sql   = "INSERT INTO `tasks` (`title`, `description`, `end-date`, `start-date`, `completed`) VALUES ('$title', '$description', '$enddatetime', '$startdatetime', '$completed')";
        $query = mysqli_query($CONN, $sql);


        if ($query) {
            
            header("Location: http://localhost/lasma_test/index.php");
            die();

        } else {
            $errorMessage = "Error inserting data: " . mysqli_error($CONN);
            echo $errorMessage;
        }

    } else {
        echo "Please provide all the required fields.";
    }
}
?>
