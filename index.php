<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="tableContainer">
            <div class="addNewBtnContainer">
                <a href='addnew.php'><button class="addNewBtn">Add New</button></a>
            </div>
            <div class="subtableContainer">
                <div class="table">
                    <table>
                        <tr class="row1">
                            <div class="subTable">
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Section</th>
                                <th>Department</th>
                            </div>
                        </tr>
    
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "km_falcatan12";
                            $database = "crud";

                            $connection = new mysqli($servername, $username, $password, $database);

                            if($connection->connect_error){
                                die("Connection failed: " . $connection -> connect_error);
                            }

                            $sql = "SELECT * FROM clients";
                            $result = $connection -> query($sql);

                            if(!$result){
                                die("Invalid Query: " . $connection -> error);
                            }

                            while($row = $result -> fetch_assoc()){
                                echo "
                                    <tr class = 'row2'>
                                        <td>$row[id]</td>
                                        <td>$row[firstName]</td>
                                        <td>$row[lastName]</td>
                                        <td>$row[section]</td>
                                        <td>$row[department]</td>
                                        <td>
                                            <a href='update.php?id=$row[id];'><button class='editBtn'>Edit</button></a>  
                                            <a href='delete.php?id=$row[id]'><button class='deleteBtn'>Delete</button></a>
                                        </td>
                                    </tr>
                                ";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>