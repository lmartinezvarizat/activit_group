<?

class Gabarit {

    public static function afficheLogin() {
?>
<div id="espace_login">
  <div id="close_login">Close</div>
  Identification
  <form action="<?= Uri::create('index/login')?>" method="post">
    <input type="hidden" name="todo" value="login" />
    <label>Login : </label><input type="text" name="user_login" value="votre login" onFocus="this.value=''" />
    <label>Mot de passe : </label><input type="password" name="user_password" value="votre mot de passe" onFocus="this.value=''" />
    <input type="submit" value="valider" />
  </form>
</div>
<?
    }
}