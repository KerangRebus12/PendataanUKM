@extends('admin/admin')
@section('main')
<div class="profil">
    <h2>Detail</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th>NIM</th>
            <td class="table-primary">{{$profil->nim}}</td>
            </tr>
            <tr>
            <th>Nama</th>
            <td class="table-primary">{{$profil->nama}}</td>
            </tr>
            <tr>
            <th>Alamat</th>
            <td class="table-primary">{{$profil->alamat}}</td>
            </tr>
            <tr>
            <th>Jenis Kelamin</th>
            <td class="table-primary">{{$profil->jenis_kelamin}}</td>
            </tr>
            <tr>
            <th>Nomor Telepon</th>
            <td class="table-primary">{{!empty ($profil->telepon->nomor_telepon) ? $profil->telepon->nomor_telepon:'-'}}</td>
            </tr>
            <tr>
            <th>Jurusan</th>
            <td class="table-primary">{{$profil->prodi->nama_prodi}}</td>
            </tr>
            <tr>
            <th>Posisi</th>
            <td class="table-primary">{{$profil->posisi}}</td>
            </tr>
            <tr>
            <th>Angkatan</th>
            <td class="table-primary">{{$profil->angkatan}}</td>
            </tr>
            <tr>
            <th>Foto</th>
            <td>
            @if (isset($profil->foto))
                <img src="{{ asset('fotoupload/'. $profil->foto) }}" >
            @else
                @if ($profil->jenis_kelamin == 'L')
                    <img src="{{ asset('fotoupload/dummymale.jpg') }}">
                @else
                    <img src="{{ asset('fotoupload/female.jpg') }}" >
                @endif
            @endif
            </td>
            </tr>
        </thead>
    </table>
</div>
@stop

