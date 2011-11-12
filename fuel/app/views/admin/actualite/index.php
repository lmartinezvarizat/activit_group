<fieldset>
  <a href="<?= Uri::create('admin/actualite/:url', array('url' => 'add', 'todo' => 'add'), array('todo' => ':todo')) ?>">Ajouter une actualité</a><br />
  <table border="1" style="text-align:center" width="800px">
    <th>titre</th>
    <th>date de début</th>
    <th>publier</th>
    <th>Modifier</th>
    <th>Supprimer</th>
<?
    if (isset($news)) {
        foreach ($news as $new) {
            echo '<tr>';
            echo '<td>'.$new['actu_titre'].'</td>';
            echo '<td>'.$new['actu_date_debut'].'</td>';
            echo '<td>'.($new['actu_publier'] ? 'oui' : 'non' ).'</td>';
            echo '<td><a title="modifier" href="'.Uri::create('admin/actualite/:url', array('url' => 'add', 'todo' => 'modif', 'actu_id' => $new['actu_id']), array('todo' => ':todo', 'actu_id' => ':actu_id')).'">'.Asset::img('admin/edit.png', array('width' => '15px')).'</a></td>';
            echo '<td><a title="supprimer" onClick="return confirm(\'voulez vous vraiment supprimer cette actualité\')" href="'.Uri::create('admin/actualite/:url', array('url' => 'delete', 'todo' => 'delete', 'actu_id' => $new['actu_id']), array('todo' => ':todo', 'actu_id' => ':actu_id')).'">'.Asset::img('admin/delete.png', array('width' => '15px')).'</a></td>';
            echo '</tr>';
        }
    }
?>
  </table>
</fieldset>