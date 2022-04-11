@if ($message = Session::get('success'))
    <div class="alert alert-success hide" id="flash-success" role="alert">
        <div id="flash-message" class="text-flash-success m-1"><i class="fa fa-check mr-2"></i> {{ $message }}</div>
    </div>
@endif

@if (!empty($errors->all()))
    <div class="alert alert-danger" id="flash-error" role="alert">
        @foreach ($errors->all() as $message)
            <div class="text-flash-error m-1"><i class="fa fa-times mr-2"></i> {{ $message }}</div>
        @endforeach
    </div>
@endif