<?php
    $servername = "localhost";
    $username = "root";
    $password = "km_falcatan12";
    $database = "crud";

    $connection = new mysqli($servername, $username, $password, $database);


    $id = "";
    $firstName = "";
    $lastName = "";
    $section = "";
    $department = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST["id"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $section = $_POST["section"];
        $department = $_POST["department"];

        do{
            if(empty($id) || empty($firstName) || empty($lastName) || empty($section) || empty($department)){
                $errorMessage = "All the fields are required!";
                break;
            }

            $sql = "INSERT INTO clients(id, firstName, lastName, section, department)" ."VALUES ('$id', '$firstName', '$lastName', '$section', '$department')";
            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }
                    
            $id = "";
            $firstName = "";
            $lastName = "";
            $section = "";
            $department = "";
        
            $successMessage = "Student added correctly";

            header("location: /Crud/index.php");
        
        } while(false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if(!empty($errorMessage)){
            echo "
            <div class='errorContainer js-errorContainer'>
                <p class='error js-error'><strong>$errorMessage</strong></p>
            </div>
            ";
        }
    ?>

    <?php
         if(!empty($successMessage)){
            echo "
            <div class='errorContainer js-errorContainer'>
                <p class='error js-error'><strong>$successMessage</strong></p>
            </div>
            ";
        }
    ?>

    <div class="container">
        <form method='post'><div class="addnewContainer">
            <div class="newStudent">
                    <div>
                        <p 
                        class="paragraph">Add New Student
                        </p>
                    </div>
                </div>

                <div class="newUser">
                    <p class="paragraph1">Enter your ID:</p>
                    <input class="inputData" name = 'id' type="text" value='<?php echo "$id"; ?>'>
                </div>
                <div class="newUser">
                    <p class="paragraph2">Enter your First Name:</p>
                    <input class="inputData" name = 'firstName' type="text" value='<?php echo "$firstName"; ?>'>
                </div>
                <div class="newUser">
                    <p class="paragraph3">Enter your Last Name:</p>
                    <input class="inputData" name = 'lastName' type="text" value='<?php echo "$lastName"; ?>'>
                </div>
                <div class="newUser">
                    <p class="paragraph4">Enter your Section:</p>
                    <input class="inputData" name = 'section' type="text" value='<?php echo "$section"; ?>'>
                </div>
                <div class="newUser">
                    <p class="paragraph5">Enter your Department:</p>
                    <input class="inputData" name = 'department' type="text" value='<?php echo "$department"; ?>'>
                </div>

                <div class="submitContainer">
                    <a href='index.php'><button class="submitBtn">Submit</button></a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>