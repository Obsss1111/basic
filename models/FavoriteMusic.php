<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favorite_music".
 *
 * @property int $music_id_music
 * @property int $user_id
 *
 * @property User $user
 * @property Music $rel_music
 */
class FavoriteMusic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorite_music';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['music_id_music', 'user_id'], 'required'],
            [['music_id_music', 'user_id'], 'integer'],
            [['music_id_music', 'user_id'], 'unique', 'targetAttribute' => ['music_id_music', 'user_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['music_id_music'], 'exist', 'skipOnError' => true, 'targetClass' => Music::className(), 'targetAttribute' => ['music_id_music' => 'id_music']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'music_id_music' => 'Music Id Music',
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
        return $this->hasOne(User::className(), ['id' => 'user_id'])->andOnCondition(['user.id' => Yii::$app->user->id]);
    }

    /**
     * Gets query for [[MusicIdMusic]].
     *
     * @return \yii\db\ActiveQuery|MusicQuery
     */
    public function getRel_music()
    {
        return $this->hasOne(Music::className(), ['id_music' => 'music_id_music']);
    }
    
    public function addLikedMusic($music_id_music, $user_id) {
        $model = FavoriteMusic::findOne(['music_id_music' => $music_id_music, 'user_id' => $user_id]);
        if (!$model) {
            $newFavoriteMusic = new FavoriteMusic();
            $newFavoriteMusic->music_id_music = $music_id_music;
            $newFavoriteMusic->user_id = $user_id;
            $newFavoriteMusic->save(false);
            return $newFavoriteMusic . ' ' .$model;
        }
        return $model;
    }

    /**
     * {@inheritdoc}
     * @return FavoriteMusicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FavoriteMusicQuery(get_called_class());
    }
}
