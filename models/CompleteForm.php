<?php


namespace app\models;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class CompleteForm extends Model
{
    public $photo;

    public function rules()
    {
        return [
          ['photo','image','extensions'=>['jpg','jpeg','png','bmp'],'maxSize'=>10485760,'message'=>'Максимальный размер фото 10мб, поддерживаемые форматы: jpg,jpeg,png,bmp']
        ];
    }

    public function goComplete(Request $request){
        $request->status = 2;
        $photo = UploadedFile::getInstance($this, 'photo');
        $request->photo_after = $photo->name;
        $request->save();
        $photo->saveAs(Yii::getAlias('@app/web') . '/uploads/' . $photo->name);
    }

}