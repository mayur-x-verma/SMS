<?php

namespace app\components;

use Yii;

class EncryptHelper
{
    const METHOD = 'AES-256-CBC';

    public static function encrypt($string)
    {
        $key = hash('sha256', Yii::$app->params['encryptionKey']);
        $iv = substr(hash('sha256', Yii::$app->params['encryptionIV']), 0, 16);
        return base64_encode(openssl_encrypt($string, self::METHOD, $key, 0, $iv));
    }

    public static function decrypt($string)
    {
        $key = hash('sha256', Yii::$app->params['encryptionKey']);
        $iv = substr(hash('sha256', data: Yii::$app->params['encryptionIV']), 0, 16);
        return openssl_decrypt(base64_decode($string), self::METHOD, $key, 0, $iv);
    }

}

