@php
    $time1 = strtotime($timeskenario1->isEmpty() ? "00" : $timeskenario1[0]->time_skenario);
    $time2 = strtotime($timeskenario2->isEmpty() ? "00" :$timeskenario2[0]->time_skenario);
    $time3 = strtotime($timeskenario3->isEmpty() ? "00" :$timeskenario3[0]->time_skenario);
    $value = gmdate('H:i:s', $time1+$time2+$time3);
@endphp
<x-app-layout>
    @section('content')
        <h4 class="text-center my-4">Detail Data Penguji</h4>
        <div class="embed-responsive embed-responsive-16by9 my-5 p-2">
            <div class="col-12 d-flex justify-content-end">
                <a href="/data-penguji" class="btn btn-secondary me-1 mb-1">Kembali</a>
            </div>
            <section class="section">
                <div class="card">
                    <div class="row match-height">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="row">
                                        <div class="col">
                                            <label class="label-text">Nama Penguji</label><br>
                                            <label class="content-text" style="font-weight: 900"> {{ $penguji->name }}
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label class="label-text">Email penguji</label><br>
                                            <label class="content-text"
                                                style="font-weight: 900">{!! empty($penguji) ? old('isi') : $penguji->email !!}</label>
                                        </div>
                                    </div>
                                    <hr style="margin: 16px">
                                    <div class="row" style="margin-top:16px">
                                        <h4>Hasil Testing </h4>
                                        <h6 style="font-weight:normal; margin-top:8px">Total Durasi Testing <label style="font-weight:bold"> : {{$value}}</label></h6>
                                    <hr style="margin: 16px">
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center"
                                                id="skenario1">
                                                1. Lakukan pemesanan produk jamur tiram! <H6 id="timeSkenario1">
                                                    {{ $timeskenario1->isEmpty() ? "Tidak Terlaksana" : $timeskenario1[0]->time_skenario }}
                                                </H6>
                                            </li>
                                            <span id="skenario2">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    2. Lakukan pencarian alamat (gmaps) Mitra Jamur Bondowoso! <H6
                                                        id="timeSkenario2">{{ $timeskenario2->isEmpty() ? "Tidak Terlaksana" : $timeskenario2[0]->time_skenario }}</H6>
                                                </li>
                                            </span>
                                            <span id="skenario3">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    3. Lakukan kritik dan saran terkait Mitra Jamur Bondowoso! <H6
                                                        id="timeSkenario3">{{ $timeskenario3->isEmpty() ? "Tidak Terlaksana" :$timeskenario3[0]->time_skenario }}</H6>
                                                    <span class="badge badge-primary badge-pill"></span>
                                                </li>
                                            </span>

                                        </ul>
                                    </div>
                                    <div class="row" style="margin-top: 32px">
                                        <table class="table table-bordered" style="text-align: center; ">
                                            <thead>
                                                <tr>
                                                    <th colspan="5">
                                                        Menu
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <button onclick="changeIframeSrcFirstClick('')"
                                                            class="btn btn-info">FC</button>
                                                        <button onclick="changeIframeSrc('')"
                                                            class="btn btn-light">Beranda</button>
                                                    </td>
                                                    <td>
                                                        <button onclick="changeIframeSrcFirstClick('produk')"
                                                            class="btn btn-info">FC</button>
                                                        <button onclick="changeIframeSrc('produk')"
                                                            class="btn btn-light">Produk</button>
                                                    </td>
                                                    <td>
                                                        <button onclick="changeIframeSrcFirstClick('gallery')"
                                                            class="btn btn-info">FC</button>
                                                        <button onclick="changeIframeSrc('gallery')"
                                                            class="btn btn-light">Galeri</button>
                                                    </td>
                                                    <td>
                                                        <button onclick="changeIframeSrcFirstClick('tentang')"
                                                            class="btn btn-info">FC</button>
                                                        <button onclick="changeIframeSrc('tentang')"
                                                            class="btn btn-light">Tentang</button>
                                                    </td>
                                                    <td>
                                                        <button onclick="changeIframeSrcFirstClick('kontak')"
                                                            class="btn btn-info">FC</button>
                                                        <button onclick="changeIframeSrc('kontak')"
                                                            class="btn btn-light">Kontak</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        {{ \Carbon\Carbon::createFromTimestamp($timemenu1->isEmpty() ? '0' : $timemenu1[0]->duration)->format('i') }}
                                                        menit
                                                        {{ \Carbon\Carbon::createFromTimestamp($timemenu1->isEmpty() ? '0' : $timemenu1[0]->duration)->format('s') }}
                                                        detik
                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::createFromTimestamp($timemenu2->isEmpty() ? '0' : $timemenu2[0]->duration)->format('i') }}
                                                        menit
                                                        {{ \Carbon\Carbon::createFromTimestamp($timemenu2->isEmpty() ? '0' : $timemenu2[0]->duration)->format('s') }}
                                                        detik
                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::createFromTimestamp($timemenu3->isEmpty() ? '0' : $timemenu3[0]->duration)->format('i') }}
                                                        menit
                                                        {{ \Carbon\Carbon::createFromTimestamp($timemenu3->isEmpty() ? '0' : $timemenu3[0]->duration)->format('s') }}
                                                        detik
                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::createFromTimestamp($timemenu4->isEmpty() ? '0' : $timemenu4[0]->duration)->format('i') }}
                                                        menit
                                                        {{ \Carbon\Carbon::createFromTimestamp($timemenu4->isEmpty() ? '0' : $timemenu4[0]->duration)->format('s') }}
                                                        detik
                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::createFromTimestamp($timemenu5->isEmpty() ? '0' : $timemenu5[0]->duration)->format('i') }}
                                                        menit
                                                        {{ \Carbon\Carbon::createFromTimestamp($timemenu5->isEmpty() ? '0' : $timemenu5[0]->duration)->format('s') }}
                                                        detik
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="embed-responsive embed-responsive-16by9 my-5 p-2" id="heatmap">
                                            {{--  style="position: relative; height: 3620px; width: 1321px;">  --}}

                                            <iframe class="embed-responsive-item" id="webview"
                                                src="https://testing.mitrajamurbondowoso.com/"
                                                style="width:1073px; height:4403px;">
                                            </iframe>

                                            {{--  <img class="embed-responsive-item" src="/assets/img/Beranda2.png" allowfullscreen
                                                style="width: 1321px; height: 3620px;"></img>  --}}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-12 d-flex justify-content-end" style="margin-top:32px">
                                        <a href="/data-penguji" class="btn btn-primary me-1 mb-1">Kembali</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        @push('js')
            <script>
                function convertMinutes(seconds) {
                    var minutes = Math.floor(seconds / 60); // Calculate the minutes
                    var remainingSeconds = seconds % 60;
                    return remainingSeconds;
                }
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/heatmap.js/2.0.0/heatmap.min.js"
                integrity="sha512-FpvmtV53P/z7yzv1TAIVH7PNz94EKXs5aV6ts/Zi+B/VeGU5Xwo6KIbwpTgKc0d4urD/BtkK50IC9785y68/AA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                let data_sumbu_x = [];
                let data_sumbu_y = [];
                let points = [];
                let max = 0;
                let data = {};
                // Get reference to the iframe element
                $(document).ready(getData(1));

                // minimal heatmap instance configuration
                var heatmapInstance = h337.create({
                    // only container is required, the rest will be defaults
                    container: document.getElementById('heatmap')
                });

                function changeIframeSrc(type) {
                    // Get reference to the iframe element
                    var iframe = document.getElementById('webview');
                    iframe.style.width = '1073px';
                    iframe.style.height = '4403px';
                    // Change the src attribute of the iframe
                    console.log("cek");

                    iframe.src = 'https://testing.mitrajamurbondowoso.com/' + type;
                    data_sumbu_x = [];
                    data_sumbu_y = [];
                    points = [];
                    max = 0;
                    data = {};

                    switch (type) {
                        case "":
                            getData(1);
                            iframe.style.width = '1073px';
                            iframe.style.height = '4403px';
                            break;
                        case "produk":
                            getData(2);
                            console.log("change size iframe");
                            iframe.style.width = '1057px';
                            iframe.style.height = '1307px';
                            break;
                        case "gallery":
                            getData(3);
                            iframe.style.width = '1073px';
                            iframe.style.height = '4403px';
                            break;
                        case "tentang":
                            getData(4);
                            iframe.style.width = '1040px';
                            iframe.style.height = '1586px';
                            break;
                        case "kontak":
                            getData(5);
                            iframe.style.width = '1040px';
                            iframe.style.height = '1586px';
                            break;
                        default:
                            // code block
                    }
                }

                function changeIframeSrcFirstClick(type) {
                    // Get reference to the iframe element
                    var iframe = document.getElementById('webview');
                    iframe.style.width = '1073px';
                    iframe.style.height = '4403px';
                    // Change the src attribute of the iframe
                    console.log("cek");

                    iframe.src = 'https://testing.mitrajamurbondowoso.com/' + type;
                    data_sumbu_x = [];
                    data_sumbu_y = [];
                    points = [];
                    max = 0;
                    data = {};

                    switch (type) {
                        case "":
                        getDataFirstClick(1);
                            iframe.style.width = '1073px';
                            iframe.style.height = '4403px';
                            break;
                        case "produk":
                        getDataFirstClick(2);
                            console.log("change size iframe");
                            iframe.style.width = '1057px';
                            iframe.style.height = '1307px';
                            break;
                        case "gallery":
                        getDataFirstClick(3);
                            iframe.style.width = '1073px';
                            iframe.style.height = '4403px';
                            break;
                        case "tentang":
                        getDataFirstClick(4);
                            iframe.style.width = '1040px';
                            iframe.style.height = '1586px';
                            break;
                        case "kontak":
                        getDataFirstClick(5);
                            iframe.style.width = '1040px';
                            iframe.style.height = '1586px';
                            break;
                        default:
                            // code block
                    }
                }

                function getData(menu) {
                    //heatmapInstance.setData(data);
                    console.log("cek ceke cekk");
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getmonitordetail', ['id' => $penguji->id]) }}",
                        dataType: 'json',
                        data: {
                            menu: menu,
                        },
                        success: function(res) {
                            data_sumbu_x = [];
                            data_sumbu_y = [];
                            points = [];
                            max = 0;
                            data = {};

                            console.log("dataku >> " + res.data.length);
                            console.log(res);
                            data_sumbu_y.splice();
                            data_sumbu_x.splice();
                            for (var i = 0; i < res.data.length; i++) {
                                console.log("data>> " + res.data[i].sumbu_x);
                                data_sumbu_x.push(res.data[i].sumbu_x);
                                data_sumbu_y.push(res.data[i].sumbu_y);
                            }

                            console.log("hasil data1");
                            console.log('datain1' + data_sumbu_x.length);

                            for (var i = 0; i < data_sumbu_x.length; i++) {
                                var val = 60;
                                console.log(val);
                                max = Math.max(max, val);
                                point = {
                                    x: data_sumbu_x[i],
                                    y: data_sumbu_y[i],
                                    value: val
                                };
                                points.push(point);
                            }
                            // heatmap data format
                            data = {
                                max: max,
                                data: points
                            };
                            // if you have a set of datapoints always use setData instead of addData
                            // for data initialization
                            heatmapInstance.setData(data);
                        },
                        dataku: function(data) {
                            console.log("data >> " + data);
                        },
                        error: function(data) {
                            console.log("errorrku");
                        }
                    });
                }

                function getDataFirstClick(menu) {
                    //heatmapInstance.setData(data);
                    console.log("cek ceke cekk");
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getmonitordetail', ['id' => $penguji->id]) }}",
                        dataType: 'json',
                        data: {
                            menu: menu,
                        },
                        success: function(res) {
                            data_sumbu_x = [];
                            data_sumbu_y = [];
                            points = [];
                            max = 0;
                            data = {};

                            console.log("dataku >> " + res.data.length);
                            console.log(res);
                            data_sumbu_y.splice();
                            data_sumbu_x.splice();
                            for (var i = 0; i < res.data.length; i++) {
                                console.log("data>> " + res.data[i].sumbu_x);
                                data_sumbu_x.push(res.data[i].sumbu_x);
                                data_sumbu_y.push(res.data[i].sumbu_y);
                            }

                            console.log("hasil data1");
                            console.log('datain1' + data_sumbu_x.length);

                            var val = 60;
                            console.log(val);
                            max = Math.max(max, val);
                            point = {
                                x: data_sumbu_x[0],
                                y: data_sumbu_y[0],
                                value: val
                            };
                            points.push(point);
                            // heatmap data format
                            data = {
                                max: max,
                                data: points
                            };
                            // if you have a set of datapoints always use setData instead of addData
                            // for data initialization
                            heatmapInstance.setData(data);
                        },
                        dataku: function(data) {
                            console.log("data >> " + data);
                        },
                        error: function(data) {
                            console.log("errorrku");
                        }
                    });
                }
            </script>
        @endpush
    @endsection
</x-app-layout>
