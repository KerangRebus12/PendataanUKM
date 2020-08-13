@extends('admin/admin')

@section('main')
<div id="profil">
    <h2>Edit Data</h2>
    {!!Form::model($profil, ['method'=>'PATCH', 'files'=>'true', 'action'=>['AdminController@update', $profil->id]])!!}
    @include('profil.form', ['submitButtonText'=>'Update'])
    {!!Form::close()!!}
</div>
@stop
