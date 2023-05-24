<x-app-layout>

    @section('content')
        <h4 class="text-center my-4">Hasil Testing</h4>
        <center>
            <table class="table table-bordered" style="width: 600px; text-align: center; ">
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
                            <button onclick="changeIframeSrc('')" class="btn btn-light">Beranda</button>
                        </td>
                        <td>
                            <button onclick="changeIframeSrc('produk')" class="btn btn-light">Produk</button>
                        </td>
                        <td>
                            <button onclick="changeIframeSrc('gallery')" class="btn btn-light">Galeri</button>
                        </td>
                        <td>
                            <button onclick="changeIframeSrc('tentang')" class="btn btn-light">Tentang</button>
                        </td>
                        <td>
                            <button onclick="changeIframeSrc('kontak')" class="btn btn-light">Kontak</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </center>
        <div class="embed-responsive embed-responsive-16by9 my-5 p-2" id="heatmap">
            {{--  style="position: relative; height: 3620px; width: 1321px;">  --}}
            <iframe class="embed-responsive-item" id="webview" src="http://192.168.100.111:8000"
                style="width:1073px; height:4403px;">
            </iframe>
            {{--  <img class="embed-responsive-item" src="/assets/img/Beranda2.png" allowfullscreen
                    style="width: 1321px; height: 3620px;"></img>  --}}
        </div>
        @push('js')
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

                    iframe.src = 'http://192.168.100.111:8000/' + type;
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
                        url: "{{ route('getmonitor') }}",
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
            </script>
        @endpush
    @endsection
</x-app-layout>
