<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "km_falcatan12";
        $database = "crud";

        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM clients WHERE id=$id";
        $connection->query($sql);
    }

        header("location: /Crud/index.php");
        exit;
?>