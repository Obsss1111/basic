<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FavoriteMusic]].
 *
 * @see FavoriteMusic
 */
class FavoriteMusicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return FavoriteMusic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return FavoriteMusic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
