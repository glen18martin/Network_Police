<?php
require '../config.php';
$dump = file_get_contents("client.dump");
$obj = json_decode($dump, true);


$hashes = array();
$result = mysql_query("SELECT * FROM app_hash");
while($row = mysql_fetch_array($result)) {
    $hashes[] = $row['hash']; 
}





$offenders = [];

for($id = 0; $id < count($obj); $id++) {
    for($i = 0; $i < count(array_values($obj)[$id]['pr']); $i++) {
        if(!isset(array_values($obj)[$id]['pr'][$i]['hash'])) continue;

        $pid = array_values($obj)[$id]['pr'][$i]['pid'];
        $path =  array_values($obj)[$id]['pr'][$i]['path'];
        $hash = array_values($obj)[$id]['pr'][$i]['hash'];
        $idx =  array_values($obj)[$id]["id"];

        foreach($hashes as $chash) {
            if($hash == $chash) {
                $offenders[] = array("id" => $idx, "exe" => $path, "pid" => $pid); 
            }
        }

        /*
        if(strpos($path, "vlc.exe") > 0) {  //if($hash == '70b2f403924958b8bd9bcace8e097a59') {
            $offenders[] = array("id" => $idx, "exe" => $path, "pid" => $pid); 
        }*/
    }
}

echo json_encode($offenders);


?>