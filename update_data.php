<?php session_start(); ?>
<?php
include_once"all_in_one_classes.php";
$obj = new all_in_one_classes();
$get_id = $_GET['row_id'];
$up = $obj->dataShowForUpdate($get_id);
//echo $get_id;
$row = mysqli_fetch_array($up);
if(isset($_POST['registrationSave'])){
    $obj->dataUpdate($get_id,$_POST['nameText'],$_POST['emailText'],$_POST['passwordText'],$_POST['telText']);
}
?>
<br>
<h1 align="center">Actualizar Usuario</h1>
<form action="" method="post" enctype="multipart/form-data">
    <table align="center">
        <tr>
            <td>Nombre</td>
            <td>:</td>
            <td><!--<input type="hidden" name="id" value="<?php /*echo $row['id']; */?>">-->
                <input type="text" name="nameText" value="<?php echo $row['name']; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" name="emailText" value="<?php echo$row['email']; ?>"></td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td>:</td>
            <td><input type="text" name="passwordText" value="<?php echo$row['password']; ?>"> </td>
        </tr>
        <tr>
            <td>Telefono</td>
            <td>:</td>
            <td><input type="text" name="telText" value="<?php echo$row['telefono']; ?>"> </td>
        </tr>
        
        <tr>
            <td colspan="4" align="center"><input type="submit" value="Save" name="registrationSave"></td>
        </tr>
    </table>
</form>