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

  <!-- Apple -->
  <link rel="apple-touch-icon" sizes="60x60"   href="<?= url('assets/images/icon/Icon-60.png') ?>" />
  <link rel="apple-touch-icon" sizes="72x72"   href="<?= url('assets/images/icon/Icon-72.png') ?>" />
  <link rel="apple-touch-icon" sizes="76x76"   href="<?= url('assets/images/icon/Icon-76.png') ?>" />
  <link rel="apple-touch-icon" sizes="120x120" href="<?= url('assets/images/icon/Icon-60@2x.png') ?>" />
  <link rel="apple-touch-icon" sizes="144x144" href="<?= url('assets/images/icon/Icon-72@2x.png') ?>" />
  <link rel="apple-touch-icon" sizes="152x152" href="<?= url('assets/images/icon/Icon-76@2x.png') ?>" />

  <?= css('assets/styles/styles.css?version='.time()) ?>

</head>

<body class="<?= $page->template() ?>">

  <header id="header">
    <h1><a href="<?= url() ?>"><img src="<?= url('assets/images/logo.png') ?>" alt="<?= html($site->title()) ?>" /></a></h1>
  </header>