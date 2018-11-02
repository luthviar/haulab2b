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

            <div class="row">

                <div class="col-lg-4">

                    <div class="card-deck slick-products">
                        {{--paket 1--}}
                        @foreach($the_packet_images as $data)
                            <div class="card">
                                <a href="{{ $data->img_url_packet }}" target="_blank">
                                    <img class="card-img-top" src="{{ $data->img_url_packet }}"
                                         alt="Card image cap" height="100%" width="100%">
                                </a>
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
                                            <button onclick="dec_qty();" class="input-group-btn btn btn-outline-danger">-</button>
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
                                                {{ number_format($the_packet->total_price_packet, 0, '', '.') }}
                                            </span>
                                        </strong>
                                        {{--<small class="text-muted" style="color: red!important;">Per paket</small>--}}
                                    </h5>
                                </div>
                                <div class="col-lg-4">
                                    <p style="font-size: small;" class="text-center">
                                        Rp <span id="harga_paket_1">{{ number_format($the_packet->total_price_packet , 0, '', '.') }}</span> <span>/ Per paket</span>
                                    </p>
                                </div>
                            </div>

                            <a href="#ajukanpesanan1" class="btn btn-primary btn-block card-link">Ajukan Pesanan Paket</a>



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

                                    <h3 class="text-center">Daftar Produk Item di {{ $the_packet->title_packet }}</h3>

                                    <hr class="featurette-divider" style="margin: 2rem 0;"/>

                                    <div class="card-deck slick-products-item">
                                        {{--paket 1--}}
                                        @foreach($the_products as $data)
                                            <div class="card">
                                                <div class="row">
                                                    <div class="col-8 offset-2">
                                                        <div class="card-deck slick-products">
                                                            {{--paket 1--}}
                                                            @foreach($data['data_images'] as $img)
                                                                <div class="card">
                                                                    <a href="{{ $img->img_url_product }}" target="_blank">
                                                                        <img class="card-img-top" src="{{ $img->img_url_product }}"
                                                                             alt="Card image cap" height="100%" width="100%">
                                                                    </a>
                                                                </div>
                                                            @endforeach

                                                            {{--end of paket 1--}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $data['data_product']->title_product }}</h5>
                                                    <p class="card-text" style="color: red;">
                                                        <strong>Rp {{ number_format($data['data_product']->harga_satuan, 0, '', '.') }}</strong><br/>
                                                        <small class="text-muted" style="color: red!important;">
                                                            Per {{ $data['data_product']->unit_name  }}</small>

                                                    </p>
                                                    <p class="card-text">
                                                        {!!   $data['data_product']->description_product  !!}
                                                    </p>

                                                </div>
                                            </div>
                                        @endforeach
                                        {{--end of paket 1--}}


                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <hr class="featurette-divider">

            <form action="{{ url(action('HomeController@request_order',[$the_packet->id,$the_packet->title_packet])) }}" method="get">
                {{ csrf_field() }}
            <div class="row featurette text-center">
                <div class="col-lg-12">
                    <h2 class="text-center">Atur dan pilih kuantitas (Qty) produk yang dipesan</h2>
                </div>
                <div class="col-lg-12 text-left  table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th class="text-center" scope="col">Gambar <br/> <small>(klik gambar untuk memperbesar)</small></th>
                            <th class="text-nowrap"
                                scope="col">Nama Produk</th>
                            <th scope="col">Deskripsi</th>
                            <th class="text-nowrap" scope="col"> -- Qty -- </th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Harga</th>
                            <th scope="col" style="color: forestgreen;">Pilih</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($i=0,$j=1;$i<count($the_products);$i++,$j++)
                            <tr>
                                <th scope="row">{{$j}}</th>
                                <td class="text-center">
                                    @foreach($the_products[$i]['data_images'] as $img)
                                        <a href="{{ $img->img_url_product }}" target="_blank">
                                            <img class="card-img-top" src="{{ $img->img_url_product }}"
                                                 alt="Card image cap" style="width: 50%;">
                                        </a>
                                        @break
                                    @endforeach
                                </td>
                                <td>{{$the_products[$i]['data_product']->title_product}}</td>
                                <td class="">{!! str_limit($the_products[$i]['data_product']->description_product, 30, '...') !!}</td>
                                <td class="text-nowrap">
                                    <input class="form-control qtyproduct"
                                           type="number" onchange="autosums_total_harga_tabel()"
                                           min="1" value="{{$the_products[$i]['data_product']->qty}}">

                                </td>
                                <td>{{$the_products[$i]['data_product']->unit_name}}</td>
                                <td>Rp. <span class="harga_satuan">
                                        {{number_format($the_products[$i]['data_product']->harga_satuan, 0, '', '.')}}
                                    </span>
                                    <input type="number" style="visibility: hidden;"
                                           value="{{ $the_products[$i]['data_product']->harga_satuan }}" class="harga_satuan_fix">
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input produk_check" name="id_product[]" type="checkbox"
                                               value="{{$the_products[$i]['data_product']->id}}" id="check_product{{$j}}" checked>
                                    </div>
                                </td>

                            </tr>
                        @endfor

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="color:forestgreen;"><strong>Total Harga</strong></td>
                            <td colspan="2" style="color:forestgreen;" class="text-nowrap">
                                <input type="text" class="form-control" id="harga_total_tabel"
                                       disabled value="Rp. {{ number_format($the_packet->total_price_packet, 0, '', '.') }}">
                                <h4 style="visibility: hidden;" class="text-nowrap">Rp. 15.000.000</h4>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-4 offset-8 d-none d-sm-block">
                    <button type="submit" id="ajukanpesanan1" class="btn btn-primary btn-block">Ajukan Pesanan Paket</button>

                </div>
                <div class="col-lg-12 d-block d-sm-none">
                    <button type="submit" id="ajukanpesanan2" class="btn btn-primary btn-block">Ajukan Pesanan Paket</button>
                </div>

            </div>
            </form>

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

        $('.slick-products-mini').slick({
            dots: true,
            infinite: true,
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
    </script>
    <script>

        function autosums_total_harga_tabel() {

//            document.getElementsByClassName("harga_satuan")[0].innerHTML = format1(parseInt((document.getElementsByClassName("harga_satuan")[0].innerHTML).replace(/\./g,'')) * parseInt(document.getElementsByClassName("qtyproduct")[0].value), 'Rp. ');
            var harga_total_tabel = 0;
            var qtyproduct = [];
            var harga_satuan = [];
            var harga_satuan_fix = [];
            var produk_check = [];
            var new_harga_satuan = 0;
            for(var i = 0;i<document.getElementsByClassName("produk_check").length; i++) {

                if(document.getElementsByClassName("produk_check")[i].checked &&
                    (document.getElementsByClassName("qtyproduct")[i].value > 0)){

                    qtyproduct[i] = document.getElementsByClassName("qtyproduct")[i].value;
                    harga_satuan_fix[i] = document.getElementsByClassName("harga_satuan_fix")[i].value;

                    harga_satuan[i] = document.getElementsByClassName("harga_satuan")[i].innerHTML;

                    var str = harga_satuan[i];
                    var strchange = str.replace(/\./g,'');

                    new_harga_satuan = parseInt(harga_satuan_fix[i]) * parseInt(qtyproduct[i]);
//                    new_harga_satuan = parseInt(strchange[i]) * parseInt(qtyproduct[i]);

                    document.getElementsByClassName("harga_satuan")[i].innerHTML = format1(new_harga_satuan, '');

                    harga_total_tabel += Number(new_harga_satuan);
                }
            }

            document.getElementById("harga_total_tabel").value = format1(harga_total_tabel, 'Rp. ');

        }

        function autosums_total_paket1() {
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

        function inc_qty() {
            var qty1 = document.getElementById('qty_paket_1').value;
            var qty2 = parseInt(qty1);
            var increment_qty = qty2 + 1;

            document.getElementById('qty_paket_1').value = increment_qty;

            var str1 = document.getElementById("harga_paket_1").innerHTML;
            var str1change = str1.replace(/\./g,'');

            var harga_paket_1 = parseInt(str1change);
            var total_harga_paket_1 = harga_paket_1 * increment_qty;

            document.getElementById("total_harga_paket_1").innerHTML = format1(total_harga_paket_1, ' ');
        }

        function dec_qty() {
            var qty1 = document.getElementById('qty_paket_1').value;
            var qty2 = parseInt(qty1);
            if (qty2 > 1) {
                var decrement_qty = qty2 - 1;


            document.getElementById('qty_paket_1').value = decrement_qty;

            var str1 = document.getElementById("harga_paket_1").innerHTML;
            var str1change = str1.replace(/\./g,'');

            var harga_paket_1 = parseInt(str1change);

            var total_harga_paket_1 = harga_paket_1 * decrement_qty;

            document.getElementById("total_harga_paket_1").innerHTML = format1(total_harga_paket_1, ' ');
            }
        }
    </script>
@endsection
