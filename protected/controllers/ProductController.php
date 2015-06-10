<?php

class ProductController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionPedido() {
        $this->layout = false;
        $this->render('pedido');
    }
    
    public function actionGetProduct() {
        
        $producto = Product::model()->getproduct();

        $cont = 0;
        if (count($producto) > 0) {

            foreach ($producto as $row) {
                
                $output[$cont]['id'] = $row->productid;
                $output[$cont]['marca'] = $row->marca;
                $output[$cont]['dsc'] = $row->dsc;
                $output[$cont]['precio'] = $row->listprice;
                $output[$cont]['stock'] = $row->stock;
                $output[$cont]['imagen'] = $row->image;

                $cont = $cont + 1;
            }
        }

        echo json_encode($output);
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
