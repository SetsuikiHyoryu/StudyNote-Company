# Vue

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

#### Vue(比對)

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

### 數據綁定

- 參見`vue-orig&data-bind.html`文件。

### 指令調用Vue對象

- 相對於`{{ Vue對象中的内容 }}`這種寫法。
- 參見`vue-zhiling.html`文件。

### 數據綁定與指令的練習

- 參見`data-bind&指令.html`文件。

---

## 參考資料

- [主流框架 vue.js 快速入门 系列视频教程](https://www.youtube.com/watch?v=cMB-Ustw53s&list=PL9nxfq1tlKKm7rafYCLfGgymd-LRfzGEM&t=3s)
