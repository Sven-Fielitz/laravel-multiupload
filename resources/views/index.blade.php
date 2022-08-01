@extends('themes.default')

@section('content')
<div class="my-3 p-3 bg-white rounded box-shadow h-100 d-flex align-items-center justify-content-center">

    <form action="{{route('file.upload')}}"  class="dropzone" id="fileupload"></form>
</div>
<div class="my-3 p-3 bg-white rounded box-shadow h-100 d-flex align-items-center justify-content-center">
    <table id="UploadedFiles" class="display" style="width:100%;">
        <thead>
            <tr>
                <th>Dateiname</th>
                <th>Bemerkung</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
                
                <tr>
                    <td>
                        <a target="_blank" href="{{$file->getDownloadLink()}}">{{ $file->orginal_filename }}</a>
                    </td> 
                    <td>
                        {!! nl2br(e($file->comment)) !!}
                    </td>   
                    <td>
                        <a href="{{route('comment.edit', ['id' => $file->id])}}" type="button" class="btn btn-info">Bemerkung verfassen</a>
                    </td>     
                </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
