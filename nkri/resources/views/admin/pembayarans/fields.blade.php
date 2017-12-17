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
          <tr class="trbody">
            
            <td contenteditable="true" class="barang_id" style="display: none;">
             {!! Form::text('row[0][id]', null, ['class' => 'form-control id ','id'=>'id']) !!}
            {!! Form::text('row[0][barang_id]', null, ['class' => 'form-control barang_id search_text ','id'=>'barang_id']) !!}</td>
             <td contenteditable="true" class="nama_barang" >{!! Form::text('row[0][nama_barang]', null, ['class' => 'form-control search_text ','id'=>'nama_barang','readonly']) !!}</td>
            <td contenteditable="true" class="code_barang">
               {!! Form::text('row[0][code_barang]',null,['class'=>'form-control search_text ','id'=>'code_barang','readonly']) !!}
            </td>
            
            <td contenteditable="true" class="qty">
              {!! Form::text('row[0][qty]',null,['class'=>'form-control qty','id'=>'qty','readonly'])!!}
            </td>
            <td contenteditable="true" class="harga">
              {!! Form::text('row[0][harga]',null,['class'=>'form-control harga  ','id'=>'harga','readonly'])!!}
             </td>
            <td contenteditable="true" class="subtotal">
                  {!! Form::text('row[0][subtotal]',null,['class'=>'form-control subtotal ','id'=>'subtotal','readonly'])!!}
                 </td>
            <td>
              <button type='button' id="testbtn" name='test' class='btn btn-danger btn-xs test' style="display:none;">
                <i class='fa fa-trash'></i></button>
            </td>
          </tr>



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

<!-- Bayar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bayar', 'Bayar:') !!}
    {!! Form::text('bayar', null, ['class' => 'form-control']) !!}
</div>

<!-- Kembalian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kembalian', 'Kembalian:') !!}
    {!! Form::text('kembalian', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pembayarans.index') !!}" class="btn btn-default">Cancel</a>
</div>
