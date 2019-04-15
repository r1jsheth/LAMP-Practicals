<!--
    (A) Create a customer registration form for bank. Validate the form using PHP
        validators and display error messages.
        
        Author: Raj
        Date Created: 2019-03-12 02:01:54
-->

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<html>

<head>
    <title>Student Registration Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
    $fname = $lname = $email = $add = $city = $pincode = 
    $state  = $mob = $gender = $profession = $accType = $day = $mon = $year = "";
    $fnameErr = $lnameErr = $emailErr = $addErr = $cityErr = $pincodeErr = 
    $stateErr = $mobErr = $genderErr = $professionErr = $accTypeErr = $dayErr = $monErr = $yearErr = "";
    $fl = 0;

    if(isset($_POST['submit'])){
        if(!empty($_POST['First_Name'])){
            $fname = $_POST['First_Name'];
        }
        else $fl = 1;
        if(!empty($_POST['Last_Name'])){
            $lname = $_POST['Last_Name'];
        }
        else $fl = 1;
        if(!empty($_POST['Email_Id'])){
            $email = $_POST['Email_Id'];
        }
        else $fl = 1;
        if(!empty($_POST['Mobile_Number'])){
            $mob = $_POST['Mobile_Number'];
        }
        else $fl = 1;
        if(!empty($_POST['Address'])){
            $add = "<pre>".$_POST['Address']."</pre>";
        }
        else $fl = 1;
        if(!empty($_POST['City'])){
            $city = $_POST['City'];
        }
        else $fl = 1;
        if(!empty($_POST['Pin_Code'])){
            $pincode = $_POST['Pin_Code'];
        }
        else $fl = 1;
        if(!empty($_POST['State'])){
            $state = $_POST['State'];
        }
        else $fl = 1;
        if(!empty($_POST['Gender'])){
            $gender = $_POST['Gender'];
        }
        else $fl = 1;
        if(!empty($_POST['Profession'])){
            $profession = $_POST['Profession'];
        }
        else $fl = 1;
        if(!empty($_POST['Day'])){
            $day = $_POST['Day'];
        }
        else $fl = 1;
        if(!empty($_POST['Month'])){
            $mon = $_POST['Month'];
        }
        else $fl = 1;
        if(!empty($_POST['Year'])){
            $year = $_POST['Year'];
        }
        else $fl = 1;



 
    }
    function ContainsNumbers($String){
        return preg_match('/\\d/', $String) > 0;
    }
    function isValidEmail($emailCheck){ 
        return filter_var($emailCheck, FILTER_VALIDATE_EMAIL) !== false;
    }
    function Trim_Update($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //First
        if(empty($_POST['First_Name'])){
            $fnameErr = "First Name is required";
        } elseif (ContainsNumbers($_POST['First_Name'])) {
            $fnameErr = "Only a-z or A-Z";
        } else {
            $fname = Trim_Update($_POST['First_Name']);
        }

        //LASTNAME
        if(empty($_POST['Last_Name'])){
            $lnameErr = "Last Name is required";
        }
        elseif (ContainsNumbers($_POST['Last_Name'])) {
            $lnameErr = "Only a-z or A-Z";
        } else{
            $lname = Trim_Update($_POST['Last_Name']);
        }

        // EMAIL
        if(empty($_POST['Email_Id'])){
            $emailErr = "Email is required";
        } elseif (!isValidEmail($_POST['Email_Id'])) {
            $emailErr = "Invalid Email!";
        } else{
            $email = Trim_Update($_POST['Email_Id']);
        }


        if(empty($_POST['Mobile_Number'])){
            $mobErr = "Mobile Number is required";
        }elseif (strlen($_POST['Mobile_Number']) != 10) {
            $mobErr = "Length must be 10!";
        }else{
            $mob = Trim_Update($_POST['Mobile_Number']);
        }

        //Add
        if(empty($_POST['Address'])){
            $addErr = "Address is required";
        } else{
            $add = ($_POST['Address']);
        }

        //city
        if(empty($_POST['City'])){
            $cityErr = "City is required";
        }elseif (ContainsNumbers($_POST['City'])) {
            $cityErr = "No Numbers here";
        } 
        else{
            $city = Trim_Update($_POST['City']);
        }

        //PINCODE
        if(empty($_POST['Pin_Code'])){
            $pincodeErr = "Pincode is required";
        } elseif (strlen($_POST['Pin_Code']) != 6) {
            $pincodeErr = "Length must be 6!";
        } 
        else{
            $pincode = Trim_Update($_POST['Pin_Code']);
        }

        //state
        if(empty($_POST['State'])){
            $stateErr = "State is required";
        }elseif (ContainsNumbers($_POST['State'])) {
            $cityErr = "No Numbers here";
        }  
        else{
            $state = Trim_Update($_POST['State']);
        }

        //gender
        if(empty($_POST['Gender'])){
            $genderErr = "Gender is required";
        } else{
            $gender = ($_POST['Gender']);
        }

        //profession
        if(empty($_POST['Profession'])){
            $professionErr = "Profession is required";
        } else{
            $profession = ($_POST['Profession']);
        }

        //accout type
        if(empty($_POST['AccountType'])){
            $accTypeErr = "AccountType is required";
        } else{
            $accType = ($_POST['AccountType']);
        }


        //day
        if(empty($_POST['Day']) || $day == "-1"){
            $dayErr = "Date is required";
        } else{
            $day = ($_POST['Day']);
        }

        //month
        if(empty($_POST['Month']) || $mon == "-1"){
            $monErr = "Month is required";
        } else{
            $mon = ($_POST['Month']);
        }

        //Year
        if(empty($_POST['Year']) || $year == "-1"){
            $yearErr = "Year is required";
        } else{
            $year = ($_POST['Year']);
        }

    }

?>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="regForm">  
    <center>
    <h3>STUDENT REGISTRATION FORM
    </h3>
    </center>
    <table align="center" cellpadding="10">

        <tr>
            <td>FIRST NAME</td>
            <td>
                <input type="text" name="First_Name" maxlength="30" value="<?php echo $fname; ?>"  /> (max 30 characters a-z and A-Z)
                <span class="error">* <?php echo $fnameErr;?></span>
            </td>
        </tr>

        <tr>
            <td>LAST NAME</td>
            <td>
                <input type="text" name="Last_Name" maxlength="30" value="<?php echo $lname; ?>"  /> (max 30 characters a-z and A-Z)
                <span class="error">* <?php echo $lnameErr;?></span>
            </td>
        </tr>

        <tr>
            <td>DATE OF BIRTH</td>

            <td>
                <select name="Day" id="Day" >
                    <option value="-1" <?= $day == "-1" ? "selected":"";?>>Day:</option>
                    <option value="1" <?= $day == "1"? "selected":"";?>>1</option>
                    <option value="2" <?= $day == "2"? "selected":"";?>>2</option>
                    <option value="3" <?= $day == "3"? "selected":"";?>>3</option>

                    <option value="4" <?= $day == "4"? "selected":"";?>>4</option>
                    <option value="5" <?= $day == "5"? "selected":"";?>>5</option>
                    <option value="6" <?= $day == "6"? "selected":"";?>>6</option>
                    <option value="7" <?= $day == "7"? "selected":"";?>>7</option>
                    <option value="8" <?= $day == "8"? "selected":"";?>>8</option>
                    <option value="9" <?= $day == "9"? "selected":"";?>>9</option>
                    <option value="10" <?= $day == "10"? "selected":"";?>>10</option>
                    <option value="11" <?= $day == "11"? "selected":"";?>>11</option>
                    <option value="12" <?= $day == "12"? "selected":"";?>>12</option>

                    <option value="13" <?= $day == "13"? "selected":"";?>>13</option>
                    <option value="14" <?= $day == "14"? "selected":"";?>>14</option>
                    <option value="15" <?= $day == "15"? "selected":"";?>>15</option>
                    <option value="16" <?= $day == "16"? "selected":"";?>>16</option>
                    <option value="17" <?= $day == "17"? "selected":"";?>>17</option>
                    <option value="18" <?= $day == "18"? "selected":"";?>>18</option>
                    <option value="19" <?= $day == "19"? "selected":"";?>>19</option>
                    <option value="20" <?= $day == "20"? "selected":"";?>>20</option>
                    <option value="21" <?= $day == "21"? "selected":"";?>>21</option>

                    <option value="22" <?= $day == "22"? "selected":"";?>>22</option>
                    <option value="23" <?= $day == "23"? "selected":"";?>>23</option>
                    <option value="24" <?= $day == "24"? "selected":"";?>>24</option>
                    <option value="25" <?= $day == "25"? "selected":"";?>>25</option>
                    <option value="26" <?= $day == "26"? "selected":"";?>>26</option>
                    <option value="27" <?= $day == "27"? "selected":"";?>>27</option>
                    <option value="28" <?= $day == "28"? "selected":"";?>>28</option>
                    <option value="29" <?= $day == "29"? "selected":"";?>>29</option>
                    <option value="30" <?= $day == "30"? "selected":"";?>>30</option>

                    <option value="31" <?= $day == "31"? "selected":"";?>>31</option>
                </select>
                <span class="error">* <?php echo $dayErr;?></span>
                <select id="Month" name="Month" >
                    <option value="-1"   <?= $mon == "-1" ? "selected":"";?>>Month:</option>
                    <option value="January" <?= $mon == "January"? "selected":"";?>>Jan</option>
                    <option value="February" <?= $mon == "February"? "selected":"";?>>Feb</option>
                    <option value="March" <?= $mon == "March"? "selected":"";?>>Mar</option>
                    <option value="April" <?= $mon == "April"? "selected":"";?>>Apr</option>
                    <option value="May" <?= $mon == "May"? "selected":"";?>>May</option>
                    <option value="June" <?= $mon == "June"? "selected":"";?>>Jun</option>
                    <option value="July" <?= $mon == "July"? "selected":"";?>>Jul</option>
                    <option value="August" <?= $mon == "August"? "selected":"";?>>Aug</option>
                    <option value="September" <?= $mon == "September"? "selected":"";?>>Sep</option>
                    <option value="October" <?= $mon == "October"? "selected":"";?>>Oct</option>
                    <option value="November" <?= $mon == "November"? "selected":"";?>>Nov</option>
                    <option value="December" <?= $mon == "December"? "selected":"";?>>Dec</option>
                </select>
                <span class="error">* <?php echo $monErr;?></span>

                <select name="Year" id="Year" >

                    <option value="-1"   <?= $year == "-1" ? "selected":"";?> >Year:</option>
                    <option value="2000" <?= $year == "2000"? "selected":"";?>>2000</option>
                    <option value="1999" <?= $year == "1999"? "selected":"";?>>1999</option>
                    <option value="1998" <?= $year == "1998"? "selected":"";?>>1998</option>
                    <option value="1997" <?= $year == "1997"? "selected":"";?>>1997</option>
                    <option value="1996" <?= $year == "1996"? "selected":"";?>>1996</option>
                    <option value="1995" <?= $year == "1995"? "selected":"";?>>1995</option>
                </select>
                <span class="error">* <?php echo $yearErr;?></span>
                
            </td>
        </tr>

        <tr>
            <td>EMAIL ID</td>
            <td>
                <input type="text" name="Email_Id" maxlength="100" value="<?php echo $email; ?>"  />
                <span class="error">* <?php echo $emailErr;?></span>
            </td>
        </tr>

        <tr>
            <td>MOBILE NUMBER (+91)</td>
            <td>
                <input type="number" name="Mobile_Number" maxlength="10" value="<?php echo $mob; ?>"  /> (10 digit number)
                <span class="error">* <?php echo $mobErr;?></span>
            </td>
        </tr>

        <tr>
            <td>GENDER</td>
            <td>
                <input type="radio" name="Gender" value="Male" <?php if (isset($gender) && $gender == "Male") echo "checked=\"checked\""; ?> > 
                Male
                <input type="radio" name="Gender" value="Female" <?php if (isset($gender) && $gender == "Female") echo "checked"; ?> >
                Female
                <span class="error">* <?php echo $genderErr;?></span>
            </td>
        </tr>

        <tr>
            <td>ADDRESS
                <br />
                <br />
                <br />
            </td>
            <td>
                <textarea name="Address" rows="4" cols="30" placeholder="Address" ><?php echo $add; ?></textarea>
                <span class="error">* <?php echo $addErr;?></span>
            </td>
        </tr>

        <tr>
            <td>CITY</td>
            <td>
                <input type="text" name="City" maxlength="30" value="<?php echo $city; ?>"  /> (max 30 characters a-z and A-Z)
                <span class="error">* <?php echo $cityErr;?></span>
            </td>
        </tr>

        <tr>
            <td>PIN CODE</td>
            <td>
                <input type="number" name="Pin_Code" maxlength="6" value="<?php echo $pincode; ?>"  /> (6 digit number)
                <span class="error">* <?php echo $pincodeErr;?></span>
            </td>
        </tr>

        <tr>
            <td>STATE</td>
            <td>
                <input type="text" name="State" maxlength="30" value="<?php echo $state; ?>"  /> (max 30 characters a-z and A-Z)
                <span class="error">* <?php echo $stateErr;?></span>
            </td>
        </tr>

        <tr>
            <td>COUNTRY</td>
            <td>
                <input type="text" name="Country" value="India" readonly="readonly" />
            </td>
        </tr>


        <tr>
            <td>PROFESSION
                <br />
            </td>

            <td>
                <input type="radio" name="Profession" value="student" <?php if(isset($profession) && $profession == "student") echo "checked"?> > 
                Student
                <input type="radio" name="Profession" value="business" <?php if(isset($profession) && $profession == "business") echo "checked"?>>
                Business
                <input type="radio" name="Profession" value="job" <?php if(isset($profession) && $profession == "job") echo "checked"?>>
                Job
                <span class="error">* <?php echo $professionErr ;?></span>
            </td>
        </tr>

        <tr>
            <td>ACCOUNT
                <br />TYPE</td>
            <td>
                <input type="radio" name="AccountType" value="Savings" <?php if(isset($accType) && $accType == "Savings") echo "checked"?>> 
                Savings
                <input type="radio" name="AccountType" value="Current" <?php if(isset($accType) && $accType == "Current") echo "checked"?>>  
                Current
                <span class="error">* <?php echo $accTypeErr;?></span>
            </td>
        </tr>

       <tr>
            <td colspan="2" align="center">
                <input type="submit" value="submit" name="submit" id="submit">
                <input type="reset" value="Reset">
            </td>
        </tr>
    </table>
    </form>
<?php
    if (isset($_POST['submit']) && $fl === 0) {
        $fname = $lname = $email = $add = $city = $pincode = 
        $state  = $mob = $gender = $profession = $accType = $day = $mon = $year = "";
        $fnameErr = $lnameErr = $emailErr = $addErr = $cityErr = $pincodeErr = 
        $stateErr = $mobErr = $genderErr = $professionErr = $accTypeErr = $dayErr = $monErr = $yearErr = "";
        $fl = 0;
        //header('Refresh: 2; URL=http://localhost/Lab/6/Practical6.php');
        echo "<script>
                var AskUser = confirm(\"Are you sure you want to submit this?\");
                if (AskUser == true) {
                    alert(\"Submitted...\");
                    window.location.href = \"http://localhost/Lab/6/Practical6.php\";
                }
              </script>";
    }
?>

</body>

</html>