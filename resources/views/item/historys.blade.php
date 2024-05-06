<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org">
<head th:replace="header::head(~{::title})">
  <title>購入履歴</title>
</head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<body>
@include('parts.nav')

<div class="form-group text-center">
<h2>購入履歴</h2>
</div>
 <!-- 昇順・降順を切り替えるリンク -->
 <form action="/item/order_history">
        <button type="submit" name="change" value="1">昇順で表示</button>
        <button type="submit" name="change" value="2">降順で表示</button>
 </form>
 {{ $histories->links() }}
    <table class="table table-striped ">
    <tr>
      <th>ID</th>
      <th>商品名</th>
      <th>種別</th>
      <th>購入日時</th>
    </tr>
  </thead>
  <tbody>
              @foreach ($histories as $history)
              <tr>
                <td>{{ $history->id }}</td>
                <td>{{ $history->name }}</td>
                <td>
                @if($history->type == 1)
                    食料品
                @elseif($history->type == 2)
                    衛生用品
                @elseif($history->type == 3)
                    衣類
                @elseif($history->type == 4)
                    医療品
                @elseif($history->type == 5)
                    情報機器
                @elseif($history->type == 6)
                    その他
                @endif
                </td>
                <td>{{ $history->created_at }}</td>
                <td><a href="{{ route('details', ['id'=>$history->id]) }}" class="btn btn-info">詳細</a></td>
                <td>
                </td>
              </tr>
              @endforeach
            </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>