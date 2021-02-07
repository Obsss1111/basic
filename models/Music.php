<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "music".
 *
 * @property int $id_music
 * @property string $name_music
 * @property string|null $name_style
 * @property string|null $autor_name_autor
 * @property int|null $path_music_id_path
 * @property int|null $music_style_id_style
 * @property int|null $autor_id_autor
 *
 * @property Albums[] $rel_albums
 * @property AutorHasMusic[] $rel_autors
 * @property Autor[] $rel_autor
 * @property FavoriteMusic[] $favoriteMusics
 * @property PathMusic $rel_path
 * @property MusicStyle rel_style
 */
class Music extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'music';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_music'], 'required'],
            [['path_music_id_path', 'music_style_id_style', 'autor_id_autor'], 'integer'],
            [['name_music', 'autor_name_autor'], 'string', 'max' => 45],
            [['name_style'], 'string', 'max' => 64],
            [['music_style_id_style'], 'unique'],
            [['path_music_id_path'], 'unique'],
            [['autor_id_autor'], 'unique'],
            [['autor_name_autor'], 'unique'],
            [['path_music_id_path'], 'exist', 'skipOnError' => true, 'targetClass' => PathMusic::className(), 'targetAttribute' => ['path_music_id_path' => 'id_path']],
            [['music_style_id_style'], 'exist', 'skipOnError' => true, 'targetClass' => MusicStyle::className(), 'targetAttribute' => ['music_style_id_style' => 'id_style']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_music' => 'Id трека',
            'name_music' => 'Название',
            'name_style' => 'Стиль',
            'autor_name_autor' => 'Исполнитель',
            'path_music_id_path' => 'Id файла',
            'music_style_id_style' => 'Id стиля',
            'autor_id_autor' => 'Id исполнителя',
        ];
    }

    /**
     * Gets query for [[Albums]].
     *
     * @return \yii\db\ActiveQuery|AlbumsQuery
     */
    public function getRel_albums()
    {
        return $this->hasMany(Albums::className(), ['music_id_music' => 'id_music']);
    }

    /**
     * Gets query for [[AutorHasMusics]].
     *
     * @return \yii\db\ActiveQuery|AutorHasMusicQuery
     */
    public function getRel_autors()
    {
        return $this->hasMany(AutorHasMusic::className(), ['music_id_music' => 'id_music']);
    }

    /**
     * Gets query for [[AutorIdAutors]].
     *
     * @return \yii\db\ActiveQuery|AutorQuery
     */
    public function getRel_autor()
    {
        return $this->hasMany(Autor::className(), ['id_autor' => 'autor_id_autor'])->viaTable('autor_has_music', ['music_id_music' => 'id_music']);
    }

    /**
     * Gets query for [[FavoriteMusics]].
     *
     * @return \yii\db\ActiveQuery|FavoriteMusicQuery
     */
    public function getRel_favoriteMusics()
    {
        return $this->hasMany(FavoriteMusic::className(), ['music_id_music' => 'id_music']);
    }

    /**
     * Gets query for [[PathMusicIdPath]].
     *
     * @return \yii\db\ActiveQuery|PathMusicQuery
     */
    public function getRel_path()
    {
        return $this->hasOne(PathMusic::className(), ['id_path' => 'path_music_id_path']);
    }

    /**
     * Gets query for [[MusicStyleIdStyle]].
     *
     * @return \yii\db\ActiveQuery|MusicStyleQuery
     */
    public function getRel_style()
    {
        return $this->hasOne(MusicStyle::className(), ['id_style' => 'music_style_id_style']);
    }

    /**
     * {@inheritdoc}
     * @return MusicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MusicQuery(get_called_class());
    }
}
