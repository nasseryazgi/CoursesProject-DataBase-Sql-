<?php

$severname = "localhost";
$username = "root";
$password = "";
$databas = "web_project";
$connection = new mysqli($severname, $username, $password, $databas);




$experiances_category = "";
$experiances_title = "";
$start_month = "";
$end_month = "";
$institution = "";
$description = "";
$star_month="";
$note = "";




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $experiances_category = $_POST["experiances_category"];
    $experiances_title = $_POST["experiances_title"];
    $start_month = $_POST["start_month"];
    $end_month = $_POST["end_month"];
    $institution = $_POST["institution"];
    $description = $_POST["description"];
    $start = explode('-', $start_month);
    //$date = $start[2];
    $month = $start[1];
    $year = $start[0];
    $star_month =  $month . '-' . $year;

    $end = explode('-', $end_month);
    //$end_date = $end[2];
    $end_month = $end[1];
    $end_year = $end[0];
    $end_month =  $end_month . '-' . $end_year;
    $sucessMessage = "";








$sql = "INSERT INTO `addexperience` (`category`, `title`, `start`, `end`, `institution`, `description`)
 VALUES ('$experiances_category', '$experiances_title', '$star_month', '$end_month', '$institution', '$description')";


$result = $connection->query($sql);
if (!$result) {
    $errorMessage = "Invalid qurey : " . $connection->error;
}

}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/MyStyle.css">
    <title>Add Experience</title>
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
    <section id="Content-4">
        <div class="container-2">
            <div class="left-side">
                <div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                        <div>
                            <label for="labal-1">Experiances Category:</label>
                            <select id="labal-1" class="input-big" name="experiances_category">
                                <option value="Html">Html</option>
                                <option value="Java">Java</option>
                                <option value="Php">Php</option>
                                <option value="C++">C++</option>
                            </select>
                        </div>
                        <div>
                            <label for="labal-2">Experiances Title:</label>
                            <input type="text" id="labal-2" class="input-big" name="experiances_title">
                        </div>
                        <div>
                            <label for="labal-3">Start month:</label>
                            <input type="date" id="labal-3" class="input-big" name="start_month">
                        </div>
                        <div>
                            <label for="labal-4">End month:</label>
                            <input type="date" id="labal-4" class="input-big" name="end_month">
                        </div>
                        <div>
                            <label for="labal-5">Institution:</label>
                            <input type="text" id="labal-5" class="input-big" name="institution">
                        </div>
                        <div class="note">
                            <div>
                                <label for="labal-9">Description:</label>
                            </div>
                            <div>
                                <textarea id="labal-9" name="description" cols="55" rows="6"></textarea>
                            </div>
                        </div>
        
                        <div class="click"><button class="button-1">Save</button></div>
                        <div class="click"><button class="button-2">Reset</button></div>
                    </form>

                </div>

            </div>
            <div id="im">
                <img src="Images/photo_2021-12-10_09-52-48.jpg" style="height: 470px;width: 400px; " alt="personal img">
            </div>
        </div>

    </section>
</body>

</html>
</body>

</html>