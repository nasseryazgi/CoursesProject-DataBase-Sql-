

<?php
$severname = "localhost";
$username = "root";
$password = "";
$databas = "web_project";
$connection = new mysqli($severname, $username, $password, $databas);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="auther" content="Nasser Yazgi" />
    <title>Personal information</title>
    <link rel="stylesheet" href="css/MyStyle.css">
</head>

<body>
    <header>
        <div class="menu">
            <ul>
                <li><a href="Home.php"><span>Personal Information</span></a></li>
                <li><a href="ViewCourse.php">Courses Information</a></li>
                <li><a href="ViewExperience.php">Experience Information</a></li>
                <li><a href="Addcourse.php">Add Course</a></li>
                <li><a href="AddExperience.php"> Add Experience </a></li>
            </ul>
        </div>
        <div class="logo">
            <img src="Images/Azhar_WHITE_LOGO (3).png" alt="">
        </div>
    </header>
    <h1>Personal information</h1>
    <div class="cont">
        <div class="ulg">

        <?php
                $sever_name = "localhost";
                $username = "root";
                $password = "";
                $databas = "web_project";

                $connection = new mysqli($sever_name, $username, $password, $databas);
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }
               

                $sql="SELECT * FROM `data_info`";
                $result=$connection->query($sql);
                if(!$result){
                    die("Invalid query : " .$connection->error);
                }
                while($row = $result->fetch_assoc()){
                    echo"
                    <pre> Fule name :                          <strong>$row[full_name] </strong></pre>
                    <pre> Gender :                              <b>$row[fender]</b> </pre>
                    <pre> Birth Date :                          <b>$row[date] </pre>
                    <pre> Nationality :                         <b>$row[nationality]</b></pre>
                    <pre> Place of Birth :                      <b>$row[place]</b></pre>
                    <pre> Job title :                             <b>$row[job]</b></pre>
                    <pre> Year of experience :             <b> $row[experience] Years</b></pre>e>
        
           "  ;
/*
$extension = pathinfo($row['url'], PATHINFO_EXTENSION);
           if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
              echo '<img src="' . $row['url'] . '" alt="Image" style="padding-left: 20px;">';
          }
               }
*/
               }

                ?>
            

          
        </div>
    </div>
    <img class="nasser" src="Images\nasseryazgi.png" alt="">

</body>


</html>