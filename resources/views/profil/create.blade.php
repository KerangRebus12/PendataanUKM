@extends('admin/admin')

@section('main')
<div id="profil">
    {!!Form::open(['url'=>'profil', 'files'=>'true'])!!}
    @include('profil.form', ['$submitButtonText'=>'Simpan'])
    {!!Form::close()!!}
</div>
@stop

