<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'ClassAutoLoad.php';


$ObjLayout->header($conf);
$ObjLayout->navbar($conf);
$ObjLayout->banner($conf);

$ObjLayout->footer($conf);