<?php


namespace app\models;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class RequestAdd extends Model
{
    public $name;
    public $text;
    public $category;
    /**
     * @var UploadedFile
     */
    public $photo;

    public function rules()
    {
        return [
            ['name','required','message'=>'Поле Имя заявки не должно быть пустое'],
            ['text','required','message'=>'Поле Описание проблемы не должно быть пустое'],
            ['category','required','message'=>'Поле Название темы не должно быть пустое'],
            //['photo','required','message'=>'Прикрепите фотографию'],
            ['photo','image','extensions'=>['jpg','jpeg','png','bmp'],'maxSize'=>10485760,'message'=>'Максимальный размер фото 10мб, поддерживаемые форматы: jpg,jpeg,png,bmp']
        ];
    }

    public function add(){
        $photo = UploadedFile::getInstance($this, 'photo');
        $request = new Request();
        $request->name = $this->name;
        $request->text = $this->text;
        $request->photo_before = $photo->name;
        $request->photo_after = null;
        $request->date = time();
        $request->status = 1;
        $request->category = $this->category;
        $request->owner = \Yii::$app->user->getId();
        $request->save();
        $photo->saveAs(Yii::getAlias('@app/web') . '/uploads/' . $photo->name);
        return true;

    }


}