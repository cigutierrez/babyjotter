<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-2">
            <a href="/" class="btn btn-primary btn-lg">Home</a>
        </div>
        <div class="col-2">
            <a href="/babies" class="btn btn-primary btn-lg">Babies</a>
        </div>
        <div class="col-2">
            <a href="/babies/{{ $baby->id }}/feedings" class="btn btn-primary btn-lg">Feedings</a>
        </div>
        <div class="col-2">
            <a href="/babies/{{ $baby->id }}/edit" class="btn btn-primary btn-lg">Edit</a>
        </div>
        <div class="col-2">
            <a href="/babies/{{ $baby->id }}/naps" class="btn btn-primary btn-lg">Naps</a>
        </div>
        <div class="col-2">
            <a href="/babies/{{ $baby->id }}/diapers" class="btn btn-primary btn-lg">Diapers</a>
        </div>
        <div class="col-2">
            <!-- Delete Button -->
            <form action="/babies/{{ $baby->id }}" method="post">
                @method('DELETE')
                @csrf

                <button id="deleteBaby" class="btn btn-danger btn-lg">DELETE</button>
            </form>
        </div>
    </div>
</div>
