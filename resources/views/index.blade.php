@extends('themes.default')

@section('content')
<div class="my-3 p-3 bg-white rounded box-shadow h-100 d-flex align-items-center justify-content-center">

    <form action="{{route('upload')}}"  class="dropzone" id="fileupload"></form>
</div>
<div class="my-3 p-3 bg-white rounded box-shadow h-100 d-flex align-items-center justify-content-center">
    <table id="UploadedFiles" class="display" style="width:100%;">
        <thead>
            <tr>
                <th>Dateiname</th>
                <th>Titel</th>
                <th>Bemerkung</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
