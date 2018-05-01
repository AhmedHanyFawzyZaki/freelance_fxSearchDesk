<?php

/**
 * This is the model class for table "{{crawl}}".
 *
 * The followings are the available columns in table '{{crawl}}':
 * @property integer $id
 * @property integer $website_id
 * @property string $link
 * @property string $page_title
 * @property string $content
 * @property string $meta_tags
 * @property string $meta_description
 * @property integer $depth_level
 */
class Crawl extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Crawl the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{crawl}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('website_id, depth_level', 'numerical', 'integerOnly' => true),
            array('link, page_title', 'length', 'max' => 255),
            array('content, meta_tags, meta_description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, website_id, link, page_title, content, meta_tags, meta_description, depth_level', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'website' => array(self::BELONGS_TO, 'Website', 'website_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('translate', 'ID'),
            'website_id' => Yii::t('translate', 'Website'),
            'link' => Yii::t('translate', 'Link'),
            'page_title' => Yii::t('translate', 'Page Title'),
            'content' => Yii::t('translate', 'Content'),
            'meta_tags' => Yii::t('translate', 'Meta Tags'),
            'meta_description' => Yii::t('translate', 'Meta Description'),
            'depth_level' => Yii::t('translate', 'Depth Level'),
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
        $criteria->compare('website_id', $this->website_id);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('page_title', $this->page_title, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('meta_tags', $this->meta_tags, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('depth_level', $this->depth_level);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
