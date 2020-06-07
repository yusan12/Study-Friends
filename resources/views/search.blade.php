<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link href="typeahead.js-bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
    <h1>Search Name by Auto Complete</h1>
    <input type="text" class="typeahead form-control" name="name">
  </div>
  <script type="text/javascript">
    var path="{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
      source:function (query,process){
        return $.get(path,{query:name,function (data) {
          return process(data);

        });
      }
    });
  </script>
</body>
</html>