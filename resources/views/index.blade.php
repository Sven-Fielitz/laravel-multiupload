@extends('themes.default')

@section('content')
<div class="h-100 d-flex align-items-center justify-content-center">
  <div>  
    <form action="{{route('upload')}}"
        class="dropzone"
        id="my-awesome-dropzone">
        @csrf
    </form>
  </div>
</div>
@endsection
