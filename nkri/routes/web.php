<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Mike42\Escpos\Printer; 
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('barangs', 'BarangController');

// Route::get('orders/autocomplete', 'OrderController@autocomplete');
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'OrderController@create'));
Route::get('searchajax',array('as'=>'searchajax','uses'=>'OrderController@autoComplete'));

Route::resource('orders', 'OrderController');
Route::get('barangJson','OrderController@barangAr');

Route::resource('orderItems', 'OrderItemController');
Route::resource('reports','ReportController');

Route::post('cek','ReportController@lapHar');



Route::resource('pembayarans', 'PembayaranController');
Route::get('pembayarans/create/{id}', 'PembayaranController@create');
// Route::post('print','PembayaranController@print');

Route::post('test','TestController@test');
Route::get('coba','TestController@index');

 Route::post('/print', function(Request $request){
     if($request->ajax()){
     	//dd($r);
         try {
             // $ip = '192.168.100.40'; // IP Komputer kita atau printer lain yang masih satu jaringan
             // $printer = 'escprinter'; // Nama Printer yang di sharing smb:/'192.168.100.40'/
              // $connector = new WindowsPrintConnector("smb://" . $ip . "/" . $printer);
            //$connector = new FilePrintConnector("/dev/ttyS0");

                $connector = new WindowsPrintConnector("test");

                $printer = new Printer($connector);
                $printer -> text("================================\n");
                $printer -> text("  Nyeruput Kopi Rasa Indonesia  \n");
                $printer -> text("================================\n");
                $printer -> text("Code Order :" . $request->code_order . "\n");
                $printer -> text("Tanggal    :" . $request->tanggal . "\n");
                $printer -> text("Customer   :" . $request->nama_customer . "\n");
                $printer -> text("Barang     :\n");
                foreach ($request->barang as $item) {
                        
                                     
                                    $printer->text("".$item['nama_barang']."\n");
                                    $printer->text("   ".$item['qty']." X ");
                                    $printer->text("  ".$item['harga']."\n");
                
                    }
               

                $printer -> text("Total      :" . $request->total . "\n");
                $printer -> text("Bayar      :" . $request->bayar . "\n");
                $printer -> text("Kembalian  :".$request->kembalian."\n\n\n");
                $printer -> text("                                \n");
                $printer -> text("         TERIMA KASIH           \n");
                $printer -> text("\n");
                $printer -> text("\n");
                $printer -> text("\n");

                $printer -> cut();
                $printer -> close();
                $response = ['success'=>'true'];
         } catch (Exception $e) {
                 $response = ['success'=>'false'];
         }
         return response()
             ->json($response);
     }
     return;
 });

Route::resource('purchasings', 'purchasingController');

Route::resource('purchases', 'PurchaseController');

Route::resource('ajas', 'ajaController');