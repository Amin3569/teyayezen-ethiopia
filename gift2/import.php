<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Atm Analysis</title>
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
					<form method="post" action="import.php" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
					<div class="form-group">
									<label>File input</label>
									<input type="file" name="file" id="file" accept=".xls,.xlsx">
									<p class="help-block">Select Excel File You Want to Import</p>
								</div>
								
					
							<button type="submit" class="btn btn-primary" name="import">Select</button>
							
					</form>
					
				</div>
			</div>
		
		</div><!--/.row-->

	
<?php
  //the system jumps a student if a full information is not provided 
  require_once ('./vendor/autoload.php');
  use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

  $con = new mysqli('localhost', 'root', '', 'gift');
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
        $droptable = "drop table students";
        $commitdrop = $con->query($droptable);

        $createtable = " CREATE TABLE `gift`.`students` ( `id` BIGINT(20) NOT NULL AUTO_INCREMENT , `class_id` INT(20) NOT NULL , `full_name` LONGTEXT NOT NULL , `sex` VARCHAR(20) NOT NULL , `age` INT(20) NOT NULL , `class` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $commitcreate = $con->query($createtable);
        
       

        $targetPath = $_FILES['file']['tmp_name'];

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);
		$class ="";
		
     
        for ($i = 0; $i <= $sheetCount-1; $i ++) {
    
            
           // echo nl2br(" expect one here \n   ". $spreadSheetAry[$i][0]='' ."\n");
           // echo nl2br(" \n   ".!isset($spreadSheetAry[$i][1]) ."\n");
           
           
            if($spreadSheetAry[$i][0]=='' && isset($spreadSheetAry[$i][1])){
                $class = $spreadSheetAry[$i][1];
                
            }
          
            
            //echo isset($spreadSheetAry[$i][0]) && isset($spreadSheetAry[$i][1]) && isset($spreadSheetAry[$i][2]) && isset($spreadSheetAry[$i][3]) && $spreadSheetAry[$i][2]!='Sex';
            if(isset($spreadSheetAry[$i][0]) && isset($spreadSheetAry[$i][1]) && isset($spreadSheetAry[$i][2]) && isset($spreadSheetAry[$i][3]) && $spreadSheetAry[$i][2]!='Sex'){

                $class_id="";
                if (isset($spreadSheetAry[$i][0])) {
                    $class_id = $spreadSheetAry[$i][0];
                   
                }

                $full_name="";
                if(isset($spreadSheetAry[$i][1])){
                    $full_name = $spreadSheetAry[$i][1];
                    $full_name = str_replace("'","\'",$full_name);
                   
                }

                $sex ="";
                if (isset($spreadSheetAry[$i][2])) {
                    $sex = $spreadSheetAry[$i][2];
                    $sex = str_replace("'","\'",$sex);
                }

                 
                $age = "";
                if (isset($spreadSheetAry[$i][3])) {
                    $age =  $spreadSheetAry[$i][3];
                }

             
               
                $query = "insert into students (class_id,full_name,sex,age,class) values('$class_id',' $full_name','$sex','$age','$class')";
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

<p>Version 1.0</p>

</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

		
</body>
</html>

