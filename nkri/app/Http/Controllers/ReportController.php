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
use App\Models\Purchase;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Barryvdh\DomPDF\Facade;


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

        $lapHar = Order::where('tanggal','=',"$tgl")
        ->where('status','=','cash')
        ->with('OrderItem')
        ->with('Pembayaran')
        ->get();
       //dd($lapHar);
            $data=array( );
            $totHar=0;
            $totBar=0;
            $laba=0;
            $totLab=0;
        foreach ($lapHar as $key => $value) {
            //dd($value->toArray());
            $data[]=array( 

                    'id' =>$value['id'],
                    'nama_customer' =>$value['nama_customer'], 
                    'code_order' =>$value['code_order'], 
                    'jumlah_barang' =>$value['jumlah_barang'], 
                    'total' =>$value['total'], 
                    'total_laba'=>$value['total_laba'],
                    'status' =>$value['status'], 
                    'tanggal' =>$value['tanggal']

                );
            $totBar += $value['jumlah_barang'];
            $totHar += $value['total'];
            $totLab += $value['total_laba'];
            $laba += $value['total_laba'];
            $totLab=$totHar-$laba;
        }

   //dd($totLab);

        // return redirect(route('reports.index'))
        return view('admin.reports.lapHar')
                ->with('lapHar',$lapHar)
                ->with('data',$data)
                ->with('totBar',$totBar)
                ->with('totLab',$totLab)
                ->with('totHar',$totHar)
                ->with('tgl',$tgl);


    }

    public function ExportExPJ(Request $request){
        $inp=$request->all();
        //dd($inp);
        
         $tgl = $request->tgl;


        //excelScript
        @\Excel::create('Laporan_PJ_Harian'.$tgl.'',function($excel)use($request){
                $excel->sheet('lapHarSheet',function($sheet)use($request){


              $tgl = $request->tgl;
        //dd($tgl);

        $lapHarEx = Order::where('tanggal','=',"$tgl")
        ->where('status','=','cash')
        ->with('OrderItem')
        ->with('Pembayaran')
        ->get();
       //dd($lapHar);
            $data=array( );
            $totHar=0;
            $totBar=0;
            $laba=0;
            $totLab=0;
        foreach ($lapHarEx as $key => $value) {
            //dd($value->toArray());
            $dataEx[]=array( 

                    'id' =>$value['id'],
                    'nama_customer' =>$value['nama_customer'], 
                    'code_order' =>$value['code_order'], 
                    'jumlah_barang' =>$value['jumlah_barang'], 
                    'total' =>$value['total'], 
                    'total_laba'=>$value['total_laba'],
                    'status' =>$value['status'], 
                    'tanggal' =>$value['tanggal']

                );
            $totBar += $value['jumlah_barang'];
            $totHar += $value['total'];
            $laba += $value['total_laba'];
            $totLab=$totHar-$laba;
        }
               //dd($totLab);
        $lapHarAr=$lapHarEx->toArray();
                    
                     $sheet->loadView('admin.reports.lapHarSheet')
                       ->setWidth(array(
                                    'A'     =>  10,
                                    'B'     =>  25,
                                    'C'     => 25,
                                    'D'     => 25,
                                    'E'     => 25,
                                    'F'     => 25,
                                    'G'     => 35,
                                    'H'     => 25,
                                    'I'     => 25,
                                    'J'     => 25,
                                    'K'     => 25,
                                    'L'     => 25 
                                ))

                       ->with('lapHarEx',$lapHarEx)
                       ->with('dataEx',$dataEx)
                       ->with('totBar',$totBar)
                       ->with('totHar',$totHar)
                       ->with('totLab',$totLab)
                       ->with('tgl',$tgl);

                       



                });
            }
        )->export('xls');

        //EndExcel 


    }
//PJ BUlanan
        public function lapBul(Request $request){
        $input = $request->all();
        //dd($input);

       
        $start= $request->start;
        
        $end= $request->end;

        $lapBul = Order::whereBetween('tanggal',[$start,$end])
        ->where('status','=','cash')
        ->with('OrderItem')
        ->with('Pembayaran')
        ->get();
       //dd($lapBul);
            $data=array( );
            $totHar=0;
            $totBar=0;
            $laba=0;
            $totLab=0;
        foreach ($lapBul as $key => $value) {
            //dd($value->toArray());
            $data[]=array( 

                    'id' =>$value['id'],
                    'nama_customer' =>$value['nama_customer'], 
                    'code_order' =>$value['code_order'], 
                    'jumlah_barang' =>$value['jumlah_barang'], 
                    'total' =>$value['total'], 
                    'total_laba'=>$value['total_laba'],
                    'status' =>$value['status'], 
                    'tanggal' =>$value['tanggal']

                );
            $totBar += $value['jumlah_barang'];
            $totHar += $value['total'];
            $totLab += $value['total_laba'];
            $laba += $value['total_laba'];
            $totLab=$totHar-$laba;
        }

   //dd($totLab);

        // return redirect(route('reports.index'))
        return view('admin.reports.lapBul')
                ->with('lapBul',$lapBul)
                ->with('data',$data)
                ->with('totBar',$totBar)
                ->with('totLab',$totLab)
                ->with('totHar',$totHar)
                ->with('start',$start)
                ->with('end',$end);


    }

    public function ExportExPJB(Request $request){
        $inp=$request->all();
        //dd($inp);
        
        $start= $request->start;
        $end= $request->end;



        //excelScript
        @\Excel::create('Laporan_PJ_bulanan'.$start.'sd'.$end.'',function($excel)use($request){
                $excel->sheet('lapBulSheet',function($sheet)use($request){


            $start= $request->start;
            $end= $request->end;
        //dd($tgl);

        $lapBulEx = Order::whereBetween('tanggal',[$start,$end])
        ->where('status','=','cash')
        ->with('OrderItem')
        ->with('Pembayaran')
        ->get();
       //dd($lapBul);
            $data=array( );
            $totHar=0;
            $totBar=0;
            $laba=0;
            $totLab=0;
        foreach ($lapBulEx as $key => $value) {
            //dd($value->toArray());
            $dataEx[]=array( 

                    'id' =>$value['id'],
                    'nama_customer' =>$value['nama_customer'], 
                    'code_order' =>$value['code_order'], 
                    'jumlah_barang' =>$value['jumlah_barang'], 
                    'total' =>$value['total'], 
                    'total_laba'=>$value['total_laba'],
                    'status' =>$value['status'], 
                    'tanggal' =>$value['tanggal']

                );
            $totBar += $value['jumlah_barang'];
            $totHar += $value['total'];
            $laba += $value['total_laba'];
            $totLab=$totHar-$laba;
        }
               //dd($totLab);
        $lapBulAr=$lapBulEx->toArray();
                    
                     $sheet->loadView('admin.reports.lapBulSheet')
                       ->setWidth(array(
                                    'A'     =>  10,
                                    'B'     =>  25,
                                    'C'     => 25,
                                    'D'     => 25,
                                    'E'     => 25,
                                    'F'     => 25,
                                    'G'     => 35,
                                    'H'     => 25,
                                    'I'     => 25,
                                    'J'     => 25,
                                    'K'     => 25,
                                    'L'     => 25 
                                ))

                       ->with('lapBulEx',$lapBulEx)
                       ->with('dataEx',$dataEx)
                       ->with('totBar',$totBar)
                       ->with('totHar',$totHar)
                       ->with('totLab',$totLab)
                       ->with('start',$start)
                       ->with('end',$end);

                       



                });
            }
        )->export('xls');

        //EndExcel 


    }
//end PJ bulanan


    public function lapPG(Request $request){
        $input = $request->all();
        //dd($input);
        $start= $request->start;
        $end= $request->end;
        //dd($start);

        $lapPG = Purchase::whereBetween('tanggal', [$start, $end])
        ->get();
       //dd($lapPG);
            $data=array( );
            $totHar=0;
            $totBar=0;
            $totLab=0;
        foreach ($lapPG as $key => $value) {
            //dd($value->toArray());
            $data[]=array( 

                'id' => $value['id'],
                'nama_supplier' => $value['nama_supplier'],
                'code_supplier' => $value['code_supplier'],
                'jumlah_barang' => $value['jumlah_barang'],
                'total' => $value['total'],
                'deskripsi' => $value['deskripsi'],
                'status' => $value['status'],
                'tanggal' => $value['tanggal'],

                );
            $totBar += $value['jumlah_barang'];
            $totHar += $value['total'];
            
        }

   //dd($data);

        // return redirect(route('reports.index'))
        return view('admin.reports.lapPG')
                ->with('lapPG',$lapPG)
                ->with('data',$data)
                ->with('totBar',$totBar)
                ->with('totHar',$totHar)
                ->with('start',$start)
                ->with('end',$end);


    }

    public function ExportExPG(Request $request){
        $inp=$request->all();
        //dd($inp);
       $start= $request->start;
        $end= $request->end;

        //excelScript
        @\Excel::create('Laporan_Pengeluaran'.$start.'sd'.$end.'',function($excel)use($request){
                $excel->sheet('iteminSheetR',function($sheet)use($request){

        $start= $request->start;
        $end= $request->end;
        $lapPGEx = Purchase::whereBetween('tanggal', [$start, $end])
        ->get();
       //dd($lapPG);
            $data=array( );
            $totHar=0;
            $totBar=0;
            $totLab=0;
        foreach ($lapPGEx as $key => $value) {
            //dd($value->toArray());
            $dataEx[]=array( 

                'id' => $value['id'],
                'nama_supplier' => $value['nama_supplier'],
                'code_supplier' => $value['code_supplier'],
                'jumlah_barang' => $value['jumlah_barang'],
                'total' => $value['total'],
                'deskripsi' => $value['deskripsi'],
                'status' => $value['status'],
                'tanggal' => $value['tanggal'],

                );
            $totBar += $value['jumlah_barang'];
            $totHar += $value['total'];
            
        }
        //dd($totBar);
               
        $lapPGAr=$lapPGEx->toArray();
                    
                     $sheet->loadView('admin.reports.lapPGSheet')
                       ->setWidth(array(
                                    'A'     =>  10,
                                    'B'     =>  25,
                                    'C'     => 25,
                                    'D'     => 25,
                                    'E'     => 25,
                                    'F'     => 25,
                                    'G'     => 35,
                                    'H'     => 25,
                                    'I'     => 25,
                                    'J'     => 25,
                                    'K'     => 25,
                                    'L'     => 25 
                                ))

                       ->with('lapPGEx',$lapPGEx)
                       ->with('dataEx',$dataEx)
                       ->with('totBar',$totBar)
                       ->with('totHar',$totHar)
                       ->with('start',$start)
                       ->with('end',$end);

                       



                });
            }
        )->export('xls');

        //EndExcel 


    }

}
