<?php

/* @var array $request app\models\Request */

use yii\helpers\Url;

?>


<div class="h3 text-center">Все заявки</div>
<div class="row">
<?php foreach ($request as $req):?>
    <div class="col-md-6">
        <div class="thumbnail" style="position: relative">
            <?php if($req->status==2):?>
            <div class="img2"  style="background-image:url('<?=Yii::getAlias('@web') . '/uploads/' . $req->photo_before?>') ;background-size: cover;height: 300px;"   data-img="<?=Yii::getAlias('@web') . '/uploads/' . $req->photo_before?>"></div>
            <div class="img"  style="background-image:url('<?=Yii::getAlias('@web') . '/uploads/' . $req->photo_after?>') ;background-size: cover;height: 300px;"   data-img="<?=Yii::getAlias('@web') . '/uploads/' . $req->photo_before?>"></div>
           <?php else:?>
                <div class=""  style="background-image:url('<?=Yii::getAlias('@web') . '/uploads/' . $req->photo_before?>') ;background-size: cover;height: 300px;"   data-img="<?=Yii::getAlias('@web') . '/uploads/' . $req->photo_before?>"></div>
            <?php endif;?>
            <div class="caption">
                <h3><?=$req->name?></h3>
                <p><?=$req->text?></p>
                <p>
                    <span class="badge">Дата: <?=date('d.m.Y H:i:s',$req->date)?></span>
                    <span class="badge">Статус: <?=$req->status0->name?></span>
                    <span class="badge">Категория: <?=$req->category0->name?></span>
                    <?php if ($req->status==3):?>
                        <span class="badge">Причина отказа: <?=$req->reason?></span>
                    <?php endif;?>
                </p>
                <?php if ($req->status==1):?>
                <p><a href="<?= Url::toRoute(['/admin/main/complete','id'=>$req->id])?>" class="btn btn-primary" role="button">Решена</a> <a href="<?= Url::toRoute(['/admin/main/delete','id'=>$req->id])?>" class="btn btn-danger " role="button">Отклонить</a></p>
                <?php endif;?>
            </div>
        </div>
    </div>
<?php endforeach;?>
</div>