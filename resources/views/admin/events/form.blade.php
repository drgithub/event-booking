<div class="card mb-0">
    <div class="card-header">
        <strong>{{ $title }}</strong>
        <div class="card-header-actions">
            <a class="btn-close eventFormCloseButton" href="#">
                <i class="icon-close"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form id="eventForm">
            @csrf
            <div class="form-group row">
                <label for="eventName" class="col-sm-2 col-form-label">Event Name</label>
                <div class="col-sm-10">
                    @if ($event && $event->name)
                        <input type="text" {{ $readonly ? "readonly": "" }} class="form-control{{ $readonly ? '-plaintext': '' }}" id="eventName" value="{{ $event->name }}" name="name">
                    @else
                        <input type="text"  class="form-control" id="eventName" name="name">
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="location" class="col-sm-2 col-form-label">Location</label>
                <div class="col-sm-10">
                    @if ($event && $event->location)
                        <input type="text" {{ $readonly ? "readonly": "" }} class="form-control{{ $readonly ? '-plaintext': '' }}" id="location" value="{{ $event->location }}" name="location">
                    @else
                        <input type="text" class="form-control" id="location" name="location">
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    @if ($event && $event->description)
                        <input type="text" {{ $readonly ? "readonly": "" }} class="form-control{{ $readonly ? '-plaintext': '' }}" id="description" value="{{ $event->description }}" name="description">
                    @else
                        <textarea rows="6" class="form-control" id="description" name="description"></textarea>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="startDt" class="col-sm-2 col-form-label">Start</label>
                <div class="input-group col-sm-10">
                    @if ($event && $event->start_dt)
                        <input 
                            type="text" {{ $readonly ? "readonly": "" }} 
                            class="form-control{{ $readonly ? '-plaintext': ' date-picker' }}" 
                            id="startDt" 
                            value="{{ $event->start_dt }}" 
                            name="start_dt">
                        @if (!$readonly)
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        @endif
                    @else
                        <input type="text" class="form-control date-picker" id="startDt" name="start_dt">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="endDt" class="col-sm-2 col-form-label">End</label>
                <div class="input-group col-sm-10">
                    @if ($event && $event->end_dt)
                        <input 
                            type="text" {{ $readonly ? "readonly": "" }} 
                            class="form-control{{ $readonly ? '-plaintext': ' date-picker' }}" 
                            id="endDt" 
                            value="{{ $event->end_dt }}"
                            name="end_dt">
                        @if (!$readonly)
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        @endif
                    @else
                        <input type="text" class="form-control date-picker" id="endDt" name="end_dt">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="guest" class="col-sm-2 col-form-label">Guest</label>
                <div class="col-sm-10">
                    @if (count($guests) > 0)
                        <textarea class="form-control">
                            @foreach ($guests as $index => $guest)
                                {{ $guest->email. "" .(count($guests) < ($index+1)) ? ",": "" }}
                            @endforeach
                        </textarea>
                    @else
                        <input type="text" class="form-control" id="guest" name="events_guests_email">
                    @endif
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer text-right bg-white same-width">
        <button onclick="saveData()" class="btn btn-primary">Submit</button>
        <button onclick="clearData()" class="btn btn-light">Clear</button>
    </div>
</div>
{{-- <script>
    alert();
    $('.eventFormCloseButton').click(function (e) {
        e.preventDefault();
    });

    $('.date-picker').datetimepicker({
        useCurrent: false,
        showTodayButton: true,
        showClear: true,
        format: 'YYYY-MM-DD HH:mm:ss',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down",
            previous: "fa fa-angle-left",
            next: "fa fa-angle-right",
            today: "fa fa-thumb-tack",
            clear: "fa fa-trash"
        }
    });
</script> --}}