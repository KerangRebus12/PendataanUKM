@extends('template')
@section('main')
<div id="profile">
    <h2>Profile Siswa</h2>
    @if (!empty($profil_list))
        <table class="table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Program Studi</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Angkatan</th>
                </tr>
            </thead>
        </table>
</div>