<?php
namespace app\services;

use app\models\User;
use Yii;
/**
 * Сервис для работы с правами пользователей
 */
class AccessService 
{
    /**
     * Обычный пользователь
     */
    const USER = 0;
    
    /**
     * Администратор
     */
    const ADMIN = 1;
    
    const NAME_STATUSES = [
        self::USER => 'Пользователь',
        self::ADMIN => 'Администратор'
    ];
    
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
    
    /**
     * Получить права пользователя
     * @return string
     */
    public static function getUserAccess() : string
    {       
        $user = User::findOne(['id' => Yii::$app->user->id]);
        return self::NAME_STATUSES[$user->access];
    }
    
    /**
     * Присвоить права доступа пользователю
     * @param integer $id ID пользователя
     * @param integer $access права пользователя
     */
    public static function setUserAccess($id, $access)
    {
        if (($user = User::findOne(['id' => $id])) !== null) {
            $user->access = $access;
            $user->save();
            return $user;
        }
        throw new NotFoundHttpException('Пользователь не найден.');
    }

}
