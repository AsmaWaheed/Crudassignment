<?php

$conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection failed");

// Check if the action parameter is set
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'insert') {
        if (isset($_POST['sname'], $_POST['saddress'], $_POST['sclass'], $_POST['sphone'])) {
            $stu_name = $_POST['sname'];
            $stu_address = $_POST['saddress'];
            $stu_class = $_POST['sclass'];
            $stu_phone = $_POST['sphone'];

            $sql = "INSERT INTO student (sname, saddress, sclass, sphone) VALUES ('$stu_name', '$stu_address', '$stu_class', '$stu_phone')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "Data inserted successfully.";
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
        }
    
    }

mysqli_close($conn);
?>