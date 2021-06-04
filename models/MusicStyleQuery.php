<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MusicStyle]].
 *
 * @see MusicStyle
 */
class MusicStyleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MusicStyle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MusicStyle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public static function getList() : array
    {
        return MusicStyle::find()
            ->select(['id_style as id', 'name_style as label', 'name_style as value'])
            ->asArray()
            ->all();        
    }
}
