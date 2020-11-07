# VSCodeでサーバー環境無しでのPHPデバグ方法

## 1. PHP のインストール

1. [PHP の公式サイト][phpHP]で PHP の言語パックをダウンロードする(特に仮想マシンで PHP 開発環境を整えた人もローカルマシンで PHP をインストールする必要がある)。
   - 各々の OS 環境に応じて選択してください。
     - **Linux** と **Mac** は `tar.xx` を使えるらしい。
     - 私は **Windows** 環境なので `Windows downloads` を選択する。
   - 保存場所のパスはアルファベットのみのがお薦め。
2. ダウンロードファイルを解凍し、そのままでインストールが完了する。
3. 環境変数の PATH に PHP のパスを入れる。
   - Linux と Mac OS の方は[*参考資料 3*][path] を参照してください。
   - Windows OS の方は以下の様にする。
     1. `Win + S` で Cortana を呼び出し、`環境変数を編集`を入力して選択する。
     2. **システム環境変数**の項目に `Path` を選択し**編集**を押す。
     3. **新規**を押して PHP パックまでのパス `xx/xx/php` を入力する。
     4. **OK** を押して確定する。
   - コマンドプロンプトに `php -v` を入力して実行し、バージョン情報が正確に表示されれば成功である。
4. VSCode の設定ファイル `Settings.json` に以下のコードを入力して PHP パックと繋げる。

   ```json
   "php.suggest.basic": false, //VSCode デフォルトの候補提示機能を無効にする
   "php.validate.executablePath": "xx/xx/php.exe", //php ファイルのパス
   ```

---

## 2. 拡張機能のインストール

1. PHP コード自動補完拡張機能 `PHP IntelliSense` をインストールする。
   - VSCode の EXTENSIONS（拡張機能）に 名前を検索してインストールする。
   - 又は以下のコードを VSCode のコマンドパレット（Ctrl + Shift + P）にコピペして実行すうる。

     ```bash
     ext install felixfbecker.php-intellisense
     ```

2. PHP デバグ拡張機能 `PHP Debug` をインストールする。
   - VSCode の EXTENSIONS（拡張機能）に 名前を検索してインストールする。
   - 又は以下のコードを VSCode のコマンドパレット（Ctrl + Shift + P）にコピペして実行すうる。

     ```bash
     ext install felixfbecker.php-debug
     ```

---

## 3. ローカルPHPパックに拡張機能xdebugをインストールする

- Linux と Mac OS の方は[*参考資料 1*][phpJC] を参照してください。
- Windows OS の方は以下の様にする。
  1. コマンドプロンプトで `php -i` 命令を実行し、phpinfo の情報を得る。
  2. 得た phpinfo をコピーして [xdebug 公式サイトのバージョン確認ページ][xdebugDown]に貼る。
  3. `Analyse my phpinfo() output` ボタンを押して算出された xdebug パック をダウンロードする。
  4. xdebug パックを解凍し、中の `dll` ファイルを php の拡張機能フォルダ `xx/php/ext` に移動させる。
  5. phpの配置ファイル `xx/php/php.ini-development` を `php.ini` に**名前を変更**し最後の行から以下のコードを入力する。
     - `php.ini-development` の他に同じ場所 `php.ini-production` 配置ファイルもあるが、クライアント用のファイルでエラーが表示されないように設定されているそうだ。

     ```ini
     # 私は全て属性の意味合いを把握していません。
     [XDebug]
     xdebug.remote_enable = 1
     xdebug.remote_autostart = 1
     ```

---

## 4. 実際にデバグを試みる

### 4.1. 環境の設置

1. サイドバーの **Run** を選択する。
2. `create a launch.json file` をクリックする。
   - プロジェクトフォルダを開いていない状態は `Open a flolder and create a launch.json file` という表記で、 `Open a flolder` をクリックしてください。
3. 生成された `.vscode/launch.json` をそのまま保存し、サイドバーの **Run** が以下の図の様になっているはず。
   - ![4.1.3. Run_After_Launch](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/php_local_debug/Run_After_Launch.jpg "4.1.3. Run")
4. **Run** の最上層のリストをクリックすると以下の図の様になる。
   - ![4.1.4. Run_List](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/php_local_debug/Run_List.jpg "4.1.4. List")
   - `Listen for XDebug` は遠距離サーバーでのデバク方法。
   - `Launch currently open script` はローカルでのデバグ方法。

### 4.2. ローカルでのデバグ方法

1. **Run** の最上層のリストから `Launch currently open script` を選択する。
2. テスト用の PHP ファイルを開く。
3. デバグしたい行の行番号の外をクリックする。赤い点が付与される。
   - ![4.2.3. PHP_Test_File](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/php_local_debug/PHP_Test_File.jpg "4.2.3. Test_File")
   - 関数をデバグする場合、その行に赤い点を付けると表示されるのにデバグ開始後にもう一歩進む必要がある。
   - 赤い点の位置をもう一回押すと赤い点を消せる。
4. リストの左にある矢印アイコンを押してデバグが開始される。
   - ![4.2.4 Start](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/php_local_debug/Start.jpg "4.2.4. Start")  
   - 画面でアクティブなファイルのみデバグされるので、複数ファイルの場合、実行するコードのあるファイルでデバグしてください。
   - 赤い点を付けないで実行するとファイル全体がデバグされる。
   - デバグの結果は **DEBUG CONSOLE** に表示される。
     - ![4.2.4. Debug_Screen](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/php_local_debug/Debug_Screen.jpg "4.2.4. Debug_Screen")  
   - ファイルが開けれた最初のデバグは **DEBUG CONSOLE** は自動にポップアップするが、ファイルが開けれて **DEBUG CONSOLE** を閉じた状態で二度目以降のデバグは **DEBUG CONSOLE** が自動にポップアップされない（解決方法を検索したがまだ見付けていない）。
     - 手動で **DEBUG CONSOLE** を開くにはリストの右にある虫アイコンを押すことで実現できる。
       - ![4.2.4. Debug_Console](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/php_local_debug/Debug_Console.jpg "4.2.4. Debug_Console")
   - デバグ開始後、完了していない限り、ファイル画面の上方に下の図の様なデバグのコントロールバーが出る。ステップイン、ステップインアウト等の操作ができる。
      - ![4.2.4. Debug_Bar](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/php_local_debug/Debug_Bar.jpg "4.2.4. Debug_Bar")

### 4.3. 遠距離でのデバグ方法（未実証、[*参考資料 1*][phpJC]  18:10 からの参照を推奨する）

1. 仮想マシンやサーバー内の PHP 配置ファイル `/etc/php/バージョン（通常は数字のみ）/fpm/php.ini` を訂正する。
   - ローカル PC 内のファイルではないことを注意してください！
   - 以下のコードを入力する。

     ```ini
     # 私は全て属性の意味合いを把握していません。
     [XDebug]
     xdebug.remote_enable = 1
     xdebug.remote_autostart = 1
     xdebug.romote_host = # ローカル PC の IP アドレス
     xdebug.remote_port = 9000 # launch.jsonで定義されたport、VSCodeにリッスンされる。
     ```

2. VSCode のサイドバー **Run** の最上層のリストから `Listen for XDebug` を選択する。
3. 以降は 4.2.2 からの手順と同じ。

- 原理は容器内の PHP は受け取った URL 情報を ローカル PC の IP を通じて port 9000 でローカル PC に発信する。port 9000 は VSCode にレッスンされているので発信された情報受け取れる。

---

## 参考資料

1. [【教程】配置vscode的PHP自动补全提示与远程调试模式Xdebug][phpJC]
2. [Xdebug----Failed loading][failedLoading]
3. [【export】Linuxで環境変数を設定・削除するコマンド][path]

[phpHP]: https://www.php.net/downloads
[phpJC]: https://www.bilibili.com/video/av71103179/ "【教程】配置vscode的PHP自动补全提示与远程调试模式Xdebug"
[failedLoading]: https://blog.csdn.net/zeng133/article/details/83820890 "Xdebug----Failed loading"
[path]: https://uxmilk.jp/52370 "【export】Linuxで環境変数を設定・削除するコマンド"
[xdebugDown]: https://xdebug.org/wizard "Installation Wizard"
