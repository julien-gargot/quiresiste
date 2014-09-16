<!DOCTYPE html>
<html lang="en">
<head>

  <title><?= html($site->title()) ?></title>
  <meta charset="utf-8" />
  <meta name="description" content="<?= html($site->description()) ?>" />
  <meta name="keywords" content="<?= html($site->keywords()) ?>" />
  <meta name="robots" content="index, follow" />

  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no, minimal-ui" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <?php $time = time() ?>
  <?= css('assets/styles/styles.css?version='.$time) ?>

</head>

<body class="<?= $page->template() ?>">

  <header id="header">
    <h1><a href="<?= url() ?>"><img src="<?= url('assets/images/logo.png') ?>" alt="<?= html($site->title()) ?>" /></a></h1>
  </header>