<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Projet</title>
    <meta name="robots" content="noindex, nofollow">
    <?= Asset::css('admin/admin.css') ?>
</head>

<body>
<?
    if ($_POST) {
        if ($response) {
            echo '<p style="color:red">'.$response.'</p>';
        }
    }
?>
  <div id="encart-login" style="width:350px;margin:150px auto;background:#ccc;color:#FFF">
    <h3>Identification</h3>
    <form action="" method="post">
      <input type="hidden" name="todo" value="verif_login" />
      <label>Login</label><input type="text" name="admi_login" /><br />
      <label>Password</label><input type="password" name="admi_password" />
      <input type="submit" value="valider" />
    </form>
 </div>
</body>
</html>