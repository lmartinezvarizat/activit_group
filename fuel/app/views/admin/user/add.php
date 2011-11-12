<fieldset>
<?
    echo Form::open(array('action' => 'admin/user/add', 'method' => 'post'));
    echo ($users ? Form::hidden('todo', 'modif_user') : Form::hidden('todo', 'add_user'));
    echo ($users ? Form::hidden('user_id', $users['user_id']) : '');
    echo Form::label('Nom').Form::input('user_firstname', ($users ? $users['user_firstname'] : ''));
    echo Html::br();
    echo Form::label('Prénom').Form::input('user_lastname', ($users ? $users['user_lastname'] : ''));
    echo Html::br();
    echo Form::label('Mail').Form::input('user_mail', ($users ? $users['user_mail'] : ''));
    echo Html::br();
    echo Form::label('Téléphone').Form::input('user_tel', ($users ? $users['user_tel'] : ''));
    echo Html::br();
    echo Form::label('Portable').Form::input('user_portable', ($users ? $users['user_portable'] : ''));
    echo Html::br();
    echo Form::label('Login').Form::input('user_login', ($users ? $users['user_login'] : ''));
    echo Html::br();
    echo Form::label('Mot de passe').Form::input('user_password', ($users ? $users['user_password'] : ''));
    echo Html::br();
    echo Form::submit();
    echo Form::close();
?>
</fieldset>