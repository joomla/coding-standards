## 編程標準分析

對於接受所貢獻出新的程式碼時，我們將會執行編程標準，以確保源程式碼的風格是一致的。也能確保你的代碼能符合此標準以順暢的進行代碼的貢獻。

## 配置編程分析工具

為了提高源程式碼的一致性和可讀性，Joomla 會使用代碼分析工具，CodeSniffer，並為了保持最新狀態，會把重要的變更與變化都會更新上 Joomla 專案的程式庫。

### 執行 CodeSniffer

Joomla 的編程標準規則都會交由名為 PHP CodeSniffer 的工具來寫入。若要安裝 PHP CodeSniffer 至您的系統，請到這個連結: [PHP CodeSniffer Pear Page](http://pear.php.net/package/PHP_CodeSniffer)查詢相關資訊。

你可以透過 CMS (內容管理系統)，Framework (框架)，或 Issue Tracker (問題追蹤) 這些型態的系統，並置於這些程式軟體的根目錄下執行這個工具。

```
phpcs --report=checkstyle --report-file=build/logs/checkstyle.xml --standard=/path/to/<your root>/build/phpcs/Joomla /path/to/<your root>
```

此外，如果在你的系統安裝了 Ant，你必須在它所配置的中的 `<root directory>` 裡的 Joomla 根目錄下執行 CodeSniffer 來測試與運行程式碼的分析。

```
ant phpcs
```

#### 已知的問題

-   在 Simplepie 的函式庫上執行 Code Sniffer 會產生一些問題，可將目標指向 libraries/joomla 即可避免。

## 其它工具

這裡有些其它可用的工具讓開發者能計畫發送源程式碼至現在的專案。

### PhpStorm 代碼樣式表
