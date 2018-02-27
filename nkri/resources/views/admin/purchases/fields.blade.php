<!-- Nama Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_supplier', 'Nama Supplier:') !!}
    {!! Form::text('nama_supplier', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Supplier Field -->
@if($action=="edit")
<div class="form-group col-sm-6">
    {!! Form::label('code_supplier', 'Code Supplier:') !!}
    {!! Form::text('code_supplier', null, ['class' => 'form-control']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('code_supplier', 'Code Supplier:') !!}
    {!! Form::text('code_supplier', $codePo, ['class' => 'form-control']) !!}
</div>
@endif

<!-- Jumlah Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_barang', 'Jumlah Barang:') !!}
    {!! Form::text('jumlah_barang', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>
<!-- deskripsi -->
<div class="form-group col-sm-6">
    {!! Form::label('deskripsi','Deskripsi:') !!}
    {!! Form::textarea('deskripsi',null,['class'=>'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('cash',[ 'pending' => 'pending','cash' => 'cash'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Field -->
<?php
$dt = \Carbon\Carbon::now();
?>
@if($action=="edit")
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', $purchase->tanggal, ['class' => 'form-control']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', $dt, ['class' => 'form-control']) !!}
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('purchases.index') !!}" class="btn btn-default">Cancel</a>
</div>
