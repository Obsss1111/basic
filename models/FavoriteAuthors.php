<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favorite_authors".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int $autor_id
 */
class FavoriteAuthors extends Autor
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorite_authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id', 'autor_id'], 'required'],
            [['user_id', 'autor_id'], 'integer'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'user_id' => 'User ID',
            'autor_id' => 'Autor ID',
        ];
    }
    /**
     * Подключение к модели Autor
     * @return Autor
     */
    public function getAutor() 
    {
        return $this->hasOne(Autor::className(), ['id' => 'autor_id']);
    }
    
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->andOnCondition(['user.id' => Yii::$app->user->id]);
    }
}
