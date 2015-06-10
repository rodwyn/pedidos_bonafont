<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property integer $companyid
 * @property integer $corporateid
 * @property string $companydsc
 * @property string $rfc
 * @property string $tax
 * @property string $duration
 * @property integer $active
 * @property string $street
 * @property string $number
 * @property string $neighborhood
 * @property string $zipcode
 * @property string $cityid
 * @property string $phone
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Corporate $corporate
 * @property City $city
 * @property Customer[] $customers
 * @property Product[] $products
 * @property Usercompany[] $usercompanies
 */
class Company extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('corporateid, companydsc, rfc, cityid', 'required'),
			array('corporateid, active', 'numerical', 'integerOnly'=>true),
			array('companydsc', 'length', 'max'=>70),
			array('rfc', 'length', 'max'=>30),
			array('tax, duration', 'length', 'max'=>200),
			array('street, neighborhood, email', 'length', 'max'=>50),
			array('number', 'length', 'max'=>12),
			array('zipcode', 'length', 'max'=>5),
			array('cityid', 'length', 'max'=>10),
			array('phone', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('companyid, corporateid, companydsc, rfc, tax, duration, active, street, number, neighborhood, zipcode, cityid, phone, email', 'safe', 'on'=>'search'),
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
			'corporate' => array(self::BELONGS_TO, 'Corporate', 'corporateid'),
			'city' => array(self::BELONGS_TO, 'City', 'cityid'),
			'customers' => array(self::HAS_MANY, 'Customer', 'companyid'),
			'products' => array(self::MANY_MANY, 'Product', 'stock(companyid, productid)'),
			'usercompanies' => array(self::HAS_MANY, 'Usercompany', 'companyid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'companyid' => 'Companyid',
			'corporateid' => 'Corporateid',
			'companydsc' => 'Companydsc',
			'rfc' => 'Rfc',
			'tax' => 'Tax',
			'duration' => 'Duration',
			'active' => 'Active',
			'street' => 'Street',
			'number' => 'Number',
			'neighborhood' => 'Neighborhood',
			'zipcode' => 'Zipcode',
			'cityid' => 'Cityid',
			'phone' => 'Phone',
			'email' => 'Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('companyid',$this->companyid);
		$criteria->compare('corporateid',$this->corporateid);
		$criteria->compare('companydsc',$this->companydsc,true);
		$criteria->compare('rfc',$this->rfc,true);
		$criteria->compare('tax',$this->tax,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('neighborhood',$this->neighborhood,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('cityid',$this->cityid,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
