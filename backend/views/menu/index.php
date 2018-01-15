<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-21 14:14
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ArrayDataProvider
 * @var $searchModel backend\models\search\MenuSearch
 */

use backend\grid\DateColumn;
use backend\grid\GridView;
use backend\grid\SortColumn;
use backend\grid\StatusColumn;
use backend\models\Menu;
use backend\widgets\Bar;
use common\libs\Constants;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;

$this->title = "Backend Menus";
$this->params['breadcrumbs'][] = yii::t('cms', 'Backend Menus');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout' => '{items}',
                    'columns' => [
                        [
                            'class' => CheckboxColumn::className(),
                        ],
                        [
                            'attribute' => 'name',
                            'label' => yii::t('cms', 'Name'),
                            'format' => 'html',
                            'value' => function ($model, $key, $index, $column) {
                                return str_repeat("--", $model['level'] - 1) . $model['name'];
                            }
                        ],
                        [
                            'attribute' => 'icon',
                            'label' => yii::t('cms', 'Icon'),
                            'format' => 'html',
                            'value' => function ($model) {
                                return "<i class=\"fa {$model['icon']}\"></i>";
                            }
                        ],
                        [
                            'attribute' => 'url',
                            'label' => yii::t('cms', 'Url'),
                        ],
                        [
                            'class' => SortColumn::className(),
                            'label' => yii::t('cms', 'Sort')
                        ],
                        [
                            'class' => StatusColumn::className(),
                            'attribute' => 'is_display',
                            'formName' => (new Menu)->formName() . '[is_display]',
                            'label' => yii::t('cms', 'Is Display'),
                            'filter' => Constants::getYesNoItems()
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'created_at',
                            'label' => yii::t('cms', 'Created At'),
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'updated_at',
                            'label' => yii::t('cms', 'Updated At'),
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'width' => '190px',
                            'buttons' => [
                                'create' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa  fa-plus" aria-hidden="true"></i> ' . yii::t('cms', 'Create'), Url::to([
                                        'create',
                                        'parent_id' => $model['id']
                                    ]), [
                                        'title' => yii::t('cms', 'Create'),
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-white btn-sm J_menuItem',
                                    ]);
                                }
                            ],
                            'template' => '{create} {update} {delete}',
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>