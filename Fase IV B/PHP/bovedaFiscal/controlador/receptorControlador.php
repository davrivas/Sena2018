<?php

@session_start();

require_once ('../modelo/Receptor.php');
$receptorObj = new Receptor();
$receptores = $receptorObj->todos();

