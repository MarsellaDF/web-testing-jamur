<x-app-layout>

    @section('content')
        <h4 class="text-center my-4">Hasil Testing</h4>
        <div class="embed-responsive embed-responsive-16by9 my-5 p-2" id="heatmap"
            style="position: relative; height: 3620px; width: 1321px;">
            <div class="">
                <img class="embed-responsive-item" src="/assets/img/Beranda2.png" allowfullscreen
                    style="width: 1321px; height: 3620px;"></img>
            </div>
        </div>
        @push('js')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/heatmap.js/2.0.0/heatmap.min.js"
                integrity="sha512-FpvmtV53P/z7yzv1TAIVH7PNz94EKXs5aV6ts/Zi+B/VeGU5Xwo6KIbwpTgKc0d4urD/BtkK50IC9785y68/AA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                var data_sumbu_x = [];
                var data_sumbu_y = [];

                $(document).ready(function() {
                    console.log("hallo");
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    console.log("hallosss");
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getmonitor') }}",
                        dataType: 'json',
                        success: function(res) {
                            console.log("akuuuu");
                            console.log("dataku >> " + res['success']);
                            console.log("dataku >> " + res['data'][1].ip);
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

                            var points = [];
                            var max = 0;
                            // minimal heatmap instance configuration
                            var heatmapInstance = h337.create({
                                // only container is required, the rest will be defaults
                                container: document.getElementById('heatmap')
                            });

                            console.log(data_sumbu_x.length);

                            for (var i = 0; i < data_sumbu_x.length; i++) {
                                var val = 60;
                                console.log(val);
                                max = Math.max(max, val);
                                var point = {
                                    x: data_sumbu_x[i],
                                    y: data_sumbu_y[i],
                                    value: val
                                };
                                points.push(point);
                            }
                            // heatmap data format
                            var data = {
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
                });

                // now generate some random data
            </script>
            </script>
        @endpush
    @endsection
</x-app-layout>
