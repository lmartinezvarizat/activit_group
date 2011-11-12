<?= Gabarit::afficheLogin() ?> 
<div id="banniere">
  <a id="logo" href="<?= Uri::base() ?>">Logo de page</a>
  <div id="login">Login</div>
</div>
<h1><?= $page['page_titre'] ?></h1>
<p>
<?= html_entity_decode($page['page_content']) ?>
</p>
<?= Model_User::afficheFormUser(); ?>