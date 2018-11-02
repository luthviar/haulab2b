@extends('customer.layouts.app')


@section('content')

    <main role="main">

        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">


        <!-- START ANEKA PRODUK -->

            <hr class="featurette-divider d-block d-sm-none">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="d-block d-sm-none">
                        <a href="{{ url(action('HomeController@index')) }}"><i style="color:red;" class="fa fa-arrow-circle-left"></i></a>
                        {{ $the_packet->title_packet }}
                        {{--<a href="#" class="btn btn-info btn-sm" role="button">Lihat Semua</a>--}}
                    </h1>

                    <hr/>
                </div>
            </div>
            {{--<hr class="featurette-divider">--}}


            <div class="row">
                <div class="col-lg-4">
                    <div class="card-deck slick-products">
                        {{--paket 1--}}
                        @foreach($the_packet_images as $data)
                            <div class="card">
                                <img class="card-img-top" src="{{ $data->img_url_packet }}"
                                     alt="Card image cap" height="100%" width="100%">
                            </div>
                        @endforeach
                        {{--end of paket 1--}}
                    </div>

                </div>

                <div class="col-lg-8">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="row d-none d-sm-block">
                                <div class="col-12">

                                    <h1 class="card-title">
                                        <a href="{{ url(action('HomeController@index')) }}"><i style="color:red;" class="fa fa-arrow-circle-left"></i></a>
                                        {{ $the_packet->title_packet }}
                                    </h1>

                                </div>
                            </div>
                            <p><small style="color: green;"><strong>Stock tersedia</strong></small></p>
                            <p class="card-text">
                                {{ $the_packet->description_packet }}
                                Paket ini merupakan kumpulan dari berbagai produk yang dibutuhkan oleh orang yang berkebutuhan khusus.
                                Cocok untuk Sekolah Anda. Sangat bermanfaat.
                            </p>

                            <hr class="featurette-divider">

                            <div class="row">
                                <div class="col-lg-2">
                                    <h6 class="text-center">
                                        Total order
                                    </h6>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <a href="#" class="input-group-btn btn btn-outline-danger">-</a>
                                            {{--<div class="input-group-text">-</div>--}}
                                        </div>
                                        <input type="text" onchange="autosums_total_paket1()"
                                               class="form-control text-center" id="qty_paket_1" value="1">
                                        <div class="input-group-append">
                                            <button onclick="inc_qty();" class="input-group-btn btn btn-outline-primary">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 text-center">
                                    <h5 style="color: red!important;">
                                        <strong>Rp. <span id="total_harga_paket_1"
                                                          onload="formatprice('total_harga_paket_1','{{ $the_packet->total_price_packet }}','Rp. ')">
                                                {{ $the_packet->total_price_packet }}
                                            </span>
                                        </strong>
                                        {{--<small class="text-muted" style="color: red!important;">Per paket</small>--}}
                                    </h5>
                                </div>
                                <div class="col-lg-4">
                                    <p style="font-size: small;" class="text-center">
                                        Rp <span id="harga_paket_1">{{ $the_packet->total_price_packet }}</span> <span>/ Per paket</span>
                                    </p>
                                </div>
                            </div>

                            <a href="#" class="btn btn-primary btn-block card-link">Ajukan Pesanan Paket</a>



                        </div>
                    </div>
                </div>
            </div>
            <hr class="featurette-divider" style="margin: 2rem 0;"/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="min-width:100%;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">

                                    <h3 class="text-center">Daftar Produk Item di Paket Alat Kebutuhan Khusus</h3>
                                    <hr class="featurette-divider" style="margin: 2rem 0;"/>
                                    <div class="card-deck slick-products-item">
                                        {{--paket 1--}}
                                        <div class="card">
                                            <img class="card-img-top" src="{{ URL::asset('img/products/peraga-khusus.jpg') }}"
                                                 alt="Card image cap" height="100%" width="100%">
                                            <div class="card-body">
                                                <h5 class="card-title">Produk Alat Kebutuhan Khusus - A</h5>
                                                <p class="card-text" style="color: red;">
                                                    <strong>Rp 130.000</strong><br/>
                                                    <small class="text-muted" style="color: red!important;">Per item product</small>

                                                </p>
                                                <p class="card-text">
                                                    Paket ini berisi produk alat-alat bagi yang berkebutuhan khusus.
                                                    Sangat bermanfaat bagi mereka.
                                                </p>

                                            </div>
                                        </div>
                                        {{--end of paket 1--}}

                                        {{--paket 1--}}
                                        <div class="card">
                                            <img class="card-img-top" src="{{ URL::asset('img/products/peraga-khusus.jpg') }}"
                                                 alt="Card image cap" height="100%" width="100%">
                                            <div class="card-body">
                                                <h5 class="card-title">Produk Alat Kebutuhan Khusus - A</h5>
                                                <p class="card-text" style="color: red;">
                                                    <strong>Rp 130.000</strong><br/>
                                                    <small class="text-muted" style="color: red!important;">Per item product</small>

                                                </p>
                                                <p class="card-text">
                                                    Paket ini berisi produk alat-alat bagi yang berkebutuhan khusus.
                                                    Sangat bermanfaat bagi mereka.
                                                </p>

                                            </div>
                                        </div>
                                        {{--end of paket 1--}}

                                        {{--paket 1--}}
                                        <div class="card">
                                            <img class="card-img-top" src="{{ URL::asset('img/products/peraga-khusus.jpg') }}"
                                                 alt="Card image cap" height="100%" width="100%">
                                            <div class="card-body">
                                                <h5 class="card-title">Produk Alat Kebutuhan Khusus - A</h5>
                                                <p class="card-text" style="color: red;">
                                                    <strong>Rp 130.000</strong><br/>
                                                    <small class="text-muted" style="color: red!important;">Per item product</small>

                                                </p>
                                                <p class="card-text">
                                                    Paket ini berisi produk alat-alat bagi yang berkebutuhan khusus.
                                                    Sangat bermanfaat bagi mereka.
                                                </p>

                                            </div>
                                        </div>
                                        {{--end of paket 1--}}

                                        <div class="card">
                                            <img class="card-img-top" src="{{ URL::asset('img/products/balok-pukul.jpg') }}"
                                                 alt="Card image cap" height="100%" width="100%">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img class="card-img-top" src="{{ URL::asset('img/products/balok-susun.jpg') }}"
                                                 alt="Card image cap" height="100%" width="100%">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img class="card-img-top" src="{{ URL::asset('img/products/hijaiyah1.jpg') }}"
                                                 alt="Card image cap" height="100%" width="100%">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img class="card-img-top" src="holder.js/255x200/auto" alt="Card image cap" height="100%" width="100%">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette text-center">
                <div class="col-lg-12">
                    <h2 class="text-center">Atur dan pilih kuantitas (Qty) produk yang dipesan</h2>
                </div>
                <div class="col-lg-12 text-center  table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar</th>
                            <th class="text-nowrap"
                                scope="col">Nama Produk</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Pilih</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>

                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="color:forestgreen;"><strong>Total Harga</strong></td>
                            <td style="color:forestgreen;"><strong>Rp. 15.000.000</strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-4 offset-8 d-none d-sm-block">
                    <a href="/packets/order" class="btn btn-primary btn-block">Ajukan Pesanan Paket</a>

                </div>
                <div class="col-lg-12 d-block d-sm-none">
                    <a href="/packets/order" class="btn btn-primary btn-block">Ajukan Pesanan Paket</a>
                </div>
            </div>

            <hr class="featurette-divider">


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
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
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


        $('.slick-products-item').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
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
    <script>
        function autosums_total_paket1() {
//            var totalmaskapai = 0;
//            var hargamaskapai = [];
//            for(var i = 0;i<document.getElementsByClassName("hargamaskapai").length; i++) {
//                hargamaskapai[i] = document.getElementsByClassName("hargamaskapai")[i].value;
//                if(!hargamaskapai[i]) {
//                    hargamaskapai[i] = '0.0';
//                }
//                str = hargamaskapai[i];
//                strchange = str.replace(/\./g,'');
//                totalmaskapai += Number(strchange);
//            }

            var harga_paket_1 = parseInt(document.getElementById("harga_paket_1").innerHTML);
            var qty_paket_1 = document.getElementById("qty_paket_1").value;
            var total_harga_paket_1 = harga_paket_1 * qty_paket_1;


            document.getElementById("total_harga_paket_1").innerHTML = format1(total_harga_paket_1, ' ');

        }
        function format1(n, currency) {
            return currency + n.toFixed(0).replace(/./g, function(c, i, a) {
                    return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
                });
        }

        function formatprice(idName ,n, currency) {
            var n2 = parseInt(n);
            document.getElementById(idName).innerHTML = format1(n2, currency);
        }

        function inc_qty() {
            var qty1 = document.getElementById('qty_paket_1').value;
            var qty2 = parseInt(qty1);
            var increment_qty = qty2 + 1;

            document.getElementById('qty_paket_1').value = increment_qty;


            var harga_paket_1 = parseInt(document.getElementById("harga_paket_1").innerHTML);
            var total_harga_paket_1 = harga_paket_1 * increment_qty;

            document.getElementById("total_harga_paket_1").innerHTML = format1(total_harga_paket_1, ' ');
        }
    </script>
@endsection
