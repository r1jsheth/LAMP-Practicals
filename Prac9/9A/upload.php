<?php  
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();

    // The following code will only execute one time to create 'UserDirectory'
    // Update $DirPath variable according to your usage.
    
    // If you are using Windows Machine you need to update php.ini file
    // in order to use this mkdir() function of php
    // If on Linux, 'chown' and 'chmod' will do the needful.
    // Simply give path to the directory where you are going to upload files.
    $DirPath = '/var/www/html/Lab/Prac9/UserData/';
    if (!file_exists($DirPath)) {
        mkdir($DirPath, 755, true);
    }


    // Only following extensions are allowed to upload files.
    $allowedExts = array("png", "jpg", "jpeg", "bmp", "pdf");
    
    $tarDir = $DirPath;

    // print_r($_FILES['fileToUpload']);
    $tarFile = $tarDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $inputFileType = strtolower(pathinfo($tarFile,PATHINFO_EXTENSION));
    // print_r($inputFileType);
    

    // Allow certain file formats only
    $count = 0;
    foreach ($allowedExts as $ext){
        if($inputFileType == $ext){
            $count++;
            break;
        }
    }
    if($count == 0){
    	// This will happen if file is not falling in any of the allowed file formats.
        echo "<font color = 'red'>";
        echo "<b>".$inputFileType."</b>";
        echo " not supported as of now!";
        echo "<br>Allowed extensions are: ";
        for ($i = 0; $i < sizeof($allowedExts); $i++) { 
            echo "<b>".$allowedExts[$i]."</b>";
            if($i != sizeof($allowedExts)-1)    echo ", ";
        }
        echo "</font>";
        exit(-1);
    }


    // Check if file already exists
    // We can't override the existing file with the same name
    if (file_exists($tarFile)) {
        echo "<font color = 'red'>File Exists.</font>";
        $uploadOk = 0;
        exit(-1);
    }

    // Check file size
    // File size must be < 3 MB
    if ($_FILES["fileToUpload"]["size"] >= 3000000) {
        echo "<font color = 'red'>File size must be < 3 MB</font>";
        $uploadOk = 0;
        exit(-1);
    }


    // if everything is ok, try to upload file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $tarFile)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } 
    else {
        echo "<font color = 'red'>There was an error!</font>";
    }
    

    
?> 