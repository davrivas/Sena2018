<?php

require_once ('../modelo/TipoFactura.php');
$tfObj = new TipoFactura();
$tiposFactura = $tfObj->todos();