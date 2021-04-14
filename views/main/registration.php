<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrationForm */
?>
<div class="registration">


<div class="h3 text-center">Регистрация</div>

    <?php
    Pjax::begin();
       if (Yii::$app->session->hasFlash("goodReg")):?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">Вы успешно зарегистрировались! Теперь вы можете <a href="/login" class="alert-link">авторизоваться</a></div>
        </div>
    </div>
    <?php
    endif;
    $form = ActiveForm::begin([
        'id' => 'registration-form',
        'options' => ['data' => ['pjax' => true]],

    ]); ?>

    <?= $form->field($model, 'login')->textInput()->label('Логин')?>
    <?= $form->field($model, 'email')->textInput()->label('email')?>
    <?= $form->field($model, 'lastName')->textInput()->label('Фамилия') ?>
    <?= $form->field($model, 'name')->textInput()->label('Имя')?>
    <?= $form->field($model, 'patronymic')->textInput()->label('Отчество')?>
    <?= $form->field($model, 'password')->passwordInput()->label('Пароль')?>
    <?= $form->field($model, 'password2')->passwordInput()->label('Повтор пароля')?>
    <?= $form->field($model, 'agree')->checkbox([
        'template' => "<div class=\"form-group\"><div class=\"col-md12\">{input} {label}</div>\n<div class=\"col-lg-12\">{error}</div></div>",
    ])->label('Я согласен на обработку персональных данных') ?>
    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary center-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <?php Pjax::end();?>
</div>
