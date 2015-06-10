
<ul class="nav" id="SessMenuResp">
    
</ul>

<script>
   
    $( document ).ready(function() {
     var menu_session=session_menu;
     var cad='';
    
     cad+='<li class="hidden-folded padder m-t m-b-sm text-muted text-xs"><span translate="aside.nav.HEADER">Navigation</span></li>';
     
     $.each(menu_session, function( key,  val ) {
         
        if(val['level']==0){
         //translate="'+val['translate']+'"
        
            cad+=' <li ui-sref-active="active" id="ml'+val['ml']+'"><a ui-sref="'+val['state']+'" data-menuid ="'+val['menuid']+'" title="'+key+'" ><i class="'+val['icon']+'"></i>'+
              '<span class="font-bold" translate="'+val['translate']+'" >'+key+'</span></a></li>';
         }else{
              
              cad+=' <li><a href class="auto"><span class="pull-right text-muted">'+
              '<i class="fa fa-fw fa-angle-right text"></i><i class="fa fa-fw fa-angle-down text-active"></i></span>'+
              '<i class="'+val['icon']+'"></i><span class="font-bold" translate="'+val['translate']+'">'+key+'</span></a>'+
              '<ul class="nav nav-sub dk"><li class="nav-sub-header"><a href><span>'+key+'</span></a></li>'+
                submenu(val['menuid'])+ '</ul>';
         }
     });
     
     $("#SessMenuResp").html(cad);
     
   
    });
    
    function submenu(parent){
       var list='';
       var submenu_session=session_submenu;
      
        $.each(submenu_session, function( key,  val ) {
               if(val['parentmenuid']==parent){
                    //translate="'+val['translate']+'"
                    
                    list+='<li ui-sref-active="active" ><a ui-sref="'+val['state']+'" data-menuid ="'+val['menuid']+'" title="'+key+'" ><i class="'+val['icon']+'"></i>'+
                         '<span translate="'+val['translate']+'" >'+key+'</span></a></li>';
                
                }
            
        });   
        
        return list;
    }
</script>