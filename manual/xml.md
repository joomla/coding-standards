### Attributes

* Each attribute is on its own line.
* The four attributes `name`, `type`, `label` and `description` should be written in this order and at the top of the element definition.

### Closing Elements

Elements should be closed with the closing tag on a new line.

#### Exception

When the element only has few attributes, then the whole element can stay on the same line. A max line length of 100 characters is recommended for good reading.

### Examples

#### Element is **empty**:
```xml
<field
	name="abc"
	type="text"
	label="Empty Field"
	description="Empty field without options"
/>
```

#### Element is **not empty**:
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

#### Element with only a few attributes

```xml
<fieldset name="params" label="Some label for the field set" />
```
