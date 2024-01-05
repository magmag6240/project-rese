# Rese

【概要】ある企業でのグループ会社の飲食店予約システム

【イメージ】

<img width="743" alt="home" src="https://github.com/magmag6240/project-rese/assets/139316621/835d0ba6-9e64-431e-b21c-c41951a72df3">

## 作成した目的
【背景と目的】 外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい

## 機能一覧

| 項目 | 項目 (店舗代表者) | 項目 (管理者) |
| ---- | ---- | ---- |
| 会員登録 | ログイン | ログイン |
| ログイン | ログアウト | ログアウト |
| ログアウト | ユーザー情報取得 | ユーザー情報取得 |
| ユーザー情報取得 | 飲食店一覧取得 | 飲食店一覧取得 |
| ユーザー飲食店お気に入り一覧取得 | 飲食店詳細取得 | 飲食店詳細取得 |
| ユーザー飲食店予約情報取得 | エリアで検索する | エリアで検索する |
| 飲食店一覧取得 | ジャンルで検索する | ジャンルで検索する |
| 飲食店詳細取得 | 店名で検索する | 店名で検索する |
| 飲食店お気に入り追加 | 店舗代表者登録（管理者からの招待メールからのみ可能） |  |
| 飲食店お気に入り削除 | 会員へのメール送信（以前店舗に予約があった一般会員のみ） |  |
| 飲食店予約情報追加 | 店舗ページの新規作成 | 店舗代表者登録用メール作成 |
| 飲食店予約情報削除 | 店舗ページの編集 | 店舗代表者一覧取得 |
| エリアで検索する | 店舗の予約情報確認 | 一般会員へのメール送信 |
| ジャンルで検索する | 来店時予約照会（QRコードの読み取り） |  |
| 店名で検索する |  |  |


## 使用技術
* PHP v7.4.9-fpm
* Laravel v8.83.27
* Docker Desktop v4.22.1
* docker-compose v3.8
* nginx 1.21.1
* mySQL 8.0.26

## テーブル設計

![table user admin](https://github.com/magmag6240/project-rese/assets/139316621/8e3b03cc-b0af-479d-8483-e75da8cbeff6)
![table shop_manager shop](https://github.com/magmag6240/project-rese/assets/139316621/f3af3bf3-8d41-4f99-b367-d7288664d0e7)
![table reservation menu business_hour business_hour_shop](https://github.com/magmag6240/project-rese/assets/139316621/f73cc730-4c7d-4bfe-ab6a-072083225294)
![table prefecture genre](https://github.com/magmag6240/project-rese/assets/139316621/fa4e9f9a-be80-407b-bc16-e5b2320535e1)
![table evaluation star like](https://github.com/magmag6240/project-rese/assets/139316621/75368c6b-4700-4ab0-bd59-ac55fe0a7e74)

## ER図

<img width="650" alt="er project-rese" src="https://github.com/magmag6240/project-rese/assets/139316621/1ee739f0-61e9-438b-9ef0-3f731a3735f3">

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
