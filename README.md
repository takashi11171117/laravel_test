# Mee

## 環境

- PHP7.3
- MySQL5.7
- Laravel6.14

---

## 環境構築

1. docker-compose.ymlの各ポートを環境に合わせる
2. `docker-compose build` を実行
3. `docker-compose up -d` を実行
4. `docker exec -it mee-api_app_ bash` でコンテナ内に入る
5. `composer -v` でcomposerがインストールされているか確認
6. larvelディレクトリに移動して`composer install`でパッケージをインストール
7. .env.exampleをコピーして新しく.envを作成
8. `php artisan key:generate`を実行
9. ブラウザ表示確認(http://localhost:9100/)


## フロントエンド環境

[ensearch-web](https://github.com/namizatork/mee-web)

---

## 説明
• プロフィールの登録・検索サイト。ターゲットはエンジニア（プログラマ）のみ。
• フリー入力ではなく、ある程度絞った項目の登録を重視する。（言語、実務経験年数、趣味程度に触っている年数、資格、執筆本、運営コミュニティetc）

---

## 機能

### ログイン
- SNSログイン
- Authログイン（未確定）

### プロフィール
- アイコン画像登録
- 任意の性別登録
- 言語やFWなどのスキル登録
- 経験年数登録
- 連携SNS登録
- 執筆本登録
- 運営コミュニティ登録
- ステータス登録（未確定）

### 検索
- 言語やFWのスキルで検索
- 経験年数で検索
- ステータスで検索（未確定）
- 性別で検索

### 一覧
- 検索と一致するユーザー情報一覧表示

### 詳細
- ユーザー詳細表示

---