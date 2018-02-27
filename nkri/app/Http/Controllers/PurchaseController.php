<?php

namespace App\Http\Controllers;

use App\DataTables\PurchaseDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Http\Requests\CreatePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Repositories\PurchaseRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Purchase;

use Carbon\Carbon;

class PurchaseController extends AppBaseController
{
    /** @var  PurchaseRepository */
    private $purchaseRepository;

    public function __construct(PurchaseRepository $purchaseRepo)
    {
        $this->purchaseRepository = $purchaseRepo;
    }

    /**
     * Display a listing of the Purchase.
     *
     * @param PurchaseDataTable $purchaseDataTable
     * @return Response
     */
    public function index(PurchaseDataTable $purchaseDataTable)
    {
        return $purchaseDataTable->render('admin.purchases.index');
    }

    /**
     * Show the form for creating a new Purchase.
     *
     * @return Response
     */
    public function create()
    {

        $codePo=$this->code();
        $action="create";

        return view('admin.purchases.create')
                    ->with('codePo',$codePo)
                    ->with('action',$action);
    }

    /**
     * Store a newly created Purchase in storage.
     *
     * @param CreatePurchaseRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseRequest $request)
    {
        $input = $request->all();

        $purchase = $this->purchaseRepository->create($input);

        Flash::success('Purchase saved successfully.');

        return redirect(route('purchases.index'));
    }

    /**
     * Display the specified Purchase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchase = $this->purchaseRepository->findWithoutFail($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('purchases.index'));
        }

        return view('admin.purchases.show')->with('purchase', $purchase);
    }

    /**
     * Show the form for editing the specified Purchase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchase = $this->purchaseRepository->findWithoutFail($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('purchases.index'));
        }

        return view('admin.purchases.edit')->with('purchase', $purchase);
    }

    /**
     * Update the specified Purchase in storage.
     *
     * @param  int              $id
     * @param UpdatePurchaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseRequest $request)
    {
        $purchase = $this->purchaseRepository->findWithoutFail($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('purchases.index'));
        }

        $purchase = $this->purchaseRepository->update($request->all(), $id);

        Flash::success('Purchase updated successfully.');

        return redirect(route('purchases.index'));
    }

    /**
     * Remove the specified Purchase from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchase = $this->purchaseRepository->findWithoutFail($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('purchases.index'));
        }

        $this->purchaseRepository->delete($id);

        Flash::success('Purchase deleted successfully.');

        return redirect(route('purchases.index'));
    }


    public function code(){
        $count = Purchase::all()->count();
        //dd($count);
        $ks = "POR";
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
        }elseif ($bulan==12) {
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

       // dd($xbulan);
           $num =$count+1;
       
        $nomor= $temp.$num.'/'.$ks.'/'.$xbulan.'/'.$tahun;
        return $nomor;
    }
}
