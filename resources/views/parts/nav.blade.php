<!--管理者に表示されるナビ-->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand ms-3" href="/home">ホーム</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/search/index">商品一覧・検索</a>
                </li>
                @cannot('admin')
                <li class="nav-item">
                    <a class="nav-link" href="/item/order_history">購入履歴</a>
                </li>
                @endcannot
                @can('admin')
                <li class="nav-item">
                    <a class="nav-link" href="/user">ユーザー管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/item/management">商品管理</a>
                </li>
                @endcan
                @if(auth()->check())
                <!-- ログイン状態の場合 -->
                <li class="nav-item">
                    <form action="/user/edit/{id}" method="post">
                        @csrf
                        <input class="btn btn-sm btn-primary" type="submit" value="アカウント編集">
                    </form>
                </li>

                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <input class="btn btn-sm btn-primary" type="submit" value="ログアウト">
                    </form>
                </li>
                @else
                <!-- ログアウト状態の場合 -->
                <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-sm btn-primary">ログイン</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>    