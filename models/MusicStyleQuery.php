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
}
