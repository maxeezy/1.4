<?php
use app\models\Request;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $dataProvider ActiveDataProvider */
?>

<div class="h3 text-center">Мои заявки</div>
<?php Pjax::begin()?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'=> $searchModel,
    'columns'=>[
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute'=>'name','label'=>'Название заявки'],
        ['attribute'=>'text','label'=>'Описание заявки'],
        [
            'attribute'=>'category',
            'label'=>'Категория заявки',
            'contentOptions' =>function ($model, $key, $index, $column){
                return ['class' => 'name'];
            },
            'content'=>function($data){return $data->category0->name;}
            ],
        [
            'attribute'=>'status',
            'label'=>'Статус заявки',
            'content' =>function($data){return $data->status0->name;},
            'filter' => $statusFilter
        ],
        ['class' => 'yii\grid\ActionColumn']
    ],
]);
Pjax::end();
?>
