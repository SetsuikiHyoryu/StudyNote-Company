# Jira（ジラ）の解説（大綱）

## 一、Scrum（スクラム）のワークフロー（[*参考資料①*][scrumWhat]）

![Scrumワークフロー](https://img-blog.csdnimg.cn/2018120311065261.jpg?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlYm1vdGU=,size_16,color_FFFFFF,t_70)

1. **Project** が始まる前に **Product Backlog** を決める
   - Project（プロジェクト）：開発プロジェクト
   - Product Backlog（プロダクト バックログ）
     - 開発の全体の要求（目標）のリスト
     - **User Story** で構成される
       - User Story（ユーザー　ストーリー）：具体的な業務要求
   - PO (Product owner) が決める
   - 要求の優先度で決める
   - Projectの期間を算出する

2. **Sprint（スプリント）**
   - 具体的な開発期間（ループする）
   - **Sprint Plan Meeting** で決める
     - Sprint Plan Meeting（スプリント　プラン　ミーティング）：
Sprint開始前の会議
     - Product Backlog から **Sprint Backlog** を決める
       - User Story を **Task** に細分する
         - Task（タスク）：開発者（Scrumチームメンバー）が具体的に開発する任務
   - **Daily meeting（デイリー　ミーティング）**
     - Taskの進捗を報告し状態を更新する
     - **Sprint burn down chart** を更新する
       - Sprint burn down chart（スプリント バーン　ダウン　チャート）：完了したTask又はStoryの視覚化表示（[*参考資料③*][burnDown]）

3. **Spring review meeting（スプリント　レビュー　ミーティング）**
   - 一つのSprintが完了後に行われる
   - 滞り無ければプログラムが **Release** される
     - Release（リリース）：プログラムの交付
   - **Sprint Retrospective Meeting（スプリント　レトゥロスペクティヴ　ミーティング）**
     - 今回のSprintを顧みる

---

## 二、Jira Softwareへアクセスする

1. [Atlassian](https://www.atlassian.com/)に入り、**Jira Software** を選択する
2. **Jira Software + Documentation（Choose two）** を選択する
3. **Continue with Google** or **Sign up with email** を選択する
4. **Claim your site** のカスタム
5. メールアドレスを入力してチームメイトを招待する（後でも可能）
6. Jira の設定を行うための質問に回答する
7. テンプレートの選択：**スクラム**
8. プロジェクト（Project）の作成
   - 名前：Projectの名前
   - キー：課題（Issue）の接頭辞(例: TESTを入力してTEST-100になる)

---

## 三、JiraでScrumを応用する

### Projectの作成

- ナビゲーション > プロジェクト > プロジェクトを作成
  - プロジェクトタイプ：クラシック　プロジェクト（使える機能が多い）
    - 名前：Projectの名前
    - キー：課題の接頭辞
    - テンプレート：スクラム（カンバンだとSprintがない）

### バックログ

- サイドバー > バックログ
  - コンテンツ内の上半分は Spring Backlog
  - コンテンツ内の下半分は Product Backlog
  - **課題を作成**を押すことでStoryやTaskなどを作成できる
  - **スプリントを作成**を押すことでSprintを作成できる
  - コンテンツ内の左側の**エピック**ボタンでEpicを作れる
    - **課題詳細ビュー**の**Epic Link**でエピックと連動できる

### アクティブなスプリント

- サイドバー > アクティブなスプリント
  - 開始されたSprintが表示される
  - 課題をマウスで移動できる
    - 移動先に応じてステータスが自動で変わる

### 課題

- 課題のリード > 設定
- リンク：他の課題と連動する

### ボード設定

- ボードとはStoryやTaskの進捗を視覚化で管理するシステムである
- 右上のリーダー記号 > ボード設定
  - 列
    - 列の追加：一般的に四種類の状態に合わせ四つの列
    - ステータスの追加：一つの列一つのステータス
  - クィックフィルター：ボードに表示される課題を絞り込むことが出来る
  - 見積：参照項目と時間の記録の有無をカスタムできる
  - 勤務日：非作業日も追加できる
  - 課題詳細ビュー：課題の詳細情報の編集（何故か無効）

---

## 四、Jiraに於けるScrumのワークフロー

### 基本的なワークフロー

1. バックログで課題（User Story, Taskなど）を作る
2. スプリントを作成し、Sprint　Backlogを作成されてスプリントに移動する
3. スプリントを開始する
4. アクティブなスプリントに移動し、課題がTO DOにあることを確認する
5. 進行中の課題を進行中に移動し、完成した課題を完成に移動する（レビュー作業があれば対応する列を作る）。

### ワークフローのカスタマイズ

- サイドバー > プロジェクト設定 > サイドバー > ワークフロー
  - **アクション**でカスタムできる
  - ワークフローの追加 > Marketplace から選択 で他人が定義したワークフローを使用できる

---

## 参考資料

1. [什么是敏捷开发？][scrumWhat]
2. [JIRA 软件——敏捷开发的利器][scrumJira]
3. [浅谈BurnDown Chart （原创）][burnDown]
4. [【初心者向け】目的別にわかる！ホームページのレイアウトの基本【現役デザイナーが解説】][devWord]

[scrumWhat]: https://blog.csdn.net/csdn15556927540/article/details/90712308 "什么是敏捷开发？"
[scrumJira]: https://blog.csdn.net/codeex/article/details/84752025 "JIRA 软件——敏捷开发的利器"
[burnDown]: https://www.jianshu.com/p/c59e2f6d861c?winzoom=1 "浅谈BurnDown Chart （原创）"
[devWord]: https://web-kanji.com/posts/homepage-layout "【初心者向け】目的別にわかる！ホームページのレイアウトの基本【現役デザイナーが解説】"
