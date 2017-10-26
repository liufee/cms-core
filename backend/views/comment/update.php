<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-24 12:51
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => yii::t('cms', 'Comments'), 'url' => Url::to(['index'])],
    ['label' => yii::t('cms', 'Update') . yii::t('cms', 'Comments')],
];
/**
 * @var $model backend\models\Comment
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]);
