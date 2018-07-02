<?
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 18/05/2018
 * Time: 14:00
 */

include "functions.php";
//$fileName = "example.json";
//$res = decodeJson($fileName);
header('Content-type: text/html; charset=utf-8');
$submitted = isset($_POST["submit"]) && isset($_FILES["file"]["tmp_name"]);
$res = $submitted ? decodeJson($_FILES["file"]["tmp_name"]) : null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>index</title>
    <meta charset="UTF-8">
</head>
<body>

<? $res ? var_dump($res) : null ?>
<form id="form" method="post" action="." enctype="multipart/form-data">
    <input type="file" id="file" name="file" accept=".json"/>
    <input type="submit" id="submit" name="submit" value="GO">
</form>
</body>
</html>
