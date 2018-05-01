<?php

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 */
class Settings extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Settings the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{settings}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('registration_period_paid, registration_period_price, registration_period, email', 'required'),
            array('word_num1, word_num2, word_num3, word_num4, word_num5, word_num6, word_num7, word_num8, registration_period_paid', 'numerical', 'integerOnly' => true),
            array('registration_period_price','safe'),
            array('name, email, phone, registration_period', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, email, phone', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('translate', 'ID'),
            'name' => Yii::t('translate', 'Name'),
            'email' => Yii::t('translate', 'Email'),
            'phone' => Yii::t('translate', 'Phone'),
            'registration_period' => Yii::t('translate', 'Free Subscription Period'),
            'registration_period_paid' => Yii::t('translate', 'Paid Subscription Period'),
            'registration_period_price' => Yii::t('translate', 'Subscription Period Price'),
            'word_num1' => Yii::t('translate', 'None of these forex terms (no.)'),
            'word_num2' => Yii::t('translate', 'Yes, but not interested in a relevant forex offer (no.)'),
            'word_num3' => Yii::t('translate', 'Forex Forecast (no.)'),
            'word_num4' => Yii::t('translate', 'Forex Trading Platform (no.)'),
            'word_num5' => Yii::t('translate', 'Forex Learn Trading (no.)'),
            'word_num6' => Yii::t('translate', 'Forex Trading Software (no.)'),
            'word_num7' => Yii::t('translate', 'Forex Trading Signals (no.)'),
            'word_num8' => Yii::t('translate', '# Searches Done'),
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

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('phone', $this->phone, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
