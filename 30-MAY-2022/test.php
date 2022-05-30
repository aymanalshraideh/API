<?php 
$serverame="localhost";
$username="root";
$password="";
$dbname="api";
$conn=mysqli_connect($serverame,$username,$password,$dbname);

if ($conn){
    header("Content-Type: JSON");
$arr=array();

$sql="SELECT * FROM testapi";
$result=mysqli_query($conn,$sql);
if ($result){
$i=0;
// header("Content-Type: JSON");
while($row=mysqli_fetch_array($result)){
         
    $arr[$i]["id"]=$row["id"];
    $arr[$i]["first_name"]=$row["first_name"];
    $arr[$i]["last_name"]=$row["last_name"];

    $arr[$i]["age"]=$row["age"];
$i++;
}


echo json_encode($arr);
}




}else{
    echo "FAILED CONNECTING";
}




//******** */ INSERT**********
if(isset($_POST['supinsert'])){

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];

$sqlinsert="INSERT INTO testapi (`first_name`, `last_name`, `age`) VALUES ('$fname', '$lname', '$age')";
$upload=mysqli_query($conn,$sqlinsert);



header("location:test.html");
// echo "<script>window.location.href='test.html';</script>";
}




// ******DELETE*********
if(isset($_POST['supdelete'])){
$id=$_POST['delete'];
$sqldelete="DELETE FROM testapi WHERE id = $id";
$delete=mysqli_query($conn,$sqldelete);
header("location:test.html");
}

// **************UPDATE ****************

if(isset($_POST['supupdate'])){
    $uid=$_POST['uid'];
$ufname=$_POST['ufname'];
$ulname=$_POST['ulname'];
$uage=$_POST['uage'];


$sqlupdate="UPDATE testapi SET first_name = '$ufname', last_name = '$ulname',age='$uage' where id=$uid";
$upload=mysqli_query($conn,$sqlupdate);
header("location:test.html");
}