<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
?>

    <div class="h3 text-center">Отклонение заявки</div>
<?php
Pjax::begin();
if (Yii::$app->session->hasFlash("goodDelete")):?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">Вы успешно изменили статус на решена!</div>
        </div>
    </div>
<?php
endif;
$form = ActiveForm::begin([
    'options' => ['data' => ['pjax' => true]]
]);
?>

<?= $form->field($model,'reason')->textInput()->label('Причина отказа');?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php $form::end()?>
<?php Pjax::end()?>