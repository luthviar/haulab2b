<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
//        dd(Auth::user()->id);
        if (Auth::user()){
//            dd($request);
            // invoice : INV + CARBONTIMESTAMP + id_packet + 00 + id_pembeli
            $invoice = 'INV'.Carbon::now()->timestamp.$request->id_packets.'00'.Auth::user()->id;
            $str1 = str_replace('Rp. ','',$request->total_harga_order);
            $str2 = str_replace('.','',$str1);
            $total_price_order = (int) $str2;

            $id_order_history = DB::table('order_history')->insertGetId(
                [
                    'id_invoice' => $invoice,
                    'total_price_order' => $total_price_order,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                    'id_status' => 1,
                    'flag_active' => 1,
                ]
            );

            for($i=0;$i<count($request->id_product);$i++) {
                for($j=0;$j<count($request->qtyproduct);$j++) {
                    if ($request->qtyproduct[$j] > 0) {
                        $str1 = str_replace('Rp. ','',$request->harga_satuan[$j]);
                        $str2 = str_replace('.','',$str1);
                        $total_price_per_product = (int) $str2;
                        $id_transactions = DB::table('transactions')->insertGetId(
                            [
                                'id_invoice' => $invoice,
                                'id_order_history' => $id_order_history,
                                'id_pembeli' => Auth::user()->id,
                                'id_packets' => $request->id_packets,
                                'id_products' => $request->id_product[$i],
                                'flag_active' => 1,
                                'qty_order' => $request->qtyproduct[$j],
                                'total_price_order' => $total_price_per_product
                            ]
                        );
                    } //endif
                } //end for qty
            }// end for id_product

            return redirect('/packet/request/invoice/'.$id_order_history.'/'.$invoice);
        } else {
            return redirect('/login');
        }
    }

    public function request_invoice() {
        return view('customer.detail_invoice');
    }
}
