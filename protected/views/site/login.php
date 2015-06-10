<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

 <div class="container w-xxl w-auto-xs" ng-controller="LoginCharg">
                <a href class="navbar-brand block m-t"><i class=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/theme/img/brujula.png" alt="." class="" style="max-height: 50px !important;"></i><span class="hidden-folded m-l-xs" style="font-size: 30px !important;">Pedidos</span></a>
              <div class="m-b-lg" id="divlogin">
                <div class="wrapper text-center">
                  <strong>LOGIN</strong>
                </div>


<?php $form=$this->beginWidget('CActiveForm', array(
	 'id'=>'login-form',
        'enableClientValidation'=>false,
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array("class"=>"form-validation")
        
)); ?>

	 <div class="list-group list-group-sm">
                    <div class="list-group-item">
                        <?php echo $form->textField($model,'username',  array('ng-model'=>'user.email', 'placeholder'=>"Email", 'type'=>"email",'class'=>"form-control no-border")); ?>
                      <!--<input type="email" placeholder="Email" class="form-control no-border" ng-model="user.email"  'id'=>"loginform-username"name="LoginForm[username]" id="loginform-username" required>-->
                    </div>
                    <div class="list-group-item">
                        <?php echo $form->passwordField($model,'password', array('ng-model'=>'user.password', 'placeholder'=>"Contraseña", 'type'=>"password",'class'=>"form-control no-border")); ?>
                       <!--<input type="password" placeholder="Contraseña" class="form-control no-border" id="loginform-password" name="LoginForm[password]" ng-model="user.password" required>-->
                    </div>
                  </div>
                    <?php if($form->error($model,'username')!="" || $form->error($model,'password')){?>
                    <div class="alert alert-danger fade in">
                            <button data-dismiss="alert" class="close">
                                    ×
                            </button>
                            <?php echo $form->error($model,'username')." ".$form->error($model,'password'); ?>
                    </div>
                    <?php } ?>
                 <button type="submit" class="btn btn-lg btn-primary btn-block"  name = 'login-button' >Accesar</button> 
                    
                      <div class="text-center m-t m-b"><a id="href_contrasena" href="#">Olvido su Contraseña?</a></div>
                
                  <div class="line line-dashed"></div>

                  <?php $this->endWidget(); ?>
<p>
  <small class="text-muted">Copyright © 2015 by PortoPrint. All Rights Reserved.</small>
</p>                 
                  
                  
</div><!-- form -->
<!-- recuperar contraseña -->
                <div id="divcontrasena" style="display: none;" class="m-b-lg">
                    <div id="login-form" class="smart-form client-form well no-padding">
                        <!--<form id="login-form" class="smart-form client-form" method="post" action="index.php?r=site/recovery">-->
                            <header>RECUPERAR CONTRASEÑA</header>

                            <fieldset>
                                <section>
                                    <label > <strong>Usuario</strong></label>
                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                        <input  id="PassForm_username" type="text">                        
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>Utilice el usuario proporcionado por el administrador</b></label>
                                </section>

                                <section>
                                
                                </section>

                            </fieldset>
                            <footer>
                                <a id="btn-pass" class="btn btn-primary">
                                    Recuperar contraseña
                                </a>
                            </footer>
                        <!--</form>-->
                    </div>
                </div>
 </div>

<footer class="footer">
    
</footer>

<script>
    $("#href_contrasena").click(function() {
        $("#divlogin").hide();
        $("#divcontrasena").show();
    });
    $("#href_login").click(function() {
        $("#divlogin").show();
        $("#divcontrasena").hide();
    });
    $("#btn-pass").click(function() {
        var username = $("#PassForm_username").val();
        $("#btn-pass").attr("disabled", true);	
        //console.log(username.length);
        if (username.length > 0) {
            $.post('example.php', {'username': username}, function(response) {
                var r = response;
                //console.log(r);
                if(r==='1'){
                    alert("El usuario no esta registrado en el sistema.")
                }
                else{
                    $("#PassForm_username").val('');
                    alert("Sus datos de acceso han sido enviado por correo electrónico.")
                     $("#divlogin").show();
                     $("#divcontrasena").hide();
                }
                $("#btn-pass").attr("disabled", false);	
            });
        }
        else{
            $("#btn-pass").attr("disabled", false);	
            alert("Debe ingresar un usario.");
        }

    });
</script>
