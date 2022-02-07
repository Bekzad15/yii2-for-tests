<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class TestForm extends Model
{
    public function json()
    {
        $file_uz = json_decode(file_get_contents(Yii::getAlias('@app/web/uzb.json')));
        $data = [];
        $data2 = [];
        foreach ($file_uz->city as $item){
            foreach ($item->value as $one){
                $key = strval($one->value);
                $data[$key]['uz'] = $one->display;
            }
        }
//kk($data);
        $file_ru = json_decode(file_get_contents(Yii::getAlias('@app/web/rus.json')));
        foreach ($file_ru->city as $item){
            foreach ($item->value as $one){
                $key = strval($one->value);
                $data[$key]['ru'] = $one->display;
            }
        }


        kk($data);
    }

}