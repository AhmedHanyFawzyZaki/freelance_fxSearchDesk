<?php

/**
 * This is the model class for table "{{rss_feed}}".
 *
 * The followings are the available columns in table '{{rss_feed}}':
 * @property integer $id
 * @property string $content
 * @property string $date_created
 * @property integer $active
 */
class RssFeed extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return RssFeed the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{rss_feed}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('active', 'numerical', 'integerOnly' => true),
            array('content, date_created', 'safe'),
            array('content', 'required'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, content, date_created, active', 'safe', 'on' => 'search'),
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
            'content' => Yii::t('translate', 'Content'),
            'date_created' => Yii::t('translate', 'Date Created'),
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
        $criteria->compare('content', $this->content, true);
        $criteria->compare('date_created', $this->date_created, true);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
