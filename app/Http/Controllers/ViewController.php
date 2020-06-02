<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function unless()
    {
        return view('view.unless',[
            'random'=>random_int(0,100)
        ]);
    }

    public function isset()
    {
        return view('view.isset',[
            'msg'=>'こんにちは、世界！',
        ]);
    }
    public function switch()
    {
        return view('view.switch',[
            'random'=>random_int(1,5)
        ]);
    }
    public function while()
    {
        return view('view.while');
    }
}
