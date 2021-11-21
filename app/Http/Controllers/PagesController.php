<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\TipoDoc;
use League\CommonMark\Block\Element\Document;

class PagesController extends Controller
{
    public function index()


    {



        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        $areas = Area::all();
        $tipodocs = TipoDoc::all();
        $docs= Documento::where('estado', '=', 'Activo')->paginate(10);
  /*       $docs = Documento::paginate(10); */
        return view('pages.dashboard', compact('page_title', 'page_description', 'docs', 'areas', 'tipodocs'));
    }

    public function estado()


    {



        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        $docs= Documento::where('estado', '=', 'Inactivo')->paginate(10);
       /*  $docs = Documento::paginate(10); */
        return view('pages.estado', compact('page_title', 'page_description', 'docs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return $request->file('urlpdf');
        $doc = $request->all();
        $doc['uuid'] = (string) Str::uuid();
        $doc['estado'] = "Activo";
        $doc['version'] = 1;

        if ($request->hasFile("urlpdf")) {

            $doc['urlpdf'] = time() . '_' . $request->file('urlpdf')->getClientOriginalName();
            $request->file('urlpdf')->storeAs('pdf', $doc['urlpdf']);
        }


        /*  dd($doc); */
        Documento::create($doc);
        return redirect()->route('dashoard')->with('message', 'Se ha creado un nuevo Documento');
    }

    public function download($uuid)
    {
        $doc = Documento::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path("app/public/pdf/" . $doc->urlpdf);
        return response()->download($pathToFile);
    }

    public function edit($id)
    {
        $doc = Documento::findOrFail($id);
        /*  dd($doc); */
        return view('pages.docedit', compact('doc'));
    }


    public function update(Request $request, $id)
    {



      $doc = Documento::findOrFail($id);


        $doc->update([
            $doc['estado'] = "Inactivo"

        ]);


        $new = $doc->replicate();


       $new['uuid'] = (string) Str::uuid();
        $new['estado'] = "Activo";
        $new['fecha_vigencia'] = $request->fecha_vigencia;
        $new['version'] = ++$doc->version;
      /*   $new['urlpdf'] = $request->urlpdf; */

      /* return $request->file('urlpdf');
      dd( $request->hasFile('urlpdf')); */

        if ($request->hasFile("urlpdf")) {

            $new['urlpdf'] = time() . '_' . $request->file('urlpdf')->getClientOriginalName();
            $request->file('urlpdf')->storeAs('pdf', $new['urlpdf']);
            /* dd($doc,$new,$request->hasFile("urlpdf")); */
       }


        $new->save();
       return redirect()->route('dashoard');
    }













    /**
     * Demo methods below
     */

    // Datatables
    public function datatables()
    {
        $page_title = 'Datatables';
        $page_description = 'This is datatables test page';

        return view('pages.datatables', compact('page_title', 'page_description'));
    }

    // KTDatatables
    public function ktDatatables()
    {
        $page_title = 'KTDatatables';
        $page_description = 'This is KTdatatables test page';

        return view('pages.ktdatatables', compact('page_title', 'page_description'));
    }

    // Select2
    public function select2()
    {
        $page_title = 'Select 2';
        $page_description = 'This is Select2 test page';

        return view('pages.select2', compact('page_title', 'page_description'));
    }

    // jQuery-mask
    public function jQueryMask()
    {
        $page_title = 'jquery-mask';
        $page_description = 'This is jquery masks test page';

        return view('pages.jquery-mask', compact('page_title', 'page_description'));
    }

    // custom-icons
    public function customIcons()
    {
        $page_title = 'customIcons';
        $page_description = 'This is customIcons test page';

        return view('pages.icons.custom-icons', compact('page_title', 'page_description'));
    }

    // flaticon
    public function flaticon()
    {
        $page_title = 'flaticon';
        $page_description = 'This is flaticon test page';

        return view('pages.icons.flaticon', compact('page_title', 'page_description'));
    }

    // fontawesome
    public function fontawesome()
    {
        $page_title = 'fontawesome';
        $page_description = 'This is fontawesome test page';

        return view('pages.icons.fontawesome', compact('page_title', 'page_description'));
    }

    // lineawesome
    public function lineawesome()
    {
        $page_title = 'lineawesome';
        $page_description = 'This is lineawesome test page';

        return view('pages.icons.lineawesome', compact('page_title', 'page_description'));
    }

    // socicons
    public function socicons()
    {
        $page_title = 'socicons';
        $page_description = 'This is socicons test page';

        return view('pages.icons.socicons', compact('page_title', 'page_description'));
    }

    // svg
    public function svg()
    {
        $page_title = 'svg';
        $page_description = 'This is svg test page';

        return view('pages.icons.svg', compact('page_title', 'page_description'));
    }

    // Quicksearch Result
    public function quickSearch()
    {
        return view('layout.partials.extras._quick_search_result');
    }
}
