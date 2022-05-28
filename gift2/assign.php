<!DOCTYPE html>
<html>
<head>
    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gift</title>
	<link rel="icon" href="favicon.ico" type="image/icon type">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>


<style>
    @font-face {
font-family: AbyssinicaSIL;
src: url(AbyssinicaSIL-Regular.woff);
}
.vertical{
    height:1100px;
    border-left:1px solid black;
    position: absolute;
    margin-left :-35px;
    margin-top :0px;
    
    

}
</style>

<form method="post" action="assign.php">    
	<button type="submit" class="btn btn-primary" name="shuffle">Shuffle</button>
</form>
							

<?php

  $con = new mysqli('localhost', 'root', '', 'gift_db');
  if(!$con){
    echo "connection failed";
  
} 
$pairs = [];
   //first get numver of rows
   $RowNumber = "SELECT COUNT(*) AS CH FROM student_list";
   $result = $con->query($RowNumber);
   if (! empty($result)) {
   foreach ($result as $row) {
    $RowNumber = $row['CH'];
   }
  

if (isset($_POST["shuffle"])) {
    shuffle:
         
       
          //echo nl2br(" \n" .$RowNumber);
      
        //loops equal to the number of rows so logic can be performed for each entity
        $generalException = [];
        for ($i = 1; $i <= round($RowNumber/2)-1; $i ++) {
          
           
         
//https://stackoverflow.com/questions/17109465/php-rand-exclude-certain-numbers
//CREATE ARROW CALLED EXCEPTION
//ADD 
//SAME CLASS
//OPPOSITE SEX AND SAME AGE
     
            $specificException = [];
            $currentAge = "";
            $currentSex = "default";
            $currentClass = "";
        
            $RetriveCurrent = "SELECT * FROM student_list WHERE id='$i'";
            $result = $con->query($RetriveCurrent);
            if (! empty($result)) {
            foreach ($result as $row) {
             $currentSex = $row['sex'];
             $currentAge = $row['age'];
             $currentClass = $row['grade'];
            }}

            
           
            // $RetriveCurrent = "SELECT * FROM student_list WHERE class = '$currentClass'";
            // $result = $con->query($RetriveCurrent);
            // if (! empty($result)) {
            // foreach ($result as $row) {
            //  $exception[] = $row;
           
            // }}

            // echo '<pre>'; print_r($exception); echo '</pre>';

             $getIdsameClass = "select id from student_list where grade='$currentClass'";
             $result = $con->query($getIdsameClass);
             if (! empty($result)) {
             foreach ($result as $row) {
        
             $specificException[] = $row['id'];
           
             }}
          
            $oppositeSex = '';

            if($currentSex == 'F' ){
                $oppositeSex = 'M';
            }

            if($currentSex == 'f' ){
                $oppositeSex = 'M';
            }

            if($currentSex == 'DU' ){
                $oppositeSex = 'DHI';
            }

            if($currentSex == 'du' ){
                $oppositeSex = 'DHI';
            }
            
            if($currentSex == 'M' ){
                $oppositeSex = 'F';
            }

            if($currentSex == 'm' ){
                $oppositeSex = 'F';
            }

            if($currentSex == 'DHI' ){
                $oppositeSex = 'DU';
            }

            if($currentSex == 'dhi' ){
                $oppositeSex = 'du';
            }

            $plusone = $currentAge + 1;
            $plustwo = $currentAge + 2;
    
            $getPotentialGirlFriendBoyFriend = "select id from student_list where (age='$currentAge' or age='$plusone' or age='$plustwo')  && sex='$oppositeSex'";
            $result = $con->query($getPotentialGirlFriendBoyFriend);
            if (! empty($result)) {
            foreach ($result as $row) {
            
            $specificException[] = $row['id'];
           
            }}
             $random = NULL;

            $exception =  array_merge($specificException,(array)$generalException);
            $check = 0;
         
         
             do {
                 
                 if(in_array($random,$exception)) {
                   $check = $check + 1;
                 }
                 if($check == 2000){
                    goto shuffle;
                 }
                $random = mt_rand(round($RowNumber/2),$RowNumber);
            } while(in_array($random,$exception));

       
        
         array_push($generalException,$random);
         //echo nl2br(" \n " .$random."\n n".$i);
         $pairs[$i] = $random;
          
         //echo '<pre>'; print_r($generalException); echo '</pre>';
        // if($i == 100) break;


              //name of the first apirs
            
          $firstpair = "SELECT fullname,sex,age,grade FROM student_list where id = '$i' ";
          $result = $con->query($firstpair);
          if (! empty($result)) {
          foreach ($result as $row) {
           $firstpair = $row['fullname'];
           $fs = $row['sex'];
           $fa = $row['age'];
           $fg = $row['grade'];
          }}

                   //name of the second apirs
                   $spairid = $pairs[$i];
                   $secondpair = "SELECT fullname,sex,age,grade FROM student_list where id = '$spairid' ";
                   $result = $con->query($secondpair);
                   if (! empty($result)) {
                   foreach ($result as $row) {
                    $secondpair = $row['fullname'];
                    $ss = $row['sex'];
                    $sa = $row['age'];
                    $sg = $row['grade'];
                   }}
                  
                   
//echo '<hr><pre>'.$i.$firstpair."[".$fa."]"."[".$fs."]"."$i".$secondpair."[".$sa."]"."[".$ss."]"."$spairid`".'<hr><pre>'.$i.$firstpair."[".$fa."]"."[".$fs."]"."<br>".$secondpair."[".$sa."]"."[".$ss."]";
echo "" .'<span><div id=\"div1\">'."<br><br><br>------------------------------------------------<br>".$i.".".$firstpair."[".$fa."]"."[".$fs."]"."[".$fg."]".'</p>'.'<p>'.$i.".".$secondpair."[".$sa."]"."[".$ss."]"."[".$sg."]"."<br>------------------------------------------------".'</div>'.'</div>'."</span>"."";


    

 }
}
};


// construct a new array:1,2....max(given array).
//$arr2 = range(round($RowNumber/2),max($pairs));                                                    

// use array_diff to get the missing elements 
// $missing = array_diff($arr2,$pairs); // (3,6)
// echo '<pre>'; print_r($arr2); echo '</pre>';
 //echo '<pre> pairs'; print_r($pairs); echo '</pre>';
//echo '<pre> missing'; print_r($missing); echo '</pre>';


$vary = round($RowNumber/2)-1;
do {
  $vary = $vary +1;

  
} while(in_array($vary,$pairs));



       //name of the missing
       $missingdude = "SELECT fullname,sex,age,grade FROM student_list where id = '$vary' ";
       $result = $con->query($missingdude);
       if (! empty($result)) {
       foreach ($result as $row) {
        $name = $row['fullname'];
        $sex = $row['sex'];
        $age = $row['age'];
        $grade = $row['grade'];
       }}
      
      echo '##########<br><br><pre> # a student who did not assigned is <br>***********************<br>'.$name."[".$sex."]"."[".$age."]"."[".$grade."]"."<br>***********************";







?>

		

    </div>
</div>
	
</body>
</html>

