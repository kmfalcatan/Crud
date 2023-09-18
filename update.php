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

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (!isset($_GET["id"])) {
            header("location: /Crud/index.php");
            exit;
        }

        $id = $_GET["id"];

        $sql = "SELECT * FROM clients WHERE id = $id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: /Crud/index.php");
            exit;
        }

        $firstName = $row["firstName"];
        $lastName = $row["lastName"];
        $section = $row["section"];
        $department = $row["department"];
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST["id"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $section = $_POST["section"];
        $department = $_POST["department"];

        if (empty($id) || empty($firstName) || empty($lastName) || empty($section) || empty($department)) {
            $errorMessage = "All the fields are required";
        } else {
            $sql = "UPDATE clients SET firstName='$firstName', lastName='$lastName', section='$section', department='$department' WHERE id = $id";

            if ($connection->query($sql) === TRUE) {
                $successMessage = "Student updated correctly";
                header("location: /Crud/index.php");
                exit;
            } else {
                $errorMessage = "Error updating student: " . $connection->error;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='errorContainer js-errorContainer'>
                <p class='error js-error'><strong>$errorMessage</strong></p>
            </div>
            ";
        }
    ?>

    <?php
         if (!empty($successMessage)) {
            echo "
            <div class='successContainer js-successContainer'>
                <p class='success js-success'><strong>$successMessage</strong></p>
            </div>
            ";
        }
    ?>

<div class="container">
        <form method='post'><div class="addnewContainer">
            <div class="newStudent">
                    <div>
                        <p 
                        class="paragraph">Edit Student Information
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