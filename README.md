# Rese

【概要】ある企業でのグループ会社の飲食店予約システム

【イメージ】




## 作成した目的
【背景と目的】 外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい

## 機能一覧

| 項目 |
| ---- |
| 会員登録 |
| ログイン |
| ログアウト |
| ユーザー情報取得 |
| ユーザー飲食店お気に入り一覧取得 |
| ユーザー飲食店予約情報取得 |
| 飲食店一覧取得 |
| 飲食店詳細取得 |
| 飲食店お気に入り追加 |
| 飲食店お気に入り削除 |
| 飲食店予約情報追加 |
| 飲食店予約情報削除 |
| エリアで検索する |
| 店名で検索する |

## 使用技術
* PHP v7.4.9-fpm
* Laravel v8.83.27
* Docker Desktop v4.22.1
* docker-compose v3.8
* nginx 1.21.1
* mySQL 8.0.26

## テーブル設計




## ER図




# 環境構築

## git clone

先にコピーを保存したいディレクトリに移動してから以下のコマンドを実行します。

`$ git clone git@github.com:magmag6240/project-rese.git`

これでLaravelプロジェクトがローカル環境にクローンされました。

## vendorディレクトリを作る
以下のコマンドを実行してください。

`$ composer install`

composer.lock, composer.jsonに書かれた情報を基にパッケージやライブラリがまとめてインストールされ、vendorディレクトリに配置されます。

## .envファイルを作る
git cloneしてきたプロジェクトに入っている.env.exampleというファイルを基に以下のコマンド実行で.envファイルを作成します。

`$ cp .env.example .env`

## アプリケーションキーを初期化する
以下のコマンドで初期化を行います。

`$ php artisan key:generate`

## 動作確認
ブラウザに表示する準備は整いました。
以下のコマンド実行で、動作確認を行ってください。

`$ php artisan serve`

## テストユーザー
* ダミーユーザー：98人
* 使用ユーザー：2人

| id | name | role | email | password |
| ---- | ---- | ---- | ---- | ---- |
| 99 | 五条 悟 | admin | satoru.gojyo@example.com | 1qaz2wsx |
| 100 | 夏油 傑 | general | suguru.geto@example.com | 1qaz2wsx |
