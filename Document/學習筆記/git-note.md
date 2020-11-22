# Git筆記

## 文件信息

### 作者

- 雪域冰龍

### 創建日期

- 2020/11/22

### 更新日期

- `-`

---

## 一、配置Git

### 配置用戸名和郵箱

```bash
git config --global user.name "name" #用戸名

git config --global user.email "email…" #郵箱
```

### 查看信息

```bash
git config -l
```

---

## 二、初始化本地倉庫

### Git Init

- 在本地文件夾中新建git倉庫（即`.git`文件夾）

```bash
git init
```

### Git Clone

- 克隆遠程倉庫至本地

```bash
git clone URL/SSH
```

---

## 三、管理本地倉庫

### 1. Git Status

- 詳見[*參考資料3*][status]
- 文件與目録在工作區、暫存區（stage區）的狀態
  - `Changes to be committed`：文件已被add進暫存區。
    - 將文件移出

      ```bash
      git restore --staged <filename>
      ```

  - `Changes not staged for commit`：暫存區中存在的文件在工作區中被修改，但未add修改。
    - 取消文件在工作區中的變更

      ```bash
      git restore <filename>
      ```

  - `Untracked files`：衹在工作區中存在的文件。
    - 可以使用`git add`命令將其添加至暫存區。

### 2. Git Diff

- 建議查看[*參考資料1*][diff]

```bash
# 若stage區爲空，顯示當前工作區和上次遞交到HEAD的文件的差異
# 若stage區不爲空，顯示當前工作區的文件和stage區的文件的差異
git diff

# 顯示stage區的文件和上次遞交到HEAD的文件的差異
git diff --staged
#或
git diff --cached

# 顯示當前工作區的文件和stage區的文件和上次遞交到HEAD的文件的所有差異
git diff HEAD
```

### 3. Git Add

- 將工作區的文件暫存到stage中
  - 工作區的文件的新的修改可以與暫存的快照進行比對（git diff）。

```bash
#暫存單個已修改的文件
git add 文件名.後綴

#暫存所有已修改的文件
git add .或者*

#暫存所有某一類文件
git add *.後綴
```

### 4. Git Commit

- 將stage中的内容提交至HEAD

```bash
git commit <文件名> -m "操作的描述"
```

---

## 四、管理遠程倉庫

### 1. Git Remote

- 關聯遠程倉庫

  ```bash
  git remote add 别名 URL/SSH
  ```

- 查看遠程倉庫

  ```bash
  # 僅顯示别名
  git remote

  # 顯示别名與URL
  git remote -v
  ```

- 删除與遠程倉庫的關聯

  ```bash
  git remote rm 别名
  ```

- 重命名别名

  ```bash
  git romte rename 舊名 新名
  ```

### 2. Git Pull

- 更新遠程倉庫至本地倉庫

  ```bash
  git pull 遠程倉庫别名 本地分支名:遠程分支名
  ```

### 3. Git Push

- 更新本地倉庫至遠程倉庫

  ```bash
  git push 遠程倉庫别名 本地分支名:遠程分支名
  ```

---

## 參考資料

1. [git diff的最全最详细的4大主流用法][diff]
2. [为什么要先 git add 才能 git commit ？][stage]
3. [git status 命令详解][status]

<!-- 聲明鏈接 -->
[diff]: https://blog.csdn.net/wq6ylg08/article/details/88798254 "git diff的最全最详细的4大主流用法"
[status]: https://www.cnblogs.com/shareAndStudy/p/12758036.html "git status 命令详解"
[stage]: https://www.zhihu.com/question/19946553/answer/13759819 "为什么要先 git add 才能 git commit ？"
