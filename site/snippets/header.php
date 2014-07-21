<!DOCTYPE html>
<html lang="en">
<head>

  <title><?= html($site->title()) ?> - <?= html($page->title()) ?></title>
  <meta charset="utf-8" />
  <meta name="description" content="<?= html($site->description()) ?>" />
  <meta name="keywords" content="<?= html($site->keywords()) ?>" />
  <meta name="robots" content="index, follow" />

  <?= css('assets/styles/styles.css') ?>

</head>

<body>

  <div class="container">

    <header id="header">
      <h1><a href="<?= url() ?>"><img src="<?= url('assets/images/logo.png') ?>" width="115" height="41" alt="<?= html($site->title()) ?>" /></a></h1>
    </header>