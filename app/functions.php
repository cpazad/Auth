<?php
/**
* validation messages
*/

function validationMsg($mesg, $type= 'danger'){
    return '<p class= "alert alert-'.$type.'"> '. $mesg .' !<button class="close" data-dismiss="alert">&times;</button></p>';
}


?>