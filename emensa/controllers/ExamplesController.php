<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');

class ExamplesController
{
    public function m4_7a_queryparameter(RequestData $rd) {
        /*
           Wenn Sie hier landen:
           bearbeiten Sie diese Action,
           so dass Sie die Aufgabe löst
        */

        return view('examples.m4_7a_queryparameter', [
            'request'=>$rd,
            'name' => 'Der Wert von ?name lautet: <name>',
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
        ]);
    }
    public function m4_7b_kategorie(RequestData $rd){
        $kategorie = db_kategorie_select_all();
        return view('examples.m4_7b_kategorie',[
           'kategorie' => $kategorie
        ]);
    }
    public function m4_7c_gerichte(RequestData $rd){
        $gerichte = db_gericht_select_all();
        return view('examples.m4_7c_gerichte',[
            'gerichte' => $gerichte
        ]);
    }
    public function layout(RequestData $rd){
        isset($_GET);
        $no = $_GET["no"];

        if ($no == 2) {
            return view('examples.pages.m4_7d_page_2', [

                'request' => $rd,
                'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
            ]);
        }
        return view('examples.pages.m4_7d_page_1', [

            'request' => $rd,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
        ]);
    }
}