<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\base\Model;
use app\models\Music;
use app\models\PathMusic;
use yii\web\NotFoundHttpException;
/**
 * Класс для объединения музыкальных моделей, выполнения нескольких запросов к БД,
 * а также для создания новых записей в таблицах этих моделей
 *
 * @author comin
 */
class MusicRepository extends Model {
    
    /**
     * Создает новую запись в таблице music
     * @return Music 
     */
    public function createMusic($id_path)
    {
        $model = Music::find()->where(['path_music_id_path' => $id_path])->one();
        $path_music = self::findPathMusic($id_path);
        
        if (empty($model) && isset($path_music)) {
            $music = new Music();
            $music->path_music_id_path = $id_path;
            $music->name_music = str_replace('.mp3', '', $path_music->path);
            $music->autor_id_autor = $music->autorIdAutors->id_autor;
            $music->autor_name_autor = $music->autorIdAutors->name_autor;
            $music->save(false);
            return $music;
        }
    }
    
    /**
     * Создает несколько новых записей в таблице music
     */
    public function createListMusic()
    {
        $list_music_id_path = self::getListMusicFKIdPath();
        $list_id_path = self::getListPathMusicIdPath();
        
        $isNewRecord = self::isNewRecord($list_id_path, $list_music_id_path);
        if ($isNewRecord) {
            $new_records = self::getNewRecords($list_id_path, $list_music_id_path);
            foreach ($new_records as $id_path) {
                $this->createMusic($id_path);
            }
        }
    }
    
    /**
     * Поиск записей таблицы music в json формате
     * @param bool $asArray Вывести данные в виде массива
     * @return array
     */
    public static function findMusicRecords($asArray = true)
    {
        $model = Music::find()->all();
        if ($asArray) {
            $model = Music::find()->asArray()->all();
        }
        echo json_encode($model);
    }
    
    /**
     * Поиск треков в папке assets/musics
     * @param string $dirname Путь до папки, в котором содержутся музыкальные треки.<br>
     * По умолчанию $dirname = 'assets/musics/'
     * @param bool $asJson Вывести в json формате (для AJax запросов)
     * @return array Список всех найденных файлов
     */
    public static function findMusicFromFolder($asJson = false, $dirname = 'assets/musics/')
    {
        $list = [];
        $folder_music = scandir(__DIR__.'/../'.$dirname);
        
        foreach($folder_music as $key => $name_music) {
            if (strlen($name_music) > 3) {
                if ($asJson) {
                    $list[] = ['path' => $name_music];    
                } else {
                    $list[] = $name_music;
                }
            }
        }
        return $list;
    }
    
    /**
     * Создает новую запись в таблице path_music
     * @param string $path Description
     * @return PathMusic 
     */
    public function createPathMusic($path)
    {        
        $model = PathMusic::find()->where(['path' => $path])->one();
        if (empty($model)) {
            $new_path = new PathMusic();
            $new_path->path = $path;
            $new_path->save(false);
            return $new_path;
        }
    }
    
    /**
     * Создает несколько новых записей в таблице path
     * 
     */
    public function createListPathMusic()
    {
        $folder_music = self::findMusicFromFolder();
        $path_music = self::findPathMusicRecords();
        
        $isNewRecord = self::isNewRecord($folder_music, $path_music);
        if ($isNewRecord) {
            $new_records = self::getNewRecords($folder_music, $path_music);
            foreach ($new_records as $path) {
                $this->createPathMusic($path);
            }
        }
    }

    /**
     * Поиск всех записей таблицы path_music в json формате
     * @param bool $asArray Вывести данные в виде массива
     * @return PathMusic|array
     */
    public static function findPathMusicRecords($asArray = true)
    {
        $model = PathMusic::find()->all();
        if ($asArray) {
            $model = PathMusic::find()->asArray()->all();        
        }
        
        return $model;
    }
    
    /**
     * Является ли запись новой в данной таблице
     * @return bool
     */
    public static function isNewRecord($first_array, $second_array) : bool
    {
        if (count($first_array) <= count($second_array)) {
            if (in_array($first_array, $second_array)) {
                return false;
            }    
        }
        
        return true;
    }
    
    /**
     * Получить новые данные для создания новой записи в таблицу
     * @param array $first_array Первый массив
     * @param array $second_array Второй массив
     * @return array $new_records Новые записи
     */
    public static function getNewRecords(array $first_array, array $second_array) : array
    {
        $new_records = [];
        if (count($first_array) > count($second_array)) {
            foreach ($first_array as $value) {
                if (!in_array($value, $second_array)) {
                    $new_records[] = $value;
                }
            }
        }
        if (count($first_array) <= count($second_array)) {
            foreach ($second_array as $key => $value) {
                if (!in_array($first_array[$key], $second_array)) {
                    $new_records[] = $first_array[$key];
                }
            }
        }
        return $new_records;
    }
    
    /**
     * Получить список id_path из таблицы path_music
     * @return array Description
     */
    public static function getListPathMusicIdPath() {
        $path = PathMusic::find()->indexBy('id_path')->asArray()->all();
        $id_path = [];
        foreach($path as $key => $value) {
            foreach($value as $attribute => $val) {
                if ($attribute == 'id_path')
                    $id_path[] = $val;
            }
        }
        return $id_path;
    }
    
    /**
     * Получить список path_music_id_path из таблицы music
     * @return array
     */
    public static function getListMusicFKIdPath()
    {
        $music = Music::find()->indexBy('id_music')->asArray()->all();
        $path_music_id_path = [];
        foreach ($music as $key => $value) {
            foreach ($value as $attribute => $val) {
                if ($attribute == 'path_music_id_path')
                    $path_music_id_path[] = $val;
            }
        }
        return $path_music_id_path;
    }
    
    /**
     * Поиск названий музыкальных файлов в таблице
     * @param $conditions Условия выборки данных<br>
     * Например, $conditions = ['id' => 1] или $conditions = ['id' => [1,2,3,4]]
     * @return array Названия файлов
     */
    public static function findAllPath($conditions)
    {
        $model = PathMusic::find()->asArray()->all();
        if ($conditions) {
            $model = PathMusic::find()->where([$conditions])->asArray()->all();
        }
        $path = [];
        foreach($model as $key => $value) {
            foreach($value as $attribute => $val) {
                if ($attribute == 'path') {
                    $path[] = $val;
                }
            }
        }
        return $path;
    }
    
    /**
     * Поиск PathMusic по $id_path
     * @param int $id_path Индекс таблицы path_music
     * @return PathMusic
     */
    public static function findPathMusic($id_path) : PathMusic
    {
        if (($model = PathMusic::findOne($id_path)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Не удалось найти заданный музыкальный трек.');
    }
 
}
