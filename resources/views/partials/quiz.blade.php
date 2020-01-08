<form class="form-horizontal" style="padding-top: 35px;">
   <div id="question-block"></div>

   <div class="form-group">
     <div class="col-lg-2">
       <button id="prev" type="button" class="btn btn-default"><i class="fa fa-caret-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ __('app.prev') }}</button>
     </div>
     <div id="next-block" class="col-lg-offset-7 col-lg-3">
       <button id="next" type="button" class="btn btn-default">{{ __('app.next') }} &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-left"></i></button>
     </div>
     <div id="finish-block" class="col-lg-offset-7 col-lg-3" style="display: none;">
      <button id="finish" type="button" class="btn btn-default">{{ __('app.finish') }} &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></button>
    </div>
   </div>
 </form>