<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $passwork_reset_token
 * @property string|null $email
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int|null $autor_id_autor
 *
 * @property FavoriteAlbums[] $favoriteAlbums
 * @property FavoriteMusic $favoriteMusic
 * @property FavoriteStyle[] $favoriteStyles
 */
class User extends ActiveRecord implements IdentityInterface
{       
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['id'], 'unique'], 
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['username', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['status', 'autor_id_autor'], 'integer'],
            [['username', 'email'], 'string', 'max' => 32],
            [['auth_key', 'password_hash', 'passwork_reset_token', 'created_at', 'updated_at'], 'string', 'max' => 64],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id пользователя',
            'username' => 'Пользователь',
            'password' => 'Пароль',
        ];
    }      
    
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
   /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
     public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
 
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    /**
     * Gets query for [[FavoriteAlbums]].
     *
     * @return \yii\db\ActiveQuery|FavoriteAlbumsQuery
     */
    public function getFavoriteAlbums()
    {
        return $this->hasMany(FavoriteAlbums::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[FavoriteMusic]].
     *
     * @return \yii\db\ActiveQuery|FavoriteMusicQuery
     */
    public function getFavoriteMusic()
    {
        return $this->hasOne(FavoriteMusic::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[FavoriteStyles]].
     *
     * @return \yii\db\ActiveQuery|FavoriteStyleQuery
     */
    public function getFavoriteStyles()
    {
        return $this->hasMany(FavoriteStyle::className(), ['user_id' => 'id']);
    }


}

