<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $orderid
 * @property integer $userid
 * @property integer $customerid
 * @property string $amount
 * @property string $tax
 * @property string $total
 * @property integer $ordersatusid
 *
 * The followings are the available model relations:
 * @property Orderstatus $ordersatus
 * @property User $user
 * @property Customer $customer
 * @property Product[] $products
 */
class Order extends CActiveRecord {

    public $user;
    public $statusdsc;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'order';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userid, customerid, amount, tax, total, ordersatusid', 'required'),
            array('userid, customerid, ordersatusid', 'numerical', 'integerOnly' => true),
            array('amount, tax, total', 'length', 'max' => 9),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('orderid, userid, customerid, amount, tax, total, ordersatusid', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'ordersatus' => array(self::BELONGS_TO, 'Orderstatus', 'ordersatusid'),
            'user' => array(self::BELONGS_TO, 'User', 'userid'),
            'customer' => array(self::BELONGS_TO, 'Customer', 'customerid'),
            'products' => array(self::MANY_MANY, 'Product', 'orderproduct(orderid, productid)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'orderid' => 'Orderid',
            'userid' => 'Userid',
            'customerid' => 'Customerid',
            'amount' => 'Amount',
            'tax' => 'Tax',
            'total' => 'Total',
            'ordersatusid' => 'Ordersatusid',
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
        $criteria->compare('userid', $this->userid);
        $criteria->compare('customerid', $this->customerid);
        $criteria->compare('amount', $this->amount, true);
        $criteria->compare('tax', $this->tax, true);
        $criteria->compare('total', $this->total, true);
        $criteria->compare('ordersatusid', $this->ordersatusid);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Order the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getorder() {
        $criteria = new CDbCriteria;

        $criteria->select = "LPAD(t.orderid,6,0) as orderid, t.orderdate, 
                            concat(u.firstname,' ',u.plastname,' ',u.mlastname) as user,
                            s.statusdsc, t.amount, t.tax, t.total";
        $criteria->join = "inner join customeruser u  on u.userid = t.userid
                           inner join orderstatus s on s.orderstatusid = t.ordersatusid";
        $criteria->condition = "t.customerid = " . Yii::app()->user->customerid;

        return $this->findAll($criteria);
    }
    
}
