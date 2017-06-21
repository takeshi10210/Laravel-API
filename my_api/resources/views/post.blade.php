@extends('tample')
@section('content')
    
<form method="post">{{csrf_field()}}
<table>
		<tr>
			<th colspan="2" style="text-align: center;"><h4>新增文章</th>
		</tr>
		<tr>
			<td>文章人:</td>
			<td><input type="text" readonly="{{$user_n}}" class="form-control" name="nw_name"></td>
		</tr>
		<tr>
			<td>類別:</td>
			<td>
				<select name="sel" class="form-control">
				  <option value="心得">心得</option>
				  <option value="問題">問題</option>
				  <option value="討論">討論</option>
				  <option value="分享">分享</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>文章內容:</td>
			<td><textarea name="nw_text" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:right;">
			<input type="submit" name="sent" class="btn btn-success btn-sm" value="送出"></td>
		</tr>
	</table>
</form>

@stop