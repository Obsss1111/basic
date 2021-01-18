<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albums".
 *
 * @property int $id_album
 * @property string $name_album
 * @property int $autor_id_autor
 * @property int $music_id_music
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
            [['id_album', 'name_album', 'autor_id_autor', 'music_id_music'], 'required'],
            [['id_album', 'autor_id_autor', 'music_id_music'], 'integer'],
            [['name_album'], 'string', 'max' => 45],
            [['id_album', 'autor_id_autor'], 'unique', 'targetAttribute' => ['id_album', 'autor_id_autor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_album' => 'Id альбома',
            'name_album' => 'Альбомы',
            'autor_id_autor' => 'Id исполнителя',
            'music_id_music' => 'Id трека',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AlbumsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AlbumsQuery(get_called_class());
    }
}
