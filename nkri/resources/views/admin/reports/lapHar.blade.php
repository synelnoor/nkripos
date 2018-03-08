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
            <thead  style="background-color:#ffdf80">
               
                <th>Nama Customer</th>
                <th>Kode Order</th>
                <th>QTY</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Tipe</th>
                <th>Total</th>
            </thead>
         @foreach($lapHar as $key=>$item)
       {{--dd($item)--}}
          <tr class="trbody">
           <td style="background-color:#999966">
           {!! Form::text('nama_customer',$item->nama_customer, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!} 
            </td>
           <td style="background-color:#999966">
           {!! Form::text('code_order',$item->code_order, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  
           </td>
           <td style="background-color:#999966">
           {!! Form::text('jumlah_barang',$item->jumlah_barang, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!} 
            </td>
           <td style="background-color:#999966">{!! Form::text('status',$item->status, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
            <td style="background-color:#999966">{!! Form::text('tanggal',$item->tanggal, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
            <td style="background-color:#999966">{!! Form::text('tipe',$item->Pembayaran->tipe_pembayaran, ['class' => 'form-control','readonly'] ) !!}  </td>
            <td style="background-color:#999966">{!! Form::text('total',$item->total, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>

            <thead style="background-color:#ffdf80">          
                  <th>code barang</th> 
                  <th>nama barang</th> 
                  <th>qty</th> 
                  <th>harga </th>
                  <th>subtotal </th>
                  <!-- <th>laba</th>  -->
            </thead>
            @foreach($item->OrderItem as $k=>$val)
              {{--dd($val)--}}
              <tr>
                  <td style="background-color:#ccc">{{$val->code_barang}}</td>
                  <td style="background-color:#ccc">{{$val->nama_barang}}</td>
                  <td style="background-color:#ccc">{{$val->qty}}</td>
                  <td style="background-color:#ccc">{{$val->harga}}</td>
                  <td style="background-color:#ccc">{{$val->subtotal}}</td>
              </tr>
            @endforeach
           
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

<!-- TOTAL Laba -->
<div class="form-group col-sm-6 ">
    {!! Form::label('totLab', 'Laba :') !!}
    {!! Form::text('totLab',number_format($totLab, 2)  , ['class' => 'form-control totalLaba','id'=>'totalLaba','readonly'] ) !!}
</div>

  {{-- Form::open(['url' => 'excelPJH']) --}}
  {!! Form::open(['route'=>'reports.lapHarSheet'])!!}
<div class="form-group col-sm-6">
    {!! Form::hidden('tgl',$tgl,['class'=>'form-control'])!!}
  <!-- <a  class="btn btn-success">Export Excel</a> -->
  {!! Form::submit('Export', ['class' => 'btn btn-success']) !!}

</div>

{!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
@endsection
