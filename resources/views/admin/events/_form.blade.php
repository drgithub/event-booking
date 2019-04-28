<div class="form-group row">
    <label for="eventName" class="col-sm-2 col-form-label">Event Name</label>
    <div class="col-sm-10">
        @if ($event && $event->name)
    <input type="text" {{ $readonly ? "readonly": "" }} class="form-control{{ $readonly ? '-plaintext': '' }}" id="eventName" value="{{ $event->name }}">
        @else
            <input type="text"  class="form-control" id="eventName" name="name">
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="location" class="col-sm-2 col-form-label">Location</label>
    <div class="col-sm-10">
        @if ($event && $event->location)
            <input type="text" {{ $readonly ? "readonly": "" }} class="form-control{{ $readonly ? '-plaintext': '' }}" id="location" value="{{ $event->location }}">
        @else
            <input type="text" class="form-control" id="location" name="location">
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        @if ($event && $event->description)
            <input type="text" {{ $readonly ? "readonly": "" }} class="form-control{{ $readonly ? '-plaintext': '' }}" id="description" value="{{ $event->description }}">
        @else
            <textarea class="form-control" id="description" name="description"></textarea>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="startDt" class="col-sm-2 col-form-label">Start</label>
    <div class="input-group col-sm-10">
        @if ($event && $event->start_dt)
            <input type="text" {{ $readonly ? "readonly": "" }} class="form-control{{ $readonly ? '-plaintext': ' date-picker' }}" id="startDt" value="{{ $event->start_dt }}">
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
            <input type="text" {{ $readonly ? "readonly": "" }} class="form-control{{ $readonly ? '-plaintext': ' date-picker' }}" id="endDt" value="{{ $event->end_dt }}">
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
<script>
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
</script>