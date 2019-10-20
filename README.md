# CYFood 

## CYFood 介紹

### CYFood 是一個美食外送平台，裡面包含這各式美食、飲料...等。

### 使用對象可能是:
1. 會員訂購餐點
2. 店家想與本平台合作供應餐點
3. 後台管理查詢各環節狀況
------------------
## 如何使用 CYFood
------------------
### 首先先下載專案 or clone本專案
* <pre><code>git clone https://github.com/spaghetii/CYFood.git</pre>

### 進入資料夾
* <pre><code>cd CYFood</pre>

### 安裝套件 (請先確定資料庫是否已引入CYFood.sql)
1. <pre><code>composer install</pre>
2. <pre><code>cp .env.example .env</pre>
3. <pre><code>php artisan key:generate</pre>

### 測試是否可以在本機端執行
* <pre><code> php artisan serve</pre>
