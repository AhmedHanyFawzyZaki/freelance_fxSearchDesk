<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $intro
 * @property string $image
 * @property integer $publish
 * @property string $slug
 * @property string $date_created
 * @property integer $featured
 */
class Article extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Article the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{article}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('publish, featured', 'numerical', 'integerOnly' => true),
            array('title, image, slug', 'length', 'max' => 255),
            array('title, intro, description', 'required'),
            array('description, intro, date_created', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, description, intro, image, publish, slug, date_created, featured', 'safe', 'on' => 'search'),
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
            'title' => Yii::t('translate', 'Title'),
            'description' => Yii::t('translate', 'Description'),
            'intro' => Yii::t('translate', 'Introduction'),
            'image' => Yii::t('translate', 'Image'),
            'publish' => Yii::t('translate', 'Publish'),
            'slug' => Yii::t('translate', 'Slug'),
            'date_created' => Yii::t('translate', 'Date Created'),
            'featured' => Yii::t('translate', 'Featured'),
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
        $criteria->compare('intro', $this->intro, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('publish', $this->publish);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('date_created', $this->date_created, true);
        $criteria->compare('featured', $this->featured);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    protected function beforeSave() {
        if (parent::beforeSave()) {
            $this->slug = Helper::slugify($this->title);
            return true;
        }
        return false;
    }

}