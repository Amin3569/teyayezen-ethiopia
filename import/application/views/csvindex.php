<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>student registration</title>
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/styles.css" type="text/css" rel="stylesheet" />

        <script src="<?php echo base_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body>

        

        <div class="container" style="margin-top:50px">    
             <br>
            
 <?php if (isset($error)): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success') == TRUE): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
             
            <h2>Import students list excel file</h2>
                <form method="post" action="<?php echo base_url() ?>csv/importcsv" enctype="multipart/form-data">
                    <input type="file" name="userfile" ><br><br>
                    <input type="submit" name="submit" value="UPLOAD" class="btn btn-primary">
                </form>
                <div><form method="post" action="/gift/users/?page=students">    
	<button type="submit" class="btn btn-primary" name="shuffle">home</button>
</form></div>
            <br><br>
            <table class="table table-striped table-hover table-bordered">
                <caption>Students List</caption>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>fullname</th>
                        <th>sex</th>
                        <th>age</th>
                        <th>grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($student_list == FALSE): ?>
                        <tr><td colspan="6">There are currently No Students</td></tr>
                    <?php else: ?>
                        <?php foreach ($student_list as $row): ?>
                            <tr>
                            <td><?php echo $row['id']; ?></td>
                           
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['sex']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['grade']; ?></td>
                            </tr>
                            
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>


            <hr>
            
        </div>



    </body>
</html>
