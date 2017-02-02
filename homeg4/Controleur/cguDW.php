<?php
// désactive le temps max d'exécution
set_time_limit(0);
 
// démarrage de la session
session_start();
 
// vérifie que l'utilisateur est connecté
if (!isset($_SESSION["user_id"])) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}
 
// on a bien une demande de téléchargement de fichier
if (empty($_GET["baro.png"])) {
    header("HTTP/1.1 404 Not Found");
    exit;
}
// le nom doit être un nom de fichier
if(basename($_GET["baro.png"]) != $_GET["baro.png"]) {
    header("HTTP/1.1 400 Bad Request");
    exit;
}
$name = $_GET["baro.png"];
 
// vérifie l'existence et l'accès en lecture au fichier
$filename = dirname(__FILE__)."/../files/".$name;
if (!is_file($filename) || !is_readable($filename)) {
    header("HTTP/1.1 404 Not Found");
    exit;
}
$size = filesize($filename);
 
// désactivation compression GZip
if (ini_get("zlib.output_compression")) {
    ini_set("zlib.output_compression", "Off");
}
 
// fermeture de la session
session_write_close();
 
// désactive la mise en cache
header("Cache-Control: no-cache, must-revalidate");
header("Cache-Control: post-check=0,pre-check=0");
header("Cache-Control: max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
 
// force le téléchargement du fichier avec un beau nom
header("Content-Type: application/force-download");
header('Content-Disposition: attachment; filename="Mentions Légales Homeg4'.$name.'./images/');
 
// indique la taille du fichier à télécharger
header("Content-Length: ".$size);
 
// envoi le contenu du fichier
readfile($filename);
?>