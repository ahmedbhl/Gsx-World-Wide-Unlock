<?php require_once('../../Connections/test.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_liste_etudiant = 2;
$pageNum_liste_etudiant = 0;
if (isset($_GET['pageNum_liste_etudiant'])) {
  $pageNum_liste_etudiant = $_GET['pageNum_liste_etudiant'];
}
$startRow_liste_etudiant = $pageNum_liste_etudiant * $maxRows_liste_etudiant;

mysql_select_db($database_test, $test);
$query_liste_etudiant = "SELECT * FROM inscription";
$query_limit_liste_etudiant = sprintf("%s LIMIT %d, %d", $query_liste_etudiant, $startRow_liste_etudiant, $maxRows_liste_etudiant);
$liste_etudiant = mysql_query($query_limit_liste_etudiant, $test) or die(mysql_error());
$row_liste_etudiant = mysql_fetch_assoc($liste_etudiant);

if (isset($_GET['totalRows_liste_etudiant'])) {
  $totalRows_liste_etudiant = $_GET['totalRows_liste_etudiant'];
} else {
  $all_liste_etudiant = mysql_query($query_liste_etudiant);
  $totalRows_liste_etudiant = mysql_num_rows($all_liste_etudiant);
}
$totalPages_liste_etudiant = ceil($totalRows_liste_etudiant/$maxRows_liste_etudiant)-1;

$queryString_liste_etudiant = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_liste_etudiant") == false && 
        stristr($param, "totalRows_liste_etudiant") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_liste_etudiant = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_liste_etudiant = sprintf("&totalRows_liste_etudiant=%d%s", $totalRows_liste_etudiant, $queryString_liste_etudiant);
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
    <td>idinscrit</td>
    <td>nom</td>
    <td>prenom</td>
    <td>adressemail</td>
    <td>telephone</td>
    <td>civilite</td>
    <td>nature</td>
    <td>pseudo</td>
    <td>motpasse</td>
    <td>confirmationmotpasse</td>
    <td>status</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_liste_etudiant['idinscrit']; ?></td>
      <td><?php echo $row_liste_etudiant['nom']; ?></td>
      <td><?php echo $row_liste_etudiant['prenom']; ?></td>
      <td><?php echo $row_liste_etudiant['adressemail']; ?></td>
      <td><?php echo $row_liste_etudiant['telephone']; ?></td>
      <td><?php echo $row_liste_etudiant['civilite']; ?></td>
      <td><?php echo $row_liste_etudiant['nature']; ?></td>
      <td><?php echo $row_liste_etudiant['pseudo']; ?></td>
      <td><?php echo $row_liste_etudiant['motpasse']; ?></td>
      <td><?php echo $row_liste_etudiant['confirmationmotpasse']; ?></td>
      <td><?php echo $row_liste_etudiant['status']; ?></td>
    </tr>
    <?php } while ($row_liste_etudiant = mysql_fetch_assoc($liste_etudiant)); ?>
</table>
<p>&nbsp;
<table border="0">
  <tr>
    <td><?php if ($pageNum_liste_etudiant > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_liste_etudiant=%d%s", $currentPage, 0, $queryString_liste_etudiant); ?>"><img src="First.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_liste_etudiant > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_liste_etudiant=%d%s", $currentPage, max(0, $pageNum_liste_etudiant - 1), $queryString_liste_etudiant); ?>"><img src="Previous.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_liste_etudiant < $totalPages_liste_etudiant) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_liste_etudiant=%d%s", $currentPage, min($totalPages_liste_etudiant, $pageNum_liste_etudiant + 1), $queryString_liste_etudiant); ?>"><img src="Next.gif" /></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_liste_etudiant < $totalPages_liste_etudiant) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_liste_etudiant=%d%s", $currentPage, $totalPages_liste_etudiant, $queryString_liste_etudiant); ?>"><img src="Last.gif" /></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</p>
</body>
</html>
<?php
mysql_free_result($liste_etudiant);
?>
