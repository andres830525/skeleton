{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

{{-- Dashboard 1 --}}

{{-- <div class="row">
        <div class="col-lg-6 col-xxl-4">
            @include('pages.widgets._widget-1', ['class' => 'card-stretch gutter-b'])
        </div>

        <div class="col-lg-6 col-xxl-4">
            @include('pages.widgets._widget-2', ['class' => 'card-stretch gutter-b'])
        </div>

        <div class="col-lg-6 col-xxl-4">
            @include('pages.widgets._widget-3', ['class' => 'card-stretch card-stretch-half gutter-b'])
            @include('pages.widgets._widget-4', ['class' => 'card-stretch card-stretch-half gutter-b'])
        </div>

        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-1">
            @include('pages.widgets._widget-5', ['class' => 'card-stretch gutter-b'])
        </div>

        <div class="col-xxl-8 order-2 order-xxl-1">
            @include('pages.widgets._widget-6', ['class' => 'card-stretch gutter-b'])
        </div>

        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">
            @include('pages.widgets._widget-7', ['class' => 'card-stretch gutter-b'])
        </div>

        <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">
            @include('pages.widgets._widget-8', ['class' => 'card-stretch gutter-b'])
        </div>

        <div class="col-lg-12 col-xxl-4 order-1 order-xxl-2">
            @include('pages.widgets._widget-9', ['class' => 'card-stretch gutter-b'])
        </div>
    </div> --}}
<div class="card card-custom">
      <div class="card-header">
            <h3 class="card-title">
                  Crear Nuevo documento
            </h3>
      </div>
      <!--begin::Form-->
       <form action="{{ route('doc.update', $doc->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
      {{-- <form class="form" method="POST" action="  /edit/{{$doc->id}} "  enctype=" multipart/form-data"> --}}
            {{-- {{ method_field('PUT') }} --}}
            @csrf
            {{-- <input name="_method" type="hidden" value="PUT"> --}}

            <div class=" card-body">
                  <div class="form-group form-group-last">

                        <div class="form-group">
                              <label>Nombre<span class="text-danger">*</span></label>
                              <input type="text" name="nombre" class="form-control form-control-lg" placeholder="Ingrese el Nombre del Documento" value="{{ $doc->nombre }}" disabled />
                        </div>
                        <div class="form-group mb-1">
                              <label for="exampleTextarea">Descripcion <span class="text-danger">*</span></label>
                              <textarea class="form-control" name="descripcion" id="Textarea" rows="3" disabled>{{ $doc->descripcion }}</textarea>
                        </div>
                  </div>

                  <div class="form-group ">
                        <label for="fecha_vigencia" class="col-2 col-form-label">Fecha Vigencia<span class="text-danger">*</span></label>
                        <div class="col-2">
                              <input class="form-control" name="fecha_vigencia" type="date" value="{{  $doc->fecha_vigencia }}" id="date-input" />
                        </div>
                  </div>


                  <div class="form-group" >
                        <label>File Browser</label>
                        <div></div>
                        <div class="custom-file">
                              <input type="file" name="urlpdf" class="custom-file-input" id="customFile" />
                              <label class="custom-file-label" for="customFile">Subir Documento</label>
                        </div>
                  </div>
            </div>

            <div class="card-footer">
                  <button type="submit" class="btn btn-success mr-2">Actualizar</button>

            </div>
      </form>

</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
