<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $purchase->id !!}</p>
</div>

<!-- Nama Supplier Field -->
<div class="form-group">
    {!! Form::label('nama_supplier', 'Nama Supplier:') !!}
    <p>{!! $purchase->nama_supplier !!}</p>
</div>

<!-- Code Supplier Field -->
<div class="form-group">
    {!! Form::label('code_supplier', 'Code Supplier:') !!}
    <p>{!! $purchase->code_supplier !!}</p>
</div>

<!-- Jumlah Barang Field -->
<div class="form-group">
    {!! Form::label('jumlah_barang', 'Jumlah Barang:') !!}
    <p>{!! $purchase->jumlah_barang !!}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{!! $purchase->total !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $purchase->status !!}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{!! $purchase->tanggal !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $purchase->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $purchase->updated_at !!}</p>
</div>

