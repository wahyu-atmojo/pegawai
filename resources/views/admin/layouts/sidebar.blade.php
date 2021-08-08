<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav" class="p-t-30">
            <li class="sidebar-item"> 
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                    <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span>
                </a>
            </li>
            @if((Auth::user()->role->roles == 'pegawai'))
            <li class="sidebar-item"> 
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('absensi')}}" aria-expanded="false">
                    <i class="mdi mdi-account-key"></i><span class="hide-menu">Absensi</span>
                </a>
            </li>
            <li class="sidebar-item"> 
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('cuti')}}" aria-expanded="false">
                    <i class="mdi mdi-receipt"></i><span class="hide-menu">Ijin Tidak Bekerja</span>
                </a>
            </li>
            
            @elseif((Auth::user()->role->roles == 'hrd'))
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Laporan Pegawai</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="{{route('laporan_absensi')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Laporan Absensi Pegawai </span></a></li>
                    <li class="sidebar-item"><a href="{{route('laporan_cuti')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Laporan Cuti Pegawai </span></a></li>
                </ul>
            </li>
            @elseif((Auth::user()->role->roles == 'manajer' ))
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Laporan Pegawai</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('laporan_absensi')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Laporan Absensi Pegawai </span></a></li>
                        <li class="sidebar-item"><a href="{{route('laporan_cuti')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Laporan Cuti Pegawai </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('pengajuan_cuti_pegawai')}}" aria-expanded="false">
                        <i class="mdi mdi-account-key"></i><span class="hide-menu">Pengajuan Cuti Pegawai</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>