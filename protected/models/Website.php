<?php

/**
 * This is the model class for table "website".
 *
 * The followings are the available columns in table 'website':
 * @property integer $id
 * @property string $url
 * @property string $description
 * @property integer $general_topic_id
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property GeneralTopic $generalTopic
 */
class Website extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Website the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{website}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('active, crawled', 'numerical', 'integerOnly' => true),
            array('url', 'length', 'max' => 255),
            array('description, general_topic_id, included_categories', 'safe'),
            array('url, included_categories', 'required'),
            array('url', 'url'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, url, description, general_topic_id, active', 'safe', 'on' => 'search'),
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
            'url' => Yii::t('translate', 'Url'),
            'description' => Yii::t('translate', 'Description'),
            'general_topic_id' => Yii::t('translate', 'General Topic'),
            'active' => Yii::t('translate', 'Active'),
            'included_categories' => Yii::t('translate', 'Included Categories'),
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
        $criteria->compare('url', $this->url, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('general_topic_id', $this->general_topic_id);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    protected function beforeSave() {
        if ($this->included_categories) {
            $this->included_categories = implode(',', $this->included_categories);
        }
        if ($this->general_topic_id) {
            $this->general_topic_id = implode(',', $this->general_topic_id);
        }
        return true;
    }

    protected function afterFind() {
        if ($this->included_categories) {
            $this->included_categories = explode(',', $this->included_categories);
        }
        if ($this->general_topic_id) {
            $this->general_topic_id = explode(',', $this->general_topic_id);
        }
        return true;
    }

}
