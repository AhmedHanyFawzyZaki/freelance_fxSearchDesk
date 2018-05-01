<?php

/**
 * This is the model class for table "general_topic".
 *
 * The followings are the available columns in table 'general_topic':
 * @property integer $id
 * @property string $title
 * @property integer $general_subject_id
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property FocalKeyword[] $focalKeywords
 * @property GeneralSubject $generalSubject
 */
class GeneralTopic extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GeneralTopic the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{general_topic}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('general_subject_id, active', 'numerical', 'integerOnly' => true),
            array('title', 'required'),
            array('title', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, general_subject_id, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'focalKeywords' => array(self::HAS_MANY, 'FocalKeyword', 'general_topic_id'),
            'generalSubject' => array(self::BELONGS_TO, 'GeneralSubject', 'general_subject_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('translate', 'ID'),
            'title' => Yii::t('translate', 'Title'),
            'general_subject_id' => Yii::t('translate', 'General Subject'),
            'active' => Yii::t('translate', 'Active'),
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
        $criteria->compare('general_subject_id', $this->general_subject_id);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public static function GetAllCategorized(){
        $topics=  GeneralTopic::model()->findAll();
        $arr=array();
        if($topics){
            foreach ($topics as $top) {
                $arr[$top->generalSubject->title][$top->id]=$top->title;
            }
        }
        return $arr;
    }
    
    public static function fetchAll($arr) {
        if($arr){
            foreach ($arr as $r){
                $gt=GeneralTopic::model()->findByPk($r);
                $titles[]= $gt->title.' ('.$gt->generalSubject->title.')';
            }
        }
        
        if($titles)
            return implode (', ', $titles);
        else
            return 'Not Set';
    }
}
