@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Reports</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('reports.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                            <h1>Cek Laporan Harian</h1>
                         {!! Form::open(['url' => 'cek']) !!}
                         <?php
                            $dt = \Carbon\Carbon::now();
                            ?>
                            <div class="form-group col-sm-6">
                                {!! Form::label('tanggal', 'Tanggal:') !!}
                                {!! Form::date('tanggal', $dt, ['class' => 'form-control']) !!}
                            </div>
                                <div class="form-group col-sm-12">
                                  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                </div>
                         {!! Form::close() !!}
                               <!--  @include('admin.reports.table') -->
                        </div>
                        </div>


                    </div>
            </div>
        </div>
    </div>
@endsection

