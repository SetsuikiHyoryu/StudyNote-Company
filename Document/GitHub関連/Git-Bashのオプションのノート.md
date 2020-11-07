# Git Bash Options Note（一部設定抜粋）

## 前言

- 単語を見れば分かる設定を省略した。
- 設定の意味が不明で記述しない場合は不明と明記した。

---

## Looks

- Colours
  - Foreground: 入力文字の色

  ```bash
  <!-- 以下が入力文字 -->
  $ cd ~
  ```

- Transparency: 透明度
  - Opaque when focuesd: **Git Bash**ウィンドウをフォーカスする時は不透明にする。
- Cursor
  - Blinking: 点滅

---

## Text

- Font
  - Font smoothing: 文字の平滑度

- Show bold
  - 各選択間の差が感じられない。

- Locale
  - 恐らく**Git Bash**の実行言語環境だと思うが、特に変化を感じてない。恐らく文字化けが発生する時に効果が現れるかと思う。
- Character set: 万国語を収めたUTF-8の一択と思う。
- Emojis: 試す方法すら判らない。

---

## Keys

- Backarrow sends ^H
  - [*参照資料①*][keyBack]の話によれば、
    > チェックしないとASCII DEL(`^?`)が送られます。 この場合は殆どのソフトとかで普通のBackspaceとして使えますが、 readlineを使ったソフトとかでASCII DELだと消せなかったりします。
- Delete sends DEL
  - チェックする場合は`Del`を押すと前の文字を消すようになる。詳細は[*参照資料①*][keyBack]を参照してください。
- Ctrl+LeftAlt is AltGr: 欧洲のアクセント付きの文字と記号の入力機能
- AltGr is also Alt: 不明。
  - 推測だが、欧洲キーボードのAltGrキーをAltとしても使えるようにする機能だと思う。
- Compose key
  - アルファベットの次にアクセント記号を押すとアクセント付きの文字にする機能。
  - [*参考資料②*][wordEurope]の話によると、
    > `a` + `'` -> `á`

## Mouse

- Clicks place command line cursor
  - マウスをクリックすることで入力する行の任意の場所にカーソルを移動させられる。
- Application mouse mode: 不明。

## Selection

不明。

言及した文献も見付からず、書いているオプションの意味も判らないので試しようがない。

## Windows

---

## 参考資料

1. [Mintty(Cygwin)でのDelete sends DELの設定][keyBack]
2. [修飾キー][wordEurope]

<!-- リンクの声明 -->
[keyBack]: https://rcmdnk.com/blog/2017/09/02/computer-windows-cygwin/ "Mintty(Cygwin)でのDelete sends DELの設定"
[wordEurope]: https://ja.wikipedia.org/wiki/%E4%BF%AE%E9%A3%BE%E3%82%AD%E3%83%BC "修飾キー"
