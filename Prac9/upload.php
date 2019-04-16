<?php  
  
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();

    // The following code will only execute one time to create 'UserDirectory'
    $DirPath = '/var/www/html/Lab/Prac9/UserData/';
    if (!file_exists($DirPath)) {
        mkdir($DirPath, 755, true);
    }
    else{
        //echo "Directory is already created!";
    }

    // Only following extensions are allowed to upload files.
    $allowedExts = array("png", "jpg", "jpeg", "bmp", "pdf");
    $tarDir = $DirPath;
    $tarFile = $tarDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($tarFile,PATHINFO_EXTENSION));


    // Allow certain file formats
    $count = 0;
    foreach ($allowedExts as $ext){
        if($imageFileType == $ext){
            $count++;
            break;
        }
    }
    if($count == 0){
        echo "<font color = 'red'>";
        echo "<b>".$imageFileType."</b>";
        echo " not supported as of now!";
        echo "<br>Allowed extensions are: ";
        for ($i=0; $i < sizeof($allowedExts); $i++) { 
            echo "<b>".$allowedExts[$i]."</b>";
            if($i != sizeof($allowedExts)-1)    echo ", ";
        }
        echo "</font>";
        exit(-1);
    }


    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        
        $check=true;
        //$check = getimagesize($_FILES["fileToUpload"]["name"]);

        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "<font color = 'red'>File is not an image.</font>";
            $uploadOk = 0;
            exit(-1);
        }
    }

    // Check if file already exists
    if (file_exists($tarFile)) {
        echo "<font color = 'red'>File Exists.</font>";
        $uploadOk = 0;
        exit(-1);
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 3000000) {
        echo "<font color = 'red'>File size must be < 3 MB</font>";
        $uploadOk = 0;
        exit(-1);
    }


    if ($uploadOk == 0) {
        echo "<font color = 'red'>Your file was not uploaded.</font>";
    } 
    else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $tarFile)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "<font color = 'red'>There was an error uploading your file.</font>";
        }
    }

    
?> 