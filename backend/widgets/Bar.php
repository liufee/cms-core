<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-06-15 09:25
 */

namespace cms\backend\widgets;

use yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class Bar extends Widget
{
    public $buttons = [];

    public $options = [
        'class' => 'mail-tools tooltip-demo m-t-md',
    ];
    public $template = "{refresh} {create} {sort} {delete}";


    /**
     * @inheritdoc
     */
    public function run()
    {
        $buttons = '';
        $this->initDefaultButtons();
        $buttons .= $this->renderDataCellContent();
        if( strpos($this->template, '{sort}' ) ){
            ActiveForm::begin([
                'action' => Url::to('sort'),
                'method' => 'post',
                'options' => ['class' => 'form-horizontal', 'name' => 'sort']
            ]);
            ActiveForm::end();
        }
        return "<div class='{$this->options['class']}'>{$buttons}</div>";
    }

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent()
    {
        return preg_replace_callback('/\\{([\w\-\/]+)\\}/', function ($matches) {
            $name = $matches[1];
            if (isset($this->buttons[$name])) {
                return $this->buttons[$name] instanceof \Closure ? call_user_func($this->buttons[$name]) : $this->buttons[$name];
            } else {
                return '';
            }


        }, $this->template);
    }

    /**
     * 生成默认按钮
     *
     */
    protected function initDefaultButtons()
    {
        if (! isset($this->buttons['refresh'])) {
            $this->buttons['refresh'] = function () {
                return Html::a('<i class="fa fa-refresh"></i> ' . yii::t('cms', 'Refresh'), Url::to(['refresh']), [
                    'title' => yii::t('cms', 'Refresh'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-white btn-sm refresh',
                ]);
            };
        }

        if (! isset($this->buttons['create'])) {
            $this->buttons['create'] = function () {
                return Html::a('<i class="fa fa-plus"></i> ' . yii::t('cms', 'Create'), Url::to(['create']), [
                    'title' => yii::t('cms', 'Create'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-white btn-sm',
                ]);
            };
        }

        if (! isset($this->buttons['sort'])) {
            $this->buttons['sort'] = function () {
                return Html::a('<i class="fa  fa-sort-numeric-desc"></i> ' . yii::t('cms', 'Sort'), Url::to(['sort']), [
                    'title' => yii::t('cms', 'Sort'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-white btn-sm sort',
                ]);
            };
        }

        if (! isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function () {
                return Html::a('<i class="fa fa-trash-o"></i> ' . yii::t('cms', 'Delete'), Url::to(['delete']), [
                    'title' => yii::t('cms', 'Delete'),
                    'data-pjax' => '0',
                    'data-confirm' => yii::t('cms', 'Realy to delete?'),
                    'class' => 'btn btn-white btn-sm multi-operate',
                ]);
            };
        }
    }
}