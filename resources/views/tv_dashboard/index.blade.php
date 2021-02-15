<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/hVCarousel.css">
    <link rel="stylesheet" href="assets/css/skdslider.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/moment-with-locales.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/acmeticker.js"></script>
    <script src="assets/js/hVCarousel.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/simpleSlideShow.js"></script>
    <script src="assets/js/skdslider.js"></script>
    <script src="assets/js/skdslider.min.js"></script>
    <title>TV DASHBOARD
    </title>
  </head>
  <body>
    <div class="header-row">
        <div class="header">
            <a class="logo" href="javascript:;">
                <img  width="64" hieght="60" src="assets/images/logo.png">
            </a>
        </div>
        <div class="header-content">
            <h5><b>Direktorat Jendral Aplikasi Informatika</b></h5>
            <h5>Agenda Kegiatan Sekertariat Direktorat Jendral Aplikasi Informatika</h5>
        </div>
        </div>
    <div class="content">
        <div class="row">
        <div class="col-md-8">
            <div class="card text-white bg-primary mb-3" style="width: 880px;">
                <div class="card-header">Tabel Agenda kegiatan</div>
                <div class="card-body card-table" style="height: 430px;">
                    <div id="another-testimonial" class="hVCarousel py-5" style="bottom: 50px;">
                        <div class="hVCarousel-inner">
                            <div class="hVCarousel-slides">
                                <div class="hVCarousel-item">
                                        <h4 style="color: black;">{{ $slide1title }}</h4>
                                        <div class="overflow-auto-table1 overflow-hidden"  style="width: 100%; height: 360px;">
                                            <table class="table table-striped noborder slide-3" style="width:100%">
                                                <thead class="table-info">
                                                    <tr style="color: black;">
                                                        <th >NO</th>
                                                        <th>MULAI</th>
                                                        <th>SELESAI</th>
                                                        <th>ACARA</th>
                                                        <th>TEMPAT</th>
                                                        <th>DISPOSISI</th>
                                                        <th>SATKER</th>
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                        @forelse($slide1 as $key => $slideske1)
                                                        <tr>
                                                            <td style="width:1%">{{ $key+1 }}</td>
                                                            <td>{{ $slideske1->waktumulai }}</td>
                                                            <td>{{ $slideske1->waktuselesai }}</td>
                                                            <td>{{ $slideske1->acara }}</td>
                                                            <td>{{ $slideske1->tempat }}</td>
                                                            <td>{{ $slideske1->disposisi }}</td>
                                                            <td>{{ $slideske1->satker }}</td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Belum Ada Agenda</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                <div class="hVCarousel-item">
                                        <h4 style="color: black;">{{ $slide2title }}</h4>
                                        <div class="overflow-auto-table2 overflow-hidden"  style="width: 100%; height: 360px;">
                                            <table class="table table-striped noborder slide-3" style="width:100%">
                                                <thead class="table-info">
                                                    <tr style="color: black;">
                                                        <th >NO</th>
                                                        <th>MULAI</th>
                                                        <th>SELESAI</th>
                                                        <th>ACARA</th>
                                                        <th>TEMPAT</th>
                                                        <th>DISPOSISI</th>
                                                        <th>SATKER</th>
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                        @forelse($slide2 as $key => $slideske2)
                                                        <tr>
                                                            <td style="width:1%">{{ $key+1 }}</td>
                                                            <td>{{ $slideske2->waktumulai }}</td>
                                                            <td>{{ $slideske2->waktuselesai }}</td>
                                                            <td>{{ $slideske2->acara }}</td>
                                                            <td>{{ $slideske2->tempat }}</td>
                                                            <td>{{ $slideske2->disposisi }}</td>
                                                            <td>{{ $slideske2->satker }}</td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Belum Ada Agenda</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                <div class="hVCarousel-item">
                                        <h4 style="color: black;">{{ $slide3title }}</h4>
                                        <div class="overflow-auto-table3 overflow-hidden"  style="width: 100%; height: 360px;">
                                            <table class="table table-striped noborder slide-3" style="width:100%">
                                                <thead class="table-info">
                                                    <tr style="color: black;">
                                                        <th >NO</th>
                                                        <th>MULAI</th>
                                                        <th>SELESAI</th>
                                                        <th>ACARA</th>
                                                        <th>TEMPAT</th>
                                                        <th>DISPOSISI</th>
                                                        <th>SATKER</th>
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                        @forelse($slide3 as $key => $slideske3)
                                                        <tr>
                                                            <td style="width:1%">{{ $key+1 }}</td>
                                                            <td>{{ $slideske3->waktumulai }}</td>
                                                            <td>{{ $slideske3->waktuselesai }}</td>
                                                            <td>{{ $slideske3->acara }}</td>
                                                            <td>{{ $slideske3->tempat }}</td>
                                                            <td>{{ $slideske3->disposisi }}</td>
                                                            <td>{{ $slideske3->satker }}</td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Belum Ada Agenda</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-4 ml-auto">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Twitter <i class="fa fa-twitter" aria-hidden="true"></i>
                    </div>
                    <div class="overflow-auto-twitter overflow-hidden p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="width: 420px; height: 150px;">
                        <a class="twitter-timeline"  data-chrome="noheader noscrollbar " href="https://twitter.com/DitjenAptika?ref_src=twsrc%5Etfw">Tweets by DitjenAptika</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                  </div>
            <div class="card text-white bg-primary mb-3" style="width: 420px; height: 265px; bottom: 1px;">
                <div class="card-header">Berita</div>
                <div class="card-body" style="padding-top: 1px; padding-bottom: 1px; padding-right:60px; padding-left: 1px;">
                    <div id="demo2" style="height: 223px;">
                        <div class="slide">
                            <img src="assets/images/berita1.png" />
                            <!--Slider Description example-->
                             <div class="slide-desc">
                              </div>
                        </div>
                        <div class="slide"><img src="assets/images/berita2.jpeg" />
                           <div class="slide-desc">
                          </div>
                        </div>
                        <div class="slide"><img src="assets/images/berita3.jpeg" />
                            <div class="slide-desc">
                           </div>
                         </div>
                      </div>
                </div>
              </div>
        </div>
        </div>
        </br>
      </div>
      <div class="footer">
        <div class="acme-news-ticker">
            <div class="acme-news-ticker-label"><h1 id="time-part"></h1></div>
            <div class="acme-news-ticker-box">
                <ul class="my-news-ticker">
                    <li><h4>Dorong APPRI Kembangkan Komunikasi Berbasis TI</h4></li>
                    <li><h4>Menkominfo Tegaskan Kedisiplinan Faktor Utama Lawan Covid-19</h4></li>
                    <li><h4>Covid-19 Tembus 1 Juta, Menkominfo Minta Tingkatkan Kolaborasi dan Optimisme</h4></li>
                    <li><h4>Kerja Sama Optimalkan Penyebarluasan Informasi Program Strategis Pemerintah</h4></li>
                </ul>
            </div>
        </div>
        </div>
      <script type="text/javascript">
        $(document).ready(function() {
            $('.my-news-ticker').AcmeTicker({
                type:'typewriter',/*horizontal/horizontal/Marquee/type*/
                direction: 'right',/*up/down/left/right*/
                speed:70,/*true/false/number*/ /*For vertical/horizontal 600*//*For marquee 0.05*//*For typewriter 50*/
                controls: {
                toggle: $('.acme-news-ticker-pause'),/*Can be used for horizontal/horizontal/typewriter*//*not work for marquee*/
                }
            });

            var $eltbl1 = $(".overflow-auto-table1");
            function animtbl1() {
            var sttbl1 = $eltbl1.scrollTop();
            var sbtbl1 = $eltbl1.prop("scrollHeight")-$eltbl1.innerHeight();
            $eltbl1.animate({scrollTop: sttbl1<sbtbl1/2 ? sbtbl1 : 0}, 15000, animtbl1);
            }
            function stoptbl1(){
            $eltbl1.stop();
            }
            animtbl1();
            $eltbl1.hover(stoptbl1, animtbl1);

            var $eltbl2 = $(".overflow-auto-table2");
            function animtbl2() {
            var sttbl2 = $eltbl2.scrollTop();
            var sbtbl2 = $eltbl2.prop("scrollHeight")-$eltbl2.innerHeight();
            $eltbl2.animate({scrollTop: sttbl2<sbtbl2/2 ? sbtbl2 : 0}, 15000, animtbl2);
            }
            function stoptbl2(){
            $eltbl2.stop();
            }
            animtbl2();
            $eltbl2.hover(stoptbl2, animtbl2);

            var $eltbl3 = $(".overflow-auto-table3");
            function animtbl3() {
            var sttbl3 = $eltbl3.scrollTop();
            var sbtbl3 = $eltbl3.prop("scrollHeight")-$eltbl3.innerHeight();
            $eltbl3.animate({scrollTop: sttbl3<sbtbl3/2 ? sbtbl3 : 0}, 15000, animtbl3);
            }
            function stoptbl3(){
            $eltbl3.stop();
            }
            animtbl3();
            $eltbl3.hover(stoptbl3, animtbl3);

            var $el = $(".overflow-auto-twitter");
            function anim() {
            var st = $el.scrollTop();
            var sb = $el.prop("scrollHeight")-$el.innerHeight();
            $el.animate({scrollTop: st<sb/2 ? sb : 0}, 196000, anim);
            }
            function stop(){
            $el.stop();
            }
            anim();
            $el.hover(stop, anim);

            $(function () {
            $('#another-testimonial').hVCarousel({
                autoplay: true,
                interval: 30000
            });
            });

            document.onkeyup = KeyCheck;
            function KeyCheck(e)
            {
            var KeyID = (window.event) ? event.keyCode : e.keyCode;
            if(KeyID == 113)
            {
                alert("hi");
            }
            }

            $(document).ready(function() {
            var interval = setInterval(function() {
            var momentNow = moment();
            $('#time-part').html(momentNow.format('hh:mm'));
                }, 100);
            });

            $('#demo2').skdslider({
            slideSelector: '.slide',
            delay:6000,
            animationSpeed: 1000,
            showNextPrev:true,
            showPlayButton:false,
            autoSlide:true,
            animationType:'fading'
            });

        })

    </script>
  </body>
</html>
