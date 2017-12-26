<?php
// require __DIR__ . '/vendor/autoload.php';
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mike42\Escpos\Printer; 
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class TestController extends Controller
{


	public function index(){
		return view('tes');
	}
    
    public function test(){

    	$connector = new FilePrintConnector(" /dev/usb/lp0");
$printer = new Printer($connector);
$printer -> text("Hello World!\n");
$printer -> cut();
$printer -> close();
    }
}
