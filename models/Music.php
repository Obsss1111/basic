<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "music".
 *
 * @property int $id_music ид трека
 * @property string $name_music название
 * @property int|null $path_music_id_path ид пути файла
 * @property int|null $music_style_id_style ид жанра
 *
 * @property Albums[] $albums альбомы
 * @property AutorHasMusic[] $autorHasMusic
 * @property Autor[] $autor исполнитель
 * @property FavoriteMusic[] $favoriteMusics любимые треки
 * @property PathMusic $rel_path путь файла
 * @property MusicStyle rel_style жанр
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
            [['path_music_id_path', 'music_style_id_style'], 'integer'],
            [['name_music'], 'string', 'max' => 45],
            [['path_music_id_path'], 'unique'],
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
            'path_music_id_path' => 'Id файла',
            'music_style_id_style' => 'Id стиля',
        ];
    }

    /**
     * Gets query for [[Albums]].
     *
     * @return \yii\db\ActiveQuery|AlbumsQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Albums::className(), ['music_id_music' => 'id_music']);
    }

    /**
     * Gets query for [[AutorHasMusics]].
     *
     * @return \yii\db\ActiveQuery|AutorHasMusicQuery
     */
    public function getAutorHasMusic()
    {
        return $this->hasMany(AutorHasMusic::className(), ['music_id_music' => 'id_music']);
    }

    /**
     * Gets query for [[AutorIdAutors]].
     *
     * @return \yii\db\ActiveQuery|AutorQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Autor::className(), ['id' => 'id_autor'])->viaTable('autor_has_music', ['id_music' => 'id_music']);
    }

    /**
     * Gets query for [[FavoriteMusics]].
     *
     * @return \yii\db\ActiveQuery|FavoriteMusicQuery
     */
    public function getRel_favorite_musics()
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
