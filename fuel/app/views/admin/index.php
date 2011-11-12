<ul class="menu-sidebar">
<?
foreach ($links as $link) {
?>
  <li><a href="<?= $link['link'] ?>"><?= $link['title'] ?></a></li>
<?
}
?>
</ul>