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
      <form class="form" method="POST" action="{{ route('store') }}"  enctype="multipart/form-data">
       @csrf
            <div class=" card-body">
            <div class="form-group form-group-last">

                  <div class="form-group">
                        <label>Nombre<span class="text-danger">*</span></label>
                        <input type="text" name="nombre" class="form-control form-control-lg" placeholder="Ingrese el Nombre del Documento" />
                  </div>
                  <div class="form-group mb-1">
                        <label for="exampleTextarea">Descripcion <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="descripcion" id="Textarea" rows="3"></textarea>
                  </div>
            </div>
            <div class="form-group">
                  <label for="exampleSelectd">Area</label>
                  <select name="area_id" class="form-control" id="exampleSelectd">
                        <option selected>Selecione Areaa la que pertenece el Doc</option>
                        @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->nombre}}</option>
                        @endforeach

                  </select>
            </div>
            <div class="form-group ">
                  <label for="fecha_vigencia" class="col-2 col-form-label">Fecha Vigencia<span class="text-danger">*</span></label>
                  <div class="col-2">
                        <input class="form-control" name="fecha_vigencia" type="date" value="2011-08-19" id="date-input" />
                  </div>
            </div>
            <div class="form-group">
                  <label for="exampleSelectl">Tipo documento</label>
                  <select name="tipodoc_id" class="form-control form-control-lg" id="exampleSelectl">
                        <option selected>Selecione tipo de Doccumento</option>
                        @foreach($tipodocs as $tipodoc)
                        <option value="{{$tipodoc->id}}">{{$tipodoc->nombre}}</option>
                        @endforeach
                  </select>
            </div>


            <div class="form-group">
                  <label>File Browser</label>
                  <div></div>
                  <div class="custom-file">
                        <input  type="file" name="urlpdf" class="custom-file-input" id="customFile" />
                        <label class="custom-file-label" for="customFile">Subir Documento</label>
                  </div>
            </div>
</div>

<div class="card-footer">
      <button type="submit" class="btn btn-success mr-2">Guardar</button>

</div>
</form>
<!--end::Form-->
</div>
<div class="card card-custom">
      <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                  <h3 class="card-label">HTML Table
                        <div class="text-muted pt-2 font-size-sm">Datatable initialized from HTML table</div>
                  </h3>
            </div>


      <div class="card-body">

            <!--begin::Search Form-->
            <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
                  <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                              <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                          <div class="input-icon">
                                                <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                                <span><i class="flaticon2-search-1 text-muted"></i></span>
                                          </div>
                                    </div>

                                    <div class="col-md-4 my-2 my-md-0">
                                          <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                                <select class="form-control" id="kt_datatable_search_status">
                                                      <option value="">Activo</option>
                                                      <option value="1">Inactivo</option>

                                                </select>
                                          </div>
                                    </div>

                              </div>
                        </div>
                        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                              <a href="{{route('estado')}}" class="btn btn-light-primary px-6 font-weight-bold">
                                    Search
                              </a>
                        </div>
                  </div>
            </div>
            <!--end::Search Form-->

            <table class="table ">
                  <thead class="text-primary">
                        <th> ID </th>
                        <th> Nombre </th>
                        <th> Descripcion</th>
                        <th> Tipo Documeto </th>
                        <th> Fecha de vigencia </th>
                        <th> Area </th>
                        <th> Estado </th>
                        <th> Version </th>
                        <th> Creado </th>
                        <th class="text-right"> Acciones </th>
                  </thead>
                  <tbody>
                        @forelse ($docs as $doc)
                        <tr>
                              <td>{{ $doc->id }}</td>
                              <td>{{ $doc->nombre }}</td>
                              <td>{{ $doc->descripcion}}</td>
                              <td>{{ $doc->tipodoc_id }}</td>
                              <td>{{ $doc->fecha_vigencia}}</td>
                              <td>{{ $doc->area_id }}</td>
                              <td>{{ $doc->estado }}</td>
                              <td>{{ $doc->version }}</td>
                              <td class="text-primary">{{ $doc->created_at->toFormattedDateString() }}</td>
                              <td class="td-actions text-right">


                                    <div class="dropdown dropdown-inline">
								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">
	                                <span class="svg-icon svg-icon-md">
	                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                            <rect x="0" y="0" width="24" height="24"/>
	                                            <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
	                                        </g>
	                                    </svg>
	                                </span>
	                            </a>
							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
	                                <ul class="navi flex-column navi-hover py-2">
	                                    <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
	                                        Choose an action:
	                                    </li>
	                                    <li class="navi-item">
	                                        <a href="#" class="navi-link">
	                                            <span class="navi-icon"><i class="la la-print"></i></span>
	                                            <span class="navi-text">Print</span>
	                                        </a>
	                                    </li>
	                                    <li class="navi-item">
	                                        <a href="#" class="navi-link">
	                                            <span class="navi-icon"><i class="la la-copy"></i></span>
	                                            <span class="navi-text">Copy</span>
	                                        </a>
	                                    </li>
	                                    <li class="navi-item">
	                                        <a href="#" class="navi-link">
	                                            <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
	                                            <span class="navi-text">Excel</span>
	                                        </a>
	                                    </li>
	                                    <li class="navi-item">
	                                        <a href="#" class="navi-link">
	                                            <span class="navi-icon"><i class="la la-file-text-o"></i></span>
	                                            <span class="navi-text">CSV</span>
	                                        </a>
	                                    </li>
	                                    <li class="navi-item">
	                                        <a href="{{ route('docs.download', $doc->uuid) }} " class="navi-link">

	                                            <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
	                                            <span class="navi-text">PDF</span>
	                                        </a>
	                                    </li>
	                                </ul>
							  	</div>
							</div>
                                   <a href="{{ route('docs.edit', $doc->id) }} " class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
	                            <span class="svg-icon svg-icon-md">
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
	                                    </g>
	                                </svg>
	                            </span>
							</a>


                                    </form>

                              </td>
                        </tr>
                        @empty
                        <tr>
                              <td colspan="2">Sin registros.</td>
                        </tr>
                        @endforelse
                  </tbody>
            </table>
      </div>

</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
