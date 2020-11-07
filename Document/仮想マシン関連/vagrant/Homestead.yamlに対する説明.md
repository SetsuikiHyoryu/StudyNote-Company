# `Homestead.yaml`ファイルに対する説明

## foldersとsitesに対する説明

1. もし**folders**のパスが以下の様に設定されているとしたら

   ```yaml
   folders:
       - map: D:/Laravel/code/Projects/
       to: /home/vagrant/code/Projects/
   ```

2. 以下の命令は仮想マシンの`/home/vagrant/code/Projects/`で行う。

   ```shell
   composer global require "laravel/installer"
   ```

3. プロジェクトを作成する命令`laravel new プロジェクト名`で`Project1`を作成したとすると、**sites**は以下の様に設定する。

   ```yaml
   sites:
       - map: homestead.test
         to: /home/vagrant/code/Projects/Project1/public
   ```

   - `public`までに設定する理由はここがプロジェクトの入り口だから。

---

## 訂正されたHomestead.yamlファイルをリロードする方法

### 一、`vagrant up`で仮想マシンを起動しているのならば

- `vagrant ssh`命令で仮想マシンに入っている場合。
  1. `exit`命令を入力しローカルのパスに戻る。
  2. `cd xxx/Homestead`命令で`Homestead.yaml`のフォルダに入る。
  3. `vagrant provision`命令で`Homestead.yaml`ファイルをリロードする。
  4. `vagrant reload`命令で仮想マシンをリロードする。
- まだ`vagrant ssh`命令で仮想マシンに入っていない場合。
  - 上記手順の**2**から実行してください。
- 上記手順は以下の様に一行に纏められる。
  
  ```shell
  cd xxx/Homestead && vagrant provision && vagrant reload
  ```

### 二、仮想マシンを起動していない場合

1. `cd xxx/Homestead`命令で`Homestead.yaml`のフォルダに入る。
2. `vagrant up`命令で仮想マシンを起動する。
3. `vagrant provision`命令で`Homestead.yaml`ファイルをリロードする。

- 上記手順は以下の様に一行に纏められる。

  ```shell
  cd xxx/Homestead && vagrant up --provision
  ```

  - `--provision`は`vagrant provision`と同じ。

---

## 参考資料

- [Homestead中Homestead.yaml详解][homesteadYaml]
- [重新加载Homestead.yaml][yamlReload]

<!-- リンクの声明 -->
[homesteadYaml]: https://www.pianshen.com/article/642925974/ "Homestead中Homestead.yaml详解"
[yamlReload]: https://blog.csdn.net/nannan05520/article/details/92809074 "重新加载Homestead.yaml"
