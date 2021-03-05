<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\services;

use app\models\User;
use Yii;
/**
 * Description of AccessService
 *
 * @author comin
 */
class AccessService {
    /**
     * Обычный пользователь
     */
    const USUAL_USER = 0;
    
    /**
     * Администратор
     */
    const ADMIN = 1;
    
    /**
     * Есть ли доступ у пользователя
     * @return bool
     */
    public static function hasAccess() : bool
    {
        $user = User::findOne(['id' => Yii::$app->user->id]);
        $access = $user->access;        
        if ($access === self::ADMIN) {
            return true;
        }
        return false;
    }
    
}
