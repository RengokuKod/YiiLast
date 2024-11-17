<?php
namespace app\models;
use Yii;
use yii\base\Model;
/**
* RegisterForm is the model behind the registration form.
*
* @property-read User|null $user
*
*/
class RegisterForm extends Model
{
public $username;
public $email;
public $password;

private $_user = false;

/**
* @return array the validation rules.
*/
public function rules()
{
return [
// username, email and password are all required
[['username', 'email', 'password'], 'required'],
// email has to be a valid email address
['email', 'email'],
// password is validated by validatePassword()
['password', 'validatePassword'],
];
}

/**
* Validates the password.
* This method serves as the inline validation for password.
*
* @param string $attribute the attribute currently being validated
* @param array $params the additional name-value pairs given in the rule
*/
public function validatePassword($attribute, $params)
{
if (!$this->hasErrors()) {
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $this->password)) {
$this->addError($attribute, 'The password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one number.');
}
}
}

/**
* Registers a user using the provided username, email and password.
* @return bool whether the user is registered successfully
*/
public function register()
{
if ($this->validate()) {
$user = new User();
$user->username = $this->username;
$user->email = $this->email;
$user->setPassword($this->password);
$user->generateAuthKey();
if ($user->save()) {
return Yii::$app->user->login($user, 3600*24*30);
}
if (!$user->save()) {
    var_dump($user->errors);
    }
}
return false;
}

/**
* Finds user by [[username]]
*
* @return User|null
*/
public function getUser()
{
if ($this->_user === false) {
$this->_user = User::findByUsername($this->username);
}

return $this->_user;
}
}

