# 環境構築
* /envrioment配下に設定済み環境ファイルをおいております。
    * 最新のモノではありませんが、参考になれば幸いです。

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

* Xampp(Mapp)の用意
インストール
https://www.apachefriends.org/jp/index.html

* Apatchの用意
    * ドキュメントルートを合わせる

## HomeStead
VirtualBoxとVagrantを使います。

<details>
<summary>詳細オープン</summary>
* 仮想PCを立てる。
    * vagrant box add laravel/homestead --provider virtualbox 

* Homesteadの取得
Homesteadを経由して、仮想PCにLaravel環境を構築
    * mkdir Homestead
    * Homestead$ git clone https://github.com/laravel/homestead.git
    * Homestead$ init.bat

* Homesteadの設定
    * sshキー作成
        * Homestead$ ssh-keygen
        * https://qiita.com/ueyamamasashi/items/7e532174350c0db06882
    * Homestead.yamlを編集
        
        * ipの変更
            * 「ip: 192.168.10.10」→「ip: 192.168.10.30」に変更です。
            * デフォルトでは192.168.10.10はエラー？がおきます。理由は不明
        
        * sshキーを設定：パスに問題がなければ編集不要です。
            * authorizeは公開鍵、keysは秘密鍵

        * マウント設定：仮想ゲストとホストで共有するフォルダの設定
            * folders以下のペアを編集します。 
            * mapはホスト側、toは仮想ゲスト側

        * ドキュメントルート
            * sites以下のペアを編集します。
            * mapはドメイン名、toは仮想ゲスト側のエントリーポイント
        
        * データベース名を指定：databases
</details>

## Laradoc (推奨)
Dockerコンテナーをベースに、docker-composeでコンテナクラスタ環境を作ります。
<details>
<summary>詳細オープン</summary>

* Docker for Windowを取得
    * https://docs.docker.com/docker-for-windows/install/

* 下準備
    * 各種ディレクトリを用意
        * mkdir Project && cd Project
        * Project$ mkdir laradoc && mkdir db && mkdir web && mkdir ./web/laravel
            * web配下に、web/laravelにlaravelを配置します。

* Laradoc環境設定 
    * Laradocを取得
        * ./laradoc git clone https://github.com/laradock/laradock.git
    * 設定する：以下を参考にしてください。
        * https://qiita.com/rema424/items/ba6e6f440c415fed7b0c
        * https://qiita.com/okita_kamegoro/items/509d42e4634354cfc9a0
        
    * 主な設定：.env
        * マウント設定 
            * APP_CODE_PATH_HOST ※ホストPC側のパス
            * APP_CODE_PATH_CONTAINER ※仮想ゲスト側のパス

        * webサーバーのドキュメントルート：ここ重要です。仮想ゲストとホストのOSが違うので、設定ミスが多々。
            * APACHE_DOCUMENT_ROOT=/var/www/html/アプリ名/public/

        * 各種ポートが被っていないか要確認です。

    * 主なサービス
        * workspace：作業フォルダ
        * apache2：アパッチ用のサーバー
            * エントリーポイント(/var/www/html/)とホスト側のlaravelが繋がっているか要確認です。
    
    * コンテナーのビルド&起動
        * docker-compose up -d --build workspace postgres php-fpm apache2 pgadmin
    
    * laravel作成
        * workpaceコンテナにssh接続
            * docker-compose exec workspace bash
        * laravel作成
            * cd /var/www/html
            * composer global require hirak/prestissimo laravel/installer && composer create-project --prefer-dist laravel/laravel アプリ名
</details>