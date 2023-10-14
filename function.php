<?php

function get_office_attendance_count() {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "tms");

    
    $student_id = mysqli_real_escape_string($connection, $_SESSION['no_of_attendance']);

    $query = "SELECT COUNT(*) as office_attendance_count FROM attendance WHERE student_id = $student_id";
    $query_run = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($query_run);
    $office_attendance_count = $row['office_attendance_count'];

    return $office_attendance_count;
}
?>