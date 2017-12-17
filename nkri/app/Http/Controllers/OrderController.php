<?php

namespace App\Http\Controllers;

use App\DataTables\OrderDataTable;
use App\DataTables\OrderItemDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\OrderRepository;
use App\Repositories\OrderItemRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Barang;
use App\Models\Order;
use App\Models\OrderItem;
use Cart;

class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;
    private $orderItemRepository;

    public function __construct(OrderRepository $orderRepo,OrderItemRepository $orderItemRepo)
    {
        $this->orderRepository = $orderRepo;
        $this->orderItemRepository = $orderItemRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param OrderDataTable $orderDataTable
     * @return Response
     */
    public function index(OrderDataTable $orderDataTable)
    {
        return $orderDataTable->render('admin.orders.index');
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */

    public function create(Request $request)
    {
        
        $code=$this->code();
        //dd($code);
        $auto=$this->autoComplete($request);

        //dd($auto);
        return view('admin.orders.create')
        ->with('code',$code);
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();
// dd($input);
        $order = $this->orderRepository->create($input);
        //$barang= Barang::where('id',$request->id);
//dd($order->id);
         foreach($request['row'] as $item) {
            $dataOrderItem = array(
                'order_id'=>$order->id,
                'barang_id'=>$item['barang_id'],
                'code_barang'=>$item['code_barang'],
                'nama_barang'=>$item['nama_barang'],
                'qty' =>$item['qty'],
                'harga' =>$item['harga'],
                'subtotal' => $item['subtotal']
               
            );

            $this->orderItemRepository->create($dataOrderItem);
        }

        Flash::success('Order saved successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);


        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('admin.orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,Request $request)
    {
        $order = $this->orderRepository->findWithoutFail($id);
        $orderDetail= $this->orderItemRepository->findWhere(['order_id' => $id]);
       // dd($orderDetail);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }
        $code=$this->code();
        $auto=$this->autoComplete($request);
        $outcode= $this->itemout_code();
        $action="edit";

        $data=array();
        foreach ($orderDetail as $item) {
            //dd($item);
            $data[]=array(
                        'id' =>$item['id'],
                        'order_id'=>$item['order_id'],
                        'barang_id'=>$item['barang_id'],
                        'code_barang'=>$item['code_barang'],
                        'nama_barang'=>$item['nama_barang'],
                        'qty'=>$item['qty'],
                        'harga'=>$item['harga'],
                        'subtotal'=>$item['subtotal']);
        }

//dd($data);
        return view('admin.orders.edit')->with('order', $order)
            ->with('code',$code)
            ->with('outcode', $outcode)
            ->with('data',$data)
            ->with('action',$action);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param  int              $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = $this->orderRepository->findWithoutFail($id);
        $orderDetail= $this->orderItemRepository->findWhere(['order_id' => $id]);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $order = $this->orderRepository->update($request->all(), $id);

        $delId = $request['delete_row'];
                  if ($delId!='')
                  {
                  $delIds = explode("|",$delId);
                  foreach($delIds as $item)
                      {
                      
                      $this->orderItemRepository->delete($item);
                      }
                  }

        foreach($request['row'] as $item) {
            $dataOrderItem = array(
                'order_id'=>$order->id,
                'barang_id'=>$item['barang_id'],
                'code_barang'=>$item['code_barang'],
                'nama_barang'=>$item['nama_barang'],
                'qty' =>$item['qty'],
                'harga' =>$item['harga'],
                'subtotal' => $item['subtotal']
               
            );
                if($item['id']=='')
                    {
                    $this->orderItemRepository->create($dataOrderItem);
                    } 
                else
                    {
                    $this->orderItemRepository->update($dataOrderItem,$item['id']);
                    // return redirect(route('itemins.index'));
                    }
        }

        Flash::success('Order updated successfully.');



        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
    }
   

    public function barangAr(){
        $barang = Barang::get();

        return $barang->toJson();
    }
     public function OrderItem(OrderItemDataTable $orderItemDataTable)
    {
        return $orderItemDataTable->render('admin.orders.create');
    }



     public function code(){
        $count = Order::all()->count();
        //dd($count);
        $ks = "BAT";
        $tahun = date('Y');
        $bulan = date('m');
        $xbulan= "";
        if($bulan == 1){
            $xbulan='I';
        }elseif ($bulan==2) {
            $xbulan='II';
        }elseif ($bulan==3) {
            $xbulan='III';
        }elseif ($bulan==4) {
            $xbulan='IV';
        }elseif ($bulan==5) {
            $xbulan='V';
        }elseif ($bulan==6) {
            $xbulan='VI';
        }elseif ($bulan==7) {
            $xbulan='VII';
        }elseif ($bulan==8) {
            $xbulan='VIII';
        }elseif ($bulan==9) {
            $xbulan='IX';
        }elseif ($bulan==10) {
            $xbulan='X';
        }elseif ($bulan==11) {
            $xbulan='XI';
        }elseif ($bulan==2) {
            $xbulan='XII';
        }
        $temp ='000';
        $lengthCount = strlen($count);
        if ($lengthCount == 1) {
            $temp = '00';
        } elseif ($lengthCount == 2) {
            $temp = '0';
        } elseif ($lengthCount == 3) {
            $temp='';
        }

       
        
       
        $nomor= $temp.$count.'/'.$ks.'/'.$xbulan.'/'.$tahun;
        return $nomor;
    }


      public function autoComplete(Request $request) {
                 $query = $request->get('term','');
                 //dd($query);
                $items=Barang::where('nama_barang','LIKE','%'.$query.'%')->get();
                //dd($items);
                $data=array();
                foreach ($items as $item) {
                        $data[]=array('value'=>$item->nama_barang,'id'=>$item->id,'harga_jual'=>$item->harga_jual,'code_barang'=>$item->code_barang);
                }
                //dd($data);
                if(count($data))
                     return $data;
                else
                    return ['value'=>'No Result Found','id'=>''];
            }


             public function itemout_code() {
          $query = '';
                
          // $items= Itemout::where('deleted_at','null')->get();
          $items= Order::whereNull('deleted_at')->get();

          $data=array();
          foreach ($items as $item) {
                        $data[]=array('value'=>$item->out_code);
          }

                
        
          if(count($data))
               return $data;
          else
              return ['value'=>'No Result Found'];
    }
}
