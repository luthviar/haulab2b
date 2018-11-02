<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->middleware('auth');
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

        $the_packet_images = DB::table('packet_images as pi')
                            ->where('pi.id_packets','=',$id)
                            ->get();

        $the_products = DB::table('products as pr')
                        ->where('pr.id_packets','=',$id)
                        ->get();

        $the_product_images = [];
        foreach ($the_products as $product) {
            $the_images = DB::table('product_images as pi')
                        ->where('pi.id_products','=',$product->id)
                        ->get();
            array_push($the_product_images, $the_images);
        }


        return view('customer.detail_packets')
                ->with('the_packet',$the_packet)
                ->with('the_packet_images',$the_packet_images)
                ->with('the_products',$the_products)
                ->with('the_product_images',$the_product_images);
    }
}
