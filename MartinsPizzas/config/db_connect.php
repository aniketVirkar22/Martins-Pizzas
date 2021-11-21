<?php 

    // connecting to db
    $conn = mysqli_connect('localhost','admin','test123','martins_pizza');

    // checking connection
    if(!$conn){
        echo 'Connection error:'. mysqli_connect_error();
    }

?>