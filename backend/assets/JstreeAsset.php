<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace cms\backend\assets;

use yii;

class JstreeAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@cms/backend/web';

    public $css = [
        'static/js/plugins/jstree/themes/default/style.min.css',
    ];

    public $js = [
        'static/js/plugins/jstree/jstree.js',
    ];

    public $depends = [
        'feehi\assets\JqueryAsset',
    ];
}
