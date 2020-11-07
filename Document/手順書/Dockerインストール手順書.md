<!-- JiraとConfluenceでのMarkdownの使用説明：
画像：
- 筆者以外の人がこのMarkdownファイルを編集する時は、画像を個人のurlにリンクすることで構わない。

コピペー：
- VSCodeから直接コピペーすると全文がコードブロックになるので一度メモ帳にコピペーし、メモ帳からJiraとConfluenceにコピペーすることをお勧め。
- JiraとConfluenceでレイアウトを指定する場合は全文のコピペー後、レイアウトに応じて調整する必要がある。

チェックボックス：
- JiraとConfluenceではチェックボックスが"[]space"で呼び出せる。
- 事前にMarkdownファイルに"[]space"を書いてコピペーするのは無効。
- "[]"を書いて、コピペー後手動でスペースを開くことをお勧め。
- 素で書かないと無効（見出し、リストの中で書くのは無効）
- 連続したチェックボックスの間に一行を開く必要がある（開かないとJiraとConfluenceで上の行の"[]"後ろにスペースを入れる時、下の行は上の行の改行と認識される）。
 -->

# Dockerインストール手順書

---

## 一、docker概述（[*参考資料⑨*][url09]）

- 従来の仮想機械：独立したプログラム毎に仮想空間を開くのでソースを多く占用する。
- docker：複数のプログラムや環境を一つのコンテンツに纏め、ソースの占用が少ない。

---

## 二、 環境を整える

[]CPUの仮想化有効： **タスク マネージャー** で確認できる。

![CPUの仮想化有効](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/01.png)

- デフォルトは有効
- BIOSでの設置でPC毎に異なるので無効の場合の有効にする方法は[*参考資料⑩*][url10]を参照

### 1. OSチェック

[]64bit windows 10 pro

- （推奨）Docker Desktop for Windows（Hyper-V必要（[*参考資料③*][url03]））**→ 二、2. Hyper-Vを有効にする**
  - VMware や Virtual Box が無効な可能性がある
    - Docker Toolbox [*参考資料②*][url02]
    - Virtual Boxで起動  

[]64bit windows 10 home

- Docker Toolbox([*参考資料②*][url02]) **→ 各自でインストール後、四、2. 正常に使用可能の確認**
  - Virtual Boxで起動

### 2. Hyper-Vを有効にする（[*参考資料③*][url03]）

[]1. タスク バー の winマーク（スタート）を右クリック

[]2. 一番上の アプリと機能 を選択する

[]3. 右上の **プログラムと機能** を選択する

![プログラムと機能](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/02.png)

[]4. Windowsの機能の有効化または無効化 を選択する

![Windowsの機能](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/03.png)

[]5. **Hyper-V** のチェックを入れて OK をクリック

![Hyper-Vのチェック](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/04.png)

---

## 三、Dockerのインストール

### 1. ダウンロードとインストール

[][**ここ**](https://www.docker.com/get-started)で自分のOS選択しダウンロードする。

![OS選択](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/05.png)

[]ダウンロードしたファイルのクリック後全自動でインストールされる

- 一番空間を食う **仮想ハードディスク** と **仮想マシン** の保存場所はデフォルトにCディスクになっているので、  
変更したい場合は　**→ 三、2. 保存場所の変更**  
変更しない場合は　**→ 四、dockerの使用**
  
### 2. 保存場所の変更（[*参考資料⑥*][url06][*⑦*][url07]）

[]1. **win + S** で **cortana** を呼び出す

[]2. **Hyper-V マネージャー** を入力して結果を選択する

[]3. 仮想マシンを選択して右側の **Hyper-Vの設定** を選択する  

![Hyper-Vの設定](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/06.png)

[]4. **仮想ハードディスク** と **仮想マシン** を各々に選択し、フォルダーを指定して **OK** をクリック

![フォルダーを指定](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/07.png)

- **仮想ハードディスク** のデフォルトフォルダー：
  - `C:\Users\Public\Documents\Hyper-V\Virtual Hard Disks`
- **仮想マシン** のデフォルトフォルダー：
  - `C:\ProgramData\Microsoft\Windows\Hyper-V`

---

## 四、dockerの使用（各選択の読み込みに時間が多く掛かる場合がある）

### 1. 環境設定

[]1. **Docker Desktop** アイコンをクリック

[]2. **タスク バー** の右下に鯨の様なアイコンが出る  

![鯨のアイコン](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/08.png)

- 右クリックで操作可能

![右クリック](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/09.png)

[]3. **三、2.** でデータの保存場所を変更した人は **Settings** を選択し、  
Setting > Resources > Advanced で **Disk image location** の位置を変更する必要がある。  
![Disk image locationの位置変更](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/10.png)

- Hyper-Vの設定 での 仮想ハードディスク と同じフォルダーに選択する
- 変更後 Apply & Restart をクリックして待つ

[]4. Settings を選択し、Settings 画面の右下に **Docker running**と表記されれば起動成功である  

![Docker running](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/11.png)

[]5. イメージ獲得サイトのカスタム（中国本土で海外サーバーに接続できない場合など）

- Setting > Docker Engine：
  - `"registry-mirrors": [目標のサイトURL]`  
  ![registry-mirrors](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/12.png)

### 2. 正常に使用可能の確認（[*参考資料⑧*][url08]）

[]1. 任意の所からcmdを開く

[]2. `docker version`でヴァージョンの確認

![ヴァージョンの確認](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/13.png)

[]3. `docker run hello-world`でイメージ（鏡像）の導入と コンテンツ（容器）の使用のテスト

- hello-worldファイルはデフォルトに存在する
- 最初に執行される時に導入メッセージも表示されるので私のメッセージと少し異なる、最後に私のメッセージと同じ文面の内容が表示されれば運用が成功である。  
![hello-world](https://raw.githubusercontent.com/SetsuikiHyoryu/StudyNote-Company/master/img/Dockerインストール手順書/14.png)

---

## 五、最後に

これで基本の環境の構築は完了した。この状態で必要なイメージ（isoファイル）を入手すれば必要な機能を実現することが出来る。

---

## 参考資料

1. [中国語攻略（Hyper-V利用）（登録要請は空白をクリックすることで解除できる）][url01]
2. [日本語攻略（Hyper-V無し）Windows10 HomeでDocker環境を導入する][url02]
3. [Hyper-V有効化方法][url03]
4. [Win10自带的Hyper-V性能、兼容性和稳定性怎么样？][url04]
5. [个人用户来说，能总结一下vmware和hyper-v优缺点？][url05]
6. [docker for windows修改虚拟机路径（画面の更新で登録要請を取り消せる）][url06]
7. [Docker for WindowsのVMイメージをCドライブ以外に作成][url07]
8. [如何安装Docker Desktop for Win10][url08]
9. [docker容器与虚拟机有什么区别？][url09]
10. [VT（CPU虚拟化）怎么开启？][url10]

[url01]: https://blog.csdn.net/zzq060143/article/details/91050272 "中国語攻略（Hyper-V利用）（登録要請は空白をクリックすることで解除できる）"
[url02]: https://qiita.com/zeffy1014/items/dda78f4ab0449989dfe1 "日本語攻略（Hyper-V無し）Windows10 HomeでDocker環境を導入する"
[url03]: https://docs.microsoft.com/ja-jp/virtualization/hyper-v-on-windows/quick-start/enable-hyper-v "Hyper-V有効化方法"
[url04]: https://www.zhihu.com/question/58179981 "Win10自带的Hyper-V性能、兼容性和稳定性怎么样？"
[url05]: https://segmentfault.com/q/1010000000735732 "个人用户来说，能总结一下vmware和hyper-v优缺点？"
[url06]: https://blog.csdn.net/wwangfabei1989/article/details/79293004 "docker for windows修改虚拟机路径（画面の更新で登録要請を取り消せる）"
[url07]: https://ao-system.net/note/51 "Docker for WindowsのVMイメージをCドライブ以外に作成"
[url08]: https://www.bilibili.com/video/BV1qE411N7aC "如何安装Docker Desktop for Win10"
[url09]: https://www.zhihu.com/question/48174633 "docker容器与虚拟机有什么区别？"
[url10]: https://jingyan.baidu.com/article/20b68a88e89c95796cec6282.html "VT（CPU虚拟化）怎么开启？"
