@extends('admin.index')
@section('content')
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Absensi</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Absensi</li>
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
                                {{-- <h5 class="card-title m-b-0">Static Table</h5> --}}
                                @if($akses_masuk)
                                @else
                                    <a href="{{ route('absensi_masuk') }}" class="btn btn-info float-right" >Absensi Masuk</a>
                                @endif
                                @if($akses_keluar)
                                @else
                                    <a href="{{ route('absensi_keluar') }}" class="btn btn-danger float-right" style="margin-right: 10px;">Absensi Keluar</a>
                                @endif
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nama </th>
                                      <th scope="col">Masuk</th>
                                      <th scope="col">Keluar</th>
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
                                            <td>{{$d->masuk}}
                                                {{-- {{ dd(\Carbon\Carbon::parse($d->masuk)->format('H:i') , $jamMasuk) }} --}}
                                                @if($d->masuk == Null)

                                                    -
                                                @elseif(\Carbon\Carbon::parse($d->masuk)->format('H:i') > '09:00')
                                                    <p style="color:red">Not Valid</p>
                                                @elseif(\Carbon\Carbon::parse($d->masuk)->format('H:i') < '09:00')
                                                    <p style="color:blue">Valid</p>
                                                @endif
                                            </td>
                                            <td>{{$d->keluar}}
                                                @if($d->keluar == Null)
                                                    -
                                                @elseif(\Carbon\Carbon::parse($d->keluar)->format('H:i') > '17:00')

                                                    <p style="color:blue">Valid</p>
                                                @elseif(\Carbon\Carbon::parse($d->keluar)->format('H:i') < '17:00')
                                                    <p style="color:red">Not Valid</p>
                                                @endif
                                            </td>
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