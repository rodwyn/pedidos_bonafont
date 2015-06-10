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
         <!-- jQuery -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery/jquery.min.js"></script>

        <!-- Angular -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/angular/angular.js"></script>

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

       
        
	<body id="login" class="animated fadeInDown">
		
                <div id="main" role="main" class="app">
			
				<?php echo $content; ?>
			
		</div>

		
	   
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/assets/js/app.js"></script>


	</body>
</html>