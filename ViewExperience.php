<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/MyStyle.css">
    <title>ViewExperience</title>
</head>

<body>
    <header>

        <div class="menu">

            <ul>
  
                <li><a href="Home.php">Personal Information</a></li>
                <li><a href="ViewCourse.php">Courses Information</a></li>
                <li><a href="ViewExperience.php"><span>Experience Information </span></a></li>
                <li><a href="Addcourse.php">Add Course</a></li>
                <li><a href="AddExperience.php"> Add Experience</a></li>


            </ul>
        </div>
        <div class="logo">
            <img src="Images/Azhar_WHITE_LOGO (3).png" alt="">
        </div>
    </header>
    <main>
        <h1>All Experiences Information
</h1>

    <?php
                $sever_name = "localhost";
                $username = "root";
                $password = "";
                $databas = "web_project";

                $connection = new mysqli($sever_name, $username, $password, $databas);
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql="SELECT * FROM addexperience";
                $result=$connection->query($sql);
                if(!$result){
                    die("Invalid query : " .$connection->error);
                }
                while($row = $result->fetch_assoc()){
                    echo"
                    <h1>$row[title]<sub>  $row[institution]/$row[category]<br></sub></h1>
                    <p class=\"w\"> 
                        from $row[start] to $row[end] <br>
                        $row[description]      
                    </p>
                    
                    ";
                }
?>
                

    

    </main>
</body>

</html>