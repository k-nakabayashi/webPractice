# Laravel アプリ作成開始

## 機能要件

## 下準備

* テーブル準備：スキャフォールド
    * php artisan make:auth
    * php artisan migrate

* マルチ認証実装：(管理者用のログイン・登録の機能実装を行う。)
    * 管理者用のマイグレーションファイルとモデルを作成
        * php artisan make:model Admin -m
    * モデル・コントローラー・ビューを作成・編集
        * 基本的に、スキャフォールドで生成されたファイル・ディレクトリをコピペし編集しながら進めます。
        * モデル：app/User.phpを複製し、Admin.phpという名前に変更
        * コントローラー：app/Http/Controllersの中身を全て、app/Http/Controllers/Adminにコピペ
        * ビュー：resources/views/layousts以外を、resources/views/layousts/adminにコピペ
            * resources/views/layousts/app.blade.phpを同じ場所で複製し、layouts.blade.phpという名前に変更
    * ルーティング
        * routes/web.php：f-stepX系のブランチからコピペ。
            * 詳細は、Illuminate\Routing\Router.phpがご参照ください。