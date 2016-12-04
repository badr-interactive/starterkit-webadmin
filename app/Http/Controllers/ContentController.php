<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ContentFormRequest;
use App\Content;

class ContentController extends Controller
{
    function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function index(Request $request)
    {
        return response()->view('content.index');
    }

    public function form(Request $request)
    {
        return response()->view('content.form');
    }

    public function save(ContentFormRequest $request)
    {
        $this->content->title = $request->title;
        $this->content->text = $request->text;
        $this->content->caption = $request->caption;
        $this->content->save();

        return redirect()->route('content.index');
    }
}