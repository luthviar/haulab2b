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
                                    {{--Pesanan Anda sudah disimpan.<br/>--}}
                                    No. Invoice: {{$data_order->id_invoice}}<br/>
                                    <span style="color: red;">Tahap Terakhir: Chat Admin</span><br/>
                                </h3>
                            </div>
                        </div>
                        <div class="row featurette text-center">
                            <div class="col-lg-12">
                                <h2 class="text-center"></h2>
                                <p>Total tagihan Anda pada: {{ $the_packet->title_packet }}</p>

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
                                    @for($i=0,$j=1;$i<count($the_product_orders);$i++,$j++)
                                        <tr>
                                            <th scope="row">{{$j}}</th>
                                            <td>{{ $the_product_orders[$i]->title_product }}</td>
                                            <td>{{ $the_product_orders[$i]->qty_order }}</td>
                                            <td>Rp. {{ number_format($the_product_orders[$i]->total_price_order , 0, '', '.')}}</td>
                                        </tr>
                                    @endfor

                                    <tr>


                                        <td></td>
                                        <td></td>

                                        <td style="color:forestgreen;"><strong>Total Tagihan</strong></td>
                                        <td class="text-nowrap" style="color:forestgreen;">
                                            <strong>Rp.
                                                {{ number_format($data_order->total_price_order , 0, '', '.') }}
                                            </strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-lg-12">
                                <p>Silahkan <strong style="color: red;">lanjutkan</strong> transaksi Anda dengan menghubungi Admin kami, melalui Whatsapp dengan klik tombol berikut.</p>
                            </div>

                            <div class="col-lg-8 offset-lg-2">
                                <form method="post" action="{{ url(action('HomeController@chat_admin')) }}">
                                    {{ csrf_field() }}
                                    <input name="id_order_history" value="{{ $id_order_history }}" hidden>
                                    <button type="submit" class="btn btn-success btn-block">
                                        <i class="fa fa-whatsapp"></i>
                                        Chat Admin
                                    </button>
                                </form>

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
