<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace cms\backend\widgets;

use Yii;
use yii\base\InvalidCallException;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveFormAsset;

class ActiveForm extends \yii\widgets\ActiveForm
{

    public $options = [
        'class' => 'form-horizontal'
    ];

    public $fieldClass = 'backend\widgets\ActiveField';


    /**
     * 生成表单确认和重置按钮
     *
     * @param array $options
     */
    public function defaultButtons(array $options = [])
    {
        $options['size'] = isset($options['size']) ? $options['size'] : 4;
        return '<div class="form-group">
                                <div class="col-sm-' . $options['size'] . ' col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">' . yii::t('cms', 'Save') . '</button>
                                    <button class="btn btn-white" type="reset">' . yii::t('cms', 'Reset') . '</button>
                                </div>
                            </div>';
    }


    /**
     * @inheritdoc
     */
    public function run()
    {
        if (! empty($this->_fields)) {
            throw new InvalidCallException('Each beginField() should have a matching endField() call.');
        }

        $content = ob_get_clean();
        echo Html::beginForm($this->action, $this->method, $this->options);
        echo $content;

        if ($this->enableClientScript) {
            $id = $this->options['id'];
            $options = Json::htmlEncode($this->getClientOptions());
            $attributes = Json::htmlEncode($this->attributes);
            $view = $this->getView();
            ActiveFormAsset::register($view);
            $view->registerJs("jQuery('#$id').yiiActiveForm($attributes, $options);");
        }

        echo Html::endForm();
    }

}
