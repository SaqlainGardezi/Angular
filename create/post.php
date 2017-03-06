<?php
   /*
   * Collect all Details from Angular HTTP Request.
   */ 

$conn = new mysqli("localhost", "root", "", "testing");



    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$fname = $request->fname;
    @$lname = $request->lname;


    $sql = "INSERT INTO `testing`.`table_user` (`first_name`, `last_name`) VALUES ('$fname', '$lname')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>