<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "web_project";
$connection = new mysqli($servername, $username, $password, $database);

$course_name = "";
$number_of_hours = "";
$start_date = "";
$end_date = "";
$institution = "";
$url2 = "";
$new = "";
$note = "";
$end_result = "";
$file_size = "";
$file_loc = "";
$file_type = "";
$folder = "";
$file = "";
$final_file_upload = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $course_name = $_POST["course_name"];
    // $number_of_hours = $_POST["number_of_hours"];
    // $start_date = $_POST["start_date"];
    // $end_date = $_POST["end"];
    // $institution = $_POST["institution"];
    // $note = $_POST["notes"];
    // $option = $_POST["option"];



    $course_name = $connection->real_escape_string($_POST['course_name']);
$number_of_hours = $connection->real_escape_string($_POST['number_of_hours']);
$start_date = $connection->real_escape_string($_POST['start_date']);
$end_date = $connection->real_escape_string($_POST['end']);
$institution = $connection->real_escape_string($_POST['institution']);
$note = $connection->real_escape_string($_POST['notes']);
$option =$connection->real_escape_string( $_POST["option"]);

    $start_result = explode('-', $start_date);
    $start_date = $start_result[2];
    $start_month = $start_result[1];
    $start_year = $start_result[0];
    $new = $start_date . '-' . $start_month . '-' . $start_year;

    $end_result = explode('-', $end_date);
    $end_date = $end_result[2];
    $end_month = $end_result[1];
    $end_year = $end_result[0];
    $end_result = $end_date . '-' . $end_month . '-' . $end_year;

    if ($option === "url") {
        $url = $connection->real_escape_string($_POST['attachment']);
        try{
            $sql = "INSERT INTO `addcourse` (`course_name`, `numberHours`, `start_date`, `end_date`, `Institution`, `url`, `notes`)
            VALUES ('$course_name', '$number_of_hours', '$new', '$end_result', '$institution', '$url', '$note')";
        $result = $connection->query($sql);
        if (!$result) {
            $errorMessage = "Invalid query:  " . $connection->error;
        }
        }catch (mysqli_sql_exception $e) { 
            var_dump($e);
            exit; 
         } 
      

    } elseif ($option === "file") {
        $file_name = $_FILES["file_upload"]["name"];
        $file_tmp = $_FILES["file_upload"]["tmp_name"];
        $folder = "upload/";

        if (move_uploaded_file($file_tmp, $folder . $file_name)) {
            $final_file_upload = $folder . $file_name;
        }

        
        $sql = "INSERT INTO addcourse (course_name, numberHours, start_date, end_date, Institution, url, notes)
            VALUES ('$course_name', '$number_of_hours', '$new', '$end_result', '$institution', '$final_file_upload', '$note')";
        $result = $connection->query($sql);

        if ($result) {
            header('location:ViewCourse.php');
        }else{
            $errorMessage = "Invalid query: " . $connection->error;

        }


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
    <title>Add Course</title>
    <?php
    if (!empty($errorMessage)) {
        echo $errorMessage;
    }
    ?>
</head>

<body>
    <header>
        <div class="menu">
            <ul>
                <li><a href="Home.php">Personal Information</a></li>
                <li><a href="ViewCourse.php">Courses Information</a></li>
                <li><a href="ViewExperience.php">Experience Information</a></li>
                <li><a href="Addcourse.php"> <span>Add Course</span> </a></li>
                <li><a href="AddExperience.php">Add Experience</a></li>
            </ul>
        </div>
        <div class="logo">
            <img src="Images/Azhar_WHITE_LOGO (3).png" alt="">
        </div>
    </header>
    <div class="CountenerForAddCourse">
        <div class="courseFlow">
            <div class="coursedescription">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                    <div class="input">
                        <div class="label"><label for="">Course Name:</label></div>
                        <div class="in"><input type="text" name="course_name" /></div>
                    </div>
                    <div class="input">
                        <div class="label"><label for="">Number of Hours:</label></div>
                        <div class="in"><input type="number" name="number_of_hours" /></div>
                    </div>
                    <div class="input">
                        <div class="label"><label for="">Start Date:</label></div>
                        <div class="in"><input type="date" name="start_date" /></div>
                    </div>
                    <div class="input">
                        <div class="label"><label for="">End Date:</label></div>
                        <div class="in"><input type="date" name="end" /></div>
                    </div>
                    <div class="input">
                        <div class="label"><label for="">Institution:</label></div>
                        <div class="in"><input type="text" name="institution" /></div>
                    </div>
                    <div class="input">
                        <div class="label"><label for="">Attachment:</label></div>
                        <div>
                            <label for=""><input type="radio" name="option" value="file" style="height: auto; width: 20px" />File</label>
                            <label><input type="radio" name="option" value="url" style="height: auto; width: 20px; margin-left: 60px" />URL</label>
                        </div>
                    </div>
                    <div class="input">
                        <div class="label"><label for="">URL:</label></div>
                        <div class="in"><input type="url"  name="attachment" /></div>
                    </div>
                    <div class="input">
                        <div class="label"><label for="">File:</label></div>
                        <div class="in">
                            <input type="file" name="file_upload" style="border: none; border-radius: 0" />
                        </div>
                    </div>
                    <div class="input">
                        <div class="label"><label for="">Note:</label></div>
                        <div class="in">
                            <textarea name="notes" id="" cols="22" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="btn">
                        <input id="green" type="submit" href="/project/add.php" value="Save" />
                        <input id="red" type="reset" value="Reset" />
                    </div>
                </form>
            </div>
            <div class="img">
                <img id="i" src="Images/photo_2021-12-10_09-54-22.jpg" alt="" width="40px" />
            </div>
        </div>
    </div>
</body>

</html>
