<?php

namespace app\models;

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
}
