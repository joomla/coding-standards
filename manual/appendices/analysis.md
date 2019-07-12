For new contributions we are going to be enforcing coding standards to ensure that the coding style in the source code is consistent. Ensuring that your code meets these standards will make the process of code contribution smoother.

### Configuring Code Analysis Tools

In order to improve the consistency and readability of the source code, the Joomla project runs a coding style analysis tool, PHP_CodeSniffer, everytime changes are pushed to a Joomla project's repository. 

#### Running PHP_CodeSniffer

The Joomla Coding Standards sniffer rules are written to be used with a tool called PHP CodeSniffer. Please see the [PHP_CodeSniffer PEAR Page](http://pear.php.net/package/PHP_CodeSniffer) for information on installing PHP_CodeSniffer on your system.

You can run the CodeSniffer by going to the CMS, Framework, or Issue Tracker's root directory and executing 

```
phpcs --report=checkstyle --report-file=build/logs/checkstyle.xml --standard=/path/to/<your root>/build/phpcs/Joomla /path/to/<your root>
```

Alternatively, if you have Ant installed on your system, you may run the CodeSniffer by going to the `<root directory>` of the Joomla project's code you want to test and executing

```
ant phpcs
```

### Other Tools

Here are some other tools available to developers who are planning to submit source code to the project.

#### Set up PHP_CodeSniffer

See in the documentation https://docs.joomla.org/Joomla_CodeSniffer#3._IDE_Integration
