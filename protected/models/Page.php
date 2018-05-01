<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $id
 * @property string $title
 * @property string $details
 * @property integer $active
 * @property string $introduction
 */
class Page extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Page the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{page}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('active', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 255),
            array('title', 'required'),
            array('url', 'unique'),
            array('details, introduction', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, details, active, introduction', 'safe', 'on' => 'search'),
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
            'title' => Yii::t('translate', 'Name'),
            'details' => Yii::t('translate', 'Details'),
            'active' => Yii::t('translate', 'Active'),
            'introduction' => Yii::t('translate', 'Introduction'),
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
        $criteria->compare('details', $this->details, true);
        $criteria->compare('active', $this->active);
        $criteria->compare('introduction', $this->introduction, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->url == '') {
                $this->url = Helper::slugify($this->title);
            }
            return true;
        }
        return false;
    }

}
