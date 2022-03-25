<?php
/**
 * Created by PhpStorm.
 * User: ks
 * Date: 24/6/2561
 * Time: 1:55 น.
 */

namespace app\themes\adminlte3\assets;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@bower/fontawesome';
    public $css = [
        'css/all.min.css',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
    ];
    public $publishOptions = [
        'only' => [
            'webfonts/*',
            'css/*',
        ]
    ];
}