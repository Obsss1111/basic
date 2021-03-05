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
            'name_album' => 'Альбом',
            'img' => 'Img',
            'autor.name_autor' => 'Исполнитель'
        ];
    }
    
    public function getAutor()
    {
        return $this->hasOne(Autor::class, ['id_autor' => 'id_autor_music'])->viaTable(AlbumsMusic::tableName(), ['id_albums_music' => 'id_album']);
    }
    
    public function getCountTracks() : int
    {
        return $this->hasMany(AlbumsMusic::className(), ['id_albums_music' => 'id_album'])->count();
    }        

    /**
     * Gets query for [[AlbumsMusics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumsMusics()
    {
        return $this->hasMany(AlbumsMusic::class, ['id_albums_music' => 'id_album']);
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
