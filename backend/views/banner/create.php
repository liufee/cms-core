<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-12-03 22:17
 */

use yii\helpers\Url;

/**
 * @var $model backend\models\form\BannerForm
 */
$this->params['breadcrumbs'] = [
    ['label' => yii::t('cms', 'Banner Types'), 'url' => Url::to(['index'])],
    ['label' => yii::t('cms', 'Create') . yii::t('cms', 'Banner Types')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]);