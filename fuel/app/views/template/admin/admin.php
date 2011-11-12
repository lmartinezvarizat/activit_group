<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Admin Projet</title>
    <meta name="robots" content="noindex, nofollow">
    <script type="text/javascript">BASE_URL = '<?= Uri::base(false)  ?>'</script>
    <?= Asset::css('admin/admin.css'); ?>
    <?= Asset::css('jquery_ui/ui-lightness/jquery-ui-1.8.16.custom.css'); ?>

    <?= Asset::js('jquery-1.6.2.min.js'); ?>
    <?= Asset::js('jquery-ui-1.8.16.custom.min.js'); ?>
    <?= Asset::js('admin/tinymce/jscripts/tiny_mce/tiny_mce.js'); ?>
    <?= Asset::js('admin/site.js'); ?>
</head>

<body>
  <div id="bandeau-logo">
    <a href="<?= Uri::create('admin/admin') ?>"><?= Asset::img('admin/logo.gif'); ?></a>
  </div>
  <div id="sidebar">
    <?= $menu ?>
  </div>
  <div id="content">
    <h1><?= $title ?></h1>
    <p><?= $content ?></p>
  </div>
  <br class="clearfloat" />
</body>
</html>