<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albums".
 *
 * @property int $id_album
 * @property string $name_album
 * @property string|null $img
 *
 * @property AlbumsMusic[] $albumsMusics
 * @property FavoriteAlbums[] $favoriteAlbums
 * @property Autor $autor
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
            [['id_album', 'name_album'], 'required'],
            [['id_album'], 'integer'],
            [['name_album'], 'string', 'max' => 45],
            [['img'], 'string', 'max' => 64],
            [['id_album'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_album' => 'Id Album',
            'name_album' => 'Name Album',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[AlbumsMusics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumsMusic()
    {
        return $this->hasMany(AlbumsMusic::className(), ['album_id' => 'id_album']);
    }    
    
    public function getAutorHasMusic()
    {
        return $this->hasMany(AutorHasMusic::className(), ['id_ahm' => 'ahm_id'])
                ->via('albumsMusic');
    }
    
    public function getAutor()
    {
        return $this->hasOne(Autor::className(), ['id' => 'id_autor'])
                ->via('autorHasMusic');
    }
    
    public function getCountTracks() : int
    {
        return $this->hasMany(AutorHasMusic::className(), ['id_ahm' => 'ahm_id'])->
                viaTable('albums_music', ['album_id' => 'id_album'])->count();
    }  

    /**
     * Gets query for [[FavoriteAlbums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoriteAlbums()
    {
        return $this->hasMany(FavoriteAlbums::className(), ['albums_id_album' => 'id_album']);
    }    
}
