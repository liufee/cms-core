<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-12-05 13:00
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => yii::t('cms', 'Ad'), 'url' => Url::to(['index'])],
    ['label' => yii::t('cms', 'Update') . yii::t('cms', 'Ad')],
];
/**
 * @var $model backend\models\form\AdForm
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]);
