## 基礎大綱

本章節旨在說明基礎的檔案規則

## 檔案格式

所有針對 Joomla 開發的檔案格式都必須存為 ASCII text、使用 UTF-8 編碼字型並且經過 Unix 格式化。以行為單位的程式碼必須使用換行字元(LF)作為結尾。換行字元的表示法為：10(序數)、012(八進位)、0A(十六進位)。不要使用純CR回車符(例如蘋果電腦)或是CRLF組合(例如windows電腦)。

## 拼字

所有使用在程式碼註解、類別、函式、變數、常數的命名原則都必須根據英式英文(en_GB)原則。但有些例外是可允許的，例如某些已內建在 PHP API 中常見的程式用語，或其他慣例用語如 "color" 這樣已制定的用法便可沿用美式英文

## 縮排

縮排一律使用 Tab 鈕(根據國際 PEAR 準則)。編碼時使用的 IDE 如 Eclipse 需設定 Tab 為4個空白字元長度。

## 行寬

原則上每行程式碼並沒有最大長度限制，但根據國際標準值，150字元能夠在不需要水平滾動的狀況下達到最好的可讀性。若遇到換行會影響輸出結果的情況(例如 PHP/HTML 混合的結構檔案)，更長的程式碼也是被允許的。

## 優良範例

以下提供一些外部資源，讓大家可以參考這些資源以及相關寫法：

* [Joomla 開發者網路](http://developer.joomla.org/) - 所有開發相關資源都可由此尋找
* [Joomla 開發教學文件](http://docs.joomla.org/Developers) - 官方完整的開發教學 Wiki
* [PEAR 編碼標準](http://pear.php.net/manual/en/standards.php)
* [Allman 縮排風格 (Wiki)](http://en.wikipedia.org/wiki/Indent_style#Allman_style)
* [Joomla Coding Standards Github](https://github.com/joomla/coding-standards) - 儲存 PHP Codesniffer 設定檔等等
* [Joomla CodeSniffer](http://docs.joomla.org/Joomla_CodeSniffer) - Joomla 開發過程與 IDE 的整合
* [Secure coding guidelines](http://docs.joomla.org/Secure_coding_guidelines) - 安全性編碼導覽

本清單將隨時補充~~~
