<?php

require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `student_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
if(isset($id))
$uemail = $conn->query("SELECT email from registered_user_list where id = '{$id}'")->fetch_array()[0];
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
	<dl>
        <dt class="text-muted">StudentName</dt>
        <dd class="pl-4"><?= isset($fullname) ? $fullname : "" ?></dd>
        <dt class="text-muted">Sex</dt>
        <dd class="pl-4"><?= isset($sex) ? $sex : '' ?></dd>
        <dt class="text-muted">Age</dt>
        <dd class="pl-4"><?= isset($age) ? $age : '' ?></dd>
        <dt class="text-muted">Grade</dt>
        <dd class="pl-4"><?= isset($grade) ? $grade : '' ?></dd>
        <dt class="text-muted">ID:</dt>
        <dd class="pl-4"><?= isset($id) ? ($id) : "" ?></dd>
    </dl>
    <div class="clear-fix my-3"></div>
    <div class="text-right">
        <button class="btn btn-sm btn-dark bg-gradient-dark btn-flat" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>