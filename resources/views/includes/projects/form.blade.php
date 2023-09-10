@if ($project->exists)
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" novalidate>
        @method('PUT')
    @else
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" novalidate>
@endif
@csrf

<div class="row">

    <div class="col-6">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" name="title" required value="{{ old('title', $project->title) }}" maxlength="100"
                class="form-control @error('title') is-invalid @elseif(old('title')) is-valid @enderror"
                id="title" placeholder="Inserisci il titolo del progetto...">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-6">
        <div class="mb-3">
            <label class="form-label">Slug:</label>
            <input disabled type="text" maxlength="100" class="form-control" id="slug"
                value="{{ Str::slug(old('title', $project->title), '-') }}">
        </div>
    </div>

    <div class="col-12">
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione:</label>
            <textarea class="form-control @error('description') is-invalid @elseif(old('description')) is-valid @enderror"
                name="description" required id="description" rows="5">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="status" class="form-label">Stato:</label>
            <select aria-label="Default select example"
                class="form-select  @error('status') is-invalid @elseif(old('status')) is-valid @enderror"
                required name="status" id="status" value="{{ old('status', $project->status) }}">
                <option disabled {{ !old('status', $project->status) ? 'selected' : '' }}>Seleziona... </option>
                <option {{ old('status', $project->status) == 'In progresso' ? 'selected' : '' }}>In progresso</option>
                <option {{ old('status', $project->status) == 'Completato' ? 'selected' : '' }}>Completato</option>
                <option {{ old('status', $project->status) == 'Archiviato' ? 'selected' : '' }}>Archiviato</option>
            </select>
            @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- <div class="col-9">
        <div class="mb-3">
            <label for="category" class="form-label">Linguaggi:</label>
            <input type="text" required
                class="form-control  @error('category') is-invalid @elseif(old('category')) is-valid @enderror"
                id="category" rows="3" placeholder="HTML,CSS,JS..." name="category" maxlength="100"
                value="{{ old('category', $project->category) }}">
            @error('category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div> --}}

    <div class="col-2">
        <div class="mb-3">
            <label for="type" class="form-label">Tipi:</label>
            <select class="form-select"
                @error('type_id') is-invalid @elseif(old('type_id')) is-valid @enderror id="type"
                name="type_id">
                <option value="">Nessuna</option>
                @foreach ($types as $type)
                    <option @if (old('type_id', $project->type_id) == $type->id) selected @endif value="{{ $type->id }}">
                        {{ $type->label }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-5">
        <div class="mb-3">
            <label for="thumb" class="form-label">Copertina:</label>
            <input type="file" name="thumb"
                class="form-control  @error('thumb') is-invalid @elseif(old('thumb')) is-valid @enderror"
                id="image" placeholder="Inserisci un url...">
            @error('thumb')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-1">
        <img src="{{ old('thumb', $project->thumb ?? 'https://marcolanci.it/utils/placeholder.jpg') }}" alt="preview"
            class="img-fluid rounded-3 border border-success h-100" id="img-preview">
    </div>

</div>


<div class="mt-4 d-flex justify-content-end">
    <button class="btn btn-success">
        <i class="fas fa-floppy-disk me-2"></i>Salva
    </button>
</div>
</form>
