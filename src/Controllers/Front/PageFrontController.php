<?php

namespace Foostart\Page\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Page\Models\Pages;

class PageFrontController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_page = new Pages();
        $pages = $obj_page->get_pages();
        $this->data = array(
            'request' => $request,
            'pages' => $pages
        );
        return view('page::page.index', $this->data);
    }

}