<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-12-03 23:09
 */

/**
 * @var $banner common\models\Options
 */

use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => yii::t('cms', 'Banner Types'), 'url' => Url::to(['index'])],
    ['label' => yii::t('cms', 'Banner') . ' (' . $banner->tips . "-{$banner->name})", 'url' => Url::to(['banners', 'id'=>$banner->id])],
    ['label' => yii::t('cms', 'Update') . yii::t('cms', 'Banner')],
];
/**
 * @var $model backend\models\form\BannerForm
 */
?>
<?= $this->render('_banner_form', [
    'model' => $model,
]);