<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tracks".
 *
 * @property int $Id
 * @property string $Name Название трека
 * @property string $Autor Исполнитель
 * @property string $Duration Продолжительность
 * @property string $PathTrack
 */
class Tracks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tracks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Name', 'Autor', 'Duration', 'PathTrack'], 'required'],
            [['Id'], 'integer'],
            [['Duration'], 'safe'],
            [['Name', 'Autor'], 'string', 'max' => 32],
            [['PathTrack'], 'string', 'max' => 100],
            [['Id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Name' => 'Name',
            'Autor' => 'Autor',
            'Duration' => 'Duration',
            'PathTrack' => 'Path Track',
        ];
    }
}
