<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\widgets\Pjax;
/* @var $model app\models\RequestAdd */
/* @var array $categorys app\models\Category */

?>
<div class="h3 text-center">Добавление заявки</div>
<?php
Pjax::begin();
if (Yii::$app->session->hasFlash("goodAdd")):?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">Вы успешно отправили заявку! Свои заявки вы можете посмотреть <a href="/request/add" class="alert-link">здесь</a></div>
        </div>
    </div>
<?php
endif;
$form = ActiveForm::begin([
    'options' => ['data' => ['pjax' => true]]
]);
?>

<?= $form->field($model,'name')->textInput()->label('Заголовок проблемы')?>

<?= $form->field($model,'text')->textarea()->label('Подробное описание проблемы')?>

<?= $form->field($model,'category')->dropDownList($categorys)->label('Выберите категорию проблемы')?>

<?= $form->field($model,'photo')->fileInput()->label('Прикрепите фото проблемы')?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php
ActiveForm::end();
Pjax::end();
?>

