<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $barang->id !!}</p>
</div>

<!-- Nama Barang Field -->
<div class="form-group">
    {!! Form::label('nama_barang', 'Nama Barang:') !!}
    <p>{!! $barang->nama_barang !!}</p>
</div>

<!-- Harga Beli Field -->
<div class="form-group">
    {!! Form::label('harga_beli', 'Harga Beli:') !!}
    <p>{!! $barang->harga_beli !!}</p>
</div>

<!-- Harga-Jual Field -->
<div class="form-group">
    {!! Form::label('harga_jual', 'Harga-Jual:') !!}
    <p>{!! $barang->harga_jual !!}</p>
</div>

<!-- Code Barang Field -->
<div class="form-group">
    {!! Form::label('code_barang', 'Code Barang:') !!}
    <p>{!! $barang->code_barang !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $barang->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $barang->updated_at !!}</p>
</div>

