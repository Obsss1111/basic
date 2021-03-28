<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albums_music".
 *
 * @property int $am_id
 * @property int $album_id
 * @property int $ahm_id
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
                ->viaTable('autor_has_music', ['id_ahm' => 'ahm_id']);
    }
}
