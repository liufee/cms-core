<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */
namespace cms\frontend\models\form;

use yii;
use common\models\User;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;

    public $email;

    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            [
                'username',
                'unique',
                'targetClass' => User::className(),
                'message' => yii::t('cms', 'This username has already been taken')
            ],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [
                'email',
                'unique',
                'targetClass' => User::className(),
                'message' => yii::t('cms', 'This email address has already been taken')
            ],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => yii::t('cms', 'Username'),
            'email' => yii::t('cms', 'Email'),
            'old_password' => yii::t('cms', 'Old Password'),
            'password' => yii::t('cms', 'Password'),
            'repassword' => yii::t('cms', 'Repeat Password'),
            'avatar' => yii::t('cms', 'Avatar'),
            'created_at' => yii::t('cms', 'Created At'),
            'updated_at' => yii::t('cms', 'Updated At'),
            'rememberMe' => yii::t('cms', 'Remember Me'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (! $this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
