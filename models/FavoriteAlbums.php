<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favorite_albums".
 *
 * @property int $id_fav_album
 * @property int $user_id
 * @property int $albums_id_album
 *
 * @property User $user
 * @property Albums $albumsIdAlbum
 */
class FavoriteAlbums extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorite_albums';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'albums_id_album'], 'required'],
            [['user_id', 'albums_id_album'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['albums_id_album'], 'exist', 'skipOnError' => true, 'targetClass' => Albums::className(), 'targetAttribute' => ['albums_id_album' => 'id_album']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fav_album' => 'Id Fav Album',
            'user_id' => 'User ID',
            'albums_id_album' => 'Albums Id Album',
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
     * Gets query for [[AlbumsIdAlbum]].
     *
     * @return \yii\db\ActiveQuery|AlbumsQuery
     */
    public function getAlbumsIdAlbum()
    {
        return $this->hasOne(Albums::className(), ['id_album' => 'albums_id_album']);
    }

    /**
     * {@inheritdoc}
     * @return FavoriteAlbumsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FavoriteAlbumsQuery(get_called_class());
    }
}
