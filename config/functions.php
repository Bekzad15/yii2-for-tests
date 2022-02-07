<?php

use yii\base\InvalidConfigException;

function dd($value = "") {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    exit;
}

function ddv($value = "") {
    echo "<pre>";
    var_export($value);
    echo "</pre>";
}

function kk($value = "") {
    echo "<pre>";
    var_export($value);
    echo "</pre>";
    exit;
}

function kkv($value = "") {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function pp($value = "") {
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    exit;
}

function visible($item = []){
    $visible = array_keys(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id));
    if (array_intersect($item, $visible)){
        return true;
    }
    return false;
}

function get_url_contents($url){

    $image = str_replace(' ', '%20', $url);
    $cxContext = stream_context_create(Yii::$app->params['proxy']);
    $m = @file_get_contents($image, False, $cxContext);
    if ($m){
        return $m;
    }

    try {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl($url)
            ->setOptions([
                'proxy' => Yii::$app->params['proxy']['http']['proxy'], // используем прокси
                'timeout' => 5, // устанавливаем тайм-аут в 5 секунд, если сервер не отвечает
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false
            ])
            ->send();
    } catch (InvalidConfigException $e){
        \Yii::info($e->getMessage(), 'errors');
        return false;
    }

    return $response->content;
}
