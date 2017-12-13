<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-08-12 22:37
 */

namespace cms\frontend\assets;


class IndexAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@cms/frontend/web';

    public $js = [
        'static/js/responsiveslides.min.js',
    ];

    public $depends = [
        'frontend\assets\AppAsset'
    ];
}