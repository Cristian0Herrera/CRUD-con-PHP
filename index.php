<?php session_start(); ?>
<?php
//session_start();

include_once "all_in_one_classes.php";
$obj = new all_in_one_classes();
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $addressErr = $passwordErr =$telErr = $mobileErr = "";
$name = $email =$password = $telefono = $gender = $address = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nameText"])) {
        $nameErr = "Este campo es requerido";
    } 
    if (empty($_POST["emailText"])) {
        $emailErr = "Este campo es requerido";
    } 
    if (empty($_POST["passwordText"])) {
        $passwordErr = "Este campo es requerido";
    } 
    if (empty($_POST["telText"])) {
        $telErr = "Este campo es requerido";
    } 
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<?php
if(isset($_POST['registrationSave'])){
    if(!empty($_POST['nameText'])&& !empty($_POST['emailText'])&& !empty($_POST['passwordText'])){
        $obj->registration($_POST['nameText'],$_POST['emailText'],$_POST['passwordText'],$_POST['telText']);
    }
}
?>
<html>
<head>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body><br>
<h2 align="center">Registro</h2>
<form action="" method="post" enctype="multipart/form-data">
    <table align="center">
        <tr>
            <td>Nombre</td>
            <td>:</td>
            <td><input type="text" name="nameText"> <span class="error">* <?php echo $nameErr;?></span></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" name="emailText"><span class="error">* <?php echo $emailErr;?></span></td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td>:</td>
            <td><input type="text" name="passwordText"><span class="error">*<?php echo $passwordErr;?></span> </td>
        </tr>
        <tr>
            <td>Telefono</td>
            <td>:</td>
            <td><input type="text" name="telText"><span class="error">*<?php echo $telErr;?></span> </td>
        </tr>
        <tr>
            <td colspan="4" align="center"><input type="submit" value="Save" name="registrationSave"></td>
        </tr>
    </table>
</form>
<ul>
    <li><a href="all_users.php">Click para ver los usuarios</a> </li>
    
</ul>
</body>
</html>

