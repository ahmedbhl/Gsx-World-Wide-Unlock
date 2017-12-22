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

$maxRows_liste_documents = 3;
$pageNum_liste_documents = 0;
if (isset($_GET['pageNum_liste_documents'])) {
  $pageNum_liste_documents = $_GET['pageNum_liste_documents'];
}
$startRow_liste_documents = $pageNum_liste_documents * $maxRows_liste_documents;

mysql_select_db($database_test, $test);
$query_liste_documents = "SELECT * FROM documents";
$query_limit_liste_documents = sprintf("%s LIMIT %d, %d", $query_liste_documents, $startRow_liste_documents, $maxRows_liste_documents);
$liste_documents = mysql_query($query_limit_liste_documents, $test) or die(mysql_error());
$row_liste_documents = mysql_fetch_assoc($liste_documents);

if (isset($_GET['totalRows_liste_documents'])) {
  $totalRows_liste_documents = $_GET['totalRows_liste_documents'];
} else {
  $all_liste_documents = mysql_query($query_liste_documents);
  $totalRows_liste_documents = mysql_num_rows($all_liste_documents);
}
$totalPages_liste_documents = ceil($totalRows_liste_documents/$maxRows_liste_documents)-1;$maxRows_liste_documents = 10;
$pageNum_liste_documents = 0;
if (isset($_GET['pageNum_liste_documents'])) {
  $pageNum_liste_documents = $_GET['pageNum_liste_documents'];
}
$startRow_liste_documents = $pageNum_liste_documents * $maxRows_liste_documents;

mysql_select_db($database_test, $test);
$query_liste_documents = "SELECT * FROM documents";
$query_limit_liste_documents = sprintf("%s LIMIT %d, %d", $query_liste_documents, $startRow_liste_documents, $maxRows_liste_documents);
$liste_documents = mysql_query($query_limit_liste_documents, $test) or die(mysql_error());
$row_liste_documents = mysql_fetch_assoc($liste_documents);

if (isset($_GET['totalRows_liste_documents'])) {
  $totalRows_liste_documents = $_GET['totalRows_liste_documents'];
} else {
  $all_liste_documents = mysql_query($query_liste_documents);
  $totalRows_liste_documents = mysql_num_rows($all_liste_documents);
}
$totalPages_liste_documents = ceil($totalRows_liste_documents/$maxRows_liste_documents)-1;$maxRows_liste_documents = 10;
$pageNum_liste_documents = 0;
if (isset($_GET['pageNum_liste_documents'])) {
  $pageNum_liste_documents = $_GET['pageNum_liste_documents'];
}
$startRow_liste_documents = $pageNum_liste_documents * $maxRows_liste_documents;

mysql_select_db($database_test, $test);
$query_liste_documents = "SELECT * FROM documents";
$query_limit_liste_documents = sprintf("%s LIMIT %d, %d", $query_liste_documents, $startRow_liste_documents, $maxRows_liste_documents);
$liste_documents = mysql_query($query_limit_liste_documents, $test) or die(mysql_error());
$row_liste_documents = mysql_fetch_assoc($liste_documents);

if (isset($_GET['totalRows_liste_documents'])) {
  $totalRows_liste_documents = $_GET['totalRows_liste_documents'];
} else {
  $all_liste_documents = mysql_query($query_liste_documents);
  $totalRows_liste_documents = mysql_num_rows($all_liste_documents);
}
$totalPages_liste_documents = ceil($totalRows_liste_documents/$maxRows_liste_documents)-1;

$queryString_liste_documents = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_liste_documents") == false && 
        stristr($param, "totalRows_liste_documents") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_liste_documents = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_liste_documents = sprintf("&totalRows_liste_documents=%d%s", $totalRows_liste_documents, $queryString_liste_documents);
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
    <td>id_doc</td>
    <td>libelle_doc</td>
    <td>format_doc</td>
    <td>resume_doc</td>
    <td>date_insertion</td>
    <td>etat_doc</td>
    <td>type</td>
    <td>id_cour</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_liste_documents['id_doc']; ?></td>
      <td><?php echo $row_liste_documents['libelle_doc']; ?></td>
      <td><?php echo $row_liste_documents['format_doc']; ?></td>
      <td><?php echo $row_liste_documents['resume_doc']; ?></td>
      <td><?php echo $row_liste_documents['date_insertion']; ?></td>
      <td><?php echo $row_liste_documents['etat_doc']; ?></td>
      <td><?php echo $row_liste_documents['type']; ?></td>
      <td><?php echo $row_liste_documents['id_cour']; ?></td>
    </tr>
    <?php } while ($row_liste_documents = mysql_fetch_assoc($liste_documents)); ?>
</table>
<table border="0">
  <tr>
    <td><?php if ($pageNum_liste_documents > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_liste_documents=%d%s", $currentPage, 0, $queryString_liste_documents); ?>"><img src="First.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_liste_documents > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_liste_documents=%d%s", $currentPage, max(0, $pageNum_liste_documents - 1), $queryString_liste_documents); ?>"><img src="Previous.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_liste_documents < $totalPages_liste_documents) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_liste_documents=%d%s", $currentPage, min($totalPages_liste_documents, $pageNum_liste_documents + 1), $queryString_liste_documents); ?>"><img src="Next.gif" /></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_liste_documents < $totalPages_liste_documents) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_liste_documents=%d%s", $currentPage, $totalPages_liste_documents, $queryString_liste_documents); ?>"><img src="Last.gif" /></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($liste_documents);
?>
