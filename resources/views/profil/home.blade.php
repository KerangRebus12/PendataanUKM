@extends('admin/admin')
@section('main')
<div class="wrapper" style="margin-top: 30px">
    <div class="container text-center" >
      <div class="row justify-content-center">
        <div class="col-md-7">
          <img src="{{url('lte/dist/img/logo.png')}}" width="150px" height="150px"/>
          <h1 class="text-uppercase font-weight-bold font-black mt-3 ">Selamat Datang</h1> 
          <p class="lead ">Anda Telah Memasuki Sistem Pendataan UKM Voli Politeknik Negeri Jakarta</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">About Us</a>
        </div>
      </div>
    </div>
    <!-- <div class="push"></div> -->
</div>


  <section class="page-section bg-light" id="about" style="margin-top: 250px">
    <div class="container">
      <div class="col-md-12">
      <div class="card mb-3" >
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{url('lte/dist/img/gambar.jpg')}}" class="card-img" width="200px" height= "280px" alt="...">
            <!-- <img src="images/pnj.jpg" style="float:left;" alt=""> -->
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Tentang Kami</h5>
              <p class="card-text">UKM Voli Politeknik Negeri Jakarta merupakan UKM resmi dengan nama Polytechnic Volleyball Club atau dapat disingkat
              Polvoc. Polvoc sendiri adalah UKM yang berguna sebagai media bagi mahasiswa dan mahasiswi yang memiliki minat dalam permainan voli untuk mengembangkan 
              juga belajar bermain olahraga Voli. Polvoc juga merupakan UKM yang aktif dan konsisten dalam melakukan aktivitas latihan. Polvoc merupakan UKM yang bertujuan
              untuk mempersiapkan keikutsertaan mahasiswa dan mahasiswi yang memiliki bakat dalam olahraga voli dalam ajang olahraga Politeknik seluruh Indonesia atau lebih dikenal dengan PORSENI.
              Selain itu Polvoc juga mendorong anggota-anggota nya untuk aktif dalam kegiatan event kampus, hal ini bisa dilihat dengan adanya event tahunan PNJ Volleyball Cup.</p>
              </p>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>
@endsection

