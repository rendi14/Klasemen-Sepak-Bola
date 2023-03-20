<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logoatas.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords">
    <title>Klasemen Sepakbola</title>
    <?= $this->include('/Layout/css');  ?>
</head>
<!-- END: Head -->

<body class="py-5">
    <?= $this->include('/Layout/sidebar');  ?>
    <?= $this->renderSection('content') ?>
    <?= $this->include('/Layout/js');  ?>