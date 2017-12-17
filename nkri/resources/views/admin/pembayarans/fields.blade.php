<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('order_id', 'Order Id:') !!}
    {!! Form::hidden('order_id', $order->id, ['class' => 'form-control']) !!}
    {!! Form::label('code_order', 'Code Order:') !!}
    {!! Form::text('code_order', $order->code_order, ['class' => 'form-control','readonly']) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', null, ['class' => 'form-control']) !!}
</div>

<!-- OrderDetai -->
<div class="form-group col-sm-12">
    <div class="box-body table-responsive no-padding"  >
      <table class="table table-bordered" id="crud_table" border="3">
            <thead>
               
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Qty</th>
                <th>Harga Satuan</th>
                <th>total</th>
              <!--   <th>Aksi</th> -->
            </thead>
         @foreach($orderDetail as $key=>$item)
          <tr class="trbody">
           <td>{!! Form::text('jumlah_barang',$item->nama_barang, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
           <td>{!! Form::text('jumlah_barang',$item->code_barang, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
           <td>{!! Form::text('jumlah_barang',$item->qty, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
           <td>{!! Form::text('jumlah_barang',$item->harga, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
           <td>{!! Form::text('jumlah_barang',$item->subtotal, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  </td>
          </tr>
          @endforeach


    </table>


           <div class="form-group col-sm-8 pull-right">
  
            <!-- Jumlah barang  -->
            <div class="form-group col-sm-6 ">
                {!! Form::label('jumlah_barang', 'Jumlah Barang:') !!}
                {!! Form::text('jumlah_barang',$order->jumlah_barang, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  
            </div>


            <!-- TOTAL Harga -->
            <div class="form-group col-sm-6 ">
                {!! Form::label('total', 'Total Harga:') !!}
                {!! Form::text('total',$order->total, ['class' => 'form-control total','id'=>'total','readonly'] ) !!}
            </div>


            </div>

     <div>
    
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipe_pembayaran', 'Tipe Pembayaran:') !!}
    {!! Form::select('tipe_pembayaran', [ 'tunai' => 'tunai','debet' => 'debet'], null, ['class' => 'form-control']) !!}
</div>

<!-- Bayar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bayar', 'Bayar:') !!}
    {!! Form::text('bayar', null, ['class' => 'form-control','id'=>'num1']) !!}
</div>

<!-- Kembalian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kembalian', 'Kembalian:') !!}
    {!! Form::text('kembalian', null, ['class' => 'form-control','id'=>'kembalian','readonly']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', $order->total, ['class' => 'form-control','id'=>'num2','readonly']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pembayarans.index') !!}" class="btn btn-default">Cancel</a>
</div>


@section('scripts')
<script>
   $(document).ready(function() {
    //this calculates values automatically 
    sum();
    $("#num1, #num2").on("keydown keyup", function() {
        sum();
    });
});

   function sum() {
            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
            var result = parseInt(num1) - parseInt(num2);
            // var result1 = parseInt(num2) - parseInt(num1);
            if (!isNaN(result)) {
                document.getElementById('kembalian').value = result;
                // document.getElementById('subt').value = result1;
            }
        }

</script>

@stop