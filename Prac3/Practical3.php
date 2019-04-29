<!--
    Write a PHP script for the following: 
      Design a form to accept two strings from the user. 
      Find the first occurrence and the last occurrence of the small string in the large string. 
      Also count the total number of occurrences of small string in the large string. 
      Provide a text box to accept a string, 
      which will replace the small string in the large string. 
      (Use built-in functions and make user define function as well)
        
    Author: Raj
    Date Created: 2019-02-01 09:39:01
-->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Raj Sheth 16BIT031</title>
  </head>
  <body>

    <form action="#" method="post">
      Input: <textarea name="input" id="input"></textarea><br>
      <!-- Input : <input type="text" name="input" id="input"><br> -->
      Find   : <input type="text" name="strig_to_find" id="strig_to_find"><br>
      Replacement String : <input type="text" name="repl_string" id="repl_string"><br>
      Enter n: nth of occurence to replace : <input type="number" name="oc_to_change" id="oc_to_change"><br>

      <br>
      <button name="btn1" id="btn1" value="btn1">Location of First and Last occurence</button>
      <br>
      <button name="btn2" id="btn2" value="btn2">Count total number of occurences</button>
      <br>
      <button name="btn3" id="replacestr" value="btn3">Replace</button>
      <br>
	  <button name="btn4" id="btn4" value="btn4">Occurence to Replace</button>
    </form>


     <?php
     if($_POST){
        if(isset($_POST['btn1'])){
          validate1();
          fun1();
        }
        else if(isset($_POST['btn2'])){
          validate1();
          fun2();
        }
        else if(isset($_POST['btn3'])){
          validate1();
          fun3();
        }
        elseif(isset($_POST['btn4'])){
          validate1();
          rep_nth_ocur($_POST['strig_to_find'], $_POST['repl_string'], $_POST['input'], $_POST['oc_to_change']);
          echo "<br>"."Manual--> ";
          fun4();
        }
     }
     function validate1(){
        $aa = $_POST['input'];
        $bb = $_POST['strig_to_find'];
        $cc = $_POST['repl_string'];
        $num = $_POST['oc_to_change'];
        if($aa == ''){
          exit("empty Input");
        }
        if($bb == ''){
          exit("empty Input");
        }
     }


     function fun1(){
        echo "First = ". stripos($_POST['input'],$_POST['strig_to_find']);
        echo "<br>";
        echo "Last = ". strripos($_POST['input'],$_POST['strig_to_find']);
     }



    function fun2(){
		echo "Count = ". substr_count($_POST['input'],$_POST['strig_to_find']);
       }


       function fun3(){
          $aa=$_POST['input'];
          $bb=$_POST['strig_to_find'];
          $cc=$_POST['repl_string'];
          echo str_replace($bb,$cc,$aa);
       }




	   function rep_nth_ocur($srch, $btn3, $subject, $occurrence){
	   	 echo "Inbuilt--> ";
        $srch = preg_quote($srch);
        $nth_rep = preg_replace("/^((?:(?:.*?$srch){".--$occurrence."}.*?))$srch/", "$1$btn3", $subject);
        echo $nth_rep;
		}




		function fun4(){
			$aa = $_POST['input'];
      $bb = $_POST['strig_to_find'];
			$cc = $_POST['repl_string'];
      $num = $_POST['oc_to_change'];
      $total_occur = substr_count($_POST['input'],$_POST['strig_to_find']);
			if($total_occur == 0){
        echo "No".$bb."such string found in ".$aa;
      }
      elseif ($total_occur < $num){
				echo $bb." occurs only ". $total_occur ." time(s) which is < ".$num;
      }
			else{
				$num = $_POST['oc_to_change'];
				$len1 = strlen($aa);
        $len2 = strlen($bb);
				$len3 = strlen($cc);
        $cnt=0;
        echo "<br>";
				for ($i=0; $i < $len1; $i++) { 
          $part1 = substr($aa,0,$i);
          $part2 = substr($aa,$i,$len2);
					$part3 = substr($aa,($i+$len2),$len1);
          echo $part1."--".$part2."--".$part3."<br>";
          if($part2 == $bb){
            $cnt=$cnt+1;
            // echo $cnt." Same"."<br>";
            if($cnt == $num){
              echo "found!!<br>";
              echo $part1;
              print_r(str_replace($part2, $cc, $part2));
              echo $part3;
              break;
            }
          }
				}
			}
		}
      ?>
  </body>
</html>
