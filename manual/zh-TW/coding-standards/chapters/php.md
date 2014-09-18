## 語言結構

### PHP 標籤

永遠使用長標籤： `<?php ?>` 來包裹 PHP 程式碼，不使用短標籤 `<? ?>`。這可以確保您的程式碼可執行在大多數未經設定的主機環境。

如果檔案中只包含PHP程式碼，則不應該包含結尾標籤 `?>`。這個標籤在 PHP 中不是必要的。這樣子可以避免在系統輸出前，不小心讓任何空白預先送出 header ，這會造成 Joomla 的 Session 功能錯誤 (參見 PHP 手冊的說明 [Instruction separation](http://php.net/basic-syntax.instruction-separation))。

檔案結尾必須永遠由一個空行結束。

### 引入程式

當您想要無條件引入一個檔案時，應使用 `require_once`。當您要有條件的引入一個檔案（例如 factory 類別與其方法），則用 `include_once`。這兩者都可以確保檔案不被二次載入。兩種用法共享檔案清單，所以混用不會有任何問題。被 `require_once` 引入的檔案不會再被 `include_once` 引入一次。

> **注意**
>
> `include_once` 與 `require_once` 是 PHP 關鍵字，不是函式，寫法應該如下:
>
>
> `require_once JPATH_COMPONENT . ’/helpers/helper.php’;`

您不應該把檔案路徑用括號包起來。

### 兼容 E_STRICT 的 PHP 程式

我們必須秉持並實踐 PHP 5.3 以上所支持的物件導向設計模式。Joomla! 一直致力於讓原始碼符合 E_STRICT 標準。

## 全域變數

盡量減少使用全域變數或超全域變數，用物件導向或工廠(Factory)模式替代之。

## 控制結構

所有的控制結構必須在關鍵字與起始括號之間放置一個空白字元，而開頭、結尾括號與邏輯判斷式之間無空格。這是為了區隔控制結構與函式以方便辨認，而括號內必須要包含邏輯。

所有的控制結構關鍵字，如： `if`, `else`, `do`, `for`, `foreach`, `try`, `catch`, `switch` 與 `while` 皆採 [Allman](http://en.wikipedia.org/wiki/Indent_style#Allman_style) 風格，關鍵字本身必須在一個新行，而語言區塊（大括號）的開頭與結束也接需再一個新行中。

### _if-else_ 範例

```php
if ($test)
{
	echo 'True';
}

// 註解可寫在此
// 要注意的是 "elseif" 採用單一單字而非拆開成 "else if"

elseif ($test === false)
{
	echo 'Really false';
}
else
{
	echo 'A white lie';
}
```

如果控制結構的判斷式需要多行，則第二行開始需要一個 Tab 縮排，結尾括號需要再同一行上。

```php
if ($test1
	&& $test2)
{
	echo 'True';
}
```

### _do-while_ 範例


```php
do
{
	$i++;
}
while ($i < 10);
```

### _for_ 範例

```php
for ($i = 0; $i < $n; $i++)
{
	echo 'Increment = ' . $i;
}
```

### _foreach_ 範例

```php
foreach ($rows as $index => $row)
{
	echo 'Index = ' . $id . ', Value = ' . $row;
}
```

### _while_ 範例

```php
while (!$done)
{
	$done = true;
}
```

### _switch_ 範例

當使用 `switch` 時， `case` 關鍵字必須縮排一次，而 `break` 關鍵字必須獨立在新的一行，且相較於 `case` 再縮排一次。

```php
switch ($value)
{
	case 'a':
		echo 'A';
		break;

	default:
		echo 'I give up';
		break;
}
```

## 參照

當使用變數參照時，參照符號應該距離等號一個空白字元，且跟後面的變數緊鄰，沒有空白。

範例:

```php
$ref1 = &$this->sql;
```

> **注意**
>
> 在 PHP 5 ，物件不再需要參照符號，所有物件皆是參照。

## 陣列

陣列元素的指派可稍微排版，當多行時，可用 Tab 縮排。每行跟隨一個都逗號結尾，最後一行可包含逗號，這是 PHP 允許的寫法，對於程式碼 diff 比對時也有所幫助。

範例:

```php
$options = array(
	'foo'	=> 'foo',
	'spam'	=> 'spam',
);
```

## 註解

行內註解可用 C 語言風格的 `/* ... */` 或 C++ 的單行註解 `// ...`。 C 風格的註解通常被用在文件開頭、類別、函式等等的文件標頭。而 C++ 風格單行註解則常用在程式解釋與提醒。註解對於幫助其他開發人員理解程式碼的目的有非常大的幫助，甚至包含您自己也能受惠。當程式碼開始進行複雜操作時，永遠記得要加上註解。至於 Perl 與 Shell 的井號 (`#`)註解則不建議使用，目前在 PHP 中也不再允許此類註解。

您可以在某些情況下藉由註解掉整段程式碼或類別函式以用於調整程式功能，但應該在最終提交到核心前去除這些註解或不再需要的程式區塊。

例如，不要在提交的程式碼中包含以下片段:

```php
// 這段程式碼未來需要修復
//$code = broken($fixme);
```

### 文件區塊註解

在 PHP、Javascript、檔案中的所有類別、成員屬性、方法與函式，皆需要區塊註解，並遵循 JavaDoc 或 phpDoc 的約定。

這些 "區塊註解 (DocBlocks)" 從 PEAR 引用而來，但也為了 Joomla Framework 做了一點改變。

雖然一般的縮排皆使用標準 Tab 來縮進，但區塊註解中，我們使用空格來排版，這提供了原始碼更優良的可讀性。任何文字元素，如標籤、變數的類型、變數名稱與標籤描述的最小距離必須是兩個空格。變數類型和標籤說明應分別按照最長的標籤和變數類型、變數描述對齊。

如果使用了 `@package` 標籤，必須是 "Joomla.Platform"。

除果使用了 `@subpackage` ，必須是 /joomla/ 資料夾下的頂層目錄名稱，例如: Application, Database, Html 等等。

> 註: 在 Joomla Framework 中，不再使用 `@package` 與 `@subpackage`。

貢獻給 Joomla 的程式碼，將成為專案的資產，不允許擁有 `@author` 標籤。你應該在 CREDITS.php 更新貢獻紀錄。Joomla 的理念是這樣的，所有的程式是一起發展編寫出來的，並沒有任何一個人擁有任何代碼中的一個部分。不過 `@author` 標籤允許使用在被包含進核心函式庫的第三方函式庫。

從第三方函式庫引入的檔案，其區塊註解必須完好無損。Layout 的檔案使用跟其他 PHP 檔案一樣的區塊註解。

### 檔案文件標頭註解

文件標頭註解有以下內容且按照順序

-   簡易說明 (選填, 除非超過兩個以上類別或方法) 結束空一行.
-   完整說明 (選填) 結束空一行.
-   `@category` (選填)
-   `@package` (通常是選填, 但如果檔案只包含程序邏輯(無類別)則必填)
-   `@subpackage` (選填)
-   `@author` (選填, 但只允許在非的Joomla源文件，例如，包括第三方函式庫例如 Geshi)
-   `@copyright` (必填)
-   `@license` (必填且必須是相容於 Joomla 所使用的授權條款)
-   `@deprecated` (選填)
-   `@link` (選填)
-   `@see` (選填)
-   `@since` (通常是選填，但如果檔案只包含程序邏輯(無類別)則必填)

```
/**
 * @package     Joomla.Platform
 * @subpackage  Database
 * @copyright   Copyright 2005 - 2010 Open Source Matters. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
```

## 函式呼叫

呼叫函式時, 函式名稱跟參數括號中不能有空白, 而第一個帶入參數也不得有空白; 每個參數逗點後一個空白隔開 (如果有的話), 最後一個參數跟括號沒有空格. 參數帶值等號前後需有空白. 可以多行對齊.

```php
// 單函式呼叫
$foo = bar($var1, $var2);

// 多函式呼叫
$short  = bar('short');
$medium = bar('medium');
$long   = bar('long');
```

## 函式定義

函式定義需開始並獨立於一新行，開始與結束的括號也需分別被放置於一新行。在負責處理回傳值的程式碼前應插入一空行。

函數定義必須包含註解說明，根據本文件中的註解章節所規範之規則予以撰寫。

-   簡易說明 (必要，結束需空一行)
-   完整說明 (選填，結束需空一行)
-   `@param` (若函式有參數則此欄位為必要，並於最後一個`@param`標簽之後新增一空行)
-   `@return` (必要，結束需空一行)
-   其餘標簽依據字母順序排列，需注意 @since 標籤永遠為必要。

```php
/**
 * An utility class.
 *
 * @package     Joomla.Platform
 * @subpackage  XBase
 *
 * @param       string  $path  The library path in dot notation.
 *
 * @return      void
 *
 * @since       1.6
 */
function jimport($path)
{
	// Body of method.
}
```

如果一個函數定義橫跨數行，第二行起的每一行皆需以一個 tab 作縮排，結束括號需與最後一個參數存在於同一行。

```php
function fooBar($param1, $param2,
	$param3, $param4)
{
	// Body of method.
}
```

## 類別定義

類別定義需開始並獨立於一新行，開始與結束的括號也需被分別放置於一新行。類別方法(Class Methods)需根據函數定義標準來撰寫。類別的屬性及方法需根據物件導向(OOP)標準適當宣告(使用適合的 public, protected, private 和 static 等屬性)

類別的定義、屬性及方法皆需撰寫對應的註解區塊(DocBlock)，根據接下來的準則規範。

### 類別註解區塊標頭

類別註解區塊包含以下必要及非必要欄位，並依照下列順序排列。

-   簡易說明(必要，除非該檔案擁有兩個以上之類別或函數)
-   完整說明(選填，結束需空一行)
-   `@category` (選填，很少用到)
-   `@package` (必要)
-   `@subpackage` (選填)
-   `@author` (選填，但只允許在非joomla的程式碼中，舉例來說，如：使用第三方函式庫如Geshi)
-   `@copyright` (選填，除非與檔案文件註解表頭(file Docblock)不同)
-   `@license` (選填，除非與檔案文件註解表頭(file Docblock)不同)
-   `@deprecated` (選填)
-   `@link` (選填)
-   `@see` (選填)
-   `@since` (必填, 根據類別第一次出現時的程式版本號)

### 類別屬性註解區塊

類別屬性註解區塊包含以下必要及非必要欄位，並依照下列順序排列。

-   簡易說明(必要，除非該檔案擁有兩個以上之類別或函數)
-   `@var` (必要，於該屬性後其後註明屬性種類(property type))
-   `@deprecated` (選填)
-   `@since` (必填)

### 類別方法註解區塊

類別方法註解區塊是依據PHP函式之規則做撰寫(如上述)。

```php
/**
 * An utility class.
 *
 * @package     Joomla.Platform
 * @subpackage  XBase
 * @since       1.6
 */
class JClass extends JObject
{
	/**
	 * Human readable name
	 *
	 * @var    string
	 * @since  1.6
	 */
	public $name;

	/**
	 * Method to get the name of the class.
	 *
	 * @param   string  $case  Optionally return in upper/lower case.
	 *
	 * @return  boolean  True if successfully loaded, false otherwise.
	 *
	 * @since   1.6
	 */
	public function getName($case = null)
	{
		// Body of method.

		return $this->name;
	}
}
```

## 命名慣例

### 類別

類別應給予描述性的名稱。在可能的情況下應避免縮寫。類別名稱總是以一個大寫字母開頭，且採用駝峰式 (CamelCase) 命名法則，即便名字中包含傳統上常用大寫的字彙(如 HTML, XML)。唯一例外是必須由 J 開頭的核心類別後面可接上一個大寫字母。

範例:

-   JHtmlHelper
-   JXmlParser
-   JModel

### 函式與方法

函式與方法採用 "studly caps" 風格 (也稱作 "bumpy case" 或 "camel caps")。 名稱起始的字母必須是小寫，而每個新單字的首個字母為大寫。而在 Joomla 框架中的函式必須由小寫字母 'j' 開頭。

範例:

-   connect();
-   getData();
-   buildSomeWidget();
-   jImport();
-   jDoSomething();

類別的私有成員屬性 (就是說只被用在他所宣告出來的類別內部的成員屬性) ，開頭有一個底線。屬性名稱採用底線命名風格 (也就是說，單字被底線區  隔開來)，且應該全部小寫。

範例:

```php
class JFooHelper
{
	protected $field_name = null;

	private $_status = null;

	protected function sort()
	{
	}
}
```

### 常數

常數應永遠為大寫，並用底線分隔單字。總是在常數前加上 `J` 且運用一些眾人常識和慣例來避免常數名稱太長。你 *應該* 使用類別或封包 (package) 中已經使用的名稱。例如在 'Joomla\Application\Web\Router' 中的常數，以 `JRoute_` 開頭。

### 全域變數

不要使用全域變數。採用靜態類別與屬性或常數替代。

### 一般情況下的變數與類別屬性

一般情況下的變數，遵循函式的慣例。

類別的屬性應該設為 null 或其他適當的預設值。

## 例外處理

例外處理應當只用於錯誤處理上。

下面的章節將指出如何照語意使用 [PHP 標準函式庫 (SPL) 的 Exceptions](http://php.net/manual/en/spl.exceptions.php)。

### 邏輯例外 LogicException

在 API 的使用方式上發生的明確問題會丟出 LogicException 的例外。例如：如果有個依賴參數失效時（你試圖操作一個未被載入的物件）。

下方的子類別也可被用於適當的情境下：

#### BadFunctionCallException

如果一個 callback 參照到一個未定義的函式(function) 或是缺少了一些參數時可以丟出該例外。例如：如果 `is_callable()` 或其他類似的函式用在一個函式(function)上時得到失敗的結果。

#### BadMethodCallException

如果一個 callback 參照到一個未定義的方法(method) 或是缺少了一些參數時可以丟出該例外。例如：如果 `is_callable()` 或其他類似的函式用在一個方法(method)上時得到失敗的結果。 另一個例子可能是找不到某些使用魔術方法的參數。

#### InvalidArgumentException

當有不合規格的輸入發生時丟出該例外。

#### DomainException

該例外和 InvalidArgumentException 類似，但會在一數值未依附在一已定義的有效資料群集的情形下丟出該例外。例如：試圖載入一個"mongodb"的資料庫引擎，但該引擎尚未在 API 中實作。

#### LengthException

當作一參數的長度檢查失敗時丟出該例外。例如：一個檔案的雜湊值不是一個指定長度的字串。

#### OutOfRangeException

該例外較少被實際的應用，但可在存取一個非法的索引值時丟出該例外。

### 執行期例外 RuntimeException

當外部實體或環境造成你無法控制的問題因而產生錯誤時，便丟出 RuntimeException 的例外。當一個錯誤的產生不能明確地被判斷出來時，預設丟出該例外。例如：你試圖連到資料庫但資料庫卻無法使用 (伺服器掛掉之類的)。另一個例子可能為 SQL 查詢語句的錯誤。

#### UnexpectedValueException

當一個非預期的結果發生時應當丟出該種類的例外。例如：當一個函式預期是要回傳布林值卻回傳字串時。

#### OutOfBoundsException

該例外較少實際的應用，但也許當某個值不為合法的索引值時丟出該例外。

#### OverflowException

該例外較少實際的應用，但也許當你加入一個元素到已經滿載的容器物件時丟出該例外。

#### RangeException

該例外較少實際的應用，但也許在程式執行期間丟出該例外以指出一個範圍的錯誤。通常這是指除了運算虧位/溢位之外的錯誤。該例外為 DomainException 的 runtime 版本。

#### UnderflowException

該例外較少實際的應用，但也許當你從一個空的容器物件中移除一個元素時丟出該例外。

### 例外處理的文件撰寫

每個函式(function)或方法(method)必須要註解使用到的例外，用 @throws 的標籤和丟出例外的物件名稱作註解。每種例外只須備被註解一次。註解的說明非必須。

## SQL 查詢語句

SQL 的保留字要全用大寫，其他的文字符號 (當然被引號包起來的文字為例外) 為小寫。

全部的 table 名稱必須要用 `#__` 的前綴字而不是用 `jos_` 去讀取 Joomla 的內容，並允許替換為使用者定義的資料庫前綴字。查詢語句也必須使用 JDatabaseQuery API。

```php
// Get the database connector.
$db = JFactory::getDBO();

// Get the query from the database connector.
$query = $db->getQuery(true);

// Build the query programatically (using chaining if desired).
$query->select('u.*')
	// Use the qn alias for the quoteName method to quote table names.
	->from($db->qn('#__users').' AS u'));

// Tell the database connector what query to run.
$db->setQuery($query);

// Invoke the query or data retrieval helper.
$users = $db->loadObjectList();
```
