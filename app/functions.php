<?php
/**
* validation messages
*/

function validationMsg($mesg, $type= 'danger'){
    return '<p class= "alert alert-'.$type.'"> '. $mesg .' !<button class="close" data-dismiss="alert">&times;</button></p>';
}

function insert($sql){
    global $connection;
    $connection -> query($sql);
}
function valueCheck($table, $column, $val){
        global $connection;
        $sql  = "SELECT $column FROM $table WHERE $column ='$val'";
		$data = $connection -> query($sql);
		return $data -> num_rows; 
}

    

?>