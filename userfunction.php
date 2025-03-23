<?php 
include('connection.php');

function getAll($table)
{
    global $con;
    $query= "select * from $table WHERE status='1'";
    return $query_run = mysqli_query($con,$query);

}
function getByID($table,$id)
{
    global $con;
    $query="SELECT * FROM $table WHERE id='$id' AND status='1'";
    return $query_run = mysqli_query($con,$query);
}






function redirect($url,$message)
{
    $session['message']=$message;
    header('location: '.$url);
    exit(0);
}


?>