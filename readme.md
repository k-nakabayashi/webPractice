# 環境構築

* PHP：7.1.3以上
* フレームワーク：Laravel 5.8
* データベース
    * Myaql 5.5：Herokuでは5.5は無料ですが、以上だとかなりお金がかかります。ローカルでは8系利用はしてもいいですが、Herokuにデプロイした際、json型は5.5非対応ですので注意してください。
    * PostgreSQL：12 or 11 ※12はHerokuのデフォルト、11はAWSのデフォルトのため、どちからに合わせる。

## 共通 Laravelのプロジェクト作成

* Laravelのプロジェクト作成

```shel
composer create-project --prefer-dist laravel/laravel アプリ名 "5.8.*"
```
* PostgreSQLの設定
    1. DB作成※マイグレーションは、テーブルを作成・更新するだけで、DB作成はしないです。
    2. 以下の設定が必要です。
        * ユーザー・タイムゾーン・文字コード    ※ユーザー設定が不十分ですと、エラーが出ることが多いです。

* Laravelの設定
    * .envファイル、/config/database.phpに設定が必要です。

## ローカル

* Apatchの用意
    * ドキュメントルートを合わせる

## HomeStead
・VirtualBoxとVagrantを用意


## Laradoc (推奨)

-----

# アプリ作成
