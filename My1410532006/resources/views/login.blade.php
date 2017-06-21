@extends('tample')
@section('content')
    
<form method="post">{{csrf_field()}}
<table class="container" >
		<tr>
			<td>帳號:</td>
			<td><input type="text" cols="10" class="form-control" name="email"></td>
		</tr>
		<tr>
			<td>密碼:</td>
			<td><input type="password" cols="20" class="form-control" name="password"></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:right;">
			<button type="submit" id="btn" class="btn btn-success btn-sm">登入</button>
			</td>
		</tr>
	</table>

</form>
<script>
	    
</script>

@stop