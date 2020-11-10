# 03. Laravel中的路由

---

## 路由的定義

- 將用戸的請求轉發給相應的程序處理
- 作用是建立url和程序之間的映射

---

## 實際操作

- 進入到`../app/Http/Requests/routes.php`文件
  1. 基本路由（請求）
     - get

       ```php
       //'basic'在實際操作中應該是變量
       Route::get('basic', function(){
           return 'basic';
       });
       ```

       - 在瀏覽器中顯示爲basic
       - 獲取url中的内容
     - post
  2. 多請求路由（響應指定的路由）
     - match

       ```php
       Route::match(['get', 'post'], 'multy', function(){
           return 'multy';
       });
       ```

       - 衹要匹配到中括號中任意的參數，就可以響應
     - any

       ```php
       Route::any('multy1', function(){
           return 'multy1';
       });
       ```

       - 響應所有的路由
  3. 路由參數

     ```php
     Route::get('user/{id}', function($id){
         return '$id';
     });
     ```

     - 使用默認值

       ```php
       Route::get('user1/{name?}', function($name = null){
           return $namae;
       });
       ```

     - 使用正則匹配name

       ```php
       Route::get('user2/{name?}, function($name){
           return $name;
       }) -> where('name', '[A-Za-z]+');
       ```

     - 路由行爲使用多個參數

       ```php
       Route::get('user3/{id}/{name?}', function($id, $name){
           return $id.'=>'.$name;
       }) -> where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);
       ```

     - 路由别名

       ```php
       Route::get('user/center', ['as' => 'center', function(){
           return route('center');
       }]);
       ```

     - 路由中輸出視圖

       ```php
       Route::get('shitu', function(){
           return view('welcome');
       });
       ```
