<?php
$sever_name = "localhost";
$username = "root";
$password = "";
$databas = "web_project";
$id="";
$connection = new mysqli($sever_name, $username, $password, $databas);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
}
$sql = "SELECT * FROM addcourse WHERE id=$id";
$result = $connection->query($sql);
if (!$result) {
    die("Invalid query : " . $connection->error);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/MyStyle.css">
    <title>View data</title>
</head>

<body>
    <header>
        <div class="menu">

            <ul>
                <li><a href="Home.php">Personal Information</a></li>
                <li><a href="ViewCourse.php">Courses Information</a></li>
                <li><a href="ViewExperience.php">Experience Information</a></li>
                <li><a href="Addcourse.php">Add Course</a></li>
                <li><a href="AddExperience.php"> <span>Add Experience</span> </a></li>
            </ul>
        </div>
        <div class="logo">
            <img src="Images/Azhar_WHITE_LOGO (3).png" alt="">
        </div>
    </header>
    <main>
        <form method="GET">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "
                    <h1>Course \" $row[course_name]\" </h1>
                    <p class='p1'>
                        from $row[start_date] to $row[end_date] , totally $row[numberHours] traning hour <br><br>
                        Institution was $row[Institution]
                        <br><br><br><br>
                      Attachment: <br>         
                    </p>                   
                 ";
                 $extension = pathinfo($row['url'], PATHINFO_EXTENSION);
                 if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    echo '<img src="' . $row['url'] . '" alt="Image" style="padding-left: 20px;">';
                } elseif (in_array($extension, ['pdf', 'doc', 'docx'])) {
                    echo '<a href="' . $row['url'] . '" download style="padding-left: 20px;">Click here to download the file</a>';
                } else {
                    echo '<a href="' . $row['url'] . '" style="padding-left: 20px;">View URL</a>';
                }
                
            }
                ?>
              
        
    </main>
</body>

</html>