@extends('layouts.app')

@section('content')
    {{--<section class="content-header">
        <h1 class="pull-left">Reports</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('reports.create') !!}">Add New</a>
        </h1>
    </section>--}}
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <!-- Laporan Harian Penjualan -->
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                        <div class="row">
                                <div class="form-group col-sm-12">
                                <h1>Cek Laporan Harian Penjualan</h1>
                                {!! Form::open(['url' => 'cekPJ']) !!}
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
        <!-- endLHPJ -->
         <!-- Laporan Bulanan Penjualan  -->
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                        <div class="row">
                                <div class="form-group col-sm-12">
                                <h1>Cek Laporan Penjualan Bulanan</h1>
                                {!! Form::open(['url' => 'cekPJB']) !!}
                                <?php
                                $dt = \Carbon\Carbon::now();
                                ?>
                                <div class="form-group col-sm-8">
                                    <div class="form-group col-sm-4 ">
                                        <label for="start">Dari Tanggal :</label>
                                        <input type="date" name="start" class="form-control" id="start" value="{{ old('start', date('Y-m-d')) }}" >
                                        @if($errors->has('start'))
                                        <div class="alert text-danger">{{$errors->first('start')}}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-sm-4 ">
                                        <label for="end">Sampai Tanggal :</label>
                                        <input type="date" name="end" class="form-control" id="end" value="{{ old('end', date('Y-m-d')) }}" >
                                        @if($errors->has('end'))
                                        <div class="alert text-danger">{{$errors->first('end')}}</div>
                                        @endif
                                    </div>
                                    
                                </div>
                                    <div class="form-group col-sm-12">
                                      {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                    </div>
                                {!! Form::close() !!}
                
                                </div>
                        </div>


            </div>
        </div>
        <!-- endLHPG -->
         <!-- Laporan Harian Pengeluaran -->
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                        <div class="row">
                                <div class="form-group col-sm-12">
                                <h1>Cek Laporan Pengeluaran</h1>
                                {!! Form::open(['url' => 'cekPG']) !!}
                                <?php
                                $dt = \Carbon\Carbon::now();
                                ?>
                                <div class="form-group col-sm-8">
                                    <div class="form-group col-sm-4 ">
                                        <label for="start">Dari Tanggal :</label>
                                        <input type="date" name="start" class="form-control" id="start" value="{{ old('start', date('Y-m-d')) }}" >
                                        @if($errors->has('start'))
                                        <div class="alert text-danger">{{$errors->first('start')}}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-sm-4 ">
                                        <label for="end">Sampai Tanggal :</label>
                                        <input type="date" name="end" class="form-control" id="end" value="{{ old('end', date('Y-m-d')) }}" >
                                        @if($errors->has('end'))
                                        <div class="alert text-danger">{{$errors->first('end')}}</div>
                                        @endif
                                    </div>
                                    
                                </div>
                                    <div class="form-group col-sm-12">
                                      {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                    </div>
                                {!! Form::close() !!}
                
                                </div>
                        </div>


            </div>
        </div>
        <!-- endLHPG -->


        </div>
    </div>
@endsection

