
<!DOCTYPE html>
<html lang="en-us" data-ng-app="app">
	<head>
		<meta charset="utf-8">
		<title>Pedidos</title>
                <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/css/bootstrap.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/css/animate.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/css/font-awesome.min.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/css/simple-line-icons.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/css/font.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/css/app.css" type="text/css" />
                
	</head>
        <div style="display:none;">
            <script>
                  
            
                    var session_menu= JSON.parse('<?php echo json_encode (Yii::app()->user->menu);?>');
                    var session_use= '<?php echo Yii::app()->user->username; ?>';
                    var session_profile= '<?php echo Yii::app()->user->profiledsc; ?>';
                    var session_logout='<?php echo Yii::app()->createAbsoluteUrl('/site/logout'); ?>';
            </script>
        </div>
         <body ng-controller="AppCtrl">
                <div class="app" id="app" ng-class="{'app-header-fixed':app.settings.headerFixed, 'app-aside-fixed':app.settings.asideFixed, 'app-aside-folded':app.settings.asideFolded, 'app-aside-dock':app.settings.asideDock, 'container':app.settings.container}" ui-view></div>
        
        
        
        <!-- jQuery -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery/jquery.min.js"></script>

        <!-- Angular -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/underscore-min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular-animate/angular-animate.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular-cookies/angular-cookies.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular-resource/angular-resource.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular-sanitize/angular-sanitize.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular-touch/angular-touch.js"></script>
      <!-- Vendor -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular-ui-router/angular-ui-router.js"></script> 
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/ngstorage/ngStorage.js"></script>

        <!-- bootstrap -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular-bootstrap/ui-bootstrap-tpls.js"></script>
        <!-- lazyload -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/oclazyload/ocLazyLoad.js"></script>
        <!-- translate -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular-translate/angular-translate.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular-translate/loader-static-files.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular-translate/storage-cookie.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular-translate/storage-local.js"></script> 
        <!-- App -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/app.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/config.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/config.lazyload.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/config.router.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/main.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/services/ui-load.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/filters/fromNow.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/directives/setnganimate.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/directives/ui-butterbar.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/directives/ui-focus.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/directives/ui-fullscreen.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/directives/ui-jq.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/directives/ui-module.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/directives/ui-nav.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/directives/ui-scroll.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/directives/ui-shift.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/directives/ui-toggleclass.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/directives/ui-validate.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/controllers/bootstrap.js"></script>
        <!-- Lazy loading -->                
       </body>
</html>                 
                        
