<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autors".
 *
 * @property int $IdAutor Index
 * @property int|null $IdUser
 * @property string|null $NameAutor Name Autor
 *
 * @property Album[] $albums
 * @property User $idUser
 * @property Music[] $musics
 * @property Musicstyle[] $musicstyles
 */
class Autors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdAutor'], 'required'],
            [['IdAutor', 'IdUser'], 'integer'],
            [['NameAutor'], 'string', 'max' => 30],
            [['IdAutor'], 'unique'],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'IdUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdAutor' => 'Index',
            'IdUser' => 'Id User',
            'NameAutor' => 'Name Autor',
        ];
    }

    /**
     * Gets query for [[Albums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['IdAutor' => 'IdAutor']);
    }

    /**
     * Gets query for [[IdUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[Musics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusics()
    {
        return $this->hasMany(Music::className(), ['IdAutor' => 'IdAutor']);
    }

    /**
     * Gets query for [[Musicstyles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusicstyles()
    {
        return $this->hasMany(Musicstyle::className(), ['IdAutor' => 'IdAutor']);
    }
}
