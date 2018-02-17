@extends('layouts.app')

@section('content')


<div class="content">

<h1>Laporan Harian </h1>
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
 
 <!-- OrderDetai -->
<div class="form-group col-sm-12">
    <div class="box-body table-responsive no-padding"  >
      <table class="table table-bordered" id="crud_table" border="3">
            <thead>
               
                <th>Nama Customer</th>
                <th>Kode Order</th>
                <th>QTY</th>
                <th>Subtotal</th>
                <th>Status</th>
                <th>Tanggal</th>
            </thead>
         @foreach($lapHar as $key=>$item)
          <tr class="trbody">
           <td>
           {!! Form::text('nama_customer',$item->nama_customer, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!} 
            </td>
           <td>
           {!! Form::text('code_order',$item->code_order, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  
           </td>
           <td>
           {!! Form::text('jumlah_barang',$item->jumlah_barang, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!} 
            </td>
           <td>{!! Form::text('total',$item->total, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
           <td>{!! Form::text('status',$item->status, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
            <td>{!! Form::text('tanggal',$item->tanggal, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
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

<div class="form-group col-sm-6">
  <a href="" class="btn btn-success">Export Excel</a>
</div>




                    </div>
            </div>
        </div>
    </div>
@endsection
