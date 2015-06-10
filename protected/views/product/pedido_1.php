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
</style>
<div class="bg-white-only" ng-controller="listProductController">
    <div class="col col-lg-8  bg-white-only b-l bg-auto no-border-xs">
        <!-- main header -->
        <div class="bg-white-only lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Producto</h1>
                    <small class="text-muted">Catalogo de productos</small>
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
                   },
                   columnDefs: [ { 'targets': 0, 'orderable': false, 'bSortable': false },
                   { 'targets': 1, 'orderable': false, 'bSortable': false } 
                   ]
                   }" class="table table-striped m-b-none">
                <thead>
                    <tr>
                        <th  style="width:50px;">&nbsp;</th>
                        <th  style="width:100px;">Imagen</th>
                        <th  style="">Marca</th>
                        <th  style="">Producto</th>
                        <th  style="">Precio</th>
                        <th  style="">Stock</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr ng-repeat="product in products">
                        <td><button ng-click="addRow(product.id)" class="btn btn-rounded btn-lg btn-icon btn-success"><i class="fa fa-shopping-cart"></i></button>                        </td>
                        <td><img src="producto/{{product.imagen}}" height="80" width="80" ></td>
                        <td>{{product.marca}}</td>
                        <td>{{product.dsc}}</td>
                        <td>{{product.precio| currency}}</td>
                        <td>{{product.stock}}</td>
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
                <span class="text-lt">Resumen Pedido</span>
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
                            <td>
                                <input ui-jq="TouchSpin" type="text"  value="0" class="form-control" data-min='0' data-max="{{item.existencia}}" data-step="1" ng-model="item.cantidad" ng-change="change(item.id)">
                            </td>
                            <td>{{item.descripcion| uppercase}}</td>
                            <td>{{item.precio| currency}}</td>
                            <td>{{item.importe| currency}}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Total</th>
                            <th>{{total| currency}}</th>
                        </tr>
                    </tfoot>
                </table>


            </div>
            <div class="hbox text-center b-b b-light text-sm">          
                <button ng-click="pedido()" class="btn btn-default btn-lg btn-block" ng-disabled="disableBtn_01">
                    <i class="fa fa-shopping-cart block  fa-2x"></i> Realizar pedido
                </button>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    app.factory('Total', function() {
        var service = 0;
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
    app.factory('Products', function($http) {
        var service = {};
        service.entries = [];
        $http.get("index.php?r=product/getproduct")
                .success(function(response) {
                    console.log(response);
                    service.entries = response;
                });
        /*service.entries = [
         {id: 1, marca: 'Natural', dsc: '250 ml', precio: 3.50, stock: 10, imagen: 'producto01.jpg'},
         {id: 2, marca: 'Natural', dsc: '300 ml', precio: 4.50, stock: 10, imagen: 'producto02.jpg'}
         ];*/
        service.getAll = function() {
            $http.get("index.php?r=product/getproduct")
                    .success(function(response) {
                        console.log(response);
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
        //console.log(service);
        return service;
    });
    app.controller('listProductController', ['$scope', '$http', 'Products', 'Items', 'Total', 'Notify', function($scope, $http, Products, Items, Total, Notify) {
            $http.defaults.headers.post['Content-Type'] = 'application/json; charset=UTF-8';
            $scope.products = Products.entries;
            $scope.items = Items.entries;
            $scope.alerts = Notify.entries;
            $scope.disableBtn_01 = false;

            $scope.$watch(function() {
                return Products.entries;
            }, function(entries) {
                $scope.products = entries;
            });
            $scope.$watch(function() {
                return Items.entries;
            }, function(entries) {
                $scope.items = entries;
            });
            $scope.removeitem = function() {
                Items.remove(item);
            };
            $scope.pedido = function() {
                if ($scope.items.length > 0) {
                    $scope.disableBtn_01 = true;
                    console.log($scope.items);
                    $http.post('index.php?r=order/saveorder', {datos: $scope.items}).success(
                            function(data) {
                                console.log(data);
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
            };

            $scope.addRow = function(id) {
                console.log(id);
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
            };

            $scope.change = function(id) {
                $scope.total = 0;

                var gitem = Items.getById(id);
                if (gitem) {
                    if (gitem.cantidad > 0) {
                        gitem.importe = gitem.cantidad * gitem.precio;
                    }
                    else {
                        Items.remove(gitem);
                        gitem.importe = gitem.cantidad * gitem.precio;
                        //console.log($scope.items)
                    }
                }
                $scope.calcTotal();
            };
            $scope.calcTotal = function() {
                var count = $scope.items.length;

                for (i = 0; i < count; i++) {
                    $scope.total += $scope.items[i].importe;
                }

            };
            $scope.closeAlert = function(index) {
                $scope.alerts.splice(index, 1);
            };
        }]);
</script>