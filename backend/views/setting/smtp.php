<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

/**
 * @var $this yii\web\View
 * @var $model common\models\Options
 */

use backend\widgets\ActiveForm;
use common\widgets\JsBlock;
use yii\helpers\Url;

$this->title = yii::t('cms', 'SMTP Setting');
$this->params['breadcrumbs'][] = yii::t('cms', 'SMTP Setting');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <?=$this->render('/widgets/_ibox-title');?>
            <div class="ibox-content">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'smtp_host') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'smtp_port') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'smtp_username') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'smtp_password')->textInput() ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'smtp_nickname')->textInput() ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'smtp_encryption') ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-primary" type="submit"><?= yii::t('cms', 'Save') ?></button>
                        <button id="test" class="btn btn-success" type="button"><?= yii::t('cms', 'Test') ?></button>
                        <button class="btn btn-white" type="reset"><?= yii::t('cms', 'Reset') ?></button>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php JsBlock::begin(); ?>
<script>
    $(document).ready(function () {
        $("#test").click(function () {
            layer.msg('<?=yii::t('cms', 'Loading, hold on please...')?>', {icon: 16, 'time': 0});
            $.ajax({
                url: '<?=Url::to(['test-smtp'])?>',
                method: 'post',
                data: $("form").serialize(),
                success: function (data) {
                    if (data == '1') {
                        layer.msg("<?=yii::t('cms', 'Success')?>");
                    } else {
                        layer.msg(data);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    layer.msg(XMLHttpRequest.responseText);
                },
                compelete: function () {
                    layer.closeAll('loading');
                }
            });
            return false;
        });
    })
</script>
<?php JsBlock::end(); ?>
