<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-25 11:14
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => yii::t('cms', 'Admin Users'), 'url' => Url::to(['index'])],
    ['label' => yii::t('cms', 'Create') . yii::t('cms', 'Admin Users')],
];
/**
 * @var $model backend\models\User
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]); ?>
