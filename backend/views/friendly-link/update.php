<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-21 14:32
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => yii::t('cms', 'Friendly Links'), 'url' => Url::to(['index'])],
    ['label' => yii::t('cms', 'Update') . yii::t('cms', 'Friendly Links')],
];
/**
 * @var $model backend\models\FriendlyLink
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>