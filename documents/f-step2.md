# Laravel アプリ作成開始

## 記事投稿機能の実装：(管理者用のログイン・登録の機能実装を行う。)

# まず、リクエスト→リスポンスが通るよるにする

* テーブル準備
    * php artisan make:model Post -m
    * php artisan make:controller PostController --resource

### ビュー作成
* resources/views/post/home.blade.php
* resources/views/post/create.blade.phpを作成
    * resources/views/admin/home.blade.phpをコピペする

* リンクを作る
    * authとadminのviewsディレクトリに追記
        * <a href="{{ route('posts.index') }}">Posts</a>

### ルーティング作成
* routes/web.php
    * Route::resource('posts', 'PostController')->only(['index']);

    * adminログイン時のグループに追記
        * Route::resource('posts', 'PostController')->only(['index']);

### コントローラー作成と変種
* app\Http\Controllers\PostController.php
    * メソッド編集：indexとcreateをreturn viewする

