<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public $confirm_password;

    public static function tableName()
    {
        return 'user';
    }

    //  user status
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 1;
    const STATUS_ACTIVE = 2;

    public static function getStatusList()
    {
        return [
            self::STATUS_DELETED => 'Deleted',
            self::STATUS_INACTIVE => 'Inactive',
            self::STATUS_ACTIVE => 'Active',
        ];
    }

    public function getStatusName()
    {
        return self::getStatusList()[$this->status] ?? 'Unknown';
    }

    // user role
    const ROLE_USER = 10;
    const ROLE_ADMIN = 20;

    public static function getRoleList()
    {
        return [
            self::ROLE_USER => 'User',
            self::ROLE_ADMIN => 'Admin',
        ];
    }

    public function getRoleName()
    {
        return self::getRoleList()[$this->role] ?? 'Unknown';
    }

    const Email_VERIFIED = 1;
    const Email_NOT_VERIFIED = 0;

    public static function getEmailVerificationList()
    {
        return [
            self::Email_VERIFIED => 'Verified',
            self::Email_NOT_VERIFIED => 'Not Verified',
        ];
    }

    public function getEmailVerificationName()
    {
        return self::getEmailVerificationList()[$this->is_email_verified] ?? 'Unknown';
    }

    public function scenarios()
    {
        return [
            'signup' => ['email', 'username', 'password', 'role_id', 'status_id', 'is_email_verified', 'created_at', 'updated_at'],
            'login' => ['username', 'password'],
        ];
    }

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'confirm_password'], 'required', 'on' => 'signup'],
            ['username', 'match', 'pattern' => '/^\S*$/', 'message' => 'Username cannot contain spaces.', 'on' => 'signup'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'This username has already been taken.', 'on' => 'signup'],
            ['username', 'string', 'max' => 255, 'on' => 'signup'],
            ['email', 'email', 'message' => 'The email address is not valid.', 'on' => 'signup'],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'This email address has already been taken.', 'on' => 'signup'],
            ['password', 'string', 'min' => 6, 'message' => 'Password must be at least 6 characters long.', 'on' => 'signup'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Passwords do not match.', 'on' => 'signup'],
            [['username', 'password'], 'required', 'on' => 'login'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'email' => 'Email Address',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status_id' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

        return static::findOne(['username' => $username, 'status_id' => self::STATUS_ACTIVE]);
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function isGuest()
    {
        return Yii::$app->user->isGuest;
    }

    public static function isUser()
    {
        return !Yii::$app->user->isGuest && Yii::$app->user->identity->role_id == self::ROLE_USER;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey = Yii::$app->security->generateRandomString();
                $this->accessToken = Yii::$app->security->generateRandomString();
                $this->password = Yii::$app->security->generatePasswordHash($this->password);
            }
            return true;
        }
        return false;
    }
    public function signup()
    {
        $this->password = Yii::$app->security->generatePasswordHash($this->password);
        $this->status_id = self::STATUS_ACTIVE;
        $this->role_id = self::ROLE_USER;
        $this->is_email_verified = self::Email_NOT_VERIFIED;
        $this->created_at = time();
        $this->updated_at = time();
        return $this->save();
    }
    




}
