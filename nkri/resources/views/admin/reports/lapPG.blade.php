@extends('layouts.app')

@section('content')


<div class="content">

<h1>Laporan Pengeluaran </h1>
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
 
 <!-- OrderDetai -->
<div class="form-group col-sm-12">
    <div class="box-body table-responsive no-padding"  >
      <table class="table table-bordered" id="crud_table" border="3">
            <thead  style="background-color:#999966">
               
                <th>Nama Supplier</th>
                <th>Kode Supplier</th>
                <th>QTY</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Total</th>
            </thead>
         @foreach($lapPG as $key=>$item)
       {{--dd($item)--}}
          <tr class="trbody">
           <td style="background-color:#222d32">
           {!! Form::text('nama_supplier',$item->nama_supplier, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!} 
            </td>
           <td style="background-color:#222d32">
           {!! Form::text('code_supplier',$item->code_supplier, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  
           </td>
           <td style="background-color:#222d32">
           {!! Form::text('jumlah_barang',$item->jumlah_barang, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!} 
            </td>
           <td style="background-color:#222d32">{!! Form::text('status',$item->status, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
            <td style="background-color:#222d32">{!! Form::text('tanggal',$item->tanggal, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
            <td style="background-color:#222d32">{!! Form::textarea('deskripsi',$item->deskripsi, ['class' => 'form-control','readonly'] ) !!}  </td>
            <td style="background-color:#222d32">{!! Form::text('total',$item->total, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
           
          </tr>
          @endforeach


    </table>
   </div>
 </div>


<!-- Jumlah barang  -->
<div class="form-group col-sm-6 ">
    {!! Form::label('totBar', 'Total Barang :') !!}
    {!! Form::text('totBar',$totBar, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  
</div>


<!-- TOTAL Harga -->
<div class="form-group col-sm-6 ">
    {!! Form::label('totHar', 'Total :') !!}
    {!! Form::text('totHar',number_format($totHar, 2)  , ['class' => 'form-control total','id'=>'total','readonly'] ) !!}
</div>



  {{-- Form::open(['url' => 'excelPG']) --}}
  {!! Form::open(['route'=>'reports.lapPGSheet'])!!}
<div class="form-group col-sm-6">
    {!! Form::hidden('start',$start,['class'=>'form-control'])!!}
    {!! Form::hidden('end',$end,['class'=>'form-control'])!!}
  <!-- <a  class="btn btn-success">Export Excel</a> -->
  {!! Form::submit('Export', ['class' => 'btn btn-success']) !!}

</div>

{!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
@endsection
