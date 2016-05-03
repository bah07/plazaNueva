<?php

require('controller/masterController.php');

$option = 0;
$subOption = 0;

//Si dan la opcion por paramentros GET
if(!empty($_GET)) {
    if(isset($_GET['option'])) {
        $option = $_GET['option'];
    }

    if(isset($_GET['subOption'])) {
        $subOption = $_GET['subOption'];
    }
}

//Si dan los parametros por $POST
if(!empty($_POST)) {
    if(isset($option)) {
        $option = (int)$_POST['option'];
        $subOption = $_POST;
    }
}

//print_r($_POST);
//print_r($_GET);

$master = new masterController();
echo $master->run($option, $subOption);

?>