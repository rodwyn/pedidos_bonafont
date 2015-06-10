  <!-- navbar -->
  <div data-ng-include=" 'tpl/blocks/header.music.html' " class="app-header navbar">
  </div>
  <!-- / navbar -->

  <!-- menu -->
  <div data-ng-include=" 'tpl/blocks/aside.music.html' " class="app-aside hidden-xs {{app.settings.asideColor}}">
  </div>
  <!-- / menu -->

  <!-- content -->
  <div class="app-content">
    <div ui-butterbar></div>
    <a href class="off-screen-toggle hide" ui-toggle-class="off-screen" data-target=".app-aside" ></a>
    <div class="app-content-body fade-in-up" ui-view>

    </div>
  </div>
  <!-- /content -->

  <!-- footer -->
  <div class="app-footer app-footer-fixed" data-ng-include=" 'tpl/music.player.html' ">
  </div>
  <!-- / footer -->

  <div data-ng-include=" 'tpl/blocks/settings.html' " class="settings panel panel-default">
  </div>