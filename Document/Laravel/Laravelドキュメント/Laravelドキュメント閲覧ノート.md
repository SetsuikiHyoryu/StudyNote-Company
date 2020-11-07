# Laravelドキュメント閲覧ノート

## Getting Strat

### Installation

#### サーバーの必要ファイル

\-

---

#### Laravelをインストール

1. Laravelは**Composer**で管理するので、Laravelを使う前にComposerをインストールする必要がある。（Laravel/Homestead内では既にインストールされている。）
   - bashでcomposer命令を入力してヘルプファイルが表示されればインストールされているかをチェックできる。

2. composerで`Laravel installer`をダウンロードする。

   ```bash
   composer global require laravel/installer
   ```

   - Composerのシステム全体のvendorのbin（ソフトウェアを構成するファイルの動作モジュールのフォルダ）ディレクトリの仮想マシン（linux）でのパスは`/home/vagrant/.composer/vendor/bin`である。

3. 指定のディレクトリに`laravel new フォルダ名`を実行することで全てのlaravel依存ファイルを含めたlaravel installationを作れる。
   - `laravel new フォルダ名`
     - Laravelのバージョンを指定できない。
   - `composer create-project --prefer-dist laravel/laravel フォルダ名`でも生成できる。
     - Laravelのバージョンを指定できる。
     - インストールや環境変数の設定が上手く出来なかった場合に使える。

4. `php artisan serve`でローカルにインストールしたPHPの内蔵サーバーを起動できる。
   - 入り口は<http://localhost:8000>

---

#### 環境設定

- 公開ディレクトリ
  - `laravel installation`内の`public`ディレクトリがwebサーバーに指定されるべきアプリケーションの入り口。`public`の中の`index.php`ファイルは全てのHTTPリクエストの処理センターである。

- 設定ファイル
  - 全ての**設定ファイル**が`config`ディレクトリに保存されている。

- ディレクトリ権限
  - laravelをインストール後は権限を設定する必要がある。`storage`のディレクトリと`bootstrap/cache`ディレクトリはwebサーバー又はlaravelが起動されてない時でも書き込むが出来るように設定されるべき。`Homestead`仮想マシンを使う場合はこれらは既に設定済み。

- アプリケーションキー
  - 右クリックメニューを呼び出すキー？
  - laravelインストール後は**アプリケーションキー**をランダムな文字列に設定すべき。Composer又はLaravel installでインストールした場合、このキーは既に`php artisan key:generate`命令に設定されている。
  - 通常長さは32キャラクタ。
  - `.env`環境ファイルで設定できる。
    - `.ene`ファイルは`.env.example`ファイルを複製、重命名することで得られる。
  - もし**アプリケーションキー**を設定しないとセッションと暗号データは不安全になる。
    - セッション：2台以上の通信機器間の、またはコンピュータとユーザ間 の半永久的な双方向情報交換 のことである。
  
- 追加設定
  - `timezone`と`loacle`などの設定は`config/app.php`ファイルで出来る。

---

#### webサーバー設定

- ディレクトリ設定
  - laravelは常にwebサーバー用に設定された**webディレクトリ**のルートから起動される。
  - **webディレクトリ**のサブディレクトリからlaravel applicationを起動しない。そこから起動すると機密ファイルが暴露される可能性がある。

- 分かりやすいURL
  - Apache
    - laravelは`public/.htaccess`ファイルがある。パスに`index.php`フロントコントローラーが無い場合はこのファイルでURLを提供できる。
    - Apacheでlaravelを起動する前に`mod_rewrite`モジュールを有効にしたことを確認する。これで`.htaccess`ファイルがサーバーにhonorされる。

  - Nginx
    - Nginxを使う場合、サイト構造内の以下の命令は全てのリクエストを`index.php`フロントコントローラーに指させる。

      ```php
      location / {
         try_files $uri $uri/ /index.php?$query_string;
      }
      ```

    - Homestead又はValetを使う場合は分かりやすいURLは自動的に設定される。

---
---

### 構造

#### 前書き

- 全ての**設定ファイル**が`config`ディレクトリに保存されている。

---

#### 環境構成

- アプリケーションが起動している環境によって違う値を設定するのはよく役に立つ。例えば使っている本番サーバーと違うキャッシュドライバーをローカルで使用したい場合。

- Composerでlaravelをインストールする以外は、手動で`.env.example`ファイルを`.env`にコピー・重命名する必要がある。

- `.env`ファイルはアプリケーションのソースコード管理施設にコミットするべくではない。各々の開発者かサーバーは違う環境構成でアプリケーションを使う必要があるかもしれない。もし侵入者がソースコード管理倉庫に入れるとしたら、敏感な資格情報が暴露される可能性がある。

- チームで開発する時は、`.env.example`ファイルにプレースホルダー値を入れることでチームメンバーはアプリケーションを起動するのにどの環境変数が必要かが分かる。

- `.env.testing`ファイルを作ることで、`--env=testing`オプションでPHPUnitテストを起動又はArtisan命令を実行する時に`.env`ファイルをオーバーライドできる。

- 環境変数型
  - `.env`ファイル内の全ての変数が文字列として解析される。なので一部の値は既に事前に設定されており、`env()`関数から広範囲の型を戻すことが許されている。
  - スペースを含む値で環境変数を定義する場合は二重引用符で囲む必要がある。

- 環境設定を取得する
  - アプリケーションがリクエストを受け取った際に、`.env`ファイルに並べられた全ての変数がPHPのスーパーグローバル変数`$_ENV`にロードされる。ただ、値は設定ファイル（`.env`ファイル）に並べられた変数から`env`ヘルパーを使って取得する必要がある。
  
    ```php
    `debug` => env('APP_DEBUG', false),
    ```

  - `env`関数に渡した二番目の値はデフォルト値である。与えるキーに環境変数が存在しない場合はこと値が使われる。

- 今の環境を決定する
  - 今のアプリケーション環境は`.env`ファイル内の`APP_ENV`で決定できる。
  - `App`facade上の`environment`方法でこの値にアクセスできる。

    ```php
    $environment = App::environment();
    ```

  - `environment`方法に引数を渡すことで環境と与えられた値と一致するかを確認できる。一致すると`true`が戻される。

---
---
---

## アーキテクチャ（架構）概念

### リクエスト生命周期

#### リクエスト生命周期 > 前書き

- 何故アーキテクチャを説明する必要があるかの説明。

---

#### 生命周期概要

---
---
---

## linux ls -l詳細

|フィールド(column)|ファイルタイプと権限|ファイルのハードリンク数/フォルダのサブディレクトリ数|ファイル/フォルダの所有者|ファイル/フォルダの所有者が居るグループ|使用空間（バイト）|ファイルの前回のアクセス時間|ファイル名|
|-|-|-|-|-|-|-|-|
|番号|1|2|3|4|5|6|7|
||lrwxrwxrwx|1|vagrant|vagrant|27|Oct 10 16:48|carbon -> ../nesbot/carbon/bin/carbon|
||lrwxrwxrwx|1|vagrant|vagrant|26|Oct 10 16:48|envoy -> ../laravel/envoy/bin/envoy|
||lrwxrwxrwx|1|vagrant|vagrant|32|Oct 10 16:48|laravel -> ../laravel/installer/bin/laravel|

---
---
---

## 参考資料

- [フォルダ名の＜bin＞とはどのような意味なのでしょうか？][bin]
- [linux ls -l 详解][field]

<!-- リンクの声明 -->
[bin]: http://www.1mouke.com/hpbldr_faq/faq00000059.html "フォルダ名の＜bin＞とはどのような意味なのでしょうか？"
[field]: https://www.cnblogs.com/freinds/p/8074249.html "linux ls -l 详解"
[newVSCreate]: https://qiita.com/yukibe/items/5ee27163b603d7f68250 "【Laravel入門】プロジェクト作成から起動まで"
