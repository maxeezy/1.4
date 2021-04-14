<?php


namespace app\models;


use yii\base\Model;

class DeleteForm extends Model
{
    public $reason;

    public function rules()
    {
        return [
          ['reason','required','message'=>'Вы должны указать причину']
        ];
    }

    public function doDelete(Request $request){
        $request->reason = $this->reason;
        $request->status = 3;
        $request->save();
    }

}