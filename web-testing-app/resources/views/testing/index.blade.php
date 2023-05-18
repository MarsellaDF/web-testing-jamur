<x-app-layout>
    @section('content')
        <h4 class="text-center my-4">Silahkan Testing Website ini</h4>
        <div class="embed-responsive embed-responsive-16by9 my-5 p-2">

            <h6>Daftar Skenario</h6>
            <div id="timer">00:00:00</div>

            <center>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center" id="skenario1">
                        1. Lakukan pemesanaan suatu produk jamur! <H6 id="timeSkenario1" style="display:none;"></H6>
                        <span class="badge badge-primary badge-pill"><a class="btn btn-sm btn-primary"
                                href="javascript:showInframe(1);" id="btnSkenario1">Mulai</a></span>
                    </li>
                    <span id="skenario2">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            2. Lakukan pencarian mengenai halaman informasi lengkap mitra jamur (kontak owner) <H6
                                id="timeSkenario2" style="display:none;"></H6>
                            <span class="badge badge-primary badge-pill"><a class="btn btn-sm btn-primary"
                                    href="javascript:showInframe(2);" id="btnSkenario2">Mulai</a></span>
                        </li>
                    </span>
                    <span id="skenario3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            3. Lakukan kritik dan saran untuk produk mitra jamur <H6 id="timeSkenario3"
                                style="display:none;"></H6>
                            <span class="badge badge-primary badge-pill"><a class="btn btn-sm btn-primary"
                                    href="javascript:showInframe(3);" id="btnSkenario3">Mulai</a></span>
                        </li>
                    </span>

                </ul>

                {{--  <div class="col-12 col-sm-6">
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                        href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                        aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-three-profile" role="tab"
                                        aria-controls="custom-tabs-three-profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                                        href="#custom-tabs-three-messages" role="tab"
                                        aria-controls="custom-tabs-three-messages" aria-selected="false">Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill"
                                        href="#custom-tabs-three-settings" role="tab"
                                        aria-controls="custom-tabs-three-settings" aria-selected="false">Settings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-home-tab">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus
                                    ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna
                                    feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula.
                                    Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque
                                    habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin
                                    id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim
                                    sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor
                                    porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non
                                    consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus.
                                    Cras lacinia erat eget sapien porta consectetur.
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-profile-tab">
                                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus
                                    ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                    posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula
                                    placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet
                                    ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-messages-tab">
                                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus
                                    volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce
                                    nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue
                                    ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur
                                    eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur,
                                    ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex
                                    vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus.
                                    Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-settings-tab">
                                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus
                                    turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis
                                    vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum
                                    pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget
                                    aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac
                                    habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>  --}}
                {{--  <div id="webvw">

                </div>  --}}
                <iframe class="embed-responsive-item" id="webview" src="http://192.168.100.52:8000/" {{--  <iframe class="embed-responsive-item" id="webview" src="http://mitrajamurbondowoso.com/"  --}}
                    style="width: 1090px; height: 900px; display:none;"></iframe>
            </center>
        </div>
    @endsection
    @push('js')
        <script>
            $('#bologna-list a').on('click', function(e) {
                e.preventDefault()
                $(this).tab('show')
            });

            var x = document.getElementById("webview");

            function handleClick(event) {
                // Mendapatkan koordinat klik pada sumbu x dan sumbu y
                var xCoordinate = event.clientX;
                var yCoordinate = event.clientY;

                // Melakukan aksi yang diinginkan berdasarkan koordinat yang diperoleh
                console.log("Koordinat X: " + xCoordinate);
                console.log("Koordinat Y: " + yCoordinate);

                // Contoh aksi lain yang dapat dilakukan:
                // - Mengubah tampilan elemen berdasarkan koordinat
                // - Mengirim data koordinat ke server melalui AJAX
                // - Memperbarui nilai variabel dengan koordinat yang diperoleh
                // - Dan sebagainya
            }

            // Mendapatkan referensi ke elemen iframe
            var iframe = document.getElementById("webview");

            // Menambahkan event listener untuk menerima pesan dari iframe
            window.addEventListener("message", receiveMessage, false);

            // Fungsi yang akan dipanggil saat pesan diterima dari iframe
            function receiveMessage(event) {
                // Memeriksa sumber pesan untuk memastikan berasal dari iframe yang diinginkan
                if (event.source === iframe.contentWindow) {
                    // Mendapatkan koordinat klik pada sumbu x dan sumbu y dari pesan
                    var coordinates = event.data;
                    var xCoordinate = coordinates.x;
                    var yCoordinate = coordinates.y;

                    if (xCoordinate >= 700 && xCoordinate <= 720 && yCoordinate >= 60 && yCoordinate <= 70) {
                        console.log("ini menu produk");
                    }

                    // Melakukan aksi yang diinginkan berdasarkan koordinat yang diperoleh
                    console.log("Koordinat X: " + xCoordinate);
                    console.log("Koordinat Y: " + yCoordinate);
                    console.log("Content: " + coordinates.body);

                    // Contoh aksi lain yang dapat dilakukan:
                    // - Mengubah tampilan elemen di dalam elemen induk berdasarkan koordinat
                    // - Mengirim data koordinat ke server melalui AJAX
                    // - Memperbarui nilai variabel dengan koordinat yang diperoleh
                    // - Dan sebagainya
                }
            }

            function showInframe(skenario) {
                var x = document.getElementById("webview");
                var x1 = document.getElementById("skenario1");
                var x2 = document.getElementById("skenario2");
                var x3 = document.getElementById("skenario3");
                var btnS1 = document.getElementById("btnSkenario1");
                var btnS2 = document.getElementById("btnSkenario2");
                var btnS3 = document.getElementById("btnSkenario3");


                if (skenario == 1) {
                    console.log("pertama" + btnS1.innerHTML);
                    if (btnS1.innerHTML == "Stop") {
                        timerTime(true, skenario);
                        btnS1.style = "";
                        btnS1.innerHTML = "Mulai";
                    } else {
                        timerTime(false, skenario);
                        btnS1.style = "outline : none; background-color: #E62F2F";
                        btnS1.innerHTML = "Stop";
                    }
                } else if (skenario == 2) {
                    if (btnS2.innerHTML == "Stop") {
                        timerTime(true, skenario);
                        btnS2.style = "";
                        btnS2.innerHTML = "Mulai";
                    } else {
                        timerTime(false, skenario);
                        btnS2.style = "outline : none; background-color: #E62F2F";
                        btnS2.innerHTML = "Stop";
                    }
                } else if (skenario == 3) {
                    if (btnS3.innerHTML == "Stop") {
                        timerTime(true, skenario);
                        btnS3.style = "";
                        btnS3.innerHTML = "Mulai";
                    } else {
                        timerTime(false, skenario);
                        btnS3.style = "outline : none; background-color: #E62F2F";
                        btnS3.innerHTML = "Stop";
                    }
                }
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }

            function timerTime(reset, skenario) {
                var seconds = 0;
                var minutes = 0;
                var hours = 0;

                if (reset) {
                    window.clearInterval(tm);
                    seconds = 0;
                    minutes = 0;
                    hours = 0;
                    sec = "00";
                    min = "00";
                    hr = "00";
                    document.getElementById("timer").innerHTML = hr + ":" + min + ":" + sec;
                    if (skenario == 1) {
                        console.log("ini skenario ke2 - " + skenario);
                        document.getElementById("timeSkenario1").style.display = "block";
                    } else if (skenario == 2) {
                        document.getElementById("timeSkenario2").style.display = "block";
                    } else if (skenario == 3) {
                        document.getElementById("timeSkenario3").style.display = "block";
                    }
                } else {
                    if (skenario == 1) {
                        console.log("ini skenario keeee - " + skenario);
                        document.getElementById("timeSkenario1").style.display = "none";
                    } else if (skenario == 2) {
                        document.getElementById("timeSkenario2").style.display = "none";
                    } else if (skenario == 3) {
                        document.getElementById("timeSkenario3").style.display = "none";
                    }

                    function timer() {
                        seconds++;
                        if (seconds == 60) {
                            seconds = 0;
                            minutes++;
                        }
                        if (minutes == 60) {
                            minutes = 0;
                            hours++;
                        }
                        var sec = seconds < 10 ? "0" + seconds : seconds;
                        var min = minutes < 10 ? "0" + minutes : minutes;
                        var hr = hours < 10 ? "0" + hours : hours;
                        document.getElementById("timer").innerHTML = hr + ":" + min + ":" + sec;
                        if (skenario == 1) {
                            document.getElementById("timeSkenario1").innerHTML = hr + ":" + min + ":" + sec;
                        } else if (skenario == 2) {
                            document.getElementById("timeSkenario2").innerHTML = hr + ":" + min + ":" + sec;
                        } else if (skenario == 3) {
                            document.getElementById("timeSkenario3").innerHTML = hr + ":" + min + ":" + sec;

                        }

                    }
                    tm = window.setInterval(timer, 1000);
                    // setInterval(timer, 1000);
                }

            }
        </script>
    @endpush
</x-app-layout>
