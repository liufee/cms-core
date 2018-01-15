<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-12-03 23:03
 */
/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ArrayDataProvider
 * @var $searchModel backend\models\search\MenuSearch
 * @var $model backend\models\form\BannerForm
 * @var $banner common\models\Options
 */

use backend\grid\GridView;
use backend\grid\SortColumn;
use backend\grid\StatusColumn;
use backend\widgets\Bar;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;

$this->title = "Banners";
$this->params['breadcrumbs'][] = ['label' => yii::t('cms', 'Banner Types'), 'url' => Url::to(['index'])];
$this->params['breadcrumbs'][] =  yii::t('cms', 'Banner') . ' (' . $banner->tips . "-{$banner->name})";
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget([
                    'buttons' => [
                        'create' => function () {
                            return Html::a('<i class="fa fa-plus"></i> ' . yii::t('cms', 'Create'), Url::to(['banner-create', 'id' => yii::$app->getRequest()->get('id')]), [
                                'title' => yii::t('cms', 'Create'),
                                'data-pjax' => '0',
                                'class' => 'btn btn-white btn-sm',
                            ]);
                        },
                        'update' => function () {
                            return Html::a('<i class="fa  fa-sort-numeric-desc"></i> ' . yii::t('cms', 'Sort'), Url::to(['banner-sort',  'id' => yii::$app->getRequest()->get('id')]), [
                                'title' => yii::t('cms', 'Sort'),
                                'data-pjax' => '0',
                                'param-sign'=>'sign',
                                'class' => 'btn btn-white btn-sm sort',
                            ]);
                        },
                        'delete' => function () {
                            return Html::a('<i class="fa fa-trash-o"></i> ' . yii::t('cms', 'Delete'), Url::to(['banner-delete', 'id' => yii::$app->getRequest()->get('id')]), [
                                'title' => yii::t('cms', 'Delete'),
                                'data-pjax' => '0',
                                'data-confirm' => yii::t('cms', 'Really to delete?'),
                                'param-sign'=>'sign',
                                'class' => 'btn btn-white btn-sm multi-operate',
                            ]);
                        },
                    ]
                ])?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '{items}',
                    'columns' => [
                        [
                            'class' => CheckboxColumn::className(),
                            'checkboxOptions' => function($model){
                                return ['value' => $model->sign];
                            }
                        ],
                        [
                            'attribute' => 'img',
                            'label' => yii::t('cms', 'Image'),
                            'format' => 'raw',
                            'value' => function($model){
                                $img = yii::$app->params['site']['url'] . $model->img;
                                return "<img style='max-width: 200px;max-height: 100px' src='{$img}'>";
                            }
                        ],
                        [
                            'attribute' => 'link',
                            'label' => yii::t('cms', 'Jump Link'),
                        ],
                        [
                            'attribute' => 'desc',
                            'label' => yii::t('cms', 'Description'),
                        ],
                        [
                            'class' => SortColumn::className(),
                            'label' => yii::t('cms', 'Sort'),
                            'primaryKey' => function($model){
                                return $model->sign;
                            },
                            'action' => Url::to(['banner-sort', 'id'=>yii::$app->getRequest()->get('id')]),
                        ],
                        [
                            'class' => StatusColumn::className(),
                            'label' => yii::t('cms', 'Status'),
                            'url' => function($model){
                                return Url::to(['banner-update', 'id' => $model['id'], 'sign'=>$model['sign']]);
                            }
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'width' => '190px',
                            'buttons' => [
                                'update' => function ($url, $model, $key, $index, $gridView) {
                                    return Html::a('<i class="fa fa-pencil"></i> ' . Yii::t('cms', 'Update'), Url::toRoute(['banner-update', 'id'=>$model->id, 'sign'=>$model->sign]), [
                                        'title' => Yii::t('cms', 'Update'),
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-white btn-sm',
                                    ]);
                                },
                                'delete' => function ($url, $model, $key, $index, $gridView) {
                                    return Html::a('<i class="glyphicon glyphicon-trash" aria-hidden="true"></i> ' . Yii::t('cms', 'Delete'), Url::toRoute(['banner-delete', 'id'=>$model->id, 'sign'=>$model->sign]), [
                                        'title' => Yii::t('cms', 'Delete'),
                                        'data-confirm' => Yii::t('cms', 'Are you sure you want to delete this item?'),
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-white btn-sm',
                                    ]);
                                }
                            ],
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>