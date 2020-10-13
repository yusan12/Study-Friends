<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

        global $head, $style,$body, $end;
        $head = '<html></html>';
        $style = <<<EOF
        <style>
        body {font-size:16px; color:#999; }
        h1 { font-size:100px; text-align:right; color:#eee;
            margin:-40px 0px -50px 0px; }
        </style>
        EOF;
        $body = '</head><body>';
        $end = '</body></html>';
        function tag($tag, $txt) {
            return "<{$tag}>" . $txt . "</{$tag}>";
        }

class HelloController extends Controller
{
    public function index() {
        global $head, $style,$body, $end;
        $html = $head . tag('title', 'Hello/Index') . $style .
            $body
            . tag('h1', 'index') . tag('p','this is Index page')
            . '<a href="/hello/other">go to Other page</a>'
            . $end;
        return $html;
    }

    public function other() {
        global $head, $style, $body, $end;

        $html = $head . tag('title', 'Hello/Other') . $style .
            $body
            . tag('h1','Other') . tag('p','this is Other page')
            . $end;
        return $html;
    }
}
