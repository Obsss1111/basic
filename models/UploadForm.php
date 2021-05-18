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

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif', 'maxFiles' => 4],
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
}
