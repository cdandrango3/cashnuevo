<?php
/**
 * Created by PhpStorm.
 * User: ks
 * Date: 24/6/2561
 * Time: 1:54 น.
 */
namespace app\themes\adminlte3\assets;

use yii\web\AssetBundle;

class AdminleAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    public $css = [
        'dist/css/adminlte.min.css',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
    ];

    public $js = [
        'dist/js/adminlte.js',
        'plugins/bootstrap/js/bootstrap.bundle.min.js'
    ];

    public $publishOptions = [
        "only" => [
            "dist/js/*",
            "dist/css/*",
            "plugins/bootstrap/js/*",
        ],

    ];

    public $depends = [
        'yii\web\YiiAsset',
        //'yii\jui\JuiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'app\themes\adminlte3\assets\FontAwesomeAsset'
    ];
}