## 區塊註解

被使用在 PHP 程式碼中 (如：文件、類別、類別屬性、方法和函數) 的說明標頭被稱作區塊註解 (docblocks)，撰寫方式遵循類似 JavaDoc 或 phpDOC 所使用的慣例。

這些區塊註解是仿效 PEAR 的標準，但是針對 Joomla 和 Joomla projects 做了些許的變更。

區塊註解裡所有的空白都是使用空白鍵，然而一般程式的縮排使用 tab 鍵，這樣的好處是使區塊註解能更有良好的閱讀性。任何的文字元素、標籤、變數、變數名稱、標籤說明至少都需要兩個空白鍵，並以最長的那個註解作為排版的對齊。

貢獻到 Joomla 專案下的程式碼，其版權將屬於 Joomla 專案，因此我們不允許其內包含 @author 標籤。您必須在 CREDITS.php 中更新您的貢獻記錄。Joomla 的哲學是：程式碼是被 "共同" 撰寫的，任何人都不能主張其擁有 Joomla 專案中的程式碼片段。然而，在核心 libraries 之中所使用的第三方 libraries 則允許使用 @author 標簽。

第三方程式資源編碼必須要留下完整的註解檔說明，說明註解寫法必須與其他PHP文件相同。

### 區塊註解開頭
文件區塊註解開頭必須按照以下必填或非必填規則。
簡短說明 (非必填，除非該文件包含兩個以上的物件或函數，結尾處需要斷行)。
詳細說明 (非必填，結尾處需要斷行)。

* @category (非必填，極少使用)
* @package (通常是非必填，但當是流程用程式碼就是必填)
* @subpackage (非必填)
* @author (非必填但只被允許在非 Joomla 程式資源裡，像是 Geshi 之類的第三方套件)
* @copyright (必填)
* @license (必填，需要是和 Joomla 授權相容)
* @deprecated (非必填)
* @link (非必填)
* @see (非必填)
* @since (通常是非必填，但當是流程用程式碼就是必填)

區塊註解開頭範例：
```php
/**
 * @package     Joomla.Installation
 * @subpackage  Controller
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
```

### 物件定義
物件定義必須在新的行列而開結束括號也放在新行列。物件方法必須遵循函數定義的準則。屬性和方法必須遵循 OOP 的標準，並進行適當的宣告 (選擇適合的 public, protected, private 和 static 使用)。
物件定義，屬性和方法必須在提供在區塊註解並遵循以下條件。

#### 物件區塊註解
物件註解定義必須按照以下區塊註解條件規則。
簡單區塊註解 (必填，除非該文件包含兩個以上的物件或函數，結尾處需要斷行)
* @category (非必填，極少使用)
* @package (必填)
* @subpackage (非必填)
* @author (非必填但只被允許在非 Joomla 程式資源裡，像是 Geshi 之類的第三方套件)
* @copyright (非必填除非是不同的文件註解)
* @license (非必填除非是不同的文件註解)
* @deprecated (非必填)
* @link (非必填)
* @see (非必填)
* @since (必填，該 class 剛被採用時軟體的版本)

物件區塊註解範例：
```php
/**
 * Controller class to initialise the database for the Joomla Installer.
 *
 * @package     Joomla.Installation
 * @subpackage  Controller
 * @since       3.1
 */
```

#### 物件屬性區塊註解：
物件屬性區塊註解定義必須按照以下區塊註解條件規則。
簡短說明 (非必填，結尾處需要斷行)。

* @var (必填，必須是屬性類型)
* @deprecated (非必填)
* @since (必填)

物件屬性區塊註解的範例：
```php
	/**
	 * The generated user ID
	 *
	 * @var    integer
	 * @since  3.1
	 */
	protected static $userId = 0;
```

#### 物件方法區塊註解和函式區塊註解
函數必須在一個新的行列和結束括號也放在新行列。空行應先行指定的返回值。

函數定義必須按照以下區塊註解條件規則。

* 簡短說明 (必填，結尾處需要斷行)
* 詳細說明 (非必填，結尾處需要斷行)
* @param (必填，如果有方法或函數參數，最後 @param 標籤後面跟著一個斷行)
* @return (必填，結尾處需要斷行)
* 其他標籤須按字母排序，不管怎樣一定要有 @since

函數註解範例：
```php
	/**
	 * Set a controller class suffix for a given HTTP method.
	 *
	 * @package Joomla.Framework
	 * @subpackage Router 
	 *
	 *
	 * @param   string  $method  The HTTP method for which to set the class suffix.
	 * @param   string  $suffix  The class suffix to use when fetching the controller name for a given request.
	 *
	 * @return  Router  Returns itself to support chaining.
	 *
	 * @since   1.0
	 */
	public function setHttpMethodSuffix($method, $suffix)
```

如果多行的函式定義，所有的行數都必須使用 tab 來做縮排而結束括號必須跟最後一個參數同一行。

```php
function fooBar($param1, $param2,
    $param3, $param4) 
{ 
    // Body of method. 
}
```
