<?php

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    private $tmpDir = 'build/tmp';

    use \Robo\Common\TaskIO;

    /**
     * Perform unit tests
     *
     * @param string $standard The standard to test, one of [Joomla, WordPress]. By default, all standards are tested.
     * @param array  $options
     * @option $group Test this sniff group only. By default, all groups are tested.
     * @option $testdox Output the test result in testdox format.
     */
    public function test(
        $standard = null,
        $options = [
            'testdox' => false,
            'group'   => null,
        ]
    ) {
        $files = 'tests/Standards';
        if (!empty($standard)) {
            $files .= "/{$standard}*";
        }
        $this->taskTest($files, $options)->run();
    }

    /**
     * Fetch files from external coding standards.
     */
    public function update()
    {
        $this->updateWordpress();
    }

    /**
     * Fetch files for the current WordPress Coding Standard.
     */
    public function updateWordpress()
    {
        $repo = 'https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards.git';
        $tmp  = $this->tmpDir . '/wordpress';
        $this->fetch($repo, $tmp);
        $this->safeCopyDir("$tmp/WordPress", "src/WordPress");
        $this->compileWordpressRules("src/WordPress/ruleset.xml", $tmp);
        $this->_deleteDir($tmp);
    }

    /**
     * Show a list of all deprecated internal PHP functions.
     */
    public function listDeprecatedFunctions()
    {
        $functions = get_defined_functions();

        foreach ($functions['internal'] as $functionName) {
            $function = new ReflectionFunction($functionName);
            if (!method_exists($function, 'isDeprecated')) {
                break;
            }

            if ($function->isDeprecated()) {
                $this->say($functionName);
            }
        }
    }

    private function fetch($repo, $target)
    {
        if (file_exists("$target/.git")) {
            $this->_deleteDir($target);
        }
        $this->taskGitStack()
             ->cloneRepo($repo, $target)
             ->run();
    }

    /**
     * @param $source
     * @param $dest
     */
    private function safeCopyDir($source, $dest)
    {
        $this->_deleteDir($dest);
        $this->_mkdir($dest);
        $this->_copyDir($source, $dest);
    }

    /**
     * @param $ruleset
     * @param $target
     */
    private function compileWordpressRules($ruleset, $target)
    {
        $this->printTaskInfo('Compiling rulesets');
        $rules = file_get_contents($ruleset);
        preg_match_all('~\<rule ref="([^"]+)"/\>~', $rules, $matches, PREG_SET_ORDER);
        foreach ($matches as $subset) {
            $embeddedRules = file_get_contents("{$target}/{$subset[1]}/ruleset.xml");
            $embeddedRules = preg_replace('~\<\?.*?\?\>\s*~m', '', $embeddedRules);
            $embeddedRules = preg_replace('~\s*\</?ruleset.*?\>\s*~m', '', $embeddedRules);
            $embeddedRules = preg_replace('~\s*\<description\>.*?\</description\>~m', '', $embeddedRules);

            $rules = str_replace($subset[0], $embeddedRules, $rules);
        }

        foreach ($matches as $subset) {
            $rules = str_replace($subset[0], '', $rules);
        }

        file_put_contents($ruleset, $rules);
    }

    /**
     * @param $files
     *
     * @return \Robo\Task\Testing\PHPUnit
     */
    private function taskTest($files, $options = [])
    {
        $test = $this->taskPhpUnit()
                     ->bootstrap('tests/bootstrap.php')
                     ->files($files);

        if (!empty($options['group'])) {
            $test->option('--group ' . $options['group']);
        }

        if ($options['testdox']) {
            $test->option('--testdox');
        }

        return $test;
    }
}
