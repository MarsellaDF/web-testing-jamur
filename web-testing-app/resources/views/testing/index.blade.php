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
                {{--  <div id="webvw">

                </div>  --}}
                <iframe class="embed-responsive-item" id="webview" src="http://192.168.1.119:8000/" {{--  <iframe class="embed-responsive-item" id="webview" src="http://mitrajamurbondowoso.com/"  --}}
                    style="width: 1090px; height: 900px; display:none;"></iframe>
            </center>
        </div>
    @endsection
    @push('js')
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: 'https://www.website-lain.com',
                    success: function(data) {
                        $('#webvw').html(data);
                    }
                });
            });

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
