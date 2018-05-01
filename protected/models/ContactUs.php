<?php

/**
 * This is the model class for table "{{contact_us}}".
 *
 * The followings are the available columns in table '{{contact_us}}':
 * @property integer $id
 * @property string $company_name
 * @property string $first_name
 * @property string $last_name
 * @property string $title
 * @property string $email
 * @property string $subject
 * @property string $comment
 * @property integer $send_updates
 */
class ContactUs extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ContactUs the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{contact_us}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('send_updates', 'numerical', 'integerOnly' => true),
            array('company_name, first_name, last_name, title, email, subject', 'length', 'max' => 255),
            array('first_name, last_name, email, subject, comment, title', 'required'),
            array('email', 'email'),
            array('comment', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, company_name, first_name, last_name, title, email, subject, comment, send_updates', 'safe', 'on' => 'search'),
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
            'company_name' => Yii::t('translate', 'Company / Organization Name'),
            'first_name' => Yii::t('translate', 'First Name'),
            'last_name' => Yii::t('translate', 'Last Name'),
            'title' => Yii::t('translate', 'Title'),
            'email' => Yii::t('translate', 'Email'),
            'subject' => Yii::t('translate', 'Subject'),
            'comment' => Yii::t('translate', 'Comment'),
            'send_updates' => Yii::t('translate', 'Send Updates'),
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
        $criteria->compare('company_name', $this->company_name, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('send_updates', $this->send_updates);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
