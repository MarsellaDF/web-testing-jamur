<x-app-layout>
    @section('content')
        <style>
            #myProgress {
                width: 100%;
                background-color: #ddd;
            }

            #myBar {
                width: 0%;
                height: 30px;
                background-color: #009CFF;
                text-align: center;
                align-items: left;
                line-height: 30px;
                color: white;
            }
        </style>
        <h4 class="text-center my-4">Silahkan Testing Website ini</h4>
        <div class="embed-responsive embed-responsive-16by9 my-5 p-2">

            <h6>Daftar Skenario</h6>
            <div id="timer">00:00:00</div>
            <center>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center" id="skenario1">
                        1. Lakukan pemesanan produk jamur tiram! <H6 id="timeSkenario1" style="display:none;"></H6>
                        <span class="badge badge-primary badge-pill"><a class="btn btn-sm btn-primary"
                                href="javascript:showInframe(1);" id="btnSkenario1">Mulai</a></span>
                    </li>
                    <span id="skenario2">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            2. Lakukan pencarian visi dan misi owner! <H6 id="timeSkenario2" style="display:none;"></H6>
                            <span class="badge badge-primary badge-pill"><a class="btn btn-sm btn-primary"
                                    href="javascript:showInframe(2);" id="btnSkenario2">Mulai</a></span>
                        </li>
                    </span>
                    <span id="skenario3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            3. Lakukan kritik dan saran terkait Mitra Jamur Bondowoso! <H6 id="timeSkenario3"
                                style="display:none;"></H6>
                            <span class="badge badge-primary badge-pill"><a class="btn btn-sm btn-primary"
                                    href="javascript:showInframe(3);" id="btnSkenario3">Mulai</a></span>
                        </li>
                    </span>

                </ul>

                <table class="table table-bordered">
                    <thead>
                        <tr colspan="3">
                            Timer Per Halaman
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Beranda</td>
                            <td>Produk</td>
                            <td>Galeri</td>
                            <td>Tentang</td>
                            <td>Kontak</td>
                        </tr>
                        <tr>
                            <td>
                                <div id="timerBeranda">00:00:00</div>
                            </td>
                            <td>
                                <div id="timerProduk">00:00:00</div>
                            </td>
                            <td>
                                <div id="timerGaleri">00:00:00</div>
                            </td>
                            <td>
                                <div id="timerTentang">00:00:00</div>
                            </td>
                            <td>
                                <div id="timerKontak">00:00:00</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div id="myProgress">
                    <div id="myBar">0%</div>
                </div>
                <iframe class="embed-responsive-item" id="webview" src="http://testing.mitrajamurbondowoso.com/"
                    {{--  <iframe class="embed-responsive-item" id="webview" src="http://testing.mitrajamurbondowoso.com/"  --}} style="width: 1090px; height: 900px; display:none;"></iframe>
            </center>
        </div>
    @endsection
    @push('js')
        <script>
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

            var x = document.getElementById("webview");
            var x1 = document.getElementById("skenario1");
            var x2 = document.getElementById("skenario2");
            var x3 = document.getElementById("skenario3");
            var btnS1 = document.getElementById("btnSkenario1");
            var btnS2 = document.getElementById("btnSkenario2");
            var btnS3 = document.getElementById("btnSkenario3");

            const timerB = document.getElementById('timerBeranda');
            const timerP = document.getElementById('timerProduk');
            const timerG = document.getElementById('timerGaleri');
            const timerT = document.getElementById('timerTentang');
            const timerK = document.getElementById('timerKontak');

            let pageBeranda = 0;
            let pageProduk = 0;
            let pageGaleri = 0;
            let pageTentang = 0;
            let pageKontak = 0;
            let saveBeranda = 0;
            let saveProduk = 0;
            let saveGaleri = 0;
            let saveTentang = 0;
            let saveKontak = 0;
            let timerSave = 0;
            let skenarioSave = 1;
            let idUser = {{ Auth::user()->id }};

            let startLoadBar = 0;
            let endLoadBar = 0;

            let durasiPerSkenario = "";

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
                    var menu = 4;

                    document.getElementById("webview").style.width = coordinates.scrollHorizontal + "px";
                    document.getElementById("webview").style.height = coordinates.scrollVertical + "px";

                    // Melakukan aksi yang diinginkan berdasarkan koordinat yang diperoleh
                    console.log("Koordinat X: " + xCoordinate);
                    console.log("Koordinat Y: " + yCoordinate);
                    console.log("Content: " + coordinates.body);
                    console.log("screen width: " + coordinates.screenWidth);
                    console.log("screen height: " + coordinates.screenHeight);
                    console.log("scroll horizontal: " + coordinates.scrollHorizontal);
                    console.log("scroll vertical: " + coordinates.scrollVertical);
                    console.log("scroll seconds: " + coordinates.timeseconds);

                    cekSkenario(skenarioSave, coordinates);

                    if (coordinates.body == '/') {
                        menu = 1;
                        pageBeranda = coordinates.timeseconds;
                        timerB.innerHTML = pageBeranda;
                        timerSave = pageBeranda;
                        stopTimer(coordinates.body);
                    } else if (coordinates.body == '/produk') {
                        stopTimer(coordinates.body);
                        pageProduk = coordinates.timeseconds;
                        timerP.innerHTML = pageProduk;
                        timerSave = pageProduk;
                        menu = 2;
                    } else if (coordinates.body == '/gallery') {
                        stopTimer(coordinates.body);
                        pageGaleri = coordinates.timeseconds;
                        timerG.innerHTML = pageGaleri;
                        timerSave = pageGaleri;
                        menu = 3;
                    } else if (coordinates.body == '/tentang') {
                        stopTimer(coordinates.body);
                        pageTentang = coordinates.timeseconds;
                        timerT.innerHTML = pageTentang;
                        timerSave = pageTentang;
                        menu = 4;
                    } else if (coordinates.body == '/kontak') {
                        stopTimer(coordinates.body);
                        pageKontak = coordinates.timeseconds;
                        timerK.innerHTML = pageKontak;
                        timerSave = pageKontak;
                        menu = 5;
                    } else if (coordinates.body == '/produk/detail-produk/jamur-tiram') {
                        stopTimer(coordinates.body);
                        menu = 7;
                    } else {
                        stopTimer(coordinates.body);
                        timerSave = 0;
                        menu = 6;
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('testFirstClick.post') }}",
                        data: {
                            id_menu: menu,
                            sumbu_x: xCoordinate,
                            sumbu_y: yCoordinate,
                            duration: timerSave,
                            id_skenario: skenarioSave,
                            id_user: idUser,
                            durasi_skenario: durasiPerSkenario,
                        },
                        success: function(data) {
                            console.log(data);
                        }
                    });

                    // Contoh aksi lain yang dapat dilakukan:
                    // - Mengubah tampilan elemen di dalam elemen induk berdasarkan koordinat
                    // - Mengirim data koordinat ke server melalui AJAX
                    // - Memperbarui nilai variabel dengan koordinat yang diperoleh
                    // - Dan sebagainya
                }
            }

            function cekSkenario(skenario, data) {
                switch (skenario) {
                    case 1:
                        skenario1(data);
                        console.log("ini data ==>" + data.body);
                        console.log("cek skenario 1");
                        break
                    case 2:
                        skenario2(data);
                        console.log("ini data ==>" + data.body);
                        console.log("cek skenario 2");
                        break
                    case 3:
                        skenario3(data);
                        console.log("ini data ==>" + data.body);
                        console.log("cek skenario 3");
                        break
                    default:
                }
            }

            var i = 0;

            function move() {
                if (i == 0) {
                    i = 1;
                    var elem = document.getElementById("myBar");
                    var width = startLoadBar;
                    var id = setInterval(frame, 10);

                    function frame() {
                        if (width >= endLoadBar) {
                            clearInterval(id);
                            i = 0;
                        } else {
                            width++;
                            elem.style.width = width + "%";
                            elem.innerHTML = width + "%";
                        }
                    }
                }
            }

            function skenario1(data) {
                if (data.x >= 670 && data.x <= 730 && data.y >= 40 && data.y <= 80) {
                    endLoadBar = 100 / 3;
                    move();
                    console.log("tombolll -->>>>> button produk");
                }
                if (data.x >= 130 && data.x <= 300 && data.y >= 980 && data.y <= 1030) {
                    endLoadBar = 100 / 2;
                    move();
                    console.log("tombolll -->>>>> button produk jamur tiram");
                }
                if (data.x >= 545 && data.x <= 1000 && data.y >= 200 && data.y <= 600) {
                    endLoadBar = 100 / 1;
                    move();
                    console.log("tombolll -->>>>> button pesan sekarang");
                    console.log("pertama" + btnS1.innerHTML);
                    if (btnS1.innerHTML == "Stop") {
                        timerTime(true, 1);
                        btnS1.style = "display:none";
                        btnS1.innerHTML = "Mulai";
                        iframe.style.display = "none";
                    } else {
                        timerTime(false, 1);
                        btnS1.style = "outline : none; background-color: #E62F2F";
                        btnS1.innerHTML = "Stop";
                    }
                }
            }

            function skenario2(data) {
                if (data.x >= 840 && data.x <= 925 && data.y >= 45 && data.y <= 90) {
                    endLoadBar = 100 / 2;
                    move();
                    console.log("tombolll -->>>>> button tentang");
                }
                if (data.x >= 410 && data.x <= 660 && data.y >= 845 && data.y <= 1085) {
                    endLoadBar = 100 / 1;
                    move();
                    console.log("tombolll -->>>>> button visi misi");
                    console.log("kedua" + btnS2.innerHTML);
                    if (btnS2.innerHTML == "Stop") {
                        timerTime(true, 2);
                        btnS2.style = "display:none";
                        btnS2.innerHTML = "Mulai";
                        iframe.style.display = "none";
                    } else {
                        timerTime(false, 2);
                        btnS2.style = "outline : none; background-color: #E62F2F";
                        btnS2.innerHTML = "Stop";
                    }
                }
            }

            function skenario3(data) {
                if (data.x >= 585 && data.x <= 650 && data.y >= 50 && data.y <= 80) {
                    endLoadBar = 100 / 2;
                    move();
                    console.log("tombolll -->>>>> button beranda");
                }
                if (data.x >= 550 && data.x <= 930 && data.y >= 3956 && data.y <= 4010) {
                    endLoadBar = 100 / 1;
                    move();
                    console.log("tombolll -->>>>> button saran");
                    console.log("ketiga" + btnS3.innerHTML);
                    if (btnS3.innerHTML == "Stop") {
                        timerTime(true, 3);
                        btnS3.style = "display:none";
                        btnS3.innerHTML = "Mulai";
                        iframe.style.display = "none";
                    } else {
                        timerTime(false, 3);
                        btnS3.style = "outline : none; background-color: #E62F2F";
                        btnS3.innerHTML = "Stop";
                    }
                }
            }

            function stopTimer(uri) {
                switch (uri) {
                    case "/":
                        saveProduk = saveProduk + pageProduk;
                        saveGaleri = saveGaleri + pageGaleri;
                        saveTentang = saveTentang + pageTentang;
                        saveKontak = saveKontak + pageKontak;
                        break;
                    case "/produk":
                        saveBeranda = saveBeranda + pageBeranda;
                        saveGaleri = saveGaleri + pageGaleri;
                        saveTentang = saveTentang + pageTentang;
                        saveKontak = saveKontak + pageKontak;
                        break;
                    case "/gallery":
                        saveBeranda = saveBeranda + pageBeranda;
                        saveProduk = saveProduk + pageProduk;
                        saveTentang = saveTentang + pageTentang;
                        saveKontak = saveKontak + pageKontak;
                        break;
                    case "/tentang":
                        saveBeranda = saveBeranda + pageBeranda;
                        saveProduk = saveProduk + pageProduk;
                        saveGaleri = saveGaleri + pageGaleri;
                        saveKontak = saveKontak + pageKontak;
                        break;
                    case "/kontak":
                        saveBeranda = saveBeranda + pageBeranda;
                        saveProduk = saveProduk + pageProduk;
                        saveGaleri = saveGaleri + pageGaleri;
                        saveTentang = saveTentang + pageTentang;
                        break;
                    default:
                        saveBeranda = saveBeranda + pageBeranda;
                        saveGaleri = saveGaleri + pageGaleri;
                        saveTentang = saveTentang + pageTentang;
                        saveKontak = saveKontak + pageKontak;
                }

            }

            function showInframe(skenario) {
                if (skenario == 1) {
                    skenarioSave = 1;
                    iframe.src = 'http://testing.mitrajamurbondowoso.com/'
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
                    skenarioSave = 2;
                    iframe.src = 'http://testing.mitrajamurbondowoso.com/';
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
                    skenarioSave = 3;
                    iframe.src = 'http://testing.mitrajamurbondowoso.com/';
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
                if (iframe.style.display === "none") {
                    iframe.style.display = "block";
                } else {
                    iframe.style.display = "none";
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
                            durasiPerSkenario = hr + ":" + min + ":" + sec;
                            document.getElementById("timeSkenario1").innerHTML = hr + ":" + min + ":" + sec;
                        } else if (skenario == 2) {
                            durasiPerSkenario = hr + ":" + min + ":" + sec;
                            document.getElementById("timeSkenario2").innerHTML = hr + ":" + min + ":" + sec;
                        } else if (skenario == 3) {
                            durasiPerSkenario = hr + ":" + min + ":" + sec;
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
