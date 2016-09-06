## XML 檔案

### 屬性

* 各個屬性寫在自己的那一行
* 這四個屬性 `name`, `type`, `label` 和 `description` 必須要照這個順序並且寫在 XML 元素定義的最前面

### Closing Elements

元素應該在下一行被 closing tag 包起來

### 特例

當元素的屬性較少時，可以讓整個元素寫在同一行上
為了易讀性，建議單行最長文字數為 100 個字元

#### 範例

元素為 **空元素**:
```xml
<field
	name="abc"
	type="text"
	label="Empty Field"
	description="Empty field without options"
	/>
```

元素為 **非空元素**:
```xml
<field
	name="abc"
	type="radio"
	label="Field"
	description="Field with options"
	>
	<option value="1">JYES</option>
	<option value="0">JNO</option>
</field>

<field
	name="abc"
	type="radio"
	label="Field"
	description="Field with options"
	>
	<option
		value="1"
		foo="bar"
		>
		SOMETHING_VERY_LONG
	</option>
	<option value="0">
		SOMETHING_VERY_LONG
	</option>
</field>
```
