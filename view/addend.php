<?php
include_once ("../model/entity/learninghistory.php");
$rs = learninghistory::getListAdd($_REQUEST['id'], $_REQUEST['YearFrom'],$_REQUEST['YearTo'],$_REQUEST['SchoolName'],$_REQUEST['SchoolAddress'],$_REQUEST['IdStudent']);

$output = array(
    'id' => $_REQUEST['id'],
    'YearFrom'  => $_REQUEST['YearFrom'],
    'YearTo'=> $_REQUEST['YearTo'],
    'SchoolName'=> $_REQUEST['SchoolName'],
    'SchoolAddress' => $_REQUEST['SchoolAddress'],
    'IdStudent'=>$_REQUEST['IdStudent']

);

echo json_encode($output);
?>