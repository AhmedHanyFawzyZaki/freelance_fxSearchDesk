	

<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $username
 * @property string $image
 * @property string $phone
 * @property integer $user_type
 * @property string $date_created
 *
 * The followings are the available model relations:
 */
class User extends CActiveRecord {

    public $password_repeat;
    public $verifyCode;
    public $old_password;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email', 'unique'),
            array('email', 'email'),
            array('username, user_type, password, email', 'required'),
            array('user_type, active, can_reset', 'numerical', 'integerOnly' => true),
            array('email, password, username, image, phone, pass_token, paypal_token', 'length', 'max' => 255),
            array('username', 'required', 'on' => 'create ,update'),
            array('date_created, date_of_renewal', 'safe'),
            array('username, email, first_name, last_name', 'filter', 'filter' => 'trim'),
            array('username', 'match', 'pattern' => '/^[ \w#-]+$/', 'message' => 'Field can contain only alphanumeric characters and underscore(_) and space.'),
            array('phone', 'match', 'pattern' => '/[0-9]{1,7}(\\.[0-9]{1,2})*$/', 'message' => 'Phone number should be integers only'),
            // The following rule is used by search().
            array('id, email, password, username, image, phone, user_type, date_created', 'safe', 'on' => 'search'),
            array('password, password_repeat', 'safe', 'on' => 'register'),
            array('email, password, password_repeat, user_type, username', 'required', 'on' => 'register'),
            array('password', 'compare', 'compareAttribute' => 'password_repeat', 'on' => 'register'),
            //array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'register'),
            array('verifyCode', 'CaptchaExtendedValidator', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'register'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'userType' => array(self::BELONGS_TO, 'UserType', 'user_type'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('translate', 'ID'),
            'email' => Yii::t('translate', 'Email'),
            'password' => Yii::t('translate', 'Password'),
            'username' => Yii::t('translate', 'Username'),
            'first_name' => Yii::t('translate', 'First Name'),
            'last_name' => Yii::t('translate', 'Last Name'),
            'image' => Yii::t('translate', 'Image'),
            'user_type' => Yii::t('translate', 'Account Type'),
            'password_repeat' => Yii::t('translate', 'Repeat password'),
            'phone' => Yii::t('translate', 'Phone'),
            'date_created' => Yii::t('translate', 'Date Created'),
            'active' => Yii::t('translate', 'Active'),
            'date_of_renewal' => Yii::t('translate', 'Subscribtion Renewal Date'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'id!=1';
        if ($this->date_created) {
            $criteria->addBetweenCondition('date_created', "1969-01-01 00:00:00", $this->date_created);
        }
        $criteria->compare('id', $this->id);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('user_type', $this->user_type);
        $criteria->compare('active', $this->active);
        $criteria->compare('date_of_renewal', $this->date_of_renewal, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->password) {
                $this->password = $this->hash($this->password); //password_hash($this->password, PASSWORD_BCRYPT); //$this->hash($this->password);
            }
            if ($this->image == '') {
                $this->image = 'no-img.jpg';
            }
            if ($this->url == '') {
                $this->url = Helper::slugify($this->username . rand(1, 999));
            }
            return true;
        }
        return false;
    }

    protected function afterFind() {
        if ($this->password) {
            $this->password = $this->simple_decrypt($this->password); //password_hash($this->password, PASSWORD_BCRYPT); //$this->hash($this->password);
        }
        return true;
    }

    // Authentication methods
    public function hash($value) {
        return $this->simple_encrypt($value);
    }

    public function simple_encrypt($text, $salt = "!@#$%^&*1a2s3d4f") {
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }

    public function simple_decrypt($text, $salt = "!@#$%^&*1a2s3d4f") {
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }

    public function check($value) {
        //$new_hash = $this->simple_encrypt($value);
        if ($value == $this->password) {
            return true;
        }
        return false;
    }

}
