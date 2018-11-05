@extends('customer.layouts.app')


@section('content')

<main role="main">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide slider-opacity" src="{{ URL::asset('img/sliders/olshop3.jpg') }}" alt="First slide" width="100%" height="100%">
                <div class="container">
                    <div class="carousel-caption text-left bg-text">
                        <h1>Pesan mainan sekarang mudah!</h1>
                        <p>Haula Toys saat ini telah menerapkan teknologi website untuk para customer dari instansi manapun sehingga dapat mudah memesan dalam jumlah apapun dan kebutuhan apapun.</p>
                        <p><a class="btn btn-lg btn-primary" href="{{ route('register') }}" role="button">Sign Up</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide slider-opacity" src="{{ URL::asset('img/sliders/1.jpg') }}" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption bg-text">
                        <h1>Pilih mainan edukatif Anda di sini!</h1>
                        <p>Haula Toys menerima pesanan mainan edukatif untuk instansi Anda dalam jumlah besar. <br/>
                            Kami dapat membuatkan sesuai kebutuhan Anda atau tinggal memilih di sini.
                        </p>
                        <p><a class="btn btn-lg btn-primary" href="#aneka_paket" role="button">Lihat Paket Produk</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide slider-opacity" src="{{ URL::asset('img/sliders/2.jpg') }}" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption text-right bg-text">
                        <h1>Ajukan kebutuhan Anda di sini!</h1>
                        <p>Haula Toys menerima apapun kebutuhan Anda untuk alat pendukung pendidikan anak. Beritahu kami melalui website ini dan kami akan melayaninya.</p>
                        <p><a class="btn btn-lg btn-primary" href="https://haula-toys.com" role="button">Hubungi Haula Toys</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <div class="row">
            <div class="card-group">
                <div class="card text-white bg-primary">
                    {{--<img class="card-img-top" src=".../100px180/" alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">100% Buatan lokal</h5>
                        <p class="card-text">Kami yakin produk mainan edukasi lokal
                            dapat bersaing secara global dari
                            segi kualitas maupun harga.</p>
                        {{--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                    </div>
                </div>
                <div class="card text-white bg-success">
                    {{--<img class="card-img-top" src=".../100px180/" alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">100% Original</h5>
                        <p class="card-text">Kami menjamin produk yang terdaftar
                            adalah 100% original buatan produsen
                            mainan lokal di seluruh Indonesia.</p>
                        {{--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                    </div>
                </div>
                <div class="card text-white bg-info">
                    {{--<img class="card-img-top" src=".../100px180/" alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">Respon cepat</h5>
                        <p class="card-text">Kami akan mengedepankan
                            kebutuhan dan kepentingan customer.</p>
                        {{--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                    </div>
                </div>
                <div class="card text-white bg-secondary">
                    {{--<img class="card-img-top" src=".../100px180/" alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">Terdepan dalam kualitas</h5>
                        <p class="card-text">Telah melayani berbagai instansi
                            pemerintah dan swasta sselama
                            puluhan tahun di Indonesia.</p>
                        {{--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                    </div>
                </div>
            </div>
        </div>


        <!-- START ANEKA PRODUK -->

        <hr class="featurette-divider">
            <div class="row" id="aneka_paket">
                <div class="col-lg-12">
                    <h1>
                        Aneka Paket Haula
                        {{--<a href="#" class="btn btn-info btn-sm" role="button">Lihat Semua</a>--}}
                    </h1>

                    <hr/>
                </div>
            </div>
        {{--<hr class="featurette-divider">--}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card-deck slick-products">
                    @foreach($data_packets as $packet)
                        <div class="card">
                            <a href="{{ url('packet/'.$packet['data_packet']->id .'/' .$packet['data_packet']->title_packet) }}">
                                <img class="card-img-top" src="{{ url($packet['data_image']->img_url_packet) }}"
                                 alt="Card image cap" height="100%" width="100%">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ url('/packet/'.$packet['data_packet']->id .'/' .$packet['data_packet']->title_packet) }}">
                                        {{ $packet['data_packet']->title_packet }}
                                    </a>
                                </h5>
                                <p class="card-text" style="color: red;">
                                    <strong>Rp.
                                        <span id="harga_paket_{{$packet['data_packet']->id}}">
                                            {{ number_format($packet['data_packet']->total_price_packet, 0, '', '.') }}
                                        </span>
                                    </strong><br/>
                                    <small class="text-muted" style="color: red!important;">Per <span id="qtychange{{$packet['data_packet']->id}}"></span> paket</small>
                                    <input hidden id="harga_paket_fix_{{$packet['data_packet']->id}}" value="{{ $packet['data_packet']->total_price_packet }}">

                                </p>
                                <p class="card-text">
                                    {{ $packet['data_packet']->description_packet }}
                                </p>
                                <a href="{{ url('packet/'.$packet['data_packet']->id .'/' .$packet['data_packet']->title_packet) }}" class="btn btn-success btn-block">
                                    <i class="fa fa-list-ul"></i> Lihat Rincian Produk
                                </a>
                                <br/>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <button onclick="dec_qty{{$packet['data_packet']->id}}()" class="input-group-btn btn btn-outline-danger">-</button>
                                        {{--<div class="input-group-text">-</div>--}}
                                    </div>
                                    <input type="text"
                                           class="form-control text-center" id="qty_paket_{{$packet['data_packet']->id}}"
                                           onchange="autosums_total_paket{{$packet['data_packet']->id}}()"
                                           min="1"
                                           value="1">
                                    <div class="input-group-append">
                                        <button onclick="inc_qty{{$packet['data_packet']->id}}();" class="input-group-btn btn btn-outline-primary">+</button>
                                    </div>
                                </div>

                                <form method="get" action="{{ url(action('HomeController@request_order_by_packet',[$packet['data_packet']->id,$packet['data_packet']->title_packet])) }}">
                                    {{ csrf_field() }}
                                    <input name="qty_packet" id="qty_packet_input{{$packet['data_packet']->id}}" value="1" type="hidden">
                                    <input name="id_packet" value="{{$packet['data_packet']->id}}" hidden>
                                    <input name="total_price_packet" value="{{$packet['data_packet']->total_price_packet}}" hidden>
                                    <button type="submit"
                                            class="btn btn-primary btn-block card-link">
                                        Ajukan Pesanan Paket
                                    </button>

                                </form>
                                {{--<a href="{{ url('packet/order/'.$packet->id.'/'  .$packet->title_packet) }}"--}}
                                   {{--class="btn btn-primary btn-block">Ajukan Pesanan Paket</a>--}}
                                {{--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}

                            </div>
                        </div>
                    @endforeach

                </div>

                @foreach($data_packets as $packet)
                    <script>
                        function inc_qty{{$packet['data_packet']->id}}() {
                            var qty1 = document.getElementById('qty_paket_{{$packet['data_packet']->id}}').value;
                            var qty2 = parseInt(qty1);
                            var increment_qty = qty2 + 1;

                            document.getElementById('qty_paket_{{$packet['data_packet']->id}}').value = increment_qty;

                            var str1 = document.getElementById("harga_paket_fix_{{$packet['data_packet']->id}}").value;
//                            var str1change = str1.replace(/\./g,'');

                            var harga_paket_1 = parseInt(str1);
                            var total_harga_paket_1 = harga_paket_1 * increment_qty;

                            document.getElementById("qty_packet_input{{$packet['data_packet']->id}}").value = qty1;
                            document.getElementById("harga_paket_{{$packet['data_packet']->id}}").innerHTML = format1(total_harga_paket_1, ' ');
                            document.getElementById("qtychange{{$packet['data_packet']->id}}").innerHTML = increment_qty;
                        }

                        function dec_qty{{$packet['data_packet']->id}}() {
                            var qty1 = document.getElementById('qty_paket_{{$packet['data_packet']->id}}').value;
                            var qty2 = parseInt(qty1);
                            if (qty2 > 1) {
                                var decrement_qty = qty2 - 1;


                                document.getElementById('qty_paket_{{$packet['data_packet']->id}}').value = decrement_qty;

                                var str1 = document.getElementById("harga_paket_fix_{{$packet['data_packet']->id}}").value;
//                                var str1change = str1.replace(/\./g,'');

                                var harga_paket_1 = parseInt(str1);

                                var total_harga_paket_1 = harga_paket_1 * decrement_qty;

                                document.getElementById("qty_packet_input{{$packet['data_packet']->id}}").value = qty1;
                                document.getElementById("harga_paket_{{$packet['data_packet']->id}}").innerHTML = format1(total_harga_paket_1, ' ');
                                document.getElementById("qtychange{{$packet['data_packet']->id}}").innerHTML = decrement_qty;
                            }
                        }

                        function autosums_total_paket{{$packet['data_packet']->id}}() {

                            var harga_paket_1 = document.getElementById("harga_paket_fix_{{$packet['data_packet']->id}}").value;
                            var qty_paket_1 = document.getElementById("qty_paket_{{$packet['data_packet']->id}}").value;
                            var total_harga_paket_1 = harga_paket_1 * qty_paket_1;

                            document.getElementById("qty_packet_input{{$packet['data_packet']->id}}").value = qty_paket_1;

                            document.getElementById("qtychange{{$packet['data_packet']->id}}").innerHTML = qty_paket_1;
                            document.getElementById("harga_paket_{{$packet['data_packet']->id}}").innerHTML = format1(total_harga_paket_1, ' ');

                        }
                    </script>
                @endforeach


            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Panduan pemesanan melalui website ini.</h2>
                <p class="lead">Pilih paket, atur pesanan, pilih tombol ajukan pesanan paket, lalu chat Admin. Semudah itu, lalu kami proses.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="{{ URL::asset('img/icon-panduan.jpg') }}" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Ajukan kebutuhan Anda dengan mengisi formulir RFQ. </h2>
                <p class="lead">Kirim pesanan custom Anda bisa melalui website ini dengan mengirim pesan pada halaman utama <a href="https://haula-toys.com" target="_blank">website haula</a> atau chat whatsapp Admin dengan cara <a href="http://bit.ly/wahaulaviaweb" target="_blank">klik di sini.</a></p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" src="{{ URL::asset('img/icon-rfq.jpg') }}" alt="Generic placeholder image">
                {{--<i class="fa fa-sticky-note"></i>--}}
            </div>
        </div>

        <hr class="featurette-divider">

        {{--<div class="row featurette">--}}
            {{--<div class="col-md-7">--}}
                {{--<h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>--}}
                {{--<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-5">--}}
                {{--<img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<hr class="featurette-divider">--}}

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->



</main>


@endsection


@section('new-scripts')
    <script>
        $('.slick-products').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        function format1(n, currency) {
            return currency + n.toFixed(0).replace(/./g, function(c, i, a) {
                    return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
                });
        }
    </script>
@endsection