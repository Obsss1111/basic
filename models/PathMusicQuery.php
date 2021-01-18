<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PathMusic]].
 *
 * @see PathMusic
 */
class PathMusicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PathMusic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PathMusic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
