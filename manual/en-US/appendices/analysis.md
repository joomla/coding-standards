### Coding Standards Analysis

For new contributions we are going to be enforcing coding standards to ensure that the coding style in the source code is consistent. Ensuring that your code meets these standards will make the process of code contribution smoother.

### Configuring Code Analysis Tools

In order to improve the consistency and readability of the source code, the Joomla project runs a coding style analysis tool, CodeSniffer, everytime changes are pushed to a Joomla project's repository. 

#### Running CodeSniffer

The Joomla Platform sniffer rules are written to be used with a tool
called PHP\_CodeSniffer. Please see the [PHP\_CodeSniffer Pear
Page](http://pear.php.net/package/PHP_CodeSniffer) for information on
installing PHP\_CodeSniffer on your system.

You can run the CodeSniffer by going to the platform root directory and
executing `phpcs --report=checkstyle
      --report-file=build/logs/checkstyle.xml --standard=/path/to/platform/build/phpcs/Joomla /path/to/platform`

Alternatively, if you have Ant installed on your system, you may run the
CodeSniffer by going to the platform root directory and executing
`ant phpcs`

##### Known Issues

-   There is currently an issue with running the Code Sniffer on the
    Simplepie library. Pointing the sniffs at the libraries/joomla
    directory or below will avoid the issue.

### Other Tools

Here are some other tools available to developers who are planning to submit source code to the project.

#### PhpStorm Code Style Scheme



