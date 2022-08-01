@extends('themes.default')

@section('content')
<div class="card">
    <h5 class="card-header">
        Bemerkung eingeben: <em>{{$file->orginal_filename}}</em>
    </h5>
    <div class="card-body">
        <form method="post" action="{{route('comment.update', ['id' => $file->id])}}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Bemerkung</label>
                <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$file->comment}}</textarea>
            </div>
            <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary my-1">Speichern</button>
            <a href="{{url('/')}}" type="button" class="text-right btn btn-secondary">Zurück</a>
            </div>
        </form>
    </div>
</div>

@endsection
