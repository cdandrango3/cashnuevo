<?php

/* @var $this \yii\web\View */
/* @var $content string */
?>
<style>
    body {
        height: 100%;
    }

    body {
        /*margin-top: 50px;*/
        font-family: "Noto Sans Thai UI", sans-serif;
        font-size: 14px;
    }

    * {
        font-family: "Noto Sans Thai UI", sans-serif;
        font-size: 14px;
    }

    @font-face {
        font-family: 'Noto Sans Thai UI';
        src: url('font/subset-NotoSansThaiUI-Regular.woff2') format('woff2'),
            url('font/subset-NotoSansThaiUI-Regular.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }
</style>
<?php $this->beginBlock('header'); ?>
<?= $this->renderFile('@app/views/layouts/header.php') ?>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('left_menu'); ?>
<?= $this->renderFile('@app/views/layouts/menu.php') ?>
<?php $this->endBlock(); ?>

<?= $content ?>