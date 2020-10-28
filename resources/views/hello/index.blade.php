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
    <table>
        <tr>
        <th>Name</th>Mail</th><th>Age</th></tr>
        @foreach ($item as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->mail}}</td>
                <td>{{$item->age}}</td>
            </tr>
        @endforeach
    </table>
        <!-- <p>{{$msg}}</p>
        @if (count($errors) > 0)
            <p>入力に問題があります。再入力してください。</p>
        @endif
        <form action="/hello" method="post">
        <table>
            @csrf
            @if ($errors->has('msg'))
            <tr><th>ERROR</th><td>{{$errors->first('msg')}}</td></tr>
            @endif
            <tr><th>Message: </th><td><input type="text" name="msg"
                value="{{old('msg')}}"></td></tr>
            <tr><th></th><td><input type="submit" value="send">
                </td></tr>
        
        </table>
        </form> -->
@endsection
