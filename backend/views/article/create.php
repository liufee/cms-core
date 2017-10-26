<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 15:47
 */
use yii\helpers\Url;

/**
 * @var $model backend\models\Article
 */
$this->params['breadcrumbs'] = [
    ['label' => yii::t('cms', 'Articles'), 'url' => Url::to(['index'])],
    ['label' => yii::t('cms', 'Create') . yii::t('cms', 'Articles')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]);
