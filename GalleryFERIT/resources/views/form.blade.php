@extends('layouts.app')
@section('content')
<form method="post" action="{{ url('/form') }}" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
<h1>Objavi fotografiju:</h1>
<hr class="style17">
@if(isset($msg))
<p class="warning"><?php echo $msg;?></p>
@endif
@if(isset($exmsg))
<p class="warning"><?php echo $exmsg; ?></p
@endif
<div class="uploaddiv">
    <table>
        <tr>
    <label>Naziv:</label><br />
    <input type="text" name="pname" id="pname" required/>
    <tr>
    <tr><br />
    <label>Opis:</label><br />
    <textarea name="description" id="description" required></textarea>
    </tr>
    <tr><br />
    <label>Tip:</label><br />
    <label class="radio-inline" for="type_public">
    <input type="radio" name="type" id="public" value="public"/>
    javno</label>
    <label class="radio-inline" for="type_private">
        <input type="radio" name="type" id="private" value="private" checked/>
    privatno</label>      
    </tr>
<tr>
<input type="file" id="pic_file" name="pic_file"/><br/>
</tr>
<tr>
<button type="submit" class="btn btn-default">Upload</button>
</tr>
</table>
</div>
</form>
@endsection