<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albums_music".
 *
 * @property int $id_albums_music
 * @property int $id_autor_music
 * @property int $id_music_albums
 *
 * @property Albums $albumsMusic
 * @property Autor $autorMusic
 * @property Music $musicAlbums
 */
class AlbumsMusic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'albums_music';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_albums_music', 'id_autor_music', 'id_music_albums'], 'required'],
            [['id_albums_music', 'id_autor_music', 'id_music_albums'], 'integer'],
            [['id_autor_music', 'id_music_albums'], 'unique', 'targetAttribute' => ['id_autor_music', 'id_music_albums']],
            [['id_albums_music'], 'exist', 'skipOnError' => true, 'targetClass' => Albums::className(), 'targetAttribute' => ['id_albums_music' => 'id_album']],
            [['id_autor_music'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['id_autor_music' => 'id_autor']],
            [['id_music_albums'], 'exist', 'skipOnError' => true, 'targetClass' => Music::className(), 'targetAttribute' => ['id_music_albums' => 'id_music']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_albums_music' => 'Id Albums Music',
            'id_autor_music' => 'Id Autor Music',
            'id_music_albums' => 'Id Music Albums',
        ];
    }

    /**
     * Gets query for [[AlbumsMusic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumsMusic()
    {
        return $this->hasOne(Albums::className(), ['id_album' => 'id_albums_music']);
    }

    /**
     * Gets query for [[AutorMusic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutorMusic()
    {
        return $this->hasOne(Autor::className(), ['id_autor' => 'id_autor_music']);
    }

    /**
     * Gets query for [[MusicAlbums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusic()
    {
        return $this->hasOne(Music::className(), ['id_music' => 'id_music_albums']);
    }
    
    public function getRel_fav_music() {
        return $this->hasOne(FavoriteMusic::className(), ['music_id_music' => 'id_music_albums']);
    }
}
