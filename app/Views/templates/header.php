<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
      <link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
      <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
      <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css'>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/style.css'); ?>">
    <title></title>
  </head>
  <body>
    <?php
      $uri = service('uri');
     ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="<?php echo base_url(); ?>/">Teste Softdesign</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php if (session()->get('isLoggedIn')): ?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
            <a class="nav-link"  href="<?php echo base_url().'/dashboard'; ?>">Dashboard</a>
          </li>
          <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
            <a class="nav-link" href="<?php echo base_url().'/profile'; ?>">Perfil</a>
          </li>
          <li class="nav-item <?= ($uri->getSegment(1) == 'books' ? 'active' : null) ?>">
            <a class="nav-link" href="<?php echo base_url().'/books'; ?>">Livros</a>
          </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>/logout">Sair</a>
          </li>
        </ul>
      <?php else: ?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
            <a class="nav-link" href="<?php echo base_url().'/'; ?>">Login</a>
          </li>
          <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>">
            <a class="nav-link" href="<?php echo base_url().'/register'; ?>">Register</a>
          </li>
        </ul>
        <?php endif; ?>
      </div>
      </div>
    </nav>
