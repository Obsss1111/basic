<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albums".
 *
 * @property int $IdAlbum
 * @property int|null $IdAutor Index
 * @property int|null $IdUser
 * @property string|null $NameAlbum
 *
 * @property Autor $idAutor
 * @property User $idUser
 * @property Music[] $musics
 */
class Albums extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'albums';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdAlbum'], 'required'],
            [['IdAlbum', 'IdAutor', 'IdUser'], 'integer'],
            [['NameAlbum'], 'string', 'max' => 30],
            [['IdAlbum'], 'unique'],
            [['IdAutor'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['IdAutor' => 'IdAutor']],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'IdUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdAlbum' => 'Id Album',
            'IdAutor' => 'Index',
            'IdUser' => 'Id User',
            'NameAlbum' => 'Name Album',
        ];
    }

    /**
     * Gets query for [[IdAutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdAutor()
    {
        return $this->hasOne(Autor::className(), ['IdAutor' => 'IdAutor']);
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
        return $this->hasMany(Music::className(), ['IdAlbum' => 'IdAlbum']);
    }
}
