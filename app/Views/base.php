<html>
    <head>
        <?= $this->include('layouts/head') ?>
    </head>
    <body>
        <?= $this->include('layouts/navbar') ?>
        <?= $this->include('layouts/header') ?>
        <?= $this->renderSection('content') ?>
    </main>
        <?= $this->include('layouts/about') ?>
        <?= $this->include('layouts/footer') ?>
        <?= $this->include('layouts/scripts') ?>
    </body>
</html>