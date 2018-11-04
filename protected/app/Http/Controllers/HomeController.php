<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','view_packet','chat_admin');
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

//        foreach($data_products as $data) {
//            foreach ($data['data_images'] as $img){
////                dd($img->img_url_product);
//            }
//        }


//        dd($the_product_images[1][0]->img_url_product);

        return view('customer.detail_packets')
                ->with('the_packet',$the_packet)
                ->with('the_packet_images',$the_packet_images)
                ->with('the_products',$data_products);
    }

    public function back_to_view_packet($id_packet, $title_packet, Request $request) {


        DB::table('order_history as oh')
            ->where('oh.id', $request->id_order_history)
            ->update(['oh.flag_active' => 0]);

        DB::table('transactions as t')
            ->where('t.id_order_history', $request->id_order_history)
            ->update(['t.flag_active' => 0]);

        return redirect(action('HomeController@view_packet',[$id_packet,$title_packet]));
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

            $data_products = array();
            for($j=0;$j<count($request->qtyproduct);$j++) {
                if ($request->qtyproduct[$j] > 0 || !($request->harga_satuan[$j] == 'Rp. 0')) {
                    $str1 = str_replace('Rp. ','',$request->harga_satuan[$j]);
                    $str2 = str_replace('.','',$str1);
                    $total_price_per_product = (int) $str2;
                    $id_transactions = DB::table('transactions')->insertGetId(
                        [
                            'id_invoice' => $invoice,
                            'id_order_history' => $id_order_history,
                            'id_pembeli' => Auth::user()->id,
                            'id_packets' => $request->id_packets,
                            'id_products' => $request->id_product[$j],
                            'flag_active' => 1,
                            'qty_order' => $request->qtyproduct[$j],
                            'total_price_order' => $total_price_per_product
                        ]
                    );

                    $the_product_orders = DB::table('transactions as t')
                        ->join('products as p', 'p.id','=','t.id_products')
                        ->where('t.id','=',$id_transactions)
                        ->select('p.title_product','p.unit_name','t.qty_order','t.total_price_order')
                        ->first();

                    $data_products[] = $the_product_orders;

                } //endif
            } //end for qty or harga_satuan



            $the_packet = DB::table('packets as p')
                        ->where('p.id','=',$request->id_packets)
                        ->first();

            $the_packet_img = DB::table('packet_images as pi')
                            ->where('pi.id_packets','=',$the_packet->id)
                            ->get();

            return view('customer.detail_invoice')
                    ->with('the_products',$data_products)
                    ->with('the_packet',$the_packet)
                    ->with('id_order_history',$id_order_history)
                    ->with('total_price_order',$total_price_order)
                    ->with('the_packet_img',$the_packet_img);
        } else {
            return redirect('/login');
        }
    }

    public function request_invoice() {
        return view('customer.detail_invoice');
    }

    public function request_to_admin(Request $request) {

        $the_product_orders = DB::table('transactions as t')
            ->join('products as p', 'p.id','=','t.id_products')
            ->where('t.id_order_history','=',$request->id_order_history)
            ->select('p.title_product','p.unit_name','t.qty_order','t.total_price_order','t.id_packets')
            ->get();

        $the_packet = DB::table('packets as p')
                ->where('p.id','=',$the_product_orders[0]->id_packets)
                ->first();

        $the_packet_img = DB::table('packet_images as pi')
            ->where('pi.id_packets','=',$the_product_orders[0]->id_packets)
            ->get();

        $data_order = DB::table('order_history as o')
                    ->where('o.id','=',$request->id_order_history)
                    ->select('o.total_price_order','o.id_invoice')
                    ->first();

        DB::table('order_history as oh')
            ->where('oh.id', $request->id_order_history)
            ->update(['oh.id_status' => 2]);

        return view('customer.success_order')
                    ->with('the_product_orders',$the_product_orders)
                    ->with('the_packet_img',$the_packet_img)
                    ->with('data_order',$data_order)
                    ->with('the_packet',$the_packet)
                    ->with('id_order_history',$request->id_order_history);
    }

    public function chat_admin(Request $request) {

        DB::table('order_history as oh')
            ->where('oh.id', $request->id_order_history)
            ->update(['oh.id_status' => 3]);

        $order_history = DB::table('order_history as oh')
                ->where('oh.id', $request->id_order_history)
                ->first();

        $the_product_orders = DB::table('transactions as t')
            ->join('products as p', 'p.id','=','t.id_products')
            ->where('t.id_order_history','=',$request->id_order_history)
            ->select('p.title_product','p.unit_name','t.qty_order','t.total_price_order','t.id_packets')
            ->get();

        $the_packet = DB::table('packets as p')
            ->where('p.id','=',$the_product_orders[0]->id_packets)
            ->first();



        $messages = 'Halo%20admin,%20saya%20'.Auth::user()->name.'%20sudah%20order%20di%20website:%20 *'.$the_packet->title_packet .
            '* - No. Invoice: '.$order_history->id_invoice.' - Link pesanan: https://haula-toys.com/invoice/'.Auth::user()->id.'/'.$order_history->id_invoice.
            ' - Mohon segera diproses. Terima Kasih.';
        return Redirect::to('https://api.whatsapp.com/send?phone=6282121227019&text='.$messages);
    }

    public function view_by_invoice($id_user, $id_invoice){
        $the_user = DB::table('users as u')
            ->where('u.id',$id_user)
            ->first();

        $order_history = DB::table('order_history as oh')
                ->where('oh.id_invoice',$id_invoice)
                ->first();

        $status = DB::table('ref_status_order_history as r')
                ->where('r.id',$order_history->id_status)
                ->first();

        $the_product_orders = DB::table('transactions as t')
            ->join('products as p', 'p.id','=','t.id_products')
            ->where('t.id_invoice','=',$id_invoice)
            ->select('p.title_product','p.unit_name','t.qty_order',
                        't.total_price_order','t.id_packets','p.id','p.description_product','p.harga_satuan')
            ->get();

        $data_products = [];
        for($i=0;$i<count($the_product_orders);$i++) {

            $the_images = DB::table('product_images as pi')
                ->where('pi.id_products','=',$the_product_orders[$i]->id)
                ->get();

            $products = array(
                "data_product"  => $the_product_orders[$i],
                "data_images"   => $the_images
            );
            array_push($data_products, $products);
        }



        $the_packet = DB::table('packets as p')
            ->where('p.id','=',$the_product_orders[0]->id_packets)
            ->first();

        $the_packet_img = DB::table('packet_images as pi')
            ->where('pi.id_packets','=',$the_product_orders[0]->id_packets)
            ->get();

        return view('customer.view_invoice')
            ->with('the_packet',$the_packet)
            ->with('data_products',$data_products)
            ->with('order_history',$order_history)
            ->with('the_user',$the_user)
            ->with('status',$status)
            ->with('the_packet_img',$the_packet_img);
    }
}
