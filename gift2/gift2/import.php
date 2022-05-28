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
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>	
        	<div class="panel-heading"></div>
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div class="col-md-6">
                <h1>STUDENT LIST IMPORTED SUCCESSFULLY!</h1><br>
            <h6>if you want to import another list, you dont have to delete the previos list..just import directly,,the previos will automatically replaced.</h6>

            <div class="card-tools">
			<a href="../../users/index.php"  class="btn btn-flat btn-sm btn-primary"><span class="fas fa-plus"></span>  Go back</a>
	</div>	
				</div>
			</div>
		
		</div><!--/.row-->

	
<?php
  //the system jumps a student if a full information is not provided 
  require_once ('./vendor/autoload.php');
  use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

  $con = new mysqli('localhost', 'root', '', 'gift_db');
  if(!$con){
    echo "connection failed";
  
} 


if (isset($_POST["import"])) {
	$deleteprevious = "DELETE FROM declined_transaction";
	$commitdelete = $con->query($deleteprevious);

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {
        $droptable = "drop table student_list";
        $commitdrop = $con->query($droptable);

        $createtable = " CREATE TABLE `gift_db`.`student_list` ( `id` BIGINT(20) NOT NULL AUTO_INCREMENT , `fullname` LONGTEXT NOT NULL , `sex` VARCHAR(20) NOT NULL , `age` INT(20) NOT NULL , `grade` VARCHAR(20) NOT NULL , `delete_flag` tinyint(1) NOT NULL DEFAULT 0,`status` tinyint(1) NOT NULL DEFAULT 1,`date_created` datetime NOT NULL DEFAULT current_timestamp(),`date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $commitcreate = $con->query($createtable);
        
       

        $targetPath = $_FILES['file']['tmp_name'];

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);
		$class ="";
		
     
        for ($i = 1; $i <= $sheetCount -1; $i ++) {
    
            
           // echo nl2br(" expect one here \n   ". $spreadSheetAry[$i][0]='' ."\n");
           // echo nl2br(" \n   ".!isset($spreadSheetAry[$i][1]) ."\n");
           
           
           // if($spreadSheetAry[$i][0]=='' && isset($spreadSheetAry[$i][1])){
                //$grade = $spreadSheetAry[$i][1];
                
           // }
          
            
            //echo isset($spreadSheetAry[$i][0]) && isset($spreadSheetAry[$i][1]) && isset($spreadSheetAry[$i][2]) && isset($spreadSheetAry[$i][3]) && $spreadSheetAry[$i][2]!='Sex';
            if(isset($spreadSheetAry[$i][0]) && isset($spreadSheetAry[$i][1]) && isset($spreadSheetAry[$i][2]) && isset($spreadSheetAry[$i][3]) && $spreadSheetAry[$i][2]!='Sex'){

               

                $fullname="";
                if(isset($spreadSheetAry[$i][0])){
                    $fullname = $spreadSheetAry[$i][0];
                    $fullname = str_replace("'","\'",$fullname);
                   
                }

                $sex ="";
                if (isset($spreadSheetAry[$i][1])) {
                    $sex = $spreadSheetAry[$i][1];
                    $sex = str_replace("'","\'",$sex);
                }

                 
                $age = "";
                if (isset($spreadSheetAry[$i][2])) {
                    $age =  $spreadSheetAry[$i][2];
                }
                $grade = "";
                if (isset($spreadSheetAry[$i][3])) {
                    $grade =  $spreadSheetAry[$i][3];
                }

             
               
                $query = "insert into student_list (fullname,sex,age,grade) values(' $fullname','$sex','$age','$grade')";
                $result = $con->query($query);
             
               

                if ( empty($result))   echo nl2br("problem\n".$con->error);
                

            }
 }
		
       



    } else {
        echo "unsuported format";
    }

}


?>

		
		
		</div><!--/.row-->
	</div>	<!--/.main-->
	<div class="footer col-sm-12">



</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

		
</body>
</html>

