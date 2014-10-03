##  原始碼管理

在開始講 Joomla! 的程式應該長什麼樣子之前，我們先來看看該如何和到哪裡存放原始碼。所有嚴謹的軟體專案，不管是開源社群主導的或是在一間公司開發其專屬的需求，都會利用一些資源管理或是版本管理系統來管理程式碼。Joomla 採用了名為 Git 的分散式版本管理系統 (DVCS)，並在 [GitHub.com](http://github.com) 上管理。

### The Joomla Framework

The [Joomla Framework](https://github.com/joomla/joomla-framework) 是一個 PHP 框架，被設計成一個開發的的基礎，不只能開發 Web 應用程式 (像是 CMS)，也能開發其他類型的軟體 (像是命令列的應用程式)。Joomla Framework 的檔案是用一個分散式版本管理系統 Git 的方式儲存在 Github.com 上。

你可以在 https://github.com/joomla/joomla-framework 這個 Git repository 取得 Joomla Framework 的原始碼。

因為 Git 對於檔案版號的概念不同於 Subversion，版本庫的版本號碼是不需要寫在檔案中的 (沒錯，不需要使用 `@version` 的備註)。

### The Joomla CMS

The [Joomla! CMS](https://github.com/joomla/joomla-cms) 是一個內容管理系統 (CMS)，讓你可以建構網頁和強大的線上應用程式。這是一個免費且開源的軟體，以 GNU General Public License version 2 或是更新的版本來發布。Joomla CMS 的檔案是用一個分散式版本管理系統 Git 的方式儲存在 Github.com 上。

你可以在 https://github.com/joomla/joomla-cms 這個 Git repository 取得 Joomla CMS 的原始碼。

因為 Git 對於檔案版號的概念不同於 Subversion，版本庫的版本號碼是不需要寫在檔案中的 (沒錯，不需要使用 `@version` 的備註)。

## 共通工具

這份標準文件已經被整個 Joomla 專案所採納，包括 [Joomla Framework](https://github.com/joomla/joomla-framework)，[Joomla! CMS](https://github.com/joomla/joomla-cms)，以及其他在此專案中被維護的應用程式。這些標準將被使用在原始碼，測試，以及文件 (可被應用的) 中。

Joomla 專案維護了一份為 PHP 檔案客製的 Joomla Sniff，可以在此版本庫中下載。這份 Sniff 是基於本文件中的開發標準。要了解更多關於這份開發標準是如何施行的請看本文件的分析附錄。使用該 Sniff 的方法請看存放在此版本庫的文件。
