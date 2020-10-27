<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "musicstyle".
 *
 * @property int $IdMusicStyle
 * @property int|null $IdAutor Index
 * @property int|null $IdUser
 * @property string|null $NameMusicStyle
 *
 * @property Music[] $musics
 * @property User $idUser
 * @property Autor $idAutor
 */
class MusicStyle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'musicstyle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdMusicStyle'], 'required'],
            [['IdMusicStyle', 'IdAutor', 'IdUser'], 'integer'],
            [['NameMusicStyle'], 'string', 'max' => 30],
            [['IdMusicStyle'], 'unique'],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'IdUser']],
            [['IdAutor'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['IdAutor' => 'IdAutor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMusicStyle' => 'Id Music Style',
            'IdAutor' => 'Index',
            'IdUser' => 'Id User',
            'NameMusicStyle' => 'Name Music Style',
        ];
    }

    /**
     * Gets query for [[Musics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusics()
    {
        return $this->hasMany(Music::className(), ['IdMusicStyle' => 'IdMusicStyle']);
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
     * Gets query for [[IdAutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdAutor()
    {
        return $this->hasOne(Autor::className(), ['IdAutor' => 'IdAutor']);
    }
}
