<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-21 14:32
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => yii::t('cms', 'Backend Menus'), 'url' => Url::to(['index'])],
    ['label' => yii::t('cms', 'Update') . yii::t('cms', 'Backend Menus')],
];

/**
 * @var $model backend\models\Menu
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>