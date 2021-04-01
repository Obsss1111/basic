<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor".
 *
 * @property int $id
 * @property string $name
 * @property string|null $img
 *
 * @property AutorHasMusic[] $autorHasMusics
 * @property Albums[] $albums
 */
class Autor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['img'], 'string'],
            [['name'], 'string', 'max' => 45],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[AutorHasMusics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutorHasMusic()
    {
        return $this->hasMany(AutorHasMusic::className(), ['id_autor' => 'id']);
    }   
    
    public function getAlbumsMusic()
    {
        return $this->hasMany(AlbumsMusic::className(), ['ahm_id' => 'id_ahm'])->via('autorHasMusic');
    }
    
    public function getAlbums()
    {
        return $this->hasMany(Albums::className(), ['id_album' => 'album_id'])->via('albumsMusic');
    }   

    public function getCountTracks() : int
    {             
        return $this->getAutorHasMusic()->count();
    }

    public function getMusic()
    {
        return $this->hasMany(Music::className(), ['id_music' => 'id_music'])->via('autorHasMusic');
    }
}
