This chapter outlines the basic guidelines covering files contributed to the Joomla project. The most important rule to remember when coding for the Joomla project, **if in doubt, please ask**. 

### File Format

All files contributed to Joomla must be: 

* Stored as ASCII text  
  Exceptions: languages locales and some test files containing non-ASCII characters  
* Use UTF-8 character encoding
* Be Unix formatted following these rules. 
	1. Lines must end only with a line feed (LF). 
	2. Line feeds are represented as ordinal 10, octal 012 and hex 0A. 
	3. Do not use carriage returns (CR) like Macintosh computers do or the carriage return/line feed combination (CRLF) like Windows computers do.

### Spelling

The spelling of words and terms used in code comments and in the naming of class, functions, variables and constant should generally be in accordance with British English rules (en\_GB). Some exceptions are permitted, for example where common programming names are used that align with the PHP API or other established conventions such as for `color` where is it common practice to maintain US English spelling.

### Indenting

Tabs are used for indenting code (not spaces as required by the PEAR standard). Source code editors or Integrated Development Environments (IDE’s) such as Eclipse must have the tab-stops for indenting measuring four (4) spaces in length.

### Line Length

There is no maximum limit for line lengths in files, however, a notional value of about 150 characters is recommended to achieve a good level of readability without horizontal scrolling. Longer lines are permitted if the nature of the code for individual lines requires it and line breaks would have an adverse affect on the final output (such as for mixed PHP/HTML layout files).
