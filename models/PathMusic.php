<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "path_music".
 *
 * @property int $id_path
 * @property string $path
 * 
 * @property Music $music
 */
class PathMusic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'path_music';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path'], 'required'],
            [['path'], 'string', 'max' => 128],
            [['path'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_path' => 'Id Path',
            'path' => 'Path',
        ];
    }
    /**
     * Gets query for [[Music]].
     *
     * @return \yii\db\ActiveQuery|MusicQuery
     */
    public function getMusic()
    {
        return $this->hasOne(Music::className(), ['path_music_id_path' => 'id_path']);
    }

    /**
     * {@inheritdoc}
     * @return PathMusicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PathMusicQuery(get_called_class());
    }
}
