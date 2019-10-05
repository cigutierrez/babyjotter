<!-- TODO: Remove once completed - Not using this anymore -->
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-1">
            <a href="/" class="btn btn-primary btn-block">Home</a>
        </div>
        <div class="col-2">
            <a href="/babies" class="btn btn-primary btn-block">Babies</a>
        </div>
        <div class="col-2">
            <a href="/babies/{{ $baby->id }}/edit" class="btn btn-primary btn-block">Edit</a>
        </div>
        <div class="col-2">
            <a href="/babies/{{ $baby->id }}/feedings" class="btn btn-primary btn-block">Feedings</a>
        </div>
        <div class="col-2">
            <a href="/babies/{{ $baby->id }}/naps" class="btn btn-primary btn-block">Naps</a>
        </div>
        <div class="col-2">
            <a href="/babies/{{ $baby->id }}/diapers" class="btn btn-primary btn-block">Diapers</a>
        </div>
        <div class="col-2 my-3">
            <a href="/babies/{{ $baby->id }}/medications" class="btn btn-primary btn-block">Medications</a>
        </div>
        <div class="col-2 my-3">
            <!-- Delete Button -->
            <form action="/babies/{{ $baby->id }}" method="post">
                @method('DELETE')
                @csrf

                <button id="deleteBaby" class="btn btn-danger btn-block">DELETE</button>
            </form>
        </div>
    </div>
</div>
