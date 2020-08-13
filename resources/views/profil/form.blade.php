@if(isset($profil))
{!!Form::hidden('id', $profil->id)!!}
@endif
<div class="form-group">
    {!!Form::label('nim', 'NIM :', ['class'=>'control-label'])!!}
    {!!Form::text('nim', null, ['class'=>'form-control'])!!}
    @if($errors->has('nim'))
    <span class="help-block">{{$errors->first('nim')}}</span>
    @endif
</div>
<div class="form-group">
    {!!Form::label('nama', 'Nama :', ['class'=>'control-label'])!!}
    {!!Form::text('nama', null, ['class'=>'form-control'])!!}
    @if($errors->has('nama'))
    <span class="help-block">{{$errors->first('nama')}}</span>
    @endif
</div>
<div class="form-group">
    {!!Form::label('alamat', 'Alamat :', ['class'=>'control-label'])!!}
    {!!Form::text('alamat', null, ['class'=>'form-control'])!!}
    @if($errors->has('alamat'))
    <span class="help-block">{{$errors->first('alamat')}}</span>
    @endif
</div>
<div class="form-group">
    {!!Form::label('jenis_kelamin', 'Jenis Kelamin :', ['class'=>'control-label'])!!}
    <div class="radio">
    <label for="">{!!Form::radio('jenis_kelamin', 'L')!!}Laki-laki</label>
    </div>
    <div class="radio">
    <label for="">{!!Form::radio('jenis_kelamin', 'P')!!}Perempuan</label>
    </div>
    @if($errors->has('jenis_kelamin'))
    <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
    @endif
</div>
<div class="form-group">
    @if($errors->any())
    <div class="form-group {{ $errors->has('id_prodi') ? 'has-error':'has-success' }}"></div>
    @else
    <div class="form-group"></div>
    @endif
    {!!Form::label('id_prodi', 'Jurusan :', ['class'=>'control-label'])!!}
    @if(count($list_prodi) > 0)
    {!!Form::select('id_prodi', $list_prodi, null, ['class'=>'form-control', 'id'=>'id_prodi', 'placeholder'=>'Pilih Jurusan'])!!}
    @else
    <p>Prodi Belum Tersedia</p>
    @endif
    @if($errors->has('id_prodi'))
    <span class="help-block">{{ $errors->first('id_prodi') }}</span>
    @endif
</div>
<div class="form-group">
    {!!Form::label('posisi', 'Posisi :', ['class'=>'control-label'])!!}
    {!!Form::select('posisi', array('Outside'=>'Outside', 'Opposite'=>'Opposite', 'Middle Blocker'=>'Middle Blocker', 'Libero'=>'Libero', 'Setter'=>'Setter'), null, ['class'=>'form-control', 'placeholder'=>'Pilih Posisi'])!!}
    @if($errors->has('posisi'))
    <span class="help-block">{{$errors->first('posisi')}}</span>
    @endif
</div>
<div class="form-group">
    @if($errors->any())
    <div class="form-group {{ $errors->has('nomor_telepon') ? 'has-error':'has-success'}}"></div>
    @else
    <div class="form-group"></div>
    @endif
        {!!Form::label('nomor_telepon', 'Telepon:', ['class'=>'control_label'])!!}
        {!!Form::text('nomor_telepon', null, ['class'=>'form-control'])!!}
        @if($errors->has('nomor_telepon'))
        <span class="help-block">{{$errors->first('nomor_telepon')}}</span>
        @endif
</div>
<div class="form-group">
    {!!Form::label('angkatan', 'Angkatan :', ['class'=>'control-label'])!!}
    {!!Form::text('angkatan', null, ['class'=>'form-control'])!!}
    @if($errors->has('angkatan'))
    <span class="help-block">{{$errors->first('angkatan')}}</span>
    @endif
</div>
<div class="form-group">
    @if($errors->any())
    <div class="form-group {{ $errors->has('foto') ? 'has-error':'has-success'}}"></div>
    @else
    <div class="form-group"></div>
    @endif
    {!!Form::label('foto', 'Foto :') !!}
    {!!Form::file('foto') !!}
    @if($errors->has('foto'))
    <span class="help-block">{{$errors->first('foto')}}</span>
    @endif

    <!--  -->
    @if(isset($profil))
        @if(isset($profil->foto))
        <img src="{{ asset('fotoupload/'. $profil->foto) }}" >
        @else
        @endif
            @if ($profil->jenis_kelamin == 'L')
                <img src="{{ asset('fotoupload/dummymale.jpg') }}">
            @else
                <img src="{{ asset('fotoupload/female.jpg') }}" >
        @endif
    @endif
</div>
<div class="btn-group">
    {!!Form::submit('Update', ['class'=>'btn btn-primary form-control'])!!}
</div>