<?php
namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
public static function tableName()
{
return '{{%user}}'; // Имя вашей таблицы в базе данных
}

/**
* {@inheritdoc}
*/
public static function findIdentity($id)
{
return static::findOne($id);
}

/**
* {@inheritdoc}
*/
public static function findIdentityByAccessToken($token, $type = null)
{
return static::findOne(['accessToken' => $token]);
}

/**
* Finds user by username
*
* @param string $username
* @return static|null
*/
public static function findByUsername($username)
{
return static::findOne(['username' => $username]);
}

/**
* {@inheritdoc}
*/
public function getId()
{
return $this->getPrimaryKey();
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

public function setPassword($password)
{
$this->password = Yii::$app->security->generatePasswordHash($password);
}

public function generateAuthKey()
{
$this->authKey = Yii::$app->security->generateRandomString();
}

/**
* Validates password
*
* @param string $password password to validate
* @return bool if password provided is valid for current user
*/
public function validatePassword($password)
{
return Yii::$app->security->validatePassword($password, $this->password);
}
}

