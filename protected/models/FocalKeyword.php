<?php

/**
 * This is the model class for table "focal_keyword".
 *
 * The followings are the available columns in table 'focal_keyword':
 * @property integer $id
 * @property string $title
 * @property integer $general_topic_id
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property GeneralTopic $generalTopic
 */
class FocalKeyword extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return FocalKeyword the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{focal_keyword}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('general_topic_id, active', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 255),
            array('title', 'required'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, general_topic_id, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'generalTopic' => array(self::BELONGS_TO, 'GeneralTopic', 'general_topic_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('translate', 'ID'),
            'title' => Yii::t('translate', 'Title'),
            'general_topic_id' => Yii::t('translate', 'General Topic'),
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
        $criteria->compare('general_topic_id', $this->general_topic_id);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public static function GetAllCategorized(){
        $keywords= FocalKeyword::model()->findAll();
        $arr=array();
        if($keywords){
            foreach ($keywords as $w) {
                $arr[$w->generalTopic->title.'('.$w->generalTopic->generalSubject->title.')'][$w->id]=$w->title;
            }
        }
        return $arr;
    }

}
