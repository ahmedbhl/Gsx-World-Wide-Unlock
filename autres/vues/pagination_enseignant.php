<?php require_once('../Connections/test.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_liste_enseignant = 3;
$pageNum_liste_enseignant = 0;
if (isset($_GET['pageNum_liste_enseignant'])) {
  $pageNum_liste_enseignant = $_GET['pageNum_liste_enseignant'];
}
$startRow_liste_enseignant = $pageNum_liste_enseignant * $maxRows_liste_enseignant;

mysql_select_db($database_test, $test);
$query_liste_enseignant = "SELECT * FROM enseignant";
$query_limit_liste_enseignant = sprintf("%s LIMIT %d, %d", $query_liste_enseignant, $startRow_liste_enseignant, $maxRows_liste_enseignant);
$liste_enseignant = mysql_query($query_limit_liste_enseignant, $test) or die(mysql_error());
$row_liste_enseignant = mysql_fetch_assoc($liste_enseignant);

if (isset($_GET['totalRows_liste_enseignant'])) {
  $totalRows_liste_enseignant = $_GET['totalRows_liste_enseignant'];
} else {
  $all_liste_enseignant = mysql_query($query_liste_enseignant);
  $totalRows_liste_enseignant = mysql_num_rows($all_liste_enseignant);
}
$totalPages_liste_enseignant = ceil($totalRows_liste_enseignant/$maxRows_liste_enseignant)-1;

$queryString_liste_enseignant = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_liste_enseignant") == false && 
        stristr($param, "totalRows_liste_enseignant") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_liste_enseignant = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_liste_enseignant = sprintf("&totalRows_liste_enseignant=%d%s", $totalRows_liste_enseignant, $queryString_liste_enseignant);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1">
  <tr>
    <td>id_enseignant</td>
    <td>email_enseignant</td>
    <td>nom_enseignant</td>
    <td>prenom_enseignant</td>
    <td>password_enseignant</td>
    <td>photo_enseignant</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_liste_enseignant['id_enseignant']; ?></td>
      <td><?php echo $row_liste_enseignant['email_enseignant']; ?></td>
      <td><?php echo $row_liste_enseignant['nom_enseignant']; ?></td>
      <td><?php echo $row_liste_enseignant['prenom_enseignant']; ?></td>
      <td><?php echo $row_liste_enseignant['password_enseignant']; ?></td>
      <td><?php echo $row_liste_enseignant['photo_enseignant']; ?></td>
    </tr>
    <?php } while ($row_liste_enseignant = mysql_fetch_assoc($liste_enseignant)); ?>
</table>
<table border="0">
  <tr>
    <td><?php if ($pageNum_liste_enseignant > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_liste_enseignant=%d%s", $currentPage, 0, $queryString_liste_enseignant); ?>"><img src="First.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_liste_enseignant > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_liste_enseignant=%d%s", $currentPage, max(0, $pageNum_liste_enseignant - 1), $queryString_liste_enseignant); ?>"><img src="Previous.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_liste_enseignant < $totalPages_liste_enseignant) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_liste_enseignant=%d%s", $currentPage, min($totalPages_liste_enseignant, $pageNum_liste_enseignant + 1), $queryString_liste_enseignant); ?>"><img src="Next.gif" /></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_liste_enseignant < $totalPages_liste_enseignant) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_liste_enseignant=%d%s", $currentPage, $totalPages_liste_enseignant, $queryString_liste_enseignant); ?>"><img src="Last.gif" /></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($liste_enseignant);
?>
