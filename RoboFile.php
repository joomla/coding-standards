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
     * @param string $standard The standard to test, i.e., 'Joomla'. By default, all standards are tested.
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
