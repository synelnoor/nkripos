<?php

namespace App\Http\Controllers;

use App\DataTables\ReportDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Repositories\ReportRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pembayaran;
use Carbon\Carbon;

class ReportController extends AppBaseController
{
    /** @var  ReportRepository */
    private $reportRepository;

    public function __construct(ReportRepository $reportRepo)
    {
        $this->reportRepository = $reportRepo;
    }

    /**
     * Display a listing of the Report.
     *
     * @param ReportDataTable $reportDataTable
     * @return Response
     */
    public function index(ReportDataTable $reportDataTable)
    {
        $data='';
     return $reportDataTable->render('admin.reports.index')
                ->with('data',$data);
      
    }
   

    /**
     * Show the form for creating a new Report.
     *
     * @return Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created Report in storage.
     *
     * @param CreateReportRequest $request
     *
     * @return Response
     */
    public function store(CreateReportRequest $request)
    {
        $input = $request->all();

        $report = $this->reportRepository->create($input);

        Flash::success('Report saved successfully.');

        return redirect(route('reports.index'));
    }

    /**
     * Display the specified Report.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $report = $this->reportRepository->findWithoutFail($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        return view('reports.show')->with('report', $report);
    }

    /**
     * Show the form for editing the specified Report.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $report = $this->reportRepository->findWithoutFail($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        return view('reports.edit')->with('report', $report);
    }

    /**
     * Update the specified Report in storage.
     *
     * @param  int              $id
     * @param UpdateReportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportRequest $request)
    {
        $report = $this->reportRepository->findWithoutFail($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        $report = $this->reportRepository->update($request->all(), $id);

        Flash::success('Report updated successfully.');

        return redirect(route('reports.index'));
    }

    /**
     * Remove the specified Report from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $report = $this->reportRepository->findWithoutFail($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        $this->reportRepository->delete($id);

        Flash::success('Report deleted successfully.');

        return redirect(route('reports.index'));
    }

    public function lapHar(Request $request){
        $input = $request->all();
        $tgl= $request->tanggal;

        //dd($tgl);
        $lapHar = Order::where('tanggal','=',"$tgl")
        ->where('status','=','cash')
        ->get();
        //dd($lapHar->toArray());
            $data=array( );
            $totHar=0;
            $totBar=0;
        foreach ($lapHar as $key => $value) {
            $data[]=array( 

                    'id' =>$value['id'],
                    'nama_customer' =>$value['nama_customer'], 
                    'code_order' =>$value['code_order'], 
                    'jumlah_barang' =>$value['jumlah_barang'], 
                    'total' =>$value['total'], 
                    'status' =>$value['status'], 
                    'tanggal' =>$value['tanggal']

                );
            $totBar += $value['jumlah_barang'];
            $totHar += $value['total'];
        }

   //dd($totHar);

        // return redirect(route('reports.index'))
        return view('admin.reports.lapHar')
                ->with('lapHar',$lapHar)
                ->with('data',$data)
                ->with('totBar',$totBar)
                ->with('totHar',$totHar);


    }

    public function ExportExPJ(Request $request){
        $inp=$request->all;

    }
}
