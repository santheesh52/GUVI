<?php 
include('dbconfig.php');
// Get request data 
$FULLNAME = $_POST['FullName'];
$eMail = $_POST['eMail'];
$Phone = $_POST['Phone'];
$AGE = $_POST['Age'];
$Gender = $_POST['Gender'];
$ADDRESS = $_POST['Address'];

$query = "UPDATE userdetails SET name = '$FULLNAME', phone='$Phone', AGE='$AGE', GENDER='$Gender', ADDRESS='$ADDRESS' WHERE emailid = '".$eMail."'"; 
$result = mysqli_query($dbc, $query);
if($result)
{
    echo 'success,Updated Successfully !!!';
}
else
{
    echo 'error,Error in updating the profile. please try again!!!';
}
?>
