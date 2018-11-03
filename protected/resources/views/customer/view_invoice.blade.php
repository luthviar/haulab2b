@extends('customer.layouts.app')


@section('content')

    <main role="main">

        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">


            <!-- START ANEKA PRODUK -->

            <hr class="featurette-divider" style="margin: 2.3rem 0;">


            <div class="row">

                <div class="col-sm-12 col-lg-8 offset-lg-2">


                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-12">
                                    <h3 class="card-title text-center">
                                        {{--<a href="./"><i style="color:red;" class="fa fa-arrow-circle-left"></i></a>--}}
                                        Status: {{ $status->status_name }}<br/>
                                        No. Invoice: {{$order_history->id_invoice}}<br/>
                                    </h3>
                                </div>
                            </div>
                            <div class="row featurette text-center">
                                <div class="col-lg-12">
                                    <h2 class="text-center"></h2>
                                    <p>Total tagihan {{ $the_user->name }} pada: {{ $the_packet->title_packet }}</p>

                                </div>
                                <div class="col-4">
                                    <div class="card-deck slick-products">
                                        @foreach($the_packet_img as $data)
                                            <div class="card">
                                                <a href="{{ $data->img_url_packet }}" target="_blank">
                                                    <img class="card-img-top" src="{{ $data->img_url_packet }}"
                                                         alt="Card image cap" height="100%" width="100%">
                                                </a>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                                <div class="col-8 text-center  table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">No</th>

                                            <th class="text-nowrap"
                                                scope="col">Nama Produk</th>


                                            <th scope="col">Qty</th>
                                            <th scope="col">Harga</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0,$j=1;$i<count($data_products);$i++,$j++)
                                            <tr>
                                                <th scope="row">{{$j}}</th>
                                                <td>{{ $data_products[$i]['data_product']->title_product }}</td>
                                                <td>{{ $data_products[$i]['data_product']->qty_order }}</td>
                                                <td>Rp. {{ number_format($data_products[$i]['data_product']->total_price_order , 0, '', '.')}}</td>
                                            </tr>
                                        @endfor

                                        <tr>


                                            <td></td>
                                            <td></td>

                                            <td style="color:forestgreen;"><strong>Total Tagihan</strong></td>
                                            <td class="text-nowrap" style="color:forestgreen;">
                                                <strong>Rp.
                                                    {{ number_format($order_history->total_price_order , 0, '', '.') }}
                                                </strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{--<div class="col-lg-12">--}}
                                    {{--<p>Silahkan <strong style="color: red;">lanjutkan</strong> --}}
                                        {{--transaksi Anda dengan menghubungi Admin kami, melalui Whatsapp dengan klik tombol berikut.</p>--}}
                                {{--</div>--}}

                                <div class="col-lg-8 offset-lg-2">
                                    <form method="post" action="{{ url(action('HomeController@chat_admin')) }}">
                                        {{ csrf_field() }}
                                        <input name="id_order_history" value="{{ $order_history->id }}" hidden>
                                        <button type="submit" class="btn btn-success btn-block">
                                            <i class="fa fa-sticky-note"></i>
                                            No. Invoice {{ $order_history->id_invoice }}
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <hr/>

            <div class="row">

                <div class="col-sm-12 col-lg-12">


                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="card-title text-center">
                                        Daftar Rincian Produk Pesanan
                                    </h3>
                                    <h4 class="text-center">
                                        {{ $the_packet->title_packet }}
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-left  table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th class="text-center" scope="col">Gambar <br/></th>
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
                                        @for($i=0,$j=1;$i<count($data_products);$i++,$j++)
                                            <tr>
                                                <th scope="row">{{$j}}</th>
                                                <td class="text-center">
                                                    @foreach($data_products[$i]['data_images'] as $img)
                                                        <a href="{{ $img->img_url_product }}" target="_blank">
                                                            <img class="card-img-top" src="{{ $img->img_url_product }}"
                                                                 alt="Card image cap" style="width: 50%;">
                                                        </a>
                                                        @break
                                                    @endforeach
                                                </td>
                                                <td>{{$data_products[$i]['data_product']->title_product}}</td>
                                                <td class="">{!! str_limit($data_products[$i]['data_product']->description_product, 30, '...') !!}</td>
                                                <td class="text-nowrap">
                                                    <input class="form-control qtyproduct"
                                                           name="qtyproduct[]"
                                                           readonly
                                                           type="number" onchange="autosums_total_harga_tabel()"
                                                           min="0" value="{{$data_products[$i]['data_product']->qty_order}}">

                                                </td>
                                                <td>{{$data_products[$i]['data_product']->unit_name}}</td>
                                                <td class="text-nowrap">
                                                    <input type="text" class="form-control harga_satuan" name="harga_satuan[]" readonly
                                                           value="Rp. {{number_format($data_products[$i]['data_product']->harga_satuan, 0, '', '.')}}"
                                                    >

                                                    <h3 style="visibility: hidden;"
                                                        type="text">Rp. 15.000 </h3>

                                                    <input type="number" style="visibility: hidden;"
                                                           value="{{ $data_products[$i]['data_product']->harga_satuan }}" class="harga_satuan_fix">
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input produk_check" name="" type="checkbox" disabled
                                                               value="{{$data_products[$i]['data_product']->id}}" onchange="just_check();"
                                                               id="check_product{{$j}}" checked>
                                                        <input name="id_product[]" value="{{$data_products[$i]['data_product']->id}}" hidden>
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
                                            <td class="text-center" style="color:forestgreen;"><strong>Total Tagihan</strong></td>
                                            <td colspan="2" style="color:forestgreen;" class="text-nowrap">
                                                <input type="text" name="total_harga_order" class="form-control" id="harga_total_tabel"
                                                       readonly value="Rp. {{ number_format($order_history->total_price_order, 0, '', '.') }}">
                                                <h4 style="visibility: hidden;" class="text-nowrap">Rp. 15.000.000</h4>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <hr/>

            <div class="row">

                <div class="col-sm-12 col-lg-8 offset-lg-2">


                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="card-title text-center">
                                        Informasi Customer
                                    </h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 offset-2 text-center  table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>

                                            <th class="text-nowrap"
                                                scope="col">Identitas</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="text-nowrap" scope="row">Nama Lengkap</td>
                                            <td>{{ $the_user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap" scope="row">Username</td>
                                            <td>{{ $the_user->username }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap" scope="row">Email</td>
                                            <td>{{ $the_user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap" scope="row">No HP / WA</td>
                                            <td>{{ $the_user->no_hp }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap" scope="row">Alamat</td>
                                            <td>{{ $the_user->address_user }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap" scope="row">Jenis Kelamin</td>
                                            @if ($the_user->gender == 0)
                                                <td>Pria</td>
                                                @else
                                                <td>Wanita</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap" >Nama Organisasi/Perusahaan</td>
                                            <td>{{ $the_user->organization_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap" >Alamat Organisasi/Perusahaan</td>
                                            <td>{{ $the_user->address_organization }}</td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <hr class="featurette-divider">






            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->



    </main>


@endsection


@section('new-scripts')
    <script>

        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
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
@endsection
