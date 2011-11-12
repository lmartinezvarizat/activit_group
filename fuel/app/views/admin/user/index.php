<fieldset>
  <a href="<?= Uri::create('admin/user/:url', array('url' => 'add', 'todo' => 'add'), array('todo' => ':todo')) ?>">Ajouter une user</a><br />
  <table border="1" style="text-align:center" width="800px">
    <th>Nom</th>
    <th>Prénom</th>
    <th>Mail</th>
    <th>Modifier</th>
    <th>Supprimer</th>
<?
    if (isset($users)) {
        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>'.$user['user_firstname'].'</td>';
            echo '<td>'.$user['user_lastname'].'</td>';
            echo '<td>'.$user['user_mail'].'</td>';
            echo '<td><a title="modifier" href="'.Uri::create('admin/user/:url', array('url' => 'add', 'todo' => 'modif', 'user_id' => $user['user_id']), array('todo' => ':todo', 'user_id' => ':user_id')).'">'.Asset::img('admin/edit.png', array('width' => '15px')).'</a></td>';
            echo '<td><a title="supprimer" onClick="return confirm(\'voulez vous vraiment supprimer cette user\')" href="'.Uri::create('admin/user/:url', array('url' => 'delete', 'todo' => 'delete', 'user_id' => $user['user_id']), array('todo' => ':todo', 'user_id' => ':user_id')).'">'.Asset::img('admin/delete.png', array('width' => '15px')).'</a></td>';
            echo '</tr>';
        }
    }
?>
  </table>
</fieldset>