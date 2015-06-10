<style type="text/css">
    .table > tbody > tr > td {
        padding: 0 !important;
    }
    .table > tbody > tr > td{
        padding: 5px 1px !important;
    }
    .col-lg-4, .col-lg-8 {
        padding-right: 5px;
        padding-left: 5px;
    }
    .tar {
        text-align: right;
    }
</style>
<div class="bg-white-only" ng-controller="recordOrderController">
    <div class="col col-lg-8  bg-white-only b-l bg-auto no-border-xs">
        <!-- main header -->
        <div class="bg-white-only lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Pedidos</h1>
                    <small class="text-muted">Historial de pedidos</small>
                </div>
            </div>
        </div>
        <!-- / main header -->
        <div class="table-responsive col-sm-12 col-xs-12 wrapper-md">
            <table ui-jq="dataTable" ui-options="{
                   'bLengthChange':false,
                   'oLanguage': {
                   'sInfo': 'Mostrando _TOTAL_ registros (_START_ a _END_)',
                   'sEmptyTable': 'No hay registros.',
                   'sInfoEmpty' : 'No hay registros.',
                   'sInfoFiltered': ' - Filtrado de un total de  _MAX_ registros',
                   'sProcessing': 'Procesando',
                   'sSearch': 'Buscar:',
                   'sZeroRecords': 'No hay registros',
                   }

                   }" class="table table-striped m-b-none">
                <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr ng-repeat="order in orders">
                        <td>
                            <button ng-click="getproduct(order.id)" class="btn btn-rounded btn-sm btn-icon btn-default"><i class="fa fa-twitter"></i></button>
                            &nbsp;
                            {{order.id}}
                        </td>
                        <td>{{order.date}}</td>
                        <td>{{order.user}}</td>
                        <td>{{order.status}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col col-lg-4  bg-white-only b-l bg-auto no-border-xs">
        <!-- alert -->
        <div  class="m-b-md">
            <alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>
        </div>
        <!-- / alert -->
        <div class="panel b-a">
            <div class="panel-heading no-border bg-success">
                <!--<div class="clearfix">
                    <div class="clear">
                        <div class="h3 m-t-xs m-b-xs">
                            Pedido: {{ordertxt}}
                        </div>
                        <small class="text-muted">{{orderdte}}</small>
                    </div>
                </div>-->

            </div>
            <div class="item m-l-n-xxs m-r-n-xxs b-b">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="item in items">
                            <td>{{item.quantity}}</td>
                            <td>{{item.name}}</td>
                            <td>{{item.price| currency}}</td>
                            <td class="tar">{{item.amount| currency}}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th class="tar">Importe</th>
                            <th class="tar">{{amount| currency}}</th>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th class="tar">I.V.A.</th>
                            <th class="tar">{{tax| currency}}</th>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th class="tar">Total</th>
                            <th class="tar">{{total| currency}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="form-group m-t-sm" ng-hide="sstatus">
                <label class="col-sm-2 control-label">Estatus</label>
                <div class="col-sm-10">
                    <select class="form-control m-b" ng-model="statusid" data-ng-options="st.dsc for st in status">
                        <option value="">Seleccionar Estatus</option>
                    </select>
                </div>
            </div>
            <div class="hbox text-center b-b b-light text-sm" ng-hide="sstatus">          
                <button ng-click="setstatus()" class="btn btn-default btn-lg btn-block" ng-disabled="disableBtn_01">
                    <i class="fa fa-check-circle block  fa-2x"></i> Cambiar estatus
                </button>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    app.factory('Orderstatus', function($http) {
        var service = {};
        service.entries = [];
        $http.get("index.php?r=order/getstatus")
                .success(function(response) {
                    service.entries = response;
                    console.log(response);
                });
        return service;

    });
    app.factory('Items', function() {
        var service = {};
        service.entries = [];
        service.remove = function(entry) {
            service.entries = _.reject(service.entries, function(element) {
                return entry.id === element.id
            });
        };
        service.getById = function(id) {
            //find retrieves the first entry that passes the condition.
            //documentation for _.find() http://underscorejs.org/#find
            return _.find(service.entries, function(entry) {
                return entry.id === id;
            });
        };
        return service;
    });
    app.factory('Orders', function($http) {
        var service = {};
        service.entries = [];
        $http.get("index.php?r=order/getorder")
                .success(function(response) {
                    service.entries = response;
                });
        /*service.entries = [
         {id: 1, marca: 'Natural', dsc: '250 ml', precio: 3.50, stock: 10, imagen: 'producto01.jpg'},
         {id: 2, marca: 'Natural', dsc: '300 ml', precio: 4.50, stock: 10, imagen: 'producto02.jpg'}
         ];*/
        service.getAll = function() {
            $http.get("index.php?r=order/getorder")
                    .success(function(response) {
                        service.entries = response;
                    });
        };
        //get an entry by id, using underscore.js
        service.getById = function(id) {

            //find retrieves the first entry that passes the condition.
            //documentation for _.find() http://underscorejs.org/#find
            return _.find(service.entries, function(entry) {
                return entry.id == id
            });
        };
        return service;
    });
    app.controller('recordOrderController', ['$scope', '$http', 'Orders', 'Notify', 'Items', 'Orderstatus', function($scope, $http, Orders, Notify, Items, Orderstatus) {
            $http.defaults.headers.post['Content-Type'] = 'application/json; charset=UTF-8';

            $scope.orders = Orders.entries;
            $scope.alerts = Notify.entries;
            $scope.items = Items.entries;
            $scope.amount = 0;
            $scope.total = 0;
            $scope.tax = 0;
            $scope.ordertxt = " ";
            $scope.orderdte = " ";
            $scope.status = Orderstatus.entries;
            //$scope.disableBtn_01 = false;
            $scope.sstatus = true;
            $scope.orderid = 0;


            $scope.$watch(function() {
                return Orders.entries;
            }, function(entries) {
                $scope.orders = entries;
            });
            $scope.$watch(function() {
                return Items.entries;
            }, function(entries) {
                $scope.items = entries;
            });
            $scope.$watch(function() {
                return Orderstatus.entries;
            }, function(entries) {
                $scope.status = entries;
            });
            $scope.getproduct = function(orderid) {
                $http.get("index.php?r=order/getproduct/orderid/" + orderid)
                        .success(function(response) {
                            $scope.items = response;
                            var producto = Orders.getById(orderid);
                            $scope.amount = producto.amount;
                            $scope.tax = producto.tax;
                            $scope.total = producto.total;
                            $scope.ordertxt = producto.id;
                            $scope.orderid = producto.id;
                            $scope.orderdte = producto.date;
                            $scope.sstatus = false;
                        });
            };
            $scope.setstatus = function() {
                if ($scope.statusid) {
                    $http.get("index.php?r=order/setstatus/orderid/" + $scope.orderid + "/statusid/" + $scope.statusid.id)
                            .success(function(response) {
                                if(parseInt(response)===1){
                                    $scope.sstatus = true;
                                    $scope.orders = Orders.getAll();
                                    Notify.addAlert('success', "Estatus actualizado.");
                                }
                                else{
                                    Notify.addAlert('danger', "Error al almacenar datos.");
                                }
                            });
                }
                else {
                    Notify.addAlert('warning', "Seleccione un estatus.");
                }
            };
            /*$scope.removeitem = function() {
             Items.remove(item);
             };*/
            /*$scope.pedido = function() {
             if ($scope.items.length > 0) {
             $scope.disableBtn_01 = true;
             $http.post('index.php?r=order/saveorder', {datos: $scope.items}).success(
             function(data) {
             if (parseInt(data)  > 0) {
             while ($scope.items.length > 0) {
             $scope.items.pop();
             }
             $scope.total = 0;
             $scope.disableBtn_01 = false;
             Products.getAll();
             
             window.location = '<?php echo Yii::app()->createAbsoluteUrl('pdf/pedido'); ?>/orderid/'+data;
             Notify.addAlert('success', "Ha registrado su pedido con éxito.");
             }
             else {
             Notify.addAlert('danger', "Los datos no se han almacenado.");
             }
             });
             }
             else {
             Notify.addAlert('danger', "Debe seleccionar sus productos.");
             }
             };*/

            /*$scope.addRow = function(id) {
             $scope.total = 0;
             
             var gproducto = Products.getById(id);
             var gitem = Items.getById(id);
             
             if (gitem) {
             if (gitem.cantidad < parseInt(gproducto.stock)) {
             gitem.cantidad++;
             gitem.importe = gitem.cantidad * gitem.precio;
             }
             
             } else {
             $scope.items.push({id: gproducto.id, cantidad: 1, 'descripcion': gproducto.dsc, precio: parseFloat(gproducto.precio), importe: parseFloat(gproducto.precio), existencia: parseInt(gproducto.stock)});
             }
             
             $scope.calcTotal();
             };*/

            /*$scope.change = function(id) {
             $scope.total = 0;
             
             var gitem = Items.getById(id);
             if (gitem) {
             if (gitem.cantidad > 0) {
             gitem.importe = gitem.cantidad * gitem.precio;
             }
             else {
             Items.remove(gitem);
             gitem.importe = gitem.cantidad * gitem.precio;
             }
             }
             $scope.calcTotal();
             };*/
            /*$scope.calcTotal = function() {
             var count = $scope.items.length;
             
             for (i = 0; i < count; i++) {
             $scope.total += $scope.items[i].importe;
             }
             
             };*/
            $scope.closeAlert = function(index) {
                $scope.alerts.splice(index, 1);
            };
        }]);
</script>