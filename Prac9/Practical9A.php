<!--
    (A) Write a code to design a web page in PHP with HTML
        formwhich allows user to upload file in “UserData” directory with
        following restrictions:
            1. Create directory “UserData” if not exist.
            2. Only png, jpg, bmp, doc and pdf file can be uploaded.
            3. File size should not exceed 3MB.
        If file exist in directory than it should not uploaded on server.
        
        Author: Raj
        Date Created: 2019-04-16 09:55:57
-->




<html>
<head>
    <title>Practical-(9)A 16BIT031</title>
</head>
<form method="post" enctype="multipart/form-data" action="upload.php">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</html>