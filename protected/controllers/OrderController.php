<?php

class OrderController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionHistorial() {
        $this->layout = false;
        $this->render('historial');
    }

    public function actionSaveOrder() {
        $data = file_get_contents('php://input');
        $json = json_decode($data, true);

        $total = 0;

        foreach ($json['datos'] as $item) {
            $total += $item['importe'];
        }

        $tax = $total * 0.16;
        $amount = $total - $tax;

        $model = new Order;

        $model->userid = Yii::app()->user->userid;
        $model->customerid = Yii::app()->user->customerid;
        $model->amount = $amount;
        $model->tax = $tax;
        $model->total = $total;
        $model->ordersatusid = 1;

        if ($model->save()) {
            echo $model->orderid;

            $orderid = $model->orderid;

            foreach ($json['datos'] as $value) {
                $orderproduct = new Orderproduct;
                $orderproduct->orderid = $orderid;
                $orderproduct->productid = $value['id'];
                $orderproduct->quantity = $value['cantidad'];
                $orderproduct->price = $value['precio'];
                $orderproduct->save();

                $stock = Stock::model()->findByAttributes(array('productid' => $value['id'], 'companyid' => 1));
                $stock->stock = $stock->stock - $value['cantidad'];
                $stock->save();
            }
        } else {
            echo 0;
        }
    }

    public function actionGetOrder() {
        $order = Order::model()->getorder();

        $cont = 0;
        if (count($order) > 0) {

            foreach ($order as $row) {

                $output[$cont]['id'] = $row->orderid;
                $output[$cont]['date'] = $row->orderdate;
                $output[$cont]['user'] = $row->user;
                $output[$cont]['status'] = $row->statusdsc;
                $output[$cont]['amount'] = $row->amount;
                $output[$cont]['tax'] = $row->tax;
                $output[$cont]['total'] = $row->total;

                $cont = $cont + 1;
            }
        }

        echo json_encode($output);
    }

    public function actionGetProduct() {
        $get = $_GET;
        $product = Orderproduct::model()->getProducts($get['orderid']);
        $cont = 0;
        if (count($product) > 0) {

            foreach ($product as $row) {

                $output[$cont]['id'] = $row->productid;
                $output[$cont]['quantity'] = $row->quantity;
                $output[$cont]['price'] = $row->price;
                $output[$cont]['name'] = $row->name;
                $output[$cont]['amount'] = $row->amount;
                
                $cont = $cont + 1;
            }
        }

        echo json_encode($output);
    }
    public function actionGetStatus() {
        $status = Orderstatus::model()->findAllByAttributes(array('active' => 1, 'type' => 'C'));
        $cont = 0;
        if (count($status) > 0) {

            foreach ($status as $row) {

                $output[$cont]['id'] = $row->orderstatusid;
                $output[$cont]['dsc'] = $row->statusdsc;
                
                $cont = $cont + 1;
            }
        }

        echo json_encode($output);
    }
    public function actionSetStatus() {
        $get = $_GET;
        //echo $get['statusid'];
        $model = Order::model()->findByPk($get['orderid']);
        $model->ordersatusid = $get['statusid'];
        
        if ($model->save()) {
            echo 1;
        } else {
            echo 0;
        }
        
        
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
