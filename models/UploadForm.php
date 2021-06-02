<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Класс для загрузки файлов на сервер
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
    
    /**     
     * @var UploadedFile[]
     */
    public $musicFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif', 'maxFiles' => 4],
            [['musicFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'mp3', 'maxFiles' => 4],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs('@app/assets/img/' . $file->baseName . '.' . $file->extension);                
            }
            return true;
        } else {
            return false;
        }
    }
    
    public function uploadTracks()
    {
         if ($this->validate()) { 
            foreach ($this->musicFiles as $file) {
                $file->saveAs('@app/assets/musics/' . $file->baseName . '.' . $file->extension);                
            }
            return true;
        } else {
            return false;
        }
    }
}
