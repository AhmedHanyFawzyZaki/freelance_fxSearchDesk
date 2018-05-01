<?php

/**
 * This is the model class for table "{{ads_keyword_link}}".
 *
 * The followings are the available columns in table '{{ads_keyword_link}}':
 * @property integer $id
 * @property integer $ads_keyword
 * @property string $related_link
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property AdsKeyword $adsKeyword
 */
class AdsKeywordLink extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdsKeywordLink the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ads_keyword_link}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ads_keyword, active', 'numerical', 'integerOnly'=>true),
			array('related_link', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ads_keyword, related_link, active', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'adsKeyword' => array(self::BELONGS_TO, 'AdsKeyword', 'ads_keyword'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('translate', 'ID'),
			'ads_keyword' => Yii::t('translate', 'Ads Keyword'),
			'related_link' => Yii::t('translate', 'Related Link'),
			'active' => Yii::t('translate', 'Active'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ads_keyword',$this->ads_keyword);
		$criteria->compare('related_link',$this->related_link,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}