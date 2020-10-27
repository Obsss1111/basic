<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "musicpath".
 *
 * @property int $IdMusicPath
 * @property int|null $IdMusic
 * @property string|null $Path
 *
 * @property Music[] $musics
 * @property Music $idMusic
 */
class MusicPath extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'musicpath';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdMusicPath'], 'required'],
            [['IdMusicPath', 'IdMusic'], 'integer'],
            [['Path'], 'string', 'max' => 256],
            [['IdMusicPath'], 'unique'],
            [['IdMusic'], 'exist', 'skipOnError' => true, 'targetClass' => Music::className(), 'targetAttribute' => ['IdMusic' => 'IdMusic']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMusicPath' => 'Id Music Path',
            'IdMusic' => 'Id Music',
            'Path' => 'Path',
        ];
    }

    /**
     * Gets query for [[Musics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusics()
    {
        return $this->hasMany(Music::className(), ['IdMusicPath' => 'IdMusicPath']);
    }

    /**
     * Gets query for [[IdMusic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdMusic()
    {
        return $this->hasOne(Music::className(), ['IdMusic' => 'IdMusic']);
    }
}
