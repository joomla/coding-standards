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

    public function test(
        $options = [
            'testdox' => false
        ]
    ) {
        $this->taskTest('tests/Standards', $options)->run();
    }

    public function testWordpress(
        $options = [
            'testdox' => false
        ]
    ) {
        $this->taskTest('tests/Standards/WordPress*', $options)->run();
    }

    public function testJoomla(
        $options = [
            'testdox' => false
        ]
    ) {
        $this->taskTest('tests/Standards/Joomla*', $options)->run();
    }

    public function update()
    {
        $this->updateWordpress();
    }

    public function updateWordpress()
    {
        $repo = 'https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards.git';
        $tmp  = $this->tmpDir . '/wordpress';
        $this->fetch($repo, $tmp);
        $this->safeCopyDir("$tmp/WordPress", "src/WordPress");
        $this->compileWordpressRules("src/WordPress/ruleset.xml", $tmp);
        $this->_deleteDir($tmp);
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

        if ($options['testdox']) {
            $test->option('--testdox');
        }

        return $test;
    }
}
