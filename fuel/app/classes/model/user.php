<?php

class Model_User extends Orm\Model {

    protected static $_table_name = 'user';

    protected static $_primary_key = array('user_id');

    public static function afficheFormUser() {

        $params = array(
            'url'           => Uri::create('index/login'),
            'method'        => 'post',
            'list_items'    => array(
                'todo'       => array(
                    'type'            => 'hidden',
                    'default_value'   => 'create_user',
                ),
                'user_firstname' => array(
                    'type'            => 'text',
                    'default_value'   => 'FirstName',
                    'label'           => 'FirstName',
                ),
                'user_lastname'       => array(
                    'type'            => 'text',
                    'default_value'   => 'LastName',
                    'label'           => 'LastName',
                ),
                'user_mail'       => array(
                    'type'            => 'text',
                    'default_value'   => 'E-mail',
                    'label'           => 'E-mail',
                ),
                'user_tel'       => array(
                    'type'            => 'text',
                    'default_value'   => 'Téléphone',
                    'label'           => 'Téléphone',
                ),
                'user_portable'       => array(
                    'type'            => 'text',
                    'default_value'   => 'Portable',
                    'label'           => 'Portable',
                ),
                'user_login'       => array(
                    'type'            => 'text',
                    'default_value'   => 'Login',
                    'label'           => 'Login',
                ),
                'user_password'       => array(
                    'type'            => 'password',
                    'default_value'   => 'Mot de passe',
                    'label'           => 'Mot de passe',
                ),
            )
        );
?>
<div id="form_user">
  <h3>Sign up</h3>
  <?= Formulaire::ShowForm($params); ?>
</div>
<?

        /*
?>
<div id="form_user">
  <h3>Sign up</h3>
  <form action="<?= Uri::create('index/login')?>" method="post">
    <input type="hidden" name="todo" value="create_user" />
    <label>FirstName : </label><input type="text" name="user_firstname" value="FirstName" onFocus="this.value=''" />
    <label>LastName : </label><input type="text" name="user_lastname" value="LastName" onFocus="this.value=''" />
    <label>E-mail : </label><input type="text" name="user_mail" value="E-mail" onFocus="this.value=''" />
    <label>Téléphone : </label><input type="text" name="user_tel" value="Téléphone" onFocus="this.value=''" />
    <label>Portable : </label><input type="text" name="user_portable" value="Portable" onFocus="this.value=''" />
    <label>Login : </label><input type="text" name="user_login" value="Login" onFocus="this.value=''" />
    <label>Mot de passe : </label><input type="password" name="user_password" value="Password" onFocus="this.value=''" />
    <input type="submit" value="valider" />
  </form>
</div>
<?*/
    }
}
