<?php


header("Expires: Sun, 31 Jan 2021 23:59:59 GMT");
// tres horas
$now = time();

//Obsoleta.
//$horas3 = gmstrftime("%a, %d %b %Y %H:%M:%S GMT", $now + 60 * 60 * 3);
$horas3 = gmdate("M d Y H:i:s", $now + 60 * 60 * 3);
header("Expires: {$horas3}");
// un año
$now = time();
//$anyo1 = gmstrftime("%a, %d %b %Y %H:%M:%S GMT", $now + 365 * 86440);
$anyo1 = gmdate("M d Y H:i:s", $now + 365 * 86440);
header("Expires: {$anyo1}");
// se marca como expirado (fecha en el pasado)
//$pasado = gmstrftime("%a, %d %b %Y %H:%M:%S GMT");
$pasado = gmdate("M d Y H:i:s");
header("Expires: {$pasado}");
// evitamos cache de navegador y/o proxy
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>