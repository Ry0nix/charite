<?php

// Démarrer la session
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['username'])) {
  header('Location: mypage.php');
  exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Vérifier les identifiants de connexion
  $username = $_POST['username'];
  $password = $_POST['password'];

$conn = mysqli_connect("localhost","root","","charite");

if (!$conn)
{
	die("tu as fait une erreur" . mysqli_connect_error());
}

$sql = "SELECT * FROM associations WHERE name = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
$email = $row ["name"];
$pass = $row ["password"];
}
mysqli_close($conn);


  // Vérifier si les identifiants sont valides
  if ($username === $email && $password === $pass) {

    // Stocker le nom d'utilisateur dans une variable de session
    $_SESSION['username'] = $username;

    // Rediriger l'utilisateur vers la page personnalisée
    header('Location: mypage.php');
    exit();

  } 

else if ($username === 'client' && $password === 'nouvo') {

    // Stocker le nom d'utilisateur dans une variable de session
    $_SESSION['username'] = $username;

    // Rediriger l'utilisateur vers la page personnalisée
    header('Location: mypage.php');
    exit();

  } 


else {

    // Afficher un message d'erreur
    $message = 'Nom d\'utilisateur ou mot de passe incorrect. Veuillez réessayer.';
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Page de connexion</title>
</head>
<?php include('account.html');   ?> 


  <?php if (isset($message)) { ?>
    <p style="color: red;"><?php echo $message; ?></p>
  <?php } ?>

</html>
