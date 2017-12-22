<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="../../controlleurs/enseignant_control.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="530" border="1">
    <tr>
      <td>Email:</td>
      <td><label for="email"></label>
      <input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <td>Nom:</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" /></td>
    </tr>
    <tr>
      <td>Prenom:</td>
      <td><label for="prenom"></label>
      <input type="text" name="prenom" id="prenom" /></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><label for="password"></label>
      <input type="text" name="password" id="password" /></td>
    </tr>
    <tr>
      <td>Photo:</td>
      <td><label for="photo"></label>
      <input type="file" name="photo" id="photo" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Inserer" /></td>
    </tr>
  </table>
</form>
</body>
</html>