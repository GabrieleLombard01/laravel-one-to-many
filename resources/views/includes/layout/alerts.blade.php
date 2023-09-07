@if (session('alert-message'))
    <div class="alert alert-{{ session('alert-type') ?? 'info' }}">
        {{ session('alert-message') }}
        <button type="button" class="float-end btn-close ms-5" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger position-relative">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="m-3 btn-close top-0 end-0 position-absolute" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </ul>
    </div>
@endif
