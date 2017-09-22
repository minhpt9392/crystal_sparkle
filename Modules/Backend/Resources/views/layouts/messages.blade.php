@if (Session::has('flash_message'))
    <div class="alert alert-{{ Session::get('flash_level') }}">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ ucfirst(Session::get('flash_level')) }}! </strong> {{Session::get('flash_message')}}
    </div>
@endif
