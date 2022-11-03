<?php 
function SecArrSql($conn, $arr){
    $res = array();
    foreach($arr as $key => $val){
        $res[$key] = mysqli_real_escape_string($conn,$val);
    }
    return $res;
}

?>