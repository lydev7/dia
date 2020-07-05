@extends('layouts.app')
@section('content')
    <div class="col-12 offset-0 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
        <div class="register-logo">
            <a href="/"><b>Edit Signal</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <ul>
                    @foreach($message->signals as $signal)
                        <li>{{ $signal->attribute->attribute }} : {{ $signal->value }}</li>
                    @endforeach
                </ul>

                <form action="{{ route('message.update',compact('message')) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2">
                        <div class="col-12 text-right">
                            <a href="#" id="add_filds" class="btn btn-warning btn-sm">Add Field</a>
                        </div>
                    </div>
                    <div class="items">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="attributes[]" class="form-control" required>
                                        <option value selected disabled>Select Attribute</option>
                                        @foreach($attributes as $attribute)
                                            <option value="{{ $attribute->id }}">{{ $attribute->attribute }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" name="values[]" class="form-control" placeholder="Value" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
@push('script')
<script>
    $('body').on('click', '#add_filds', function (e) {
        e.preventDefault();
        var $fild = $('.items > .row:first-child').html();
        $('.items').append('<div class="row"> ' +$fild + '</div>');
    })
</script>
@endpush
