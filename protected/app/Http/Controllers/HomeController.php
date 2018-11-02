<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','view_packet');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_packets = DB::table('packets as p')
                        ->join('packet_images as pi', 'pi.id_packets', '=', 'p.id')
                        ->select('p.*', 'pi.*')
                        ->get();
//        dd($list_packets);

        return view('customer.home')
                ->with('list_packets',$list_packets);
    }

    public function view_packet($id) {
        $the_packet = DB::table('packets as p')
                        ->where('p.id','=',$id)
                        ->first();

//        dd(number_format($the_packet->total_price_packet, 0, '', '.'));
        $the_packet_images = DB::table('packet_images as pi')
                            ->where('pi.id_packets','=',$id)
                            ->get();

        $the_packet_products = DB::table('products as pr')
                        ->where('pr.id_packets','=',$id)
                        ->get();

        $data_products = [];
        foreach ($the_packet_products as $product) {
            $the_product = DB::table('products as pr')
                ->where('pr.id','=',$product->id)
                ->first();

            $the_images = DB::table('product_images as pi')
                ->where('pi.id_products','=',$product->id)
                ->get();

            $products = array(
                "data_product"  => $the_product,
                "data_images"   => $the_images
            );
            array_push($data_products, $products);
        }

//        dd($data_products);

        foreach($data_products as $data) {
            foreach ($data['data_images'] as $img){
//                dd($img->img_url_product);
            }
        }


//        dd($the_product_images[1][0]->img_url_product);

        return view('customer.detail_packets')
                ->with('the_packet',$the_packet)
                ->with('the_packet_images',$the_packet_images)
                ->with('the_products',$data_products);
    }

    public function request_order(Request $request) {
        if (Auth::user()){
            dd($request);
        } else {
            return redirect('/login');
        }
    }
}
