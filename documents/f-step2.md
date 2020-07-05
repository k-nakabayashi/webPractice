# Laravel アプリ作成開始

## 記事投稿機能の実装：(管理者用のログイン・登録の機能実装を行う。)

## ①まず、リクエスト→リスポンスが通るようにする

* テーブル準備
    * php artisan make:model Post -m
    * php artisan make:controller PostController --resource

### ビュー作成
* resources/views/admin/home.blade.phpをコピペする
    * resources/views/post/index.blade.php
    * resources/views/post/create.blade.phpを作成
    * resources/views/post/create/confirm.blade.phpを作成
    

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

## ②記事の投稿機能を実装：「投稿準備→投稿確認→投稿」

* バリデーションは後で実装します。

### ビュー編集

* 投稿準備：form作成
    * resources/views/post/create.blade.php
    * resources/views/post/create/confirm.blade.php

### コントローラー編集

* app\Http\Controllers\Admin\PostController.php
    * 投稿確認の実装：confirmメソッド
        * パラメーターをレスポンスに含める。
    * 投稿確認の実装：createメソッド
        * insertして、記事一覧取得して返す。
    * コンストラクタの引数で、Postインスタンスを作成

### Postのテーブルとモデルを更新
* テーブル：detabase/create_posts_tableをご参照ください。もしくはオリジナルでお願いします。
* モデル