@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Purchase
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($purchase, ['route' => ['purchases.update', $purchase->id], 'method' => 'patch']) !!}

                        @include('admin.purchases.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection