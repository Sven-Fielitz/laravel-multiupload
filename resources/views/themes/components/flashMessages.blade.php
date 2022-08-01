@if (session('message.success'))
    <div class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message.success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('message.error'))
    <div class="mt-4 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Fehler:</strong>  {{ session('message.error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif