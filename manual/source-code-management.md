Before we start talking about what Joomla! code should look like, it is appropriate to look at how and where the source code is stored. All serious software projects, whether driven by an Open Source community or developed within a company for proprietary purposes will manage the source code is some sort of source or version management system. The Joomla! project uses a Distributed Version Control System (DVCS) called Git hosted at [GitHub](https://github.com).

### The Joomla! Framework

The [Joomla! Framework](https://github.com/joomla-framework) is a PHP framework that is designed to serve as a foundation for not only web applications (like a CMS) but other types of software such as command line applications. The files that form the Joomla! Framework are stored in a Distributed Version Control System (DVCS) called Git hosted at [GitHub](https://github.com).

You can learn about how to get the Joomla Framework source code from the GitHub organisation, https://github.com/joomla-framework.

Because Git treats the concepts of file revision numbers differently than Subversion, the repository revision number is not required in files (that is, the `@version` tag is not necessary).

### The Joomla! CMS

The [Joomla! CMS](https://github.com/joomla/joomla-cms) is a Content Management System (CMS) which enables you to build Web sites and powerful online applications. It's a free and OpenSource software, distributed under the GNU General Public License version 2 or later. The files that form the Joomla! CMS are stored in a Distributed Version Control System (DVCS) called Git hosted at [GitHub](https://github.com).

You can learn about how to get the Joomla CMS source code from the Git repository, https://github.com/joomla/joomla-cms.

Because Git treats the concepts of file revision numbers differently than Subversion, the repository revision number is not required in files (that is, the `@version` tag is not necessary).

### Compliance Tool

The standards in this manual have been adopted across the Joomla project, including the [Joomla! Framework](https://github.com/joomla-framework), the [Joomla! CMS](https://github.com/joomla/joomla-cms) and any other applications or extensions maintained by the project. These standards apply to source code, tests and (where applicable) documentation.

A custom Joomla sniff standard for PHP files is maintained by the Joomla! project and available from the [coding standards](https://github.com/joomla/coding-standards) repository. The Sniff is based on the standard outlined in this document. For more information about how code standards are enforced see the analysis appendix of the manual. For information on using the Sniff see the documentation stored in its repository.
