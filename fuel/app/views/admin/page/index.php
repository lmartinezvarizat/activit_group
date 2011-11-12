<fieldset>
  <a href="<?= Uri::create('admin/page/:url', array('url' => 'add', 'todo' => 'add'), array('todo' => ':todo')) ?>">Ajouter une page</a><br />
  <table border="1" style="text-align:center" width="800px">
    <th>titre</th>
    <th>publier</th>
    <th>Modifier</th>
    <th>Supprimer</th>
<?
    if (isset($pages)) {
        foreach ($pages as $page) {
            echo '<tr>';
            echo '<td>'.$page['page_titre'].'</td>';
            echo '<td>'.($page['page_publier'] ? 'oui' : 'non' ).'</td>';
            echo '<td><a title="modifier" href="'.Uri::create('admin/page/:url', array('url' => 'add', 'todo' => 'modif', 'page_id' => $page['page_id']), array('todo' => ':todo', 'page_id' => ':page_id')).'">'.Asset::img('admin/edit.png', array('width' => '15px')).'</a></td>';
            echo '<td><a title="supprimer" onClick="return confirm(\'voulez vous vraiment supprimer cette page\')" href="'.Uri::create('admin/page/:url', array('url' => 'delete', 'todo' => 'delete', 'page_id' => $page['page_id']), array('todo' => ':todo', 'page_id' => ':page_id')).'">'.Asset::img('admin/delete.png', array('width' => '15px')).'</a></td>';
            echo '</tr>';
        }
    }
?>
  </table>
</fieldset>