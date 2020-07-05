@extends('layouts.app')
@section('content')
    @if(auth()->user()->is_admin)
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <form action="{{ route('message.store') }}" method="POST">
                            @csrf
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
                                            <input type="text" name="values[]" class="form-control" placeholder="Value"
                                                   required>
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
            </div><!-- /.container-fluid -->
        </section>
    @else
        <hr>
    @endif
    <section class="content">
        <div class="container">
            <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                    <div class="mb-5">
                        <i class="far fa-clock bg-gray"></i>
                    </div>
                    <div class="time-label">
                        <span class="bg-secondary">
                          {{ \Carbon\Carbon::parse($messages[0]->created_at)->format('d M. Y') }}
                        </span>
                    </div>
                    <?php $date = $messages[0]->created_at ?>
                    @foreach($messages as $message)
                        @if(\Carbon\Carbon::parse($date)->format('d M Y') != \Carbon\Carbon::parse($message->created_at)->format('d M Y'))
                            <?php $date = $message->created_at ?>
                            <div class="time-label">
                                <span class="bg-secondary">
                                  {{ \Carbon\Carbon::parse($date)->format('d M. Y') }}
                                </span>
                            </div>
                        @endif
                        <div>
                            <i class="fas fa-envelope bg-primary"></i>
                            <div class="timeline-item">
                            <span class="time">
                                <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($message->created_at)->format('H:i') }}
                            </span>
                                <h3 class="timeline-header">
                                    <a href="#">Action</a> {{ $message->signals[0]->value }}
                                </h3>
                                @if($message->message)
                                    <a href="#message{{ $message->message->id }}">
                                        <div class="timeline-body bg-secondary border-bottom">
                                            <div class="col-12 text-right">
                                            <span class="time">
                                                {{ \Carbon\Carbon::parse($message->message->created_at)->format('d M. y') }}
                                                <i class="far fa-clock"></i>
                                                {{ \Carbon\Carbon::parse($message->message->created_at)->format('H:i') }}
                                            </span>
                                            </div>
                                            <div class="col-12">
                                                <ul>
                                                    @foreach($message->message->signals as $signal)
                                                        <li>{{ $signal->attribute->attribute }} : {{ $signal->value }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </a>

                                @endif
                                <div class="timeline-body border-bottom"  id="message{{$message->id}}">
                                    <div class="col-12">
                                        <ul>
                                            @foreach($message->signals as $signal)
                                                <li>{{ $signal->attribute->attribute }} : {{ $signal->value }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="timeline-footer text-right">
                                    <a href="{{ route('message.edit',compact('message')) }}"
                                       class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('message.destroy',compact('message')) }}" class=" d-inline"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="time-label">
                    <span class="bg-secondary">
                      {{ \Carbon\Carbon::parse($messages[array_key_last($messages->toArray())]->created_at)->subDay()->format('d M. Y') }}
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@push('script')
<script>
    $('body').on('click', '#add_filds', function (e) {
        e.preventDefault();
        var $fild = $('.items > .row:first-child').html();
        $('.items').append('<div class="row"> ' + $fild + '</div>');
    })
</script>
@endpush
