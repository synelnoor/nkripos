<?php

namespace App\Http\Controllers;

use App\DataTables\PembayaranDataTable;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreatePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Repositories\PembayaranRepository;
use App\Repositories\OrderRepository;
use App\Repositories\OrderItemRepository;
use App\Models\Barang;
use App\Models\Order;
use App\Models\OrderItem;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PembayaranController extends AppBaseController
{
    /** @var  PembayaranRepository */
    private $pembayaranRepository;
    private $orderRepository;
    private $orderItemRepository;

    public function __construct(PembayaranRepository $pembayaranRepo,OrderRepository $orderRepo,OrderItemRepository $orderItemRepo)
    {
        $this->pembayaranRepository = $pembayaranRepo;
        $this->orderRepository = $orderRepo;
        $this->orderItemRepository = $orderItemRepo;
    }

    /**
     * Display a listing of the Pembayaran.
     *
     * @param PembayaranDataTable $pembayaranDataTable
     * @return Response
     */
    public function index(PembayaranDataTable $pembayaranDataTable)
    {
        return $pembayaranDataTable->render('admin.pembayarans.index');
    }

    /**
     * Show the form for creating a new Pembayaran.
     *
     * @return Response
     */
    public function create(Request $request)
    {
             $order = $this->orderRepository->findWhere(['id' => $request->id])->first();
             $orderDetail= $this->orderItemRepository->findWhere(['order_id' =>  $request->id]);
         //dd($orderDetail);
        return view('admin.pembayarans.create')
                    ->with('order',$order)
                    ->with('orderDetail',$orderDetail)
                    ;
    }

    /**
     * Store a newly created Pembayaran in storage.
     *
     * @param CreatePembayaranRequest $request
     *
     * @return Response
     */
    public function store(CreatePembayaranRequest $request)
    {
         $order = $this->orderRepository->findWhere(['id' => $request->order_id])->first();
        $input = $request->all();


        //dd($order);
        //$pembayaran = $this->pembayaranRepository->create($input);
        $status=array('status' =>'cash');
        $order = $this->orderRepository->update($status,$order['id']);

        Flash::success('Pembayaran saved successfully.');

        return redirect(route('pembayarans.index'));
    }

    /**
     * Display the specified Pembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pembayaran = $this->pembayaranRepository->findWithoutFail($id);

        if (empty($pembayaran)) {
            Flash::error('Pembayaran not found');

            return redirect(route('pembayarans.index'));
        }

        return view('admin.pembayarans.show')->with('pembayaran', $pembayaran);
    }

    /**
     * Show the form for editing the specified Pembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pembayaran = $this->pembayaranRepository->findWithoutFail($id);

        if (empty($pembayaran)) {
            Flash::error('Pembayaran not found');

            return redirect(route('pembayarans.index'));
        }

        return view('admin.pembayarans.edit')->with('pembayaran', $pembayaran);
    }

    /**
     * Update the specified Pembayaran in storage.
     *
     * @param  int              $id
     * @param UpdatePembayaranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePembayaranRequest $request)
    {
        $pembayaran = $this->pembayaranRepository->findWithoutFail($id);

        if (empty($pembayaran)) {
            Flash::error('Pembayaran not found');

            return redirect(route('pembayarans.index'));
        }

        $pembayaran = $this->pembayaranRepository->update($request->all(), $id);

        Flash::success('Pembayaran updated successfully.');

        return redirect(route('pembayarans.index'));
    }

    /**
     * Remove the specified Pembayaran from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pembayaran = $this->pembayaranRepository->findWithoutFail($id);

        if (empty($pembayaran)) {
            Flash::error('Pembayaran not found');

            return redirect(route('pembayarans.index'));
        }

        $this->pembayaranRepository->delete($id);

        Flash::success('Pembayaran deleted successfully.');

        return redirect(route('pembayarans.index'));
    }
}
