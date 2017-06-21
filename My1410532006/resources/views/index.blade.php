@extends('tample')
@section('content')
<div  class="container">
<form method="post">{{csrf_field()}} 
<div class="pull-right"><input type="submit" class="btn btn-danger" name="alldel" value="勾選刪除"></div>

<ul class="nav nav-tabs">
    @if(strcmp($sort,"") == 0)
    <li class="active">
    @else <li>
    @endif
    <a href=".">全部</a></li>

    @if(strcmp($sort,"心得") == 0)
    <li class="active">
    @else <li>
    @endif
    <a href="?sort=心得&page=1">心得</a></li>

    @if(strcmp($sort,"討論") == 0)
    <li class="active">
    @else <li>
    @endif
    <a href="?sort=討論&page=1">討論</a></li>

    @if(strcmp($sort,"問題") == 0)
    <li class="active">
    @else <li>
    @endif
    <a href="?sort=問題&page=1">問題</a></li>

    @if(strcmp($sort,"分享") == 0)
    <li class="active">
    @else <li>
    @endif
    <a href="?sort=分享&page=1">分享</a></li>
    
  <li>
  <li>
  <li>
</ul> 


<table class="table table-striped">
    <thead>
        <tr> 
            <th>選</th>
            <th width="180">功能</th>
            <th width="50">分類</th>
            <th width="100">發文時間</th>
            <th width="120">最後回應時間</th>
            <th width="100">發文人</th>
            <th>文章內容</th>
        </tr>
    </thead>

    @foreach($posts as $post)
    <tr>
        <td><input type="checkbox" name="no[]" value="{{$post->ar_id}}"></td>
        <td>
            @if(isset($edit_id))
                @if($edit_id == $post->ar_id)
                    <input type="submit" class="btn btn-success btn-sm" name="save[{{$post->ar_id}}]" value="儲存">
                    <input type="submit" class="btn btn-default btn-sm" value="取消">
                @else
                    <input type="submit" class="btn btn-primary btn-sm" name="edit[{{$post->ar_id}}]" value="編輯">
                    <input type="submit" class="btn btn-danger btn-sm" name="del[{{$post->ar_id}}]" value="刪除">
                    <input type="button" class="btn btn-info btn-sm" onclick="location.href='./re?id={{$post->ar_id}}&{{$_SERVER['QUERY_STRING']}}'" value="回覆">
                @endif
            @else
                <input type="submit" class="btn btn-primary btn-sm" name="edit[{{$post->ar_id}}]" value="編輯">
                <input type="submit" class="btn btn-danger btn-sm" name="del[{{$post->ar_id}}]" value="刪除">
                <input type="button" class="btn btn-info btn-sm" onclick="location.href='./re?id={{$post->ar_id}}&{{$_SERVER['QUERY_STRING']}}'" value="回覆">
            @endif
        </td>
        <td>{{$post->ar_sort}}</td>
        <td>{{$post->created_at}}</td>


        
        <td>
            @if($replyls!="[]")
                @foreach($replyls as $replyl)
                    {{$ch = false}}
                    @if($replyl->ar_id == $post->ar_id)
                        {{$replyl->created_at}}
                        @break
                    @else
                        <ul style="display:none">{{$ch = true}}</ul>
                    @endif
                @endforeach

                @if($ch)
                 尚無回應
                {{$ch = false}}
                @endif
            @else 
            尚無回應
            @endif
        </td>


        <td>
            @if(isset($edit_id))
                @if($edit_id == $post->ar_id)
                    <input type="text" name="ed_name" class="form-control" value="{{$post->ar_name}}">
                @else
                    {{$post->ar_name}}
                @endif
            @else
                {{$post->ar_name}}
            @endif
        </td>
        <td>
            @if(isset($edit_id))
                @if($edit_id == $post->ar_id)
                    <textarea rows="1" cols="100" class="form-control" name="ed_text"> {{$post->ar_text}}</textarea>
                @else
                    {{$post->ar_text}}
                @endif
            @else
                {{$post->ar_text}}
            @endif
        
        </td>
    </tr>
    @endforeach
</table>
{{ $posts->links() }}
</form>
</div>
@stop