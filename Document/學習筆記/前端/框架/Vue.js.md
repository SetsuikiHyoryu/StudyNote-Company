# Vue.js

**文件的外鏈如果失效請在評論區向我反映，看到後我會及時處理。**

## 前端框架是什麼

- 是一個JS的工具集合
  - JS決定前端上限

- 使用框架可以更快更好地開發程序。
  - 在框架的限定下寫出的代碼更好維護和復用。
  - 組件可以節省重複寫代碼的時間。

### 横向對比Vue/Angular/React

#### Angular

- GOOGLE開發
- PC端
- 思想很好
- 框架很重
- API經常更改

#### React

- 臉書開發
- 虛擬DOM
  - 用渲染JS代替渲染DOM
  - 用JS對象表示當前節點，和之前的JS對象比較，沒有改變就不渲染DOM。
  - DOM：Document Object Model
    - DOMに沿った書き方で定義された「ノード」を通じてJavaScriptからHTMLを操作することができる。
- 學習成本較高：JSX語法
  - HTML和CSS都寫入了JS

#### Vue

- 尤雨溪
- 借鑒了Angular和React
  - 有虛擬DOM並優化了
- 可以寫正常的前端語法
- Vue兼容TypeScript

---

## 學習Vue

### 官網

- <vuejs.org>
  - 漸進式的JS框架
    - 漸進式：一點一點一步一步進行開發
    - GitHub可以查看生態及源碼

### 引入Vue

1. 進入官網
2. 點撃**GET START**
3. 點撃左邊欄中的Installation
4. 選擇引入方式：視頻教程使用服務器地址引入Vue庫。
   - 直接用`<script>`引入
     - 開發版本
       - 報錯信息全面
       - 占用資源較多
     - 生産版本
       - 衹有必要的報錯信息
       - 占用資源較少

   - CDN服務器
     - **unpkg**
     - **cdnjs**
     - 粘貼服務器地址使用

   - NPM：包管理工具模块化引入

---

## 語法

### 數據綁定v-bind

- 參見[`vue-orig&data-bind.html`][orig-bind]文件。
- `v-bind`因爲頻繁使用，所以可以直接以冒號代替。

### 指令調用Vue對象

- 相對於`{{ Vue對象中的内容 }}`這種寫法。
- 參見[`vue-zhiling.html`][zhiling]文件。

### 數據綁定與指令的練習

- 參見[`data-bind&指令.html`][zhiling-try]文件。

### v-on指令——事件的使用及事件修飾符

- 參見[`v-on.html`][on]文件。
- 參見[`event-modifiers.html`][modifiers]文件。
- `v-on`因爲頻繁使用，所以可以以`@`代替。

### v-on指令綁定事件及事件修飾符的練習

- 參見[`v-on&event-modifiers.html`][on-modifiers-try]文件。

### 雙向數據綁定v-model

- 參見[`two-way-data-bind.html`][twoWay]文件。

### 把數據變爲DOM節點

- 參見[`data-to-node.html`][dataToNode]文件。

#### v-if條件渲染

- 參見[`v-if.html`][if]文件。

#### v-cloak短時隠藏節點

- 參見[`v-cloak.html`][cloak]文件。

### v-for循環列表渲染

- 參見[`v-for-multiple-times-render.html`][for]文件。

#### 注意事項

- 參見[`v-for-notice.html`][for-notice]文件。
- 參見[`v-for-notice2.html`][for-notice2]文件。

### 雙向綁定(v-model)、條件渲染(v-if)、列表渲染(v-for)的練習

- 參見[`two-way&v-if&v-for.html`][twoWay-if-for-try]文件。

### 計算屬性computed

- 參見[`computed.html`][computed]文件。

### watch監聽

- 參見[`watch.html`][watch]文件。

#### 與**computed**的區别

- computed需要讀取一個返回值；watch不需要。
- computed由於要實時讀取返回值，也不能執行異步操作。

### computed與watch的練習

- 參見[`computed&watch.html`][computed-watch]文件。

### filters過濾器

- 參見[`filters.html`][filters]文件。
- 可以`屬性 | filter | filter`的方式實現多次篩選。

### filters的練習

- 參見[`filters-try.html`][filters-try]文件。

### 樣式

- 參見[`style1.html`][style1]文件。
- 參見[`style2.html`][style2]文件。

---

## 組件化開發

---

## 參考資料

- [主流框架 vue.js 快速入门 系列视频教程](https://www.youtube.com/watch?v=cMB-Ustw53s&list=PL9nxfq1tlKKm7rafYCLfGgymd-LRfzGEM&t=3s)

<!-- 聲明外鏈 -->
<!-- 解說 -->
[orig-bind]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/vue-orig%26data-bind.html
[watch]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/watch.html
[style1]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/style1.html
[style2]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/style2.html
[filters]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/filters.html
[zhiling]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/vue-zhiling.html
[on]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/v-on.html
[modifiers]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/event-modifiers.html
[twoWay]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/two-way-data-bind.html
[dataToNode]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/data-to-node.html
[if]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/v-if.html
[cloak]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/v-cloak.html
[for]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/v-for-multiple-times-render.html
[for-notice]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/v-for-notice.html
[for-notice2]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/v-for-notice2.html
[computed]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/computed.html

<!-- 練習 -->
[zhiling-try]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E7%B7%B4%E7%BF%92/data-bind%26%E6%8C%87%E4%BB%A4.html
[on-modifiers-try]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E7%B7%B4%E7%BF%92/v-on&event-modifiers.html
[twoWay-if-for-try]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E7%B7%B4%E7%BF%92/two-way&v-if&v-for.html
[computed-watch]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E7%B7%B4%E7%BF%92/computed&watch.html
[filters-try]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E7%B7%B4%E7%BF%92/filters-try.html
