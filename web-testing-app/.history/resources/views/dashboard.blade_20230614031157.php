@php
    $variable = $menuMinDurations;
    $variablemax = $menuMaxDurations;
    $dataMin = "-";
    $dataMax = "-";

    switch ($variablemax) {
        case 1:
            $dataMax = "Dashboard";
            break;
        case 2:
            $dataMax = "Produk";
            break;
        case 3:
            $dataMax = "Galeri";
            break;
        case 4:
            $dataMax = "Kontak";
            break;
        case 5:
            $dataMax = "Tentang";
            break;
        default:
            // Code to execute if none of the cases match
            break;
    }

    switch ($variable) {
        case 1:
            $dataMin = "Dashboard";
            break;
        case 2:
            $dataMin = "Produk";
            break;
        case 3:
            $dataMin = "Galeri";
            break;
        case 4:
            $dataMin = "Kontak";
            break;
        case 5:
            $dataMin = "Tentang";
            break;
        default:
            // Code to execute if none of the cases match
            break;
    }
@endphp
<x-app-layout>
    @section('content')
        <h4 class="text-center my-4">Halaman Dashboard</h1>

       <!-- Sale & Revenue Start -->
       <div class="container-fluid pt-4 px-4" style="height: 200px">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Jumlah Penguji</p>
                                <h6 class="mb-0">{{$userCounts}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Halaman Paling Lama Durasi Kunjungan</p>
                                <h6 class="mb-0">
                                    {{ $dataMax }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Halaman Paling Cepat Durasi Kunjungan</p>
                                <h6 class="mb-0">
                                {{ $dataMin }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Halaman yang banyak diklik</p>
                                <h6 class="mb-0">{{$idMenuTerbesar}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->
    @endsection
</x-app-layout>
