<!--Consulta para reserva
--------------------------------------------

select ro.id idHabitacion
from rooms as ro left join reserves as re on re.idroom = ro.id

WHERE 
	(re.entrancedate NOT BETWEEN '2016-05-23 11:00:00' and '2016-05-26 12:00:00' 
	and re.exitdate not between '2016-05-23 11:00:00' and '2016-05-26 12:00:00')
    or (re.entrancedate is null 
    and re.exitdate is null)
group by ro.id
---------------------------------------------->
<?php

mb_internal_encoding('UTF-8'); 
mb_http_output('UTF-8'); 
mb_http_input('UTF-8'); 
mb_regex_encoding('UTF-8'); 
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
    if(isset($_POST['option'])) {
        $option = (int)$_POST['option'];
        $subOption = $_POST;
    }
}

//print_r($_POST);
//print_r($_GET);

$master = new masterController();
echo $master->run($option, $subOption);
?>