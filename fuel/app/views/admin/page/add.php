<?

    $listeView = array();
    if (is_dir(APPPATH.'views/front')) {
        $listeView[] = 'choisir une vue';
        if ($dh = opendir(APPPATH.'views/front')) {
            while (($file = readdir($dh)) !== false) {
                if ($file != '.' && $file != '..') {
                    $view = substr($file, 0, strpos($file, '.'));
                    $listeView[$view] = $view;
                }
            }
            closedir($dh);
        }
    } else {
        $listeView[] = 'aucune vue disponible';
    }
    $params = array();
?>
<script>
$(function() {
    $( "#tabs" ).tabs();
});
</script>
<fieldset>
  <div class="demo">
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1">Propriété</a></li>
        <li><a href="#tabs-2">Contenu FR</a></li>
        <li><a href="#tabs-3">Contenu UK</a></li>
    </ul>
    <div id="tabs-1">
<?
    $params = array(
        'url'           => Uri::create('admin/page/add'),
        'method'        => 'post',
        'list_items'    => array(
            'todo'       => array(
                'type'            => 'hidden',
                'default_value'   => ($pages ? 'modif_page' : 'add_page'),
                'saut_de_ligne'      => true,
            ),
            'page_id'       => array(
                'type'            => 'hidden',
                'default_value'   => ($pages ? $pages['page_id'] : ''),
                'saut_de_ligne'      => true,
            ),
            'page_titre' => array(
                'type'            => 'text',
                'default_value'   => ($pages ? $pages['page_titre'] : ''),
                'label'           => 'Titre',
                'saut_de_ligne'      => true,
            ),
            'page_titre_virtuel'       => array(
                'type'            => 'text',
                'default_value'   => ($pages ? $pages['page_titre_virtuel'] : ''),
                'label'           => 'Titre url virtuel',
                'saut_de_ligne'      => true,
            ),
            'page_publier'       => array(
                'type'            => 'checkbox',
                'default_value'   => 1,
                'label'           => 'Publier',
                'style'              => array(
                    'checked'    =>  ($pages && $pages['page_publier'] ? 'checked' : ''),
                ),
                'saut_de_ligne'      => true,
            ),
            'page_view'       => array(
                'type'            => 'select',
                'default_value'   => ($pages && $pages['page_view'] ? $pages['page_view'] : ''),
                'select_value'    => $listeView,
                'label'           => 'View',
                'saut_de_ligne'      => true,
            ),
        )
    );

    Formulaire::ShowForm($params);

 /*   echo Form::open(array('action' => 'admin/page/add', 'method' => 'post'));
    echo ($pages ? Form::hidden('todo', 'modif_page') : Form::hidden('todo', 'add_page'));
    echo ($pages ? Form::hidden('page_id', $pages['page_id']) : '');
    echo Form::label('Titre').Form::input('page_titre', ($pages ? $pages['page_titre'] : ''));
    echo Html::br();
    echo Form::label('Titre url virtuel').Form::input('page_titre_virtuel', ($pages ? $pages['page_titre_virtuel'] : ''));
    echo Html::br();
    echo Form::label('Publier').Form::checkbox('page_publier', 1, ($pages && $pages['page_publier'] ? array('checked' => 'checked') : array()));
    echo Html::br();
    if (is_dir(APPPATH.'views/front')) {
        $listeView = array();
        $listeView[] = 'choisir une view';
        if ($dh = opendir(APPPATH.'views/front')) {
            while (($file = readdir($dh)) !== false) {
                if ($file != '.' && $file != '..') {
                    $view = substr($file, 0, strpos($file, '.'));
                    $listeView[$view] = $view;
                }
            }
            closedir($dh);
        }
        echo Form::label('View').Form::select('page_view', ($pages && $pages['page_view'] ? $pages['page_view'] : ''), $listeView);
        echo Html::br();
    }
    echo Form::submit();
    echo Form::close();*/
?>
    </div>
    <div id="tabs-2">
<?
    echo Form::open(array('action' => 'admin/page/add', 'method' => 'post'));
    echo ($pages ? Form::hidden('todo', 'modif_page') : Form::hidden('todo', 'add_page'));
    echo ($pages ? Form::hidden('page_id', $pages['page_id']) : '');
    echo Form::label('Contenu FR').Form::textarea('page_content', ($pages ? html_entity_decode($pages['page_content']) : ''));
    echo Html::br();
    echo Form::submit();
    echo Form::close();
?>
    </div>
    <div id="tabs-3">
<?
    echo Form::open(array('action' => 'admin/page/add', 'method' => 'post'));
    echo ($pages ? Form::hidden('todo', 'modif_page') : Form::hidden('todo', 'add_page'));
    echo ($pages ? Form::hidden('page_id', $pages['page_id']) : '');
    echo Form::label('Contenu UK').Form::textarea('page_content_uk', ($pages ? html_entity_decode($pages['page_content_uk']) : ''));
    echo Html::br();
    echo Form::submit();
    echo Form::close();
?>
    </div>
  </div>
</div>
</fieldset>