@extends('admin.index')
@section('content')
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tabel Pengajuan Cuti Pegawai</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cuti Pegawai</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Table Pengajuan Cuti</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nama </th>
                                      <th scope="col">Tanggal Cuti</th>
                                      <th scope="col">Akhir Cuti</th>
                                      <th scope="col">Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      $no = 1;
                                      ?>
                                    @foreach($data as $d)
                                        <tr>
                                            <th scope="row">{{$no++}}</th>
                                            <td>{{$d->user->name}}</td>
                                            <td>{{date('d-m-Y', strtotime($d->tanggal_cuti))}}</td>
                                            <td>{{date('d-m-Y', strtotime($d->tanggal_akhir))}}</td>
                                            <td><a href="{{ route('acc_pengajuan_cuti_pegawai', $d->id) }}" class="btn btn-success">Acc</a></td>
                                        </tr>
                                    @endforeach
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@endsection