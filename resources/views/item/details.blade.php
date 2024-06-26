<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>商品管理システム</title>
</head>

<body>
@include('parts.nav')

<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('update') }}" method="POST">
            @csrf
            <div class="form-group text-center">
                @if($errors->has('id'))
                    @foreach($errors->get('id') as $message)
                        <h6 class="text-danger">{{ $message }}</h6>
                    @endforeach
                @endif 

                <h2>購入商品詳細画面</h2>

                <div class="row" style="margin-top: 50px;">
                    <div class="col-md">
                        <div><label>商品名</label></div>
                        <div class="form-group">
                            
                        {{ $histories->name }}

                        </div>
                        <div><label>種別</label></div>
                        <div class="form-group">
                            

                                @if($histories->type == 1)
                                    食料品
                                @elseif($histories->type == 2)
                                    衛生用品
                                @elseif($histories->type == 3)
                                    衣類
                                @elseif($histories->type == 4)
                                    医療品
                                @elseif($histories->type == 5)
                                    情報機器
                                @elseif($histories->type == 6)
                                    その他
                                @endif
                            

                        </div>
                        <div><label>詳細</label></div>
                        <div class="form-group">
                            
{{ $histories->detail }}

                        </div>
                        <input type="hidden" name="id" value="{{ $histories->id }}">
                    </div>
                    <div class="col-md">
                        <div><label>購入日時</label></div>
                        <div class="form-group">
                            
{{ $histories->created_at }}

                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </form>
    </div>
</div>
    
<button type="button" class="btn btn-primary" onclick="location.href='{{ route('historys') }}'">一覧に戻る</button>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>