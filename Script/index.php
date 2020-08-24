<?php
$WLFILE = fopen($_SERVER['DOCUMENT_ROOT']."/users.txt", "r") or die("Unable to open file!");
$WHITELIST = fread($WLFILE,filesize($_SERVER['DOCUMENT_ROOT']."/users.txt"));
fclose($WLFILE);
$Username = $_GET['user'];
$Password = $_GET['pass'];
$IP = $_SERVER['REMOTE_ADDR'];
if (strpos($WHITELIST, "USERNAME=".$Username."KEYWORD=".$Password."IP=".$_SERVER['REMOTE_ADDR']) !== false) {
$SCRIPTS = array("NormalScript");
$Scriptt = $_GET['script'];
if (in_array($Scriptt, $SCRIPTS)) {
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {echo('\nMSIE');}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE){echo('\nTrident');}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE){echo('\nFirefox');}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE){echo('\nChrome');}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE){echo('\nOpera Mini');}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE){echo('\nOpera');}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE){echo('\nSafari');}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Mozilla') !== FALSE){echo('\nMozilla');}
 else {
    $SCRIPT = fopen($_SERVER['DOCUMENT_ROOT']."/Scripts/".$Scriptt.".txt", "r") or die('o no');
    $Script = fread($SCRIPT,filesize($_SERVER['DOCUMENT_ROOT']."/Scripts/".$Scriptt.".txt"));
    fclose($SCRIPT);
    echo($Script);
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/LOG.txt", "\n".date('h:i:s A, m/d/Y').": User sucessfully logged in with the following: Username: ".$Username." Password: ".$Password." IP: ".$IP, FILE_APPEND | LOCK_EX);
 }
}
else {
    echo'Some information is incorrect, logged for suspicion.';
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/LOG.txt", "\n".date('h:i:s A, m/d/Y').": User failed to log in with the following: Username: ".$Username." Password: ".$Password." IP: ".$IP, FILE_APPEND | LOCK_EX);
}
}
else {
    echo'Some information is incorrect, logged for suspicion.';
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/LOG.txt", "\n".date('h:i:s A, m/d/Y').": User failed to log in with the following: Username: ".$Username." Password: ".$Password." IP: ".$IP, FILE_APPEND | LOCK_EX);
}
?>