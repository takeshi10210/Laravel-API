@extends('tample')
@section('content')
<div  class="container">
<form method="post">{{csrf_field()}}

	<button type="button" class="btn btn-warning btn-sm" onclick="location.href='{{$burl}}'">
          <span class="glyphicon glyphicon-chevron-left"></span>返回
    </button>
	<table class="table">
		<thead>
			<tr class="info">
				<th width="100">發文人</th>
				<th width="150">發文時間</th>
				<th>文章內容</th>
			</tr>
		</thead>
			<tr class="active">
				<td>{{$post->ar_name}}</td>
				<td>{{$post->created_at }}</td>
				<td>{{$post->ar_text}}</td>
			</tr>
	</table>
	<br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="100">回覆暱稱</th>
				<th width="150">回覆時間</th>
				<th width="550">回覆內容</th>
				<th width="120">功能</th>
			</tr>
		</thead>
		@foreach($replys as $reply)
		<tr>
			<td>
				@if(isset($edit_id))
	                @if($edit_id == $reply->re_id)
	                    <input type="text" cols="80" name="ed_name" class="form-control" value="{{$reply->re_name}}">
	                @else
	                    {{$reply->re_name}}
	                @endif
	            @else
	                {{$reply->re_name}}
	            @endif
			
			</td>
			<td>{{$reply->created_at}}</td>
			<td>@if(isset($edit_id))
	                @if($edit_id == $reply->re_id)
	                    <textarea rows="1" cols="80" name="ed_text" class="form-control input-sm"> {{$reply->re_text}}</textarea>
	                @else
	                    {{$reply->re_text}}
	                @endif
	            @else
	                {{$reply->re_text}}
	            @endif</td>
			<td>
				@if(isset($edit_id))
	                @if($edit_id == $reply->re_id)
	                    <input type="submit" class="btn btn-success btn-sm" name="save[{{$reply->re_id}}]" value="儲存">
	                    <input type="submit" class="btn btn-default btn-sm" value="取消">
	                @else
	                    <input type="submit" class="btn btn-primary btn-sm" name="edit[{{$reply->re_id}}]" value="編輯">
	                    <input type="submit" class="btn btn-danger btn-sm" name="del[{{$reply->re_id}}]" value="刪除">
	                @endif
	            @else
	                <input type="submit" class="btn btn-primary btn-sm" name="edit[{{$reply->re_id}}]" value="編輯">
	                <input type="submit" class="btn btn-danger btn-sm" name="del[{{$reply->re_id}}]" value="刪除">
	            @endif
			</td>
		</tr>
		@endforeach
	</table>
	<div  class="container">	
	<table>
		<tr>
			<th colspan="4" style="text-align: center;"><h4>回覆此文章</th>
		</tr>
		<tr>
			<td>回覆暱稱:</td>
			<td><input type="text" class="form-control" name="nw_name"></td>
			<td>回覆內容:</td>
			<td><textarea name="nw_text" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:right;">
			<input type="submit" name="sent" class="btn btn-success btn-sm" value="送出"></td>
		</tr>
	</table>
	</div>
</form>
</div>
@stop