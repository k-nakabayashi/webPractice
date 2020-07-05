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
    * post投稿へのリンクを作成：authとadminのviewsディレクトリに追記
        * auth:<a href="{{ route('posts.index') }}">Posts</a>
        * admin:<a href="{{ route('admin.posts.index') }}">Posts</a>

### ルーティング作成
* routes/web.php
    * Route::resource('posts', 'PostController')->only(['index', 'show']);
    * adminログイン時のグループに追記
        * web.phpをご参照ください。
        * ログインと未ログインのグループを整理
            * nameに「admin.」を共通で付与
            * コントローラーのnamespaceを指定

### コントローラー作成と編集
* app\Http\Controllers\Admin\PostController.php
    * メソッド編集：まずindexとcreateをreturn viewする

