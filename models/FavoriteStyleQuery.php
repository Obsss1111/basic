<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FavoriteStyle]].
 *
 * @see FavoriteStyle
 */
class FavoriteStyleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return FavoriteStyle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return FavoriteStyle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
