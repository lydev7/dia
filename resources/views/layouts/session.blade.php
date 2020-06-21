@if(session('success'))
    <input type="hidden" id="session_success" value="{{ session('success') }}">
@endif