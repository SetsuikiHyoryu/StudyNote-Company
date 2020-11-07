# laravel Homestead

## 1. 仮想マシンのインストール

[]Homestead を使用する前に、以下の仮想マシンから一つを選んでインストールします。

- [**Virtual Box 5.2**](https://www.virtualbox.org/wiki/Downloads)（無料なのでお薦め）
  - 保存場所以外デフォルトでインストールして構いません
- VMWare、Parallels
- Hyper-V

[][**Vagrant**](https://www.vagrantup.com/downloads.html)

- 保存場所以外デフォルトでインストールして構いません

---

## 2. Homestead Vagrant ボックスをインストールします

[]VirtualBox / VMWare Vagrant をインストールした後、コマンドプロンプトに次のコマンドを入力して Homestead Vagrant ボックス `laravel/homesterad` を Vagrant に 追加します。

```bash
vagrant box add laravel/homestead
```

- インターネット接続速度によっては、ボックスのダウンロードに時間がかかります。

图片1

- 上記のコマンドの実行に失敗した場合、Vagrant が最新バージョンであるかどうかを確認します。
  - 最新バージョンでない場合は、Vagrant を最新バージョンに更新し、すべてのプラグインをアップグレードします。
- 仮想マシンの選択肢から `virtualbox` に対応した番号を選びます

---

## 3. Homesteadをインストールします

[]リポジトリのコードのクローンすることで Homestead をインストールします。

```bash
cd リポジトリ Homestead を入れる為フォルダパス
git clone https://github.com/laravel/homestead.git Homestead
```

图片2

[]master ブランチは常に安定したバージョンであるとは限らないため、[GitHubリリースページ](https://github.com/laravel/homestead/branches)で最新の安定したバージョン(release ブランチ)を見つけて、git命令でブランチをそちらに変換します。

```bash
cd ローカルリポジトリ Homestead のパス
git checkout release
```

[]ローカルリポジトリ Homestead の中で `init.bat` ファイルをダブルクリック、又はコマンドプロンプトに以下の命令を入力して設定ファイル `Homestead.yaml` を作ります。

```bash
cd ローカルリポジトリ Homestead のパス

// Mac/Linux/git bash
bash init.sh

// Windows cmd
init.bat
```

图3.4

---

## 4. Homesteadの配置

### 4.1. プロバイダーを設定する

[]`Homestead.yaml > provider` はどのプロバイダを示すボタンです。自分が使っているプロバイダを入力してください。

- virtualbox
- vmware_fushion
- vmware_workstation
- parallels
- hyper-v

```yaml
provider: virtualbox
```

图5

[]共有フォルダの設置の場所

```yaml
folders:
  - map: ローカルマシンのパス
    to: 仮想マシンのパス
```

- 作成したサイトが少ない場合は、各プロジェクトを独自のVagrantフォルダーにマップしてみてください。

图6

### 4.2. Hosts ファイルで Nginx サイトの設置

[]ローカルマシンの Nginx サイト構成名を hosts ファイルに追加します。この命令はローカルドメイン名へのリクエストを Homestead 仮想マシンに改めて指向させます。

- Mac または Linux では該当ファイルのパスは `/etc/hosts` です
- Windows の場合、該当ファイルのパスは `C:\Windows\System32\drivers\etc\hosts` です

```hosts
192.168.10.10  homestead.test
```

图8

- `Homestead.yaml` ファイルに載せられているIPアドレスと一致することが必要です。
- `hosts` ファイルにドメイン名を追加すると、ブラウザーでドメイン名を通じてサイトにアクセスできるようになります。

```html
<!--注：実際にアクセスする前に、Vagrant ssh 命令で Homestead ボックスを起動する必要があります。-->
http://homestead.test
```

---

## 5. Vagrantボックスを開始します

### 5.1. 仮想マシンの初期化

[]Homestead.yaml ファイルを構成すると、Vagrant で仮想マシンを起動し、仮想マシンのlinux内に共有フォルダとNginxサイトが自動的に構成されます。初期起動の初期化に少し時間がかかります。

```bash
//先に $ ssh-keygen -t rsa -C "youremail@example.com" でSSHを作る必要があります。

//Homestead フォルダで
vagrant up
```

- Homestead フォルダのパスはアルファベットでないと文字エンコードのエラーが出ます。

图9

[]仮想マシンにログインするには、vagrant sshコマンドを使用します。仮想マシンをシャットダウンするには、vagrant haltコマンドを使用できます。仮想マシンを破棄するには、vagrant destroy --forceコマンドを使用できます。

```bash
 vagrant ssh
```

图10.11

### 5.2. laraverlフレーワークの構築

[]仮想マシンのlinuxで　`Homestead.yaml` の `floder: 省略 to:` に書いたパスに入り、以下の命令を実行しlaraverlフレーワークのファイルを構成します。

```bash
composer require laravel/homestead
```

[]同じパスで以下の命令を実行し、プロジェクトを構成します。

- プロジェクト名は `Homestead.yaml` の `site: 省略 to:` を参照してください。

```bash
laravel new プロジェクト名
```

### 5.3. ブラウザからlaravelプロジェクトにアクセス

[]ブラウザから次の`http://homestead.test`Laravelアプリケーションにアクセスできます（前提はすでにWebディレクトリLaravelアプリケーションコードで展開されています）。

---

## 参考資料

1. [重量级开发环境：Homestead](https://xueyuanjun.com/post/9530.html#toc-0)
2. [Install Laravel Homestead on Windows 10](https://www.youtube.com/watch?v=n2RAArt1GRI)
3. [Windows下生成SSH密钥](https://www.jianshu.com/p/2790a860f151)
4. [Windows下Laravel Homestead的安装和使用](https://blog.csdn.net/mrgong_/article/details/78819541)
5. [局域网内访问Homestead虚拟机上的laravel站点](http://wenda.golaravel.com/article/292)
6. [HomesteadでLaravel環境構築(Windows10)](https://qiita.com/yoya_k/items/599da913ad31a217b0b9)
