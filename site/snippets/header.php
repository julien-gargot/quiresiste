<!DOCTYPE html>
<html lang="en">
<head>

  <title><?= html($site->title()) ?> - <?= html($page->title()) ?></title>
  <meta charset="utf-8" />
  <meta name="description" content="<?= html($site->description()) ?>" />
  <meta name="keywords" content="<?= html($site->keywords()) ?>" />
  <meta name="robots" content="index, follow" />

  <meta name="viewport" content="width=device-width, minimal-ui, initial-scale = 1, user-scalable = no">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <?= css('assets/styles/styles.css') ?>

</head>

<body class="<?= $page->template() ?>">

  <header id="header">
    <h1><a href="<?= url() ?>"><img src="<?= url('assets/images/logo.png') ?>" alt="<?= html($site->title()) ?>" /></a></h1>
  </header>