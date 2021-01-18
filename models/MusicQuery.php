<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Music]].
 *
 * @see Music
 */
class MusicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Music[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Music|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
