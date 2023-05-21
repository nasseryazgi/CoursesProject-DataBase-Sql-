<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/MyStyle.css">
    <title>View Course</title>
</head>

<body>
    <header>

        <div class="menu">

            <ul>
                <li><a href="Home.php">Personal Information</a></li>
                <li><a href="ViewCourse.php"><span>Courses Information</a></li>
                <li><a href="ViewExperience.php">Experience Information</a></li>
                <li><a href="Addcourse.php">Add Course</a></li>
                <li><a href="AddExperience.php"> Add Experience </a></li>


            </ul>
        </div>
        <div class="logo">
            <img src="Images/Azhar_WHITE_LOGO (3).png" alt="">
        </div>
    </header>
    <h1>All courses Information</h1>
    <section id="table">
        <table border="1" cellspacing='0'>
            <thead>
                <tr>
                    <th rowspan="2" style="border-top-left-radius: 10px;">#</th>
                    <th rowspan="2" width="240px">Course Name</th>
                    <th rowspan="2">Total Hours</th>
                    <th colspan="2">Date</th>
                    <th rowspan="2">Institution</th>
                    <th rowspan="2">Attachment</th>
                    <th rowspan="2" style="border-top-right-radius: 10px;width: 300px;">Notes</th>
                </tr>
                <tr>
                    <th>From</th>
                    <th>to</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sever_name = "localhost";
                $username = "root";
                $password = "";
                $databas = "web_project";

                $connection = new mysqli($sever_name, $username, $password, $databas);
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql="SELECT * FROM addcourse";
                $result=$connection->query($sql);
                if(!$result){
                    die("Invalid query : " .$connection->error);
                }
                while($row = $result->fetch_assoc()){
                    echo"
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[course_name]</td>
                    <td>$row[numberHours]</td>
                    <td>$row[start_date]</td>
                    <td>$row[end_date]</td>
                    <td>$row[Institution]</td>
                    <td> <a href=\"Course_1View.php?id=$row[id]\">VIEW</a>
                    </td>
                    <td>$row[notes]</td>
                </tr> "  ;

               }

                ?>
            


            </tbody>
        </table>
    </section>
</body>

</html>