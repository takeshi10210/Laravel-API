<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>留言板</title>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" >Laravel</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      @if(  strcmp($_SERVER['REQUEST_URI'],"/My1410532006/new") == 0)  
        <li><a href="./index">文章列表</a></li>
        <li class="active"><a href="/new">新增文章</a></li>
      @else
        <li class="active"><a href="./index">文章列表</a></li>
        <li><a href="./new">新增文章</a></li>
      @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> 登入</a></li>
    </ul>
    </div>
  </div>
</nav>
  @yield('content')
</body>
</html>