<?
	$front_loggue = Session::get('front_loggue')
?>
<div id="banniere">
  <a id="logo" href="<?= Uri::base() ?>">Logo de page</a>
  <div id="login">Bonjour <?= $front_loggue['user_firstname'].' '.$front_loggue['user_lastname'] ?></div>
</div>
<h1><?= $page['page_titre'] ?></h1>
<p>
<?= html_entity_decode($page['page_content']) ?>
</p>