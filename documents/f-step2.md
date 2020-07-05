# Laravel アプリ作成開始

## 記事投稿機能の実装：(管理者用のログイン・登録の機能実装を行う。)

## ①まず、リクエスト→リスポンスが通るようにする

* テーブル準備
    * php artisan make:model Post -m
    * php artisan make:controller PostController --resource

### ビュー作成
* resources/views/admin/home.blade.phpをコピペする
    * resources/views/admin/post/index.blade.php
    * resources/views/admin/post/create.blade.phpを作成
    * resources/views/admin/post/create/confirm.blade.phpを作成
    

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
* 見た目編集
    * npm install && npm run watch
    * rosources/scss/app.scss

### コントローラー編集

* app\Http\Controllers\Admin\PostController.php
    * 投稿確認の実装：confirmメソッド
        * パラメーターをレスポンスに含める。
    * 投稿確認の実装：createメソッド
        * insertして、記事一覧取得して返す。
    * コンストラクタの引数で、Postインスタンスを作成

## ③Postのテーブルとモデルを更新

### 下準備
* guardとblokerのオーバーライドをtraitで対応させる。
    * App\Http\Controllers\Admin\AdminGuardBrokerを作成し、各種app\Admin配下で使用する
    

### ビュー編集：見た目編集
    * npm install && npm run watch
    * rosources/scss/app.scss：編集
    * resources/views/admin/post/index.blade.php：編集
    
### ルーティング作成：自分の投稿だけを表示するためのルーティング
    * posts/myIndexのルーティングを行う。※bladeにlinkを作るのを忘れずに。

### テーブル定義編集
* テーブル：detabase/create_posts_tableをご参照ください。もしくはオリジナルでお願いします。
* モデル：リレーション：belogTOとhasManyを使って、AdminとPostに一対多の関係を作ります。

### コントローラー編集：myIndexメソッドの追加
* ポイントは２つです。
    * Auth::user()から、ログイン中のAdminインスンタンスを取得。※AdminGuardBrokerによってUserモデルからAdaminモデルに使用に変更されている。
    * Adminインスタンスを経由して、リレーションするPostテーブルのレコードを取得しています。※$admin->posts()


## ④バリーデーション実装
