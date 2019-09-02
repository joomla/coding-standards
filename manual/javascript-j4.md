### Javascript in Joomla 4

Joomla 4 uses ES6 syntax where ever possible. As part of this change we decided to use an industry standard codestyle
rules for our javascript - the AirBNB coding standards. These can be found [on their GitHub page](https://github.com/airbnb/javascript#table-of-contents)

We have four modifications to the defaults.

1. We allow parameter reassignment of function parameters to allow easier setting
of defaults (for examples please see the ESLint rules [here](https://eslint.org/docs/rules/no-param-reassign)).

2. Secondly we only allow the imports of dev dependencies from npm in our build directory (`build/`) (rather than in all
files).

3. We currently allow browser alerts using the `alert()` function (the long term intention is to disable this as we move
to our custom element alerts)

4. We always enable javascript strict mode as we aren't using javascript modules at the moment

We also use ESLint to enforce these rules. If you are familiar with javascript from other projects you've worked on you
can find our eslint rules at (in the following location on GitHub)[https://github.com/joomla/joomla-cms/blob/4.0-dev/.eslintrc]