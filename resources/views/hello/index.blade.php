<!-- <html>
<head>
  <title>Document</title>
  <style>
  body {font-size:16pt; color:#999; }
  h1 { font-size:50pt; text-align:right; color:#f6f6f6;
      margin:-20px 0px -30px 0px; letter-spacing:-4pt; }
  </style>
</head>
<body> -->
    @extends('layouts.helloapp')
    @section('title', 'Index')
    @section('menubar')
        @parent
        インデックスページ
    @endsection

    @section('content')
   <p>ここが本文のコンテンツです。</p>
   <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
   <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p>
@endsection

        