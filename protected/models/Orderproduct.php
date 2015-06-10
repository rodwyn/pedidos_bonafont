<?php

/**
 * This is the model class for table "orderproduct".
 *
 * The followings are the available columns in table 'orderproduct':
 * @property integer $orderid
 * @property integer $productid
 * @property integer $quantity
 * @property string $price
 */
class Orderproduct extends CActiveRecord {

    public $name;
    public $amount;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'orderproduct';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('orderid, productid, quantity, price', 'required'),
            array('orderid, productid, quantity', 'numerical', 'integerOnly' => true),
            array('price', 'length', 'max' => 9),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('orderid, productid, quantity, price', 'safe', 'on' => 'search'),
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
            'orderid' => 'Orderid',
            'productid' => 'Productid',
            'quantity' => 'Quantity',
            'price' => 'Price',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('orderid', $this->orderid);
        $criteria->compare('productid', $this->productid);
        $criteria->compare('quantity', $this->quantity);
        $criteria->compare('price', $this->price, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Orderproduct the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getProducts($orderid) {
        $criteria = new CDbCriteria;

        $criteria->select = "t.*, p.name, t.price*t.quantity as amount";
        $criteria->join = "inner join product p  on p.productid = t.productid";
        $criteria->condition = "orderid = ".$orderid;

        return $this->findAll($criteria);
    }

}
