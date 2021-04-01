<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albums_music".
 *
 * @property int $am_id
 * @property int $album_id
 * @property int $ahm_id
 * 
 * @property Music $music 
 * @property Album $album
 * @property AutorHasMusic $ahm
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
            [['album_id', 'ahm_id'], 'required'],
            [['album_id', 'ahm_id'], 'integer'],
            [['ahm_id'], 'unique'],
            [['ahm_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutorHasMusic::className(), 'targetAttribute' => ['ahm_id' => 'id_ahm']],
            [['album_id'], 'exist', 'skipOnError' => true, 'targetClass' => Albums::className(), 'targetAttribute' => ['album_id' => 'id_album']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'am_id' => 'Am ID',
            'album_id' => 'Album ID',
            'ahm_id' => 'Ahm ID',
        ];
    }
    
    public function getMusic()
    {
        return $this->hasOne(Music::className(), ['id_music' => 'id_music'])
                ->via('ahm');
    }
    
    public function getAlbum()
    {
        return $this->hasOne(Albums::className(), ['id_album' => 'album_id']);
    }
    
    public function getAhm()
    {
        return $this->hasOne(AutorHasMusic::className(), ['id_ahm' => 'ahm_id']);
    }
}
