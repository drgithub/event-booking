<div class="card mb-0">
    <div class="card-header">
        <strong>Create Event</strong>
        <div class="card-header-actions">
            <a class="btn-close" href="#" onclick="closeDialog(event)">
                <i class="icon-close"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form id="eventForm" method="POST">
            @csrf
            @include('admin::events._form', ['event' => []])
        </form>
    </div>
    <div class="card-footer text-right bg-white same-width">
        <button onclick="saveData()" class="btn btn-primary">Submit</button>
        <button onclick="clearData()" class="btn btn-light">Clear</button>
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
            url: "events",
            success: function(response) {
                clearData();
                formDialog.close();
            },
            error: function(error) {
                console.log(error);
            }
        })
    }

    function clearData() {
        $("#eventForm")[0].reset();
    }
</script>