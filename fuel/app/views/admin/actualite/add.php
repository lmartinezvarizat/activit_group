<script>
$(function() {
    $( "#tabs" ).tabs();
});
$(function() {
    $( ".datepicker" ).datepicker();
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
    echo Form::open(array('action' => 'admin/actualite/add', 'method' => 'post'));
    echo ($news ? Form::hidden('todo', 'modif_actu') : Form::hidden('todo', 'add_actu'));
    echo ($news ? Form::hidden('actu_id', $news['actu_id']) : '');
    echo Form::label('Titre').Form::input('actu_titre', ($news ? $news['actu_titre'] : ''));
    echo Html::br();

    echo Form::label('Date de début').Form::input('actu_date_debut', ($news ? $news['actu_date_debut'] : ''), array('class' => 'datepicker'));
    echo Html::br();
    echo Form::label('date de fin').Form::input('actu_date_fin', ($news ? $news['actu_date_fin'] : ''), array('class' => 'datepicker'));
    echo Html::br();
    echo Form::label('Publier').Form::checkbox('actu_publier', 1, ($news && $news['actu_publier'] ? array('checked' => 'checked') : array()));
    echo Html::br();
    echo Form::submit();
    echo Form::close();
?>
    </div>
    <div id="tabs-2">
<?
    echo Form::open(array('action' => 'admin/actualite/add', 'method' => 'post'));
    echo ($news ? Form::hidden('todo', 'modif_actu') : Form::hidden('todo', 'add_actu'));
    echo ($news ? Form::hidden('actu_id', $news['actu_id']) : '');
    echo Form::label('Description FR').Form::textarea('actu_description', ($news ? html_entity_decode($news['actu_description']) : ''));
    echo Html::br();
    echo Form::submit();
    echo Form::close();
?>
    </div>
    <div id="tabs-3">
<?
   echo Form::open(array('action' => 'admin/actualite/add', 'method' => 'post'));
    echo ($news ? Form::hidden('todo', 'modif_actu') : Form::hidden('todo', 'add_actu'));
    echo ($news ? Form::hidden('actu_id', $news['actu_id']) : '');
    echo Form::label('Description UK').Form::textarea('actu_description_uk', ($news ? html_entity_decode($news['actu_description_uk']) : ''));
    echo Html::br();
    echo Form::submit();
    echo Form::close();
?>
    </div>
  </div>
</div>
</fieldset>