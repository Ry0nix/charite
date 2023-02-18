<?php
$servername="localhost";
$username="root";
$password="";
$database_name="charite";

$conn=mysqli_connect($servername,$username,$password,$database_name);
if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
}
if(isset($_POST['save']))
{
   $username = $_POST['confirm'];
    $logo = $_POST['logo'];
    $navcolor = $_POST['navcolor'];
    $bcolor = $_POST['bcolor'];
	

    $sql_query = "SELECT id FROM associations WHERE name='$username'";
    $result = mysqli_query($conn, $sql_query);

if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
$id = $row ["id"];
echo "alrighty";
}

    $sql = "UPDATE `associations` SET`logo_url`='$logo',`navcolor`='$navcolor',`bcolor`='$bcolor' WHERE id =$id";
    if(mysqli_query($conn,$sql))
    {
        header('Location: login.php');
  exit();


    }
    else
    {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);

}
?>
