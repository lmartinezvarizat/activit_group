<?
    $admin_session = Session::get('login');
    if ($admin_session) {
        $profile = new FrontProfiler();
        $profile->init();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title><?= $title?></title>
    <meta name="robots" content="noindex, nofollow">
    <?= Asset::css('front/site.css'); ?>

    <?= Asset::js('jquery-1.6.2.min.js'); ?>
    <?= Asset::js('front/site.js'); ?>
</head>
<body>
    <?= $content ?>
<?
    $user_session = Session::get('front_loggue');
    if ($user_session) {
?>
  <div id="show-profiler">Profiler</div>
  <div id="page-profiler">
    <div id="close-profiler">Close</div>
    <h1>Le contenu du feedback très prochainement</h1>
  </div>
<?
    }
?>
</body>
</html>