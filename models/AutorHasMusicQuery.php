<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the ActiveQuery class for [[AutorHasMusic]].
 *
 * @see AutorHasMusic
 */
class AutorHasMusicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AutorHasMusic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AutorHasMusic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public static function getList() : array
    {
        return Autor::find()
                ->select(['name as label', 'name as value', 'id as id'])
                ->asArray()
                ->all();
    }
    
    /**
     * Получить список музыкальных треков с исполнителями
     * @param int|int[] $id_autor
     * @return array
     */
    public static function getAhmList($id_autor = null) : array 
    {
        $models =  AutorHasMusic::find()
                ->select(['name_music as name', 'music.id_music as id'])
                ->from(['music'])
                ->innerJoin('autor_has_music ahm', 'music.id_music = ahm.id_music')
                ->asArray()
                ->all();
        if ($id_autor) {
            $models =  AutorHasMusic::find()
                ->select(['name_music as name', 'music.id_music as id'])
                ->from(['music'])
                ->innerJoin('autor_has_music ahm', 'music.id_music = ahm.id_music')
                ->where(['id_autor' => $id_autor])
                ->asArray()
                ->all();
        }
        return ArrayHelper::map($models, 'id', 'name');
    }
}
