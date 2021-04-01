<?php
    session_start();
    include 'logging.php';
    $allowedExtensions = ['jpg', 'png', 'gif'];

    $fName = $_FILES['imageUpload']['name'];
    $fName = str_replace('<','',$fName,$i);
    if ($i){
        echo 'File name is not allowed!hihi';
        echo "<br><a href='./index.html'>Back</a>";
        die();
    }
    $fSize = $_FILES['imageUpload']['name'];
    $fTmp = $_FILES['imageUpload']['tmp_name'];
    $fType = $_FILES['imageUpload']['type'];
    $fExt = strtolower(end(explode('.', $fName)));

    $uploadPath = 'uploads/' . basename($fName);
	//web server is apache, so the path is /var/www/html/uploads/{$fName}
    $_SESSION['path'] = $uploadPath;
    if (isset($_POST['SUBMIT'])){
        if (! in_array($fExt, $allowedExtensions)){
            echo "File extension not allowed";
            echo "<br><a href='./index.html'>Back</a>";
            die();
        }
        if (!file_exists($uploadPath)){
            move_uploaded_file($fTmp, $uploadPath);
            echo "<b>Moved: " .$fTmp . " to " .$uploadPath.'</b>';
            echo "<br>";
            echo "<a href='./md5.php'>MD5 file</a>";
            //$_SESSION['path'] = $uploadPath;
            echo "<br><a href='./index.html'>Back</a>";
        }
        else {
            move_uploaded_file($fTmp, $uploadPath);
            echo "<b>Moved: " .$fTmp . " to " .$uploadPath.'</b>';
            echo "<br>You have just overwritten an existing file.";
            echo "<br>";
            echo "<a href='./md5.php'>MD5 file</a>";
            //$_SESSION['path'] = $uploadPath;
            echo "<br><a href='./index.html'>Back</a>";
        }
    }
?>
