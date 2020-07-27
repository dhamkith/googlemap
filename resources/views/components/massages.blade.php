@if(count($errors) > 0 )
    @foreach($errors->all() as $error )
        <div id="d-map-js-notifies" class="d-map-js-notifies">
            <a class="d-map-notify__cross" href="javascript:void(0);"><span class="notify-close"></span></a>
            <div class="js-notify">ERROR: {{$error}}</div>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div id="d-map-js-notifies" class="d-map-js-notifies success">
        <a class="d-map-notify__cross" href="javascript:void(0);"><span class="notify-close"></span></a>
        <div class="js-notify">{{session('success')}}</div>
    </div>
@endif

@if(session('error'))
    <div id="d-map-js-notifies" class="d-map-js-notifies">
        <a class="d-map-notify__cross" href="javascript:void(0);"><span class="notify-close"></span></a>
        <div class="js-notify">ERROR: {{session('error')}}</div>
    </div>
@endif
