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

                    <h1 class="d-block d-sm-none text-center">
                        Pesanan yang Anda pilih <br/>
                        {{--<a href="#" class="btn btn-info btn-sm" role="button">Lihat Semua</a>--}}
                    </h1>
                    <h3 class="d-block d-sm-none text-center">
                        {{ $the_packet->title_packet }}
                    </h3>

                    <hr/>
                </div>
            </div>
            {{--<hr class="featurette-divider">--}}


            <div class="row">
                <div class="col-lg-4">
                    <div class="card-deck slick-products">

                        @foreach($the_packet_img as $data)
                            {{--paket 2--}}
                            <div class="card">
                                <img class="card-img-top" src="{{ $data->img_url_packet }}"
                                     alt="Card image cap" height="100%" width="100%">

                            </div>
                            {{--end of paket 2--}}
                        @endforeach


                    </div>

                </div>

                <div class="col-lg-8">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="row d-none d-sm-block">
                                <div class="col-12">
                                    <h1 class="text-center card-title">
                                        {{ $the_packet->title_packet }}
                                    </h1>
                                </div>
                            </div>
                            <div class="row featurette text-center">
                                <div class="col-lg-12">
                                    <h2 class="text-center">Pesanan yang Anda pilih</h2>
                                </div>
                                <div class="col-lg-12 text-center  table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">No</th>

                                            <th class="text-nowrap"
                                                scope="col">Nama Produk</th>

                                            <th scope="col">Satuan</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Harga</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0,$j=1;$i<count($the_products);$i++,$j++)
                                            <tr>
                                                <th scope="row">{{$j}}</th>
                                                <td>{{ $the_products[$i]->title_product }}</td>
                                                <td>{{ $the_products[$i]->unit_name }}</td>
                                                <td>{{ $the_products[$i]->qty_order }}</td>
                                                <td>Rp. {{ number_format($the_products[$i]->total_price_order , 0, '', '.')}}</td>
                                            </tr>
                                        @endfor
                                        <tr>


                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="color:forestgreen;"><strong>Total Tagihan</strong></td>
                                            <td style="color:forestgreen;">
                                                <strong>Rp.
                                                    {{ number_format($total_price_order , 0, '', '.') }}
                                                </strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-12 d-block d-sm-none">
                                    <a href="/packets/order/success" class="btn btn-success btn-block">
                                        <i class="fa fa-send"></i>
                                        Lanjutkan tahap berikutnya
                                    </a>
                                </div>

                                <div class="col-lg-4">
                                    <br class="d-block d-sm-none"/> <br class="d-block d-sm-none"/> <br class="d-block d-sm-none"/>
                                    <div class="col-lg-6">
                                        <a href="{{ redirect()->back() }}" class="btn btn-danger btn-block">
                                            <i class="fa fa-arrow-circle-left"></i> Back
                                        </a>
                                    </div>
                                    <small style="color: red;" class="text-left">
                                        Data Pesanan Anda akan hilang jika kembali ke halaman sebelumnya.
                                    </small>
                                </div>

                                <div class="col-lg-6 offset-2 d-none d-sm-block">
                                    <form method="post" action="{{ url(action('HomeController@request_admin')) }}">
                                        {{ csrf_field() }}
                                        <input name="id_order_history" value="{{ $id_order_history }}" hidden>
                                        <button type="submit" class="btn btn-success btn-block">
                                            <i class="fa fa-send"></i>
                                            Lanjutkan tahap berikutnya
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
