@extends('admin/admin')
@section('main')
<div id="profile">
    <h2>Profile Anggota</h2>
    @if (!empty($profil_list))
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Posisi</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profil_list as $profil)
                <tr>
                    <td>{{$profil->nim}}</td>
                    <td>{{$profil->nama}}</td>
                    <td>{{$profil->jenis_kelamin}}</td>
                    <td>{{$profil->prodi->nama_prodi}}</td>
                    <td>{{$profil->posisi}}</td>
                    <td>
                    <div class="btn-group" role="group">
                        <a href="profil/{{$profil->id}}" class="btn btn-success btn-sm btn-icon icon-left">Detail</a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="profil/{{$profil->id}}/edit" class="btn btn-warning btn-sm btn-icon icon-left">Edit</a>
                    </div>
                    <div class="btn-group" role="group">
                        {!!Form::model($profil, ['method'=>'DELETE', 'action'=>['AdminController@destroy', $profil->id]])!!}
                        {!!Form::submit('Delete', ['class'=>'btn btn-danger btn-sm btn-icon icon-left'])!!}
                        {!!Form::close()!!}
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>Data Tidak Ditemukan</p>
        @endif
        <div class="table-bottom">
            <div>
                <strong>Jumlah Data : {{$totaldata}}</strong>
            </div>
            <div class="paging">
                {{$profil_list->links()}}
            </div>
        </div>
        <div class="bottom-nav">
            <div>
                <a href="profil/create" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
</div>
@endsection

