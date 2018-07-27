<?php
$servername = "localhost";
$username = "root";
$password = "123654";
$dbname="like";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM user_like";
$result = $conn->query($sql);
$count=$_POST['send'];
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
       $ncount=$row["count"];
    }
    $ncount+=1;
    $sql1="UPDATE user_like SET count=$ncount WHERE id=1";
    $result1=$conn->query($sql1);
    if($result1==TRUE){
    	echo $ncount;
    }else{
    	echo "fail";
    }

}else{
	$sql="INSERT INTO user_like (count) VALUES ($count)";
	if($result=$conn->query($sql)==TRUE){
		echo $count;
	}else{
		echo "error";
	}
}

