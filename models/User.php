<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $IdUser
 * @property string|null $Login
 * @property string|null $Password
 * @property string|null $FavoriteMusic
 * @property string|null $FavoriteAlbum
 * @property string|null $FavoriteStyleMusic
 * @property string|null $FavoriteAutor
 * @property string|null $FavoriteStyle
 *
 * @property Album[] $albums
 * @property Autor[] $autors
 * @property Music[] $musics
 * @property Musicstyle[] $musicstyles
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdUser'], 'required'],
            [['IdUser'], 'integer'],
            [['Login', 'Password', 'FavoriteStyleMusic', 'FavoriteAutor', 'FavoriteStyle'], 'string', 'max' => 30],
            [['FavoriteMusic'], 'string', 'max' => 1024],
            [['FavoriteAlbum'], 'string', 'max' => 256],
            [['IdUser'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdUser' => 'Id User',
            'Login' => 'Login',
            'Password' => 'Password',
            'FavoriteMusic' => 'Favorite Music',
            'FavoriteAlbum' => 'Favorite Album',
            'FavoriteStyleMusic' => 'Favorite Style Music',
            'FavoriteAutor' => 'Favorite Autor',
            'FavoriteStyle' => 'Favorite Style',
        ];
    }

    /**
     * Gets query for [[Albums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[Autors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutors()
    {
        return $this->hasMany(Autor::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[Musics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusics()
    {
        return $this->hasMany(Music::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[Musicstyles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusicstyles()
    {
        return $this->hasMany(Musicstyle::className(), ['IdUser' => 'IdUser']);
    }
}
