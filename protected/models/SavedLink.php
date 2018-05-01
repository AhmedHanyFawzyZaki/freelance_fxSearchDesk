<?php

/**
 * This is the model class for table "{{saved_link}}".
 *
 * The followings are the available columns in table '{{saved_link}}':
 * @property integer $id
 * @property string $link
 * @property integer $user_id
 * @property integer $folder_id
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property User $user
 * @property SearchFolder $folder
 */
class SavedLink extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SavedLink the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{saved_link}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, folder_id', 'numerical', 'integerOnly' => true),
            array('link, title', 'length', 'max' => 255),
            array('link, user_id, folder_id', 'required'),
            array('date_created', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, link, user_id, folder_id, date_created', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'folder' => array(self::BELONGS_TO, 'SearchFolder', 'folder_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('translate', 'ID'),
            'link' => Yii::t('translate', 'Link'),
            'title' => Yii::t('translate', 'Title'),
            'user_id' => Yii::t('translate', 'User'),
            'folder_id' => Yii::t('translate', 'Folder'),
            'date_created' => Yii::t('translate', 'Date Created'),
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
        $criteria->compare('link', $this->link, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('folder_id', $this->folder_id);
        $criteria->compare('date_created', $this->date_created, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
