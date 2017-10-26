<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-24 17:06
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => yii::t('cms', 'Category'), 'url' => Url::to(['index'])],
    ['label' => yii::t('cms', 'Create') . yii::t('cms', 'Category')],
];
/**
 * @var $model common\models\Category
 */
?>
<?= $this->render('_form', [
    'model' => $model
]); ?>