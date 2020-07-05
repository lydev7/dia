@if(session('success'))
    <input type="hidden" id="session_success" value="{{ session('success') }}">
@endif
@if(session('danger'))
    <input type="hidden" id="session_danger" value="{{ session('danger') }}">
@endif