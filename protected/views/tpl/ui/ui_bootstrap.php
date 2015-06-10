<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">UI Bootstrap <span class="badge">16</span></h1>
  <small class="text-muted">Bootstrap components written in pure AngularJS</small>
</div>
<div class="wrapper-md">
  <div class="row">
    <div class="col-lg-6">
      <!-- accordion -->      
      <div ng-controller="AccordionDemoCtrl">
        <accordion close-others="oneAtATime">
          <accordion-group heading="Accordion Header, initially expanded" is-open="status.isFirstOpen" is-disabled="status.isFirstDisabled">
            <p>
              <button class="btn btn-default btn-sm" ng-click="status.open = !status.open">Toggle last panel</button>
              <button class="btn btn-default btn-sm" ng-click="status.isFirstDisabled = ! status.isFirstDisabled">Enable / Disable first panel</button>
            </p>
          </accordion-group>
          <accordion-group heading="{{group.title}}" ng-repeat="group in groups">
            {{group.content}}
          </accordion-group>
          <accordion-group heading="Dynamic body content">
            <p>The body of the accordion group grows to fit the contents</p>
              <button class="btn btn-default btn-sm" ng-click="addItem()">Add Item</button>
              <div class="list-group m-t">
                <div ng-repeat="item in items" class="list-group-item">{{item}}</div>
              </div>
          </accordion-group>
          <accordion-group is-open="status.open" class="b-info">
              <accordion-heading>
                  I can have markup, too! <i class="pull-right fa fa-angle-right" ng-class="{'fa-angle-down': status.open, 'fa-angle-right': !status.open}"></i>
              </accordion-heading>
              This is just some content to illustrate fancy headings.
          </accordion-group>
        </accordion>
        <label class="checkbox i-checks m-l-md m-b-md">
          <input type="checkbox" ng-model="oneAtATime"><i></i>
          Open only one at a time
        </label>
      </div>
      <!-- / accordion -->

      <!-- alert -->
      <div ng-controller="AlertDemoCtrl" class="m-b-md">
        <alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>
        <button class='btn btn-default' ng-click="addAlert()">Add Alert</button>
      </div>
      <!-- / alert -->

      <!-- button -->
      <div ng-controller="ButtonsDemoCtrl" class="panel panel-default">
        <div class="panel-heading">
          Buttons
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
              <h5>Single toggle</h5>
              <div class="well b bg-light lter wrapper-sm">{{singleModel}}</div>
              <button type="button" class="btn btn-primary" ng-model="singleModel" btn-checkbox btn-checkbox-true="1" btn-checkbox-false="0">
                  Single Toggle
              </button>
            </div>
            <div class="col-md-8">
              <h5>Checkbox</h5>
              <div class="well b bg-light lter wrapper-sm">{{checkModel}}</div>
              <div class="btn-group">
                  <label class="btn btn-primary" ng-model="checkModel.left" btn-checkbox>Left</label>
                  <label class="btn btn-primary" ng-model="checkModel.middle" btn-checkbox>Middle</label>
                  <label class="btn btn-primary" ng-model="checkModel.right" btn-checkbox>Right</label>
              </div>
            </div>
          </div>
          <div class="m-t m-b">
            <h5>Radio &amp; Uncheckable Radio</h5>
            <div class="well b bg-light lter wrapper-sm">{{radioModel || 'null'}}</div>
            <div class="btn-group">
                <label class="btn btn-primary" ng-model="radioModel" btn-radio="'Left'">Left</label>
                <label class="btn btn-primary" ng-model="radioModel" btn-radio="'Middle'">Middle</label>
                <label class="btn btn-primary" ng-model="radioModel" btn-radio="'Right'">Right</label>
            </div>
            <div class="btn-group">
                <label class="btn btn-success" ng-model="radioModel" btn-radio="'Left'" uncheckable>Left</label>
                <label class="btn btn-success" ng-model="radioModel" btn-radio="'Middle'" uncheckable>Middle</label>
                <label class="btn btn-success" ng-model="radioModel" btn-radio="'Right'" uncheckable>Right</label>
            </div>
          </div>
        </div>
      </div>
      <!-- / button -->

      <!-- carousel -->
      <div ng-controller="CarouselDemoCtrl" class="panel b-a" set-ng-animate="false">
        <div class="panel-heading">
          Carousel
        </div>
        <carousel interval="myInterval">
          <slide ng-repeat="slide in slides" active="slide.active">
            <img ng-src="{{slide.image}}" class="img-full">
            <div class="carousel-caption">
              <h4>Slide {{$index}}</h4>
              <p>{{slide.text}}</p>
            </div>
          </slide>
        </carousel>
        <div class="panel-footer">
          <button type="button" class="btn btn-default m-r" ng-click="addSlide()">Add Slide</button>
          Interval: <input type="number" class="form-control w-sm inline" ng-model="myInterval"> ms          
        </div>
      </div>
      <!-- / carousel -->      

      <!-- collapse -->
      <div class="panel b-a">
        <div class="panel-heading b-b b-light">Collapse 
          <button class="btn btn-default btn-xs pull-right" ng-init="isCollapsed = false" ng-click="isCollapsed = !isCollapsed">Toggle collapse</button>
        </div>
        <div collapse="isCollapsed" class="panel-body">
          Some content
        </div>
      </div>
      <!-- / collapse -->

      <!-- dropdown -->
      <div ng-controller="DropdownDemoCtrl" class="panel b-a">
        <div class="panel-heading">Dropdown</div>
        <div class="panel-body">
          <!-- Simple dropdown -->
          <span class="dropdown" on-toggle="toggled(open)">
            <a href class="dropdown-toggle">
              Click me for a dropdown, yo!
            </a>
            <ul class="dropdown-menu">
              <li ng-repeat="choice in items">
                <a href>{{choice}}</a>
              </li>
            </ul>
          </span>

          <!-- Single button -->
          <div class="btn-group" dropdown is-open="status.isopen">
            <button type="button" class="btn btn-primary" dropdown-toggle ng-disabled="disabled">
              Button dropdown <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href>Action</a></li>
              <li><a href>Another action</a></li>
              <li><a href>Something else here</a></li>
              <li class="divider"></li>
              <li><a href>Separated link</a></li>
            </ul>
          </div>

          <!-- Split button -->
          <div class="btn-group" dropdown>
            <button type="button" class="btn btn-danger">Action</button>
            <button type="button" class="btn btn-danger dropdown-toggle" dropdown-toggle>
              <span class="caret"></span>
              <span class="sr-only">Split button!</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href>Action</a></li>
              <li><a href>Another action</a></li>
              <li><a href>Something else here</a></li>
              <li class="divider"></li>
              <li><a href>Separated link</a></li>
            </ul>
          </div>
          <p class="m-t">
              <button type="button" class="btn btn-default btn-sm" ng-click="toggleDropdown($event)">Toggle button dropdown</button>
              <button type="button" class="btn btn-default btn-sm" ng-click="disabled = !disabled">Enable/Disable</button>
          </p>
        </div>
      </div>
      <!-- / dropdown -->

      <!-- modal -->
      <div ng-controller="ModalDemoCtrl" class="panel b-a">
          <script type="text/ng-template" id="myModalContent.html">
            <div ng-include="'tpl/modal/modal.php'"></div>
          </script>
          <div class="panel-heading b-b b-light">Modal</div>
          <div class="panel-body">
            <button class="btn btn-success" ng-click="open()">Open me!</button>
            <button class="btn btn-default" ng-click="open('lg')">Large modal</button>
            <button class="btn btn-default" ng-click="open('sm')">Small modal</button>
          </div>
      </div>
      <!-- /modal -->

      <!-- pagination -->
      <div ng-controller="PaginationDemoCtrl">
        <h4>Pagination</h4>
        <pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()" class="m-t-none m-b"></pagination>
        <pagination boundary-links="true" total-items="totalItems" ng-model="currentPage" class="pagination-sm m-t-none m-b" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"></pagination>
        <pagination direction-links="false" boundary-links="true" total-items="totalItems" ng-model="currentPage" class="m-t-none m-b"></pagination>
        <pagination direction-links="false" total-items="totalItems" ng-model="currentPage" num-pages="smallnumPages" class="m-t-none m-b"></pagination>
        <div>
          <span class="m-r">The selected page no: <strong>{{currentPage}}</strong></span>
          <button class="btn btn-default" ng-click="setPage(3)">Set current page to: 3</button>
        </div>
        <h4>Pager</h4>
        <pager total-items="totalItems" ng-model="currentPage"></pager>
        <h4>Limit the maximum visible buttons <span class="text-sm">(Page: {{bigCurrentPage}} / {{numPages}})</span></h4>
        <pagination total-items="bigTotalItems" ng-model="bigCurrentPage" max-size="maxSize" class="pagination-sm m-t-sm m-b" boundary-links="true"></pagination>
        <pagination total-items="bigTotalItems" ng-model="bigCurrentPage" max-size="maxSize" class="pagination-sm m-t-none m-b" boundary-links="true" rotate="false" num-pages="numPages"></pagination>
      </div>
      <!-- / pagination -->

      <!-- popover -->
      <div ng-controller="PopoverDemoCtrl" class="m-b">
        <h4>Popover</h4>
        <div class="row">
          <div class="form-group col-sm-6">
            <label>Popup Text:</label>
            <input type="text" ng-model="dynamicPopover" class="form-control">
          </div>
          <div class="form-group col-sm-6">
            <label>Popup Title:</label>
            <input type="text" ng-model="dynamicPopoverTitle" class="form-control">
          </div>
        </div>
        <button popover="{{dynamicPopover}}" popover-title="{{dynamicPopoverTitle}}" class="btn btn-info">Dynamic Popover</button>
        
        <h5 class="m-t-md">Positional</h5>
        <button popover-placement="top" popover="On the Top!" class="btn btn-default">Top</button>
        <button popover-placement="left" popover="On the Left!" class="btn btn-default">Left</button>
        <button popover-placement="right" popover="On the Right!" class="btn btn-default">Right</button>
        <button popover-placement="bottom" popover="On the Bottom!" class="btn btn-default">Bottom</button>
        
        <h5 class="m-t-md">Triggers</h5>
        <div class="row">
          <div class="col-sm-6">
            <button popover="I appeared on mouse enter!" popover-trigger="mouseenter" class="btn btn-success">Mouseenter</button>
          </div>
          <div class="col-sm-6">
            <input type="text" value="Click me!" popover="I appeared on focus! Click away and I'll vanish..."  popover-trigger="focus" class="form-control">
          </div>
        </div>

        <h5 class="m-t-md">Other</h5>
        <button Popover-animation="true" popover="I fade in and out!" class="btn btn-default">fading</button>
        <button popover="I have a title!" popover-title="The title." class="btn btn-default">title</button>
      </div>
      <!-- / popover -->
    </div>
    <div class="col-lg-6">
      <!-- progressbar -->
      <div ng-controller="ProgressDemoCtrl" class="panel panel-default">
        <div class="panel-heading">
          <ul class="nav nav-pills pull-right">
            <li><a href ng-click="random()">Random</a></li>
            <li><a href ng-click="randomStacked()">Stack</a></li>
          </ul>
          Progressbar
        </div>
        <div class="list-group">
          <div class="list-group-item">
            <progressbar value="35" class="progress-xxs m-t-sm"></progressbar>
            <progressbar value="55" class="progress-xs" type="info"></progressbar>
            <progressbar class="progress-striped progress-xs" value="22" type="success">22%</progressbar>
            <progressbar class="progress-striped active progress-xs m-b-sm" max="200" value="90" type="warning"><i>90 / 200</i></progressbar>
          </div>
          <div class="list-group-item">
            <progressbar max="max" value="dynamic" type="info" class="progress-sm m-t-sm"><span style="white-space:nowrap;">{{dynamic}} / {{max}}</span></progressbar>            
            <progressbar animate="false" value="dynamic" type="success"><b>{{dynamic}}%</b></progressbar>
            <progressbar class="progress-striped active m-b-sm" value="dynamic" type="{{type}}">{{type}} <i ng-show="showWarning">!!! Watch out !!!</i></progressbar>
          </div>
          <div class="list-group-item">
            <progress class="m-t-sm m-b-sm">
              <bar ng-repeat="bar in stacked track by $index" value="bar.value" type="{{bar.type}}">
                <span ng-hide="bar.value < 5">{{bar.value}}%</span>
              </bar>
            </progress>
          </div>
        </div>
      </div>
      <!-- / progressbar -->

      <!-- rating -->
      <div ng-controller="RatingDemoCtrl" class="m-b-lg">
        <h4>Rating</h4>
        <rating ng-model="rate" max="max" readonly="isReadonly" on-hover="hoveringOver(value)" on-leave="overStar = null"></rating>
        <span class="label" ng-class="{'label-warning': percent<30, 'label-info': percent>=30 && percent<70, 'label-success': percent>=70}" ng-show="overStar && !isReadonly">{{percent}}%</span>

        <div class="well b bg-light lt wrapper-sm m-t">Rate: <b>{{rate}}</b> - Readonly is: <i>{{isReadonly}}</i> - Hovering over: <b>{{overStar || "none"}}</b></div>

        <button class="btn btn-sm btn-default" ng-click="rate = 0" ng-disabled="isReadonly">Clear</button>
        <button class="btn btn-sm btn-default" ng-click="isReadonly = ! isReadonly">Toggle Readonly</button>

        <h5 class="m-t">Custom icons</h5>
        <div ng-init="xx = 4" class="m-b text-lg">
          <rating ng-model="xx" max="5" state-on="'fa fa-star text-warning'" state-off="'fa fa-star-o'"></rating> <b>({{xx}})</b>
        </div>
        <div ng-init="x = 5">
          <rating ng-model="x" max="15" state-on="'fa fa-female text-info'" state-off="'fa fa-female'"></rating> <b>(<i>Person:</i> {{x}})</b>
        </div>
      </div>
      <!-- / rating -->

      <!-- tab -->
      <div ng-controller="TabsDemoCtrl">
        <h4>Tabs</h4>
        <p>Select a tab by setting active binding to true:</p>
        <p>
          <button class="btn btn-default btn-sm" ng-click="tabs[0].active = true">Select second tab</button>
          <button class="btn btn-default btn-sm" ng-click="tabs[1].active = true">Select third tab</button>
          <button class="btn btn-default btn-sm" ng-click="tabs[1].disabled = ! tabs[1].disabled">Enable / Disable third tab</button>
        </p>

        <tabset class="tab-container">
          <tab heading="Static title">Static content</tab>
          <tab ng-repeat="tab in tabs" heading="{{tab.title}}" active="tab.active" disabled="tab.disabled">
            {{tab.content}}
          </tab>
          <tab>
            <tab-heading>
              <i class="glyphicon glyphicon-bell"></i> Alert!
            </tab-heading>
            I've got an HTML heading, and a select callback. Pretty cool!
          </tab>
        </tabset>

        <tabset vertical="true" type="pills" class="tab-container">
          <tab heading="Vertical 1">Vertical content 1</tab>
          <tab heading="Vertical 2">Vertical content 2</tab>
        </tabset>

        <tabset justified="true" class="tab-container">
          <tab heading="Justified">Justified content</tab>
          <tab heading="SJ">Short Labeled Justified content</tab>
          <tab heading="Long Justified">Long Labeled Justified content</tab>
        </tabset>
      </div>
      <!-- / tab -->

      <!-- tooltip -->
      <div ng-controller="TooltipDemoCtrl" class="panel panel-default">
        <div class="panel-heading">Tooltip</div>
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-sm-6">
              <label>Dynamic Tooltip Text</label>
              <input type="text" ng-model="dynamicTooltipText" class="form-control">
            </div>
            <div class="form-group col-sm-6">
              <label>Dynamic Tooltip Popup Text</label>
              <input type="text" ng-model="dynamicTooltip" class="form-control">
            </div>
          </div>
          <p>
            Pellentesque <a href="#" class="text-info" tooltip="{{dynamicTooltip}}">{{dynamicTooltipText}}</a>,
            sit amet 
            <a href="#" class="text-info" tooltip-placement="left" tooltip="On the Left!">left</a> eget arcu
            <a href="#" class="text-info" tooltip-placement="right" tooltip="On the Right!">right</a> unc sed 
            <a href="#" class="text-info" tooltip-placement="bottom" tooltip="On the Bottom!">bottom</a> pharetra convallis, 
            <a href="#" class="text-info" tooltip-animation="false" tooltip="I don't fade. :-(">fading</a> at elementum eu
            <a href="#" class="text-info" tooltip-popup-delay='1000' tooltip='appears with delay'>delayed</a> turpis.
          </p>
          <p>
            I can even contain HTML. <a href="#" class="text-info" tooltip-html-unsafe="{{htmlTooltip}}">Check me out!</a>
          </p>
          <form role="form">
            <div class="form-group">
              <label>Or use custom triggers, like focus: </label>
              <input type="text" value="Click me!" tooltip="See? Now click away..."  tooltip-trigger="focus" tooltip-placement="top" class="form-control" />
            </div>
          </form>
        </div>
      </div>
      <!-- / tooltip -->

      <!-- typehead -->
      <div ng-controller="TypeaheadDemoCtrl" class="m-b-lg">
        <h4>Typehead</h4>
        <h5>Static arrays</h5>
        <div class="well b bg-light wrapper-sm">Model: {{selected | json}}</div>
        <input type="text" ng-model="selected" typeahead="state for state in states | filter:$viewValue | limitTo:8" class="form-control">

        <h5>Asynchronous results</h5>
        <div class="well b bg-light wrapper-sm">Model: {{asyncSelected | json}}</div>
        <div class="pos-rlt">
          <i ng-show="loadingLocations" class="fa fa-spinner fa-spin form-control-spin"></i>
          <input type="text" ng-model="asyncSelected" placeholder="Locations loaded via $http" typeahead="address for address in getLocation($viewValue)" typeahead-loading="loadingLocations" class="form-control">
        </div>        
      </div>
      <!-- / typehead -->

      <!-- datepicker -->
      <div ng-controller="DatepickerDemoCtrl" class="m-b-lg">
        <h4>Datepicker</h4>
        <h5>Inline</h5>
        <div class="m-b">
          <datepicker ng-model="dt" min-date="minDate" show-weeks="true" class="datepicker"></datepicker>
        </div>
        <pre class="alert alert-info">Selected date is: <em>{{dt | date:'fullDate' }}</em></pre>    
        <div class="row">
          <div class="col-md-6">
            <label>Popup</label>
            <p class="input-group">
              <input type="text" class="form-control" datepicker-popup="{{format}}" ng-model="dt" is-open="opened" min-date="minDate" max-date="'2015-06-22'" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
              <span class="input-group-btn">
                <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
            </p>
          </div>
          <div class="col-md-6">
            <label>Format:</label> <select class="form-control" ng-model="format" ng-options="f for f in formats"><option></option></select>
          </div>
        </div>
        <button type="button" class="btn btn-sm btn-info" ng-click="today()">Today</button>
        <button type="button" class="btn btn-sm btn-default" ng-click="dt = '2009-08-24'">2009-08-24</button>
        <button type="button" class="btn btn-sm btn-default" ng-click="clear()">Clear</button>
        <button type="button" class="btn btn-sm btn-default" ng-click="toggleMin()" tooltip="After today restriction">Min date</button>
      </div>
      <!-- / datepicker -->

      <!-- timepicker -->
      <div ng-controller="TimepickerDemoCtrl" class="m-b-lg">
        <h4>Timepicker</h4>
        <timepicker ng-model="mytime" ng-change="changed()" hour-step="hstep" minute-step="mstep" show-meridian="ismeridian"></timepicker>

        <pre class="alert alert-info">Time is: {{mytime | date:'shortTime' }}</pre>

        <div class="row m-b"> 
          <div class="col-xs-6">
              Hours step is:
            <select class="form-control" ng-model="hstep" ng-options="opt for opt in options.hstep"></select>
          </div>
          <div class="col-xs-6">
              Minutes step is:
            <select class="form-control" ng-model="mstep" ng-options="opt for opt in options.mstep"></select>
          </div>
        </div>
        <button class="btn btn-info" ng-click="toggleMode()">12H / 24H</button>
        <button class="btn btn-default" ng-click="update()">Set to 14:00</button>
        <button class="btn btn-default" ng-click="clear()">Clear</button>
      </div>
      <!-- / tiempicker -->

      <!-- dropdown-menu -->
      <div class="pos-rlt clearfix m-b-lg">
        <h4>Dropdown menu</h4>
        <div class="dropdown pull-left m-r">
          <ul class="dropdown-menu pos-stc inline" role="menu">
            <li><a tabindex="-1" href>Action</a></li>
            <li><a tabindex="-1" href>Another action</a></li>
            <li><a tabindex="-1" href>Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-submenu">
              <a tabindex="-1" href>Separated link</a>
              <ul class="dropdown-menu" role="menu">
                <li><a tabindex="-1" href>Action</a></li>
                <li><a tabindex="-1" href>Another action</a></li>
                <li><a tabindex="-1" href>Something else here</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="dropdown dropup pull-left">
          <ul class="dropdown-menu pos-stc inline" role="menu">
            <li><a tabindex="-1" href>Action</a></li>
            <li><a tabindex="-1" href>Another action</a></li>
            <li><a tabindex="-1" href>Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-submenu">
              <a tabindex="-1" href>Separated link</a>
              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-submenu  pull-left">
                  <a tabindex="-1" href>Action</a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a tabindex="-1" href>Action</a></li>
                    <li><a tabindex="-1" href>Another action</a></li>
                    <li><a tabindex="-1" href>Something else here</a></li>
                  </ul>
                </li>
                <li><a tabindex="-1" href>Another action</a></li>
                <li><a tabindex="-1" href>Something else here</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- / dropdown-menu -->
      <!-- breadcrumb -->
      <div>
        <h4>Breadcrumb</h4>
        <ul class="breadcrumb bg-white b-a">
          <li><a href><i class="fa fa-home"></i> Breadcrumb</a></li>
          <li><a href>Elements</a></li>
          <li class="active">Components</li>
        </ul>
      </div>
      <!-- / breadcrumb -->
      <!-- label and badge -->
      <div class="m-b-lg">
        <h4>Lable &amp; Badge</h4>
        <p>
          <span class="label bg-primary">Primary</span>
          <span class="label bg-success">Success</span>
          <span class="label bg-info">Info</span>
          <span class="label bg-dark">dark</span>
          <span class="label bg-warning">Warning</span>
          <span class="label bg-danger">Danger</span>
          <span class="label bg-light dk">Light</span>
        </p>
        <p class="m-b-none">          
          <span class="badge bg-primary">15</span>
          <span class="badge bg-success">20</span>
          <span class="badge bg-info">21</span>
          <span class="badge bg-dark">13</span>
          <span class="badge bg-warning">35</span>
          <span class="badge bg-danger">32</span>
          <span class="badge">9</span>
        </p>
      </div>
      <!-- / label and badge -->
    </div>
  </div>
</div>