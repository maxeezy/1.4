<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $model app\models\LoginForm */
?>

<div class="h3 text-center">Авторизация</div>
<?php Pjax::begin(['options' => ['data' => ['pjax' => true]]])?>
<?php $form =  ActiveForm::begin()?>

<?= $form->field($model,'login')->textInput()->label('Логин')?>
<?= $form->field($model,'password')->passwordInput()->label('Пароль')?>
<div class="form-group">
    <?= Html::submitButton('Авторизоваться', ['class' => 'btn btn-primary center-block']) ?>
</div>
<?php $form =  ActiveForm::end()?>
<?php Pjax::end()?>