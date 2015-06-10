
                                                <!-- navbar header -->
                                                
                                             
                                                
                                <div class="navbar-header {{app.settings.navbarHeaderColor}}">
                                  <button class="pull-right visible-xs dk" ui-toggle-class="show" data-target=".navbar-collapse">
                                    <i class="glyphicon glyphicon-cog"></i>
                                  </button>
                                  <button class="pull-right visible-xs" ui-toggle-class="off-screen" data-target=".app-aside" ui-scroll="app">
                                    <i class="glyphicon glyphicon-align-justify"></i>
                                  </button>
                                  <!-- brand -->
                                  <a href="#/" class="navbar-brand text-lt">
                                    <!--<i class=""><img src="theme/img/brujula.png" alt="." class=""></i>

                                    <span class="hidden-folded m-l-xs">{{app.name}}</span>-->
                                      <span style=" font-family: Open Sans,Arial,Helvetica,Sans-Serif; font-size: 13px; " id="Portoprintlogo">{{app.name}}</span>
                                      
                                      
                                     
                                  
                                  </a>
                                  
                                  
                                  <!-- / brand -->
                                </div>
                                <!-- / navbar header -->

                                <!-- navbar collapse -->
                                <div class="collapse pos-rlt navbar-collapse box-shadow {{app.settings.navbarCollapseColor}}">
                                  <!-- buttons -->
                                  <div class="nav navbar-nav hidden-xs">
                                    <a href class="btn no-shadow navbar-btn" ng-click="app.settings.asideFolded = !app.settings.asideFolded" onclick="ChangTitleSoft()">
                                      <i class="fa {{app.settings.asideFolded ? 'fa-indent' : 'fa-dedent'}} fa-fw"></i>
                                    </a>
                                      <script>
                                           function ChangTitleSoft(){
                                               if($("#Portoprintlogo").text()=='Smart Print Software'){
                                                   $("#Portoprintlogo").text("SPS");
                                               }else{
                                                    $("#Portoprintlogo").text("Smart Print Software");
                                               }
                                           }
                                      </script>
                                    <a href class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user">
                                      <i class="icon-user fa-fw"></i>
                                    </a>
                                  </div>
                                  <!-- / buttons -->

                                  <!-- link and dropdown -->
                                  <ul class="nav navbar-nav hidden-sm">
                                    
                                   
                                    
                                    <li class="dropdown" id="selector_company" dropdown>
                                      <a href class="dropdown-toggle" dropdown-toggle>
                                        <i class="fa fa-fw fa-plus visible-xs-inline-block"></i>
                                        <span ><b translate="aside.nav.Compania" >Compania:</b> &nbsp; {{app.company}} &nbsp;</span> <span class="caret"></span>
                                      </a>
                                        <ul class="dropdown-menu" role="menu" id="RespoListCompChan"></ul>
                                    </li>
                                 </ul>
                              <!-- / link and dropdown -->

                                 

                                  <!-- / search form -->

                                  <!-- nabar right -->
                                  <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown hidden-sm" is-open="lang.isopen" dropdown>
                                      <a href class="dropdown-toggle" dropdown-toggle>
                                        {{selectLang}} <b class="caret"></b>
                                      </a>
                                      <!-- dropdown -->
                                      <ul class="dropdown-menu animated fadeInRight w">
                                        <li ng-repeat="(langKey, label) in langs">
                                          <a ng-click="setLang(langKey, $event); setLangust();" href>{{label}}</a>
                                        </li>
                                      </ul>
                                      <!-- / dropdown -->
                                    </li>
                                    
                                    <li class="hidden-xs">
                                      <a ui-fullscreen></a>
                                    </li>
                                    
                                    
                                    
                                    
                                    
                                    <li class="dropdown" dropdown>
                                      <a href class="dropdown-toggle clear" dropdown-toggle>
                                        <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                                          <img src="themes/assets/img/male.png" alt="...">
                                          <i class="on md b-white bottom"></i>
                                        </span>
                                        <span class="hidden-sm hidden-md">{{app.username}}</span> <b class="caret"></b>
                                      </a>
                                      <!-- dropdown -->
                                      
                                      <ul class="dropdown-menu animated fadeInRight w">
                                        <li class="wrapper b-b m-b-sm bg-light m-t-n-xs">
                                          <div>
                                            <a ui-sref="app.page.profile">
                                                <span class="thumb-lg w-auto-folded avatar m-t-sm">
                                                  <img src="themes/assets/img/male.png" class="img-full" alt="...">
                                                </span>
                                              </a>
                                          </div>
                                          
                                            <span class="clear">
                                              <span class="block m-t-sm">
                                                <strong class="font-bold text-lt">{{app.username}}</strong> 
                                               
                                              </span>
                                              <span class="text-muted text-xs block">{{app.profile}}</span>
                                            </span>
                                         
                                        </li>
                                       
                                        <li class="divider"></li>
                                        <li>
                                            <a  href="{{app.logout}}">Logout</a>
                                        </li>
                                      </ul>
                                      <!-- / dropdown -->
                                    </li>
                                  </ul>
                                  <!-- / navbar right -->

                                </div>
                                <!-- / navbar collapse -->      
                                
<script>
   
    
</script>