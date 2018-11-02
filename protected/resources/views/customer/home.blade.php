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
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign Up</a></p>
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
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Hubungi Haula Toys</a></p>
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
                    @foreach($list_packets as $packet)
                        <div class="card">
                            <img class="card-img-top" src="{{ url($packet->img_url_packet) }}"
                                 alt="Card image cap" height="100%" width="100%">

                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ url('/packet/'.$packet->id .'/' .$packet->title_packet) }}">
                                        {{ $packet->title_packet }}
                                    </a>
                                </h5>
                                <p class="card-text" style="color: red;">
                                    <strong>Rp. {{ $packet->total_price_packet }}</strong><br/>
                                    <small class="text-muted" style="color: red!important;">Per paket</small>

                                </p>
                                <p class="card-text">
                                    {{ $packet->description_packet }}
                                </p>
                                <a href="{{ url('packet/'.$packet->id .'/' .$packet->title_packet) }}" class="btn btn-success btn-block">
                                    <i class="fa fa-list-ul"></i> Lihat Rincian Produk
                                </a>
                                <br/>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <a href="#" class="input-group-btn btn btn-outline-danger">-</a>
                                        {{--<div class="input-group-text">-</div>--}}
                                    </div>
                                    <input type="text" class="form-control text-center" id="inlineFormInputGroup" placeholder="1">
                                    <div class="input-group-append">
                                        <a href="#" class="input-group-btn btn btn-outline-primary">+</a>
                                    </div>
                                </div>
                                <a href="{{ url('packet/order/'.$packet->id.'/'  .$packet->title_packet) }}"  class="btn btn-primary btn-block">Ajukan Pesanan Paket</a>
                                {{--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Baca panduan pemesanan melalui website ini. <span class="text-muted">It'll blow your mind.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Ajukan kebutuhan Anda dengan mengisi formulir RFQ. <span class="text-muted">di sini.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
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
    </script>
@endsection