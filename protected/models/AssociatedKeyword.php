<?php

/**
 * This is the model class for table "{{associated_keyword}}".
 *
 * The followings are the available columns in table '{{associated_keyword}}':
 * @property integer $id
 * @property string $title
 * @property integer $focal_keyword_id
 * @property integer $country_currency
 * @property integer $active
 * @property integer $is_focal
 *
 * The followings are the available model relations:
 * @property FocalKeyword $focalKeyword
 * @property CountryCurrency $countryCurrency
 */
class AssociatedKeyword extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AssociatedKeyword the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{associated_keyword}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('focal_keyword_id, country_currency, active, is_focal', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 255),
            array('title', 'required'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, focal_keyword_id, country_currency, active, is_focal', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'focalKeyword' => array(self::BELONGS_TO, 'FocalKeyword', 'focal_keyword_id'),
            'countryCurrency' => array(self::BELONGS_TO, 'CountryCurrency', 'country_currency'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('translate', 'ID'),
            'title' => Yii::t('translate', 'Title'),
            'focal_keyword_id' => Yii::t('translate', 'Focal Keyword'),
            'country_currency' => Yii::t('translate', 'Country Currency'),
            'active' => Yii::t('translate', 'Active'),
            'is_focal' => Yii::t('translate', 'Type'),
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('focal_keyword_id', $this->focal_keyword_id);
        $criteria->compare('country_currency', $this->country_currency);
        $criteria->compare('active', $this->active);
        $criteria->compare('is_focal', $this->is_focal);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
