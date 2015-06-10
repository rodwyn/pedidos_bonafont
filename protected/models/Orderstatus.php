<?php

/**
 * This is the model class for table "orderstatus".
 *
 * The followings are the available columns in table 'orderstatus':
 * @property integer $orderstatusid
 * @property string $statusdsc
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 */
class Orderstatus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orderstatus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('statusdsc', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('statusdsc', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('orderstatusid, statusdsc, active', 'safe', 'on'=>'search'),
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
			'orders' => array(self::HAS_MANY, 'Order', 'ordersatusid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'orderstatusid' => 'Orderstatusid',
			'statusdsc' => 'Statusdsc',
			'active' => 'Active',
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

		$criteria->compare('orderstatusid',$this->orderstatusid);
		$criteria->compare('statusdsc',$this->statusdsc,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orderstatus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
