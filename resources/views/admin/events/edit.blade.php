<div class="card mb-0">
    <div class="card-header">
        <strong>Edit Event</strong>
        <div class="card-header-actions">
            <a class="btn-close" href="#" onclick="closeDialog(event)">
                <i class="icon-close"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form id="eventForm" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            @include('admin::events._form', [
                'readonly' => false
            ])
        </form>
    </div>
    <div class="card-footer text-right bg-white same-width">
        <button onclick="saveData()" class="btn btn-warning">Update</button>
        <button onclick="formDialog.close()" class="btn btn-light">Cancel</button>
    </div>
</div>
<script>
    function closeDialog(e) {
        e.preventDefault();
        formDialog.close();
    }

    function saveData() {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: $("#eventForm").serialize(),
            url: "events/{{$event->id}}",
            success: function(response) {

            },
            error: function(error) {
                console.log(error);
            }
        })
    }
</script>