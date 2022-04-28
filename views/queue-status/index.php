<?php
/* @var $this yii\web\View */
/* @var $model QueueStatuses */

/* @var $model QueueStatuses */

use app\models\QueueStatuses;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\web\JqueryAsset;

$this->registerJsFile('js/queue-status-form.js', ['depends' => [JqueryAsset::class]]);
?>

<div class="row">
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(['id' => 'queue-add-form']); ?>
        <?= $form->field($model, 's_name')->textInput() ?>
        <?= $form->field($model, 'c_name')->textInput() ?>
        <?= $form->field($model, 'c_id')->textInput() ?>
        <?= $form->field($model, 'a_type')->textInput() ?>
        <?= $form->field($model, 'direction')->textInput() ?>
        <?= $form->field($model, 'activation')->textInput() ?>
        <?= $form->field($model, 'c_state')->textInput() ?>
        <?= $form->field($model, 'control')->textInput() ?>
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        <?php $form::end() ?>
    </div>
</div>

