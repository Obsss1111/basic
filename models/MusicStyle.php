<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "music_style".
 *
 * @property int $id_style
 * @property string $name_style
 *
 * @property Music $music
 */
class MusicStyle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'music_style';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_style'], 'required'],
            [['name_style'], 'string', 'max' => 45],
            [['name_style'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_style' => 'Id Style',
            'name_style' => 'Жанр',
        ];
    }
    /**
     * Gets query for [[Music]].
     *
     * @return \yii\db\ActiveQuery|MusicQuery
     */
    public function getMusic()
    {
        return $this->hasOne(Music::className(), ['music_style_id_style' => 'id_style']);
    }
    /**
     * {@inheritdoc}
     * @return MusicStyleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MusicStyleQuery(get_called_class());
    }
}
