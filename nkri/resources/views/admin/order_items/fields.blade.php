<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Order_id', 'Order Id:') !!}
    {!! Form::text('Order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_barang', 'Code Barang:') !!}
    {!! Form::text('code_barang', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_barang', 'Nama Barang:') !!}
    {!! Form::text('nama_barang', null, ['class' => 'form-control']) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', 'Qty:') !!}
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::text('harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::text('jumlah', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orderItems.index') !!}" class="btn btn-default">Cancel</a>
</div>
