<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "music".
 *
 * @property int $IdMusic
 * @property int|null $IdMusicPath
 * @property int|null $IdMusicStyle
 * @property int|null $IdAutor Index
 * @property int|null $IdAlbum
 * @property int|null $IdUser
 * @property string|null $NameMusic
 *
 * @property User $idUser
 * @property Album $idAlbum
 * @property Autor $idAutor
 * @property Musicpath $idMusicPath
 * @property Musicstyle $idMusicStyle
 * @property Musicpath[] $musicpaths
 */
class Music extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'music';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdMusic'], 'required'],
            [['IdMusic', 'IdMusicPath', 'IdMusicStyle', 'IdAutor', 'IdAlbum', 'IdUser'], 'integer'],
            [['NameMusic'], 'string', 'max' => 30],
            [['IdMusic'], 'unique'],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'IdUser']],
            [['IdAlbum'], 'exist', 'skipOnError' => true, 'targetClass' => Albums::className(), 'targetAttribute' => ['IdAlbum' => 'IdAlbum']],
            [['IdAutor'], 'exist', 'skipOnError' => true, 'targetClass' => Autors::className(), 'targetAttribute' => ['IdAutor' => 'IdAutor']],
            [['IdMusicPath'], 'exist', 'skipOnError' => true, 'targetClass' => MusicPath::className(), 'targetAttribute' => ['IdMusicPath' => 'IdMusicPath']],
            [['IdMusicStyle'], 'exist', 'skipOnError' => true, 'targetClass' => MusicStyle::className(), 'targetAttribute' => ['IdMusicStyle' => 'IdMusicStyle']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMusic' => 'Id Music',
            'IdMusicPath' => 'Id Music Path',
            'IdMusicStyle' => 'Id Music Style',
            'IdAutor' => 'Index',
            'IdAlbum' => 'Id Album',
            'IdUser' => 'Id User',
            'NameMusic' => 'Name Music',
        ];
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
     * Gets query for [[IdAlbum]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdAlbum()
    {
        return $this->hasOne(Album::className(), ['IdAlbum' => 'IdAlbum']);
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
     * Gets query for [[IdMusicPath]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdMusicPath()
    {
        return $this->hasOne(Musicpath::className(), ['IdMusicPath' => 'IdMusicPath']);
    }

    /**
     * Gets query for [[IdMusicStyle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdMusicStyle()
    {
        return $this->hasOne(Musicstyle::className(), ['IdMusicStyle' => 'IdMusicStyle']);
    }

    /**
     * Gets query for [[Musicpaths]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusicpaths()
    {
        return $this->hasMany(Musicpath::className(), ['IdMusic' => 'IdMusic']);
    }
}
