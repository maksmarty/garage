@if(Session::has('flash_error'))
    <div class="alert alert-box alert-danger">
        <h2>{{ Session::get('flash_error') }}</h2>
    </div>
@endif

@if(Session::has('flash_info'))
    <div class="alert alert-box alert-info">
        <h2>{{ Session::get('flash_info') }}</h2>
    </div>
@endif

@if(Session::has('flash_success'))
    <div class="alert alert-box alert-success">
        <h2>{{ Session::get('flash_success') }}</h2>
    </div>
@endif


{{--TODO::Remove this message key--}}
@if(Session::has('message'))
    <div class="alert alert-box alert-success">
        <h2>{{ Session::get('message') }}</h2>
    </div>
@endif


{{--Ajax Message Container--}}
<div id="ajax_message"></div>