## CSS
這份準則是透過檢視一些新興的程式實作、想法、以及現有的編碼規範所集思廣益而成，並引用以下清單中所使用的概念：

1. [OOCSS Code Standards](https://github.com/stubbornella/oocss-code-standards)
2. [Oneweb Style Guide](https://github.com/nternetinspired/OneWeb/blob/master/STYLEGUIDE.md)
3. [Idiomatic CSS](https://github.com/necolas/idiomatic-css)


## 註解

### 主要段落
主要的程式碼段落必須以完整的註解區塊作為開頭，例如：

```css
/* ==========================================================================
   PRIMARY NAVIGATION
   ========================================================================== */
```

### 次要段落
次要段落須以開放式的註解區塊為開頭：

```css
/* Mobile navigation
   ========================================================================== */
```

### 文字註解
```css
/**
 * 短的註解描述使用 Doxygen 風格的註解格式
 *
 * The first sentence of the long description starts here and continues on this
 * line for a while finally concluding here at the end of this paragraph.
 *
 * 長的註解描述很適合做詳細的解釋與說明。如果有需要，可以使用 HTML、URLs 或其他資訊作為範例。
 *
 * @tag This is a tag named 'tag'
 *
 * TODO: 這是一個註解區塊中 todo 的範例，描述之後需要被完成的項目。
 *   一行應小於 80 個字元，換行之後須以兩個空白作為縮排開頭
 */
 ```

### 基本註解方式
```css
/* Basic comment */
```

### 未編譯的 LESS/Scss 註解
```css
// 這段註解在編譯的時候會被移除
```

## Class 命名方式
使用破折號 (-) 來處理復合式命名：

```css
/* 正確 - 使用破折號 */
.compound-class-name {…}

/* 錯誤 - 使用底線 */
.compound_class_name {…}

/* 錯誤 - 使用駝峰式命名 */
.compoundClassName {…}

/* 錯誤 - 不使用符號分隔 */
.compoundclassname {…}
```

### 縮排
須以一個 tab 來縮排 (等於 4 個空白)

```css
/* 正確 */
.example {
	color: #000;
	visibility: hidden;
}

/* 錯誤 - 寫在同一行 */
.example {color: #000; visibility: hidden;}
```

LESS/Scss 也應該正確被縮排寫成巢狀，其子選擇器還有樣式規則都應該縮排。巢狀的規則須以一空行作為間隔：
LESS/Scss should also be nested , with child selectors and rules indented again. Nested rules should also be spaced by one line:

```css
/* 正確 */
.example {

  > li {
    float: none;

	+ li {
		margin-top: 2px;
		margin-left: 0;
	}

  }

}
/* 錯誤 - 巢狀的樣式沒有正確縮排 */
.example {

	> li {
	float: none;

	+ li {
	margin-top: 2px;
	margin-left: 0;
	}

	}

}
/* 錯誤 - 巢狀的規則沒有以一空行作為間隔 */
.example {
  > li {
    float: none;
	+ li {
		margin-top: 2px;
		margin-left: 0;
	}
  }
}
```

### 對齊
左大括號必須跟選擇器位於同一行，並前綴一空白字元。右大括號須存在於最後一個屬性規則之後並獨立於新的一行，且應與左大括號處於相同的縮排。

```css
/* 正確 */
.example {
    color: #fff;
}

/* 錯誤 - 右大括號的位置錯了，沒有正確縮排 */
.example {
    color: #fff;
    }

/* 錯誤 - 左大括號之前沒有空白 */
.example{
    color: #fff;
}
```

### 樣式屬性格式
每一個屬性都應該存在獨立的一行，並縮排一個層級。冒號之前不應該有空白字元，但須後綴一空白字元。所有的樣式屬性須以分號 (;) 作為結尾。

```css
/* 正確 */
.example {
    background: black;
    color: #fff;
}

/* 錯誤 - 冒號後面沒有後綴空白 */
.example {
    background:black;
    color:#fff;
}

/* 錯誤 - 沒有以分號作為結尾 */
.example {
    background: black;
    color: #fff
}
```

### HEX 值
HEX 值應該使用小寫並以最小縮寫宣告：

```css
/* 正確 */
.example {
    color: #eee;
}

/* 錯誤 */
.example {
    color: #EEEEEE;
}
```

### HTML 屬性選擇器
屬性選擇器須以雙引號包含。

```css
/* 正確 */
input[type="button"] {
    ...
}

/* 錯誤 - 沒有雙引號 */
input[type=button] {
    ...
}

/* 錯誤 - 使用單引號 */
input[type='button'] {
    ...
}
```

### 零值的單位
零值不應該使用單位。

```css
/* 正確 */
.example {
   padding: 0;
}

/* 錯誤 - 使用單位 */
.example {
   padding: 0px;
}
```
