<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace cms\install\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{

    public $baseUrl = '@web';
    public $sourcePath = '@cms/install/static';
    public $css = [
        'css/theme.min.css',
        'css/install.css',
        'css/awesome/font-awesome.min.css',
    ];
    public $js = [
        'js/validate.js',
        'js/ajaxForm.js',
    ];
    public $depends = [
        'cms\feehi\assets\JqueryAsset',
        'cms\install\assets\LayerAsset',
    ];
}
