<div class="card mb-0">
    <div class="card-header">
        <strong>Details</strong>
        <div class="card-header-actions">
            <a class="btn-close" href="#" onclick="closeDialog(event)">
                <i class="icon-close"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form>
            @include('admin::events._form', ['readonly' => true])
        </form>
    </div>
</div>
<script>
    function closeDialog(e) {
        e.preventDefault();
        formDialog.close();
    }
</script>