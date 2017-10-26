<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace cms\feehi\assets;

class ActiveFormAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@yii/assets';

    public $js = [
        'yii.activeForm.js',
    ];

    public $depends = [
        'cms\feehi\assets\YiiAsset',
    ];
}
