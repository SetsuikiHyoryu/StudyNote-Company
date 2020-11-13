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

### 定義組件

- 參見[`component.html`][component]文件。
- 參見[`component-data.html`][component-data]文件。

### 單文件組件

#### 使用腳手架vue-cli

[**vue-cli**官方下載點](https://github.com/vuejs/vue-cli/releases)

1. 安裝`Node.js`和`npm`。
2. 在本地計算機全局安裝`vue-cli`。
  
   ```bash
   npm install -g @vue/cli
   ```

   - 可以使用`vue -V`檢查是否安裝成功。

#### 創建項目

- `vue init [options] <template> <app-name>`
  - 以關聯的模版生成項目
  - 使用`vue init`需要執行`npm i -g @vue/cli-init`命令安裝依頼。

- `vue create [options] <app-name>`
  - 新建一個項目

#### 安裝依賴

- 執行以下命令安裝`package.json`中定義好的依頼。

  ```bash
  npm install
  ```

  - 依頼自動安裝在項目目録下的`node_modules`中。

#### 開啓測試服務器

```bash
npm run dev
```

- 會在8080端口顯示項目

#### 查看項目的目録結構

1. 查看`package.json`
   - `"scripts"`：npm scripts，任務運行器（task runner）。
     - `npm run dev`相當於輸入了`"scripts"`中的`"dev"`的屬性值。
   - `"dependencies"`：運行時的依頼。
   - `"browserslist"`：對瀏覽器的要求。
   - `"devDependencies"`：開發時的依頼。

2. 查看`webpack.config.js`
   - `module.exports`：webpack會用這個配置文件導出一個東西。
     - `entry`：項目的入口文件。
     - `output`：輸出。
       - `path`：打包文件的本地輸出路徑。
       - `publicPath`：打包文件的服務器輸出路徑。
     - `rules`：規則。對`test`的屬性值使用`use`的屬性值運行。
     - `resolve`：如果引入的文件是`extensions`中定義的後綴名，可以不用寫後綴。
     - `devServer`：對服務器的設置。

3. 查看`index.html`
   - `<div id="app"></div>`：用來挂載Vue實例的節點。
   - `<script src="/dist/build.js"></script>`：引入打包後的script。

4. 查看`src`目録
   - 正式寫代碼的位置。
   - `main.js`：入口文件。
     - `import Vue from 'vue'`：從模組裏引入Vue。
     - `import App from './App.vue'`：導入單文件組件並通過規則中的`vue-loader`轉換爲對象。
     - `render`函數：最底層的模版，HTML模版和template模版最終都會用render函數去表逹。

       ```javascript
       render: h => h(App)
  
       // 上文即：
       // 用App模版對象編譯一個DOM節點並挂載到id爲app的DOM節點中。
       // h就是createElement
       render: function(createElement) {
         createElement(App);
       }

       // 也可以寫爲：
       components: {
         // 組件名: 組件對象
         App: App
       }
       ```

   - `App.vue`：單文件組件。
     - `<template>`：即：

       ```javascript
       Vue.component("my-component",{
         template:
       });
       ```

     - `<script>`：

       ```javascript
       // data雖然寫在<script>裏了，但是必須要導出。
       export default {
         name: 'app',
         data () {
           return {
             msg: 'Welcome to Your Vue.js App'
           }
         }
       }

       // 上文相當於：
       Vue.component("my-component",{
         name: 'app', //此值並非内置屬性
         data () {
           return {
             msg: 'Welcome to Your Vue.js App'
           }
         }
       });
       ```

     - `<style>`：樣式。
       - 如果寫成`<style scoped>`則爲局部樣式，即出了組件就失效。

---

## 參考資料

- [主流框架 vue.js 快速入门 系列视频教程](https://www.youtube.com/watch?v=cMB-Ustw53s&list=PL9nxfq1tlKKm7rafYCLfGgymd-LRfzGEM&t=3s)

<!-- 聲明外鏈 -->
<!-- 解說 -->
[orig-bind]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/vue-orig%26data-bind.html
[watch]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/watch.html
[component-data]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/component-data.html
[component]: https://github.com/SetsuikiHyoryu/StudyNote-Company/blob/master/CODE/Vue/%E8%A7%A3%E8%AA%AA/component.html
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
