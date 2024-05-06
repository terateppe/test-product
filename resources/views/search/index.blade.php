<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧画面</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #ffdede; /* 薄い桜色を設定 */
            margin: 0;
            padding: 0;
        }

        /* テーブルのスタイル */
        table {
            width: 100%; /* 画面いっぱいに広げる */
            border-collapse: collapse;
        }

        /* テーブルヘッダーのスタイル */
        th {
            background-color: #f2f2f2; /* 背景色を設定 */
            padding: 8px; /* セルの余白を設定 */
            text-align: left; /* 文字を左寄せにする */
            border: 1px solid #ddd; /* 境界線を設定 */
        }

        /* テーブルデータのスタイル */
        td {
            padding: 8px; /* セルの余白を設定 */
            text-align: left; /* 文字を左寄せにする */
            border: 1px solid #ddd; /* 境界線を設定 */
        }

        /* ページネーションと表の間のスタイル */
        .search-table-container {
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    @include('parts.nav')
    @if (session('message'))
            <div class="flash_message bg-success text-center py-3 my-0" style="background-color: rgba(0, 200, 0, 0.5); color: white; padding: 10px; font-size: 20px;">
                {{ session('message') }}
            </div>
        @endif
    <h1>商品検索画面</h1>

    <div class="container">
        <form method="get" action="/search/index" class="search_container">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="キーワード検索">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">検索</button>
                </div>
            </div>
            <button id="back-to-list-button" class="btn btn-secondary">検索内容のクリア</button>
        </form>
    </div>

    <div class="search-table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>商品名</th>
                    <th>種別</th>
                    <th>登録日</th>
                    <th>更新日</th>
                    <th>選択</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @if($item->type == 1)
                            食料品
                        @elseif($item->type == 2)
                            衛生用品
                        @elseif($item->type == 3)
                            衣類
                        @elseif($item->type == 4)
                            医療品
                        @elseif($item->type == 5)
                            情報機器
                        @elseif($item->type == 6)
                            その他
                        @else
                        @endif
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a href="/search/detail/{{ $item->id }}" class="btn btn-primary">選択</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ページネーション -->
    <div class="d-flex justify-content-center">
        {{ $items->links() }}
    </div>

    <!-- エラーメッセージ表示領域 -->
    @if(session('error_message'))
        <div>{{ session('error_message') }}</div>
    @endif

    <!-- Bootstrap JavaScript (Optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // ページが読み込まれたときに実行する処理
        $(document).ready(function() {
            // 一覧に戻るボタンがクリックされたときの処理
            $("#back-to-list-button").click(function() {
                // ページをリロードして一覧に戻る
                window.location.href = backToListURL;
            });
        });
    </script>
</body>
</html>