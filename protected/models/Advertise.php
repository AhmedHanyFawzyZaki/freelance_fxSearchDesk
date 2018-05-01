<?php

/**
 * This is the model class for table "advertise".
 *
 * The followings are the available columns in table 'advertise':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $code
 * @property integer $active
 */
class Advertise extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Advertise the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{advertise}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('active, type, ads_keyword', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 255),
            array('description, code', 'safe'),
            array('title, code', 'required'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, description, code, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'adKeyword' => array(self::BELONGS_TO, 'AdsKeyword', 'ads_keyword'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('translate', 'ID'),
            'title' => Yii::t('translate', 'Title'),
            'description' => Yii::t('translate', 'Description'),
            'code' => Yii::t('translate', 'Code'),
            'active' => Yii::t('translate', 'Active'),
            'type' => Yii::t('translate', 'Type'),
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
        $criteria->compare('description', $this->description, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('active', $this->active);
        $criteria->compare('type', $this->type);
        $criteria->compare('ads_keyword', $this->ads_keyword);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function getType($val) {
        $arr = array('0' => 'Side Banners', '1' => 'Search Result', '2' => 'interstitial');
        return $arr[$val];
    }
    public static function listTypes() {
        $arr = array('0' => 'Side Banners', '1' => 'Search Result');
        return $arr;
    }

}
