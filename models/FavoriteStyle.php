<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favorite_style".
 *
 * @property int $music_style_id_style
 * @property int $user_id
 *
 * @property User $user
 */
class FavoriteStyle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorite_style';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['music_style_id_style', 'user_id'], 'required'],
            [['music_style_id_style', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'music_style_id_style' => 'Music Style Id Style',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return FavoriteStyleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FavoriteStyleQuery(get_called_class());
    }
}
