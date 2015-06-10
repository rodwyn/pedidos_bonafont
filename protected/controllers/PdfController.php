<?php

class PdfController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionPedido() {
        $get = $_GET;
        $order = Order::model()->findByPk($get['orderid']);
        $co = Company::model()->findByPk(Yii::app()->user->companyid);
        $st = State::model()->findByPk($co->city->stateid);
        $customer = Customer::model()->findByPk($order->customerid);
        $caddress = Customerlegalentity::model()->findByPk($customer->customerid);
        $custate = State::model()->findByPk($caddress->city->stateid);
        $ccontact = Customercontact::model()->findByPk($order->customerid);
        
        $product = Orderproduct::model()->getProducts($get['orderid']);
        
        $content = '<page style="font-size: 14px">
    <table style="width: 100%" align="center">
        <tr>
            <td style="width: 40%; text-align: left; padding-left: 3mm;">
                <img src="data:image/jpeg;base64,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" alt="Logo" width=100 />
            </td>
            <td style="width: 60%; text-align: right; padding-right: 3mm;">
                <table align="right">
                    <tr><td><span style="font-weight: bold; font-size: 14pt; font-family: Times;">Pedido: '.str_pad($order->orderid, 6, "0", STR_PAD_LEFT).'<br></span><br/><br/></td></tr>
                    <tr><td><span style="font-weight: bold; font-size: 10pt; font-family: Times;">Fecha de emisión: '.$order->orderdate.'</span></td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr style="height: 5mm; background: #f5bd9f; border: solid 1mm #f5bd9f;"></td>
        </tr>
        <tr>
            <td style="width: 40%; text-align: left; padding-left: 3mm;">
                <table align="left">
                    <tr><td><span>'.$co->street.' '.$co->number.'</span></td></tr>
                    <tr><td><span>'.$co->neighborhood.', '.$co->city->citydsc.'</span></td></tr>
                    <tr><td><span>'.$st->statedsc.', C.P. '.$co->zipcode.'</span></td></tr>
                    <tr><td><span>Tel: '.$co->phone.'</span></td></tr>
                    <tr><td><span>'.$co->email.'</span></td></tr>
                </table>
            </td>
            <td style="width: 60%; text-align: right;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 40%; text-align: left; padding-left: 3mm;">
                <table align="left">
                    <tr><td><span>Emitido para:</span></td></tr>
                    <tr><td><span>'.$customer->customerdsc.'</span></td></tr>
                    <tr><td><span>'.$caddress->street.' #'.$caddress->number.'</span></td></tr>
                    <tr><td><span>'.$caddress->neighborhood.', '.$caddress->city->citydsc.'</span></td></tr>
                    <tr><td><span>'.$custate->statedsc.', C.P. '.$caddress->zipcode.'</span></td></tr>
                    <tr><td><span>Tel: '.$ccontact->phone1.'</span></td></tr>
                    <tr><td><span>'.$ccontact->mail.'</span></td></tr>
                </table>
            </td>
            <td style="width: 60%; text-align: right;">&nbsp;</td>
        </tr>
    </table>
    <br />
    <table style="width: 100%; " align="center">
        <thead>
            <tr style="background-color: #dee5e7; border: 1px solid #9BA0A2; font-size: 15px;">
                <th style="width: 15%;">Cantidad</th>
                <th style="width: 45%;">Producto</th>
                <th style="width: 20%;">Precio</th>
                <th style="width: 20%;">Importe</th>
            </tr>
        </thead>
        <tbody>
        ';
        foreach ($product as $value) {
            $content .= '<tr>
                <td>'.$value->quantity.'</td>
                <td>'.$value->name.'</td>
                <td style="text-align: right;">'.$value->price.'</td>
                <td style="text-align: right;">'.$value->amount.'</td>
            </tr>';
        }
            
       $content .= '</tbody>
        <tfoot style="text-align: right;">
            <tr>
                <td colspan="2"></td>
                <td><b>Importe</b></td>
                <td><b>'.$order->amount.'</b></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><b>I.V.A.</b></td>
                <td><b>'.$order->tax.'</b></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><b>Total</b></td>
                <td><b>$'.$order->total.'</b></td>
            </tr>
        </tfoot>
    </table>
</page>';
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($content);
        $html2pdf->Output('Pedido'.$order->orderid.'.pdf', 'D');
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
