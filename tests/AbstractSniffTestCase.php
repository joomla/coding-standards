<?php
/**
 * An abstract class that all sniff unit tests must extend.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

namespace GreenCape\CodingStandardsTests;

require_once 'TestSet.php';

/**
 * An abstract class that all sniff unit tests must extend.
 *
 * A sniff unit test checks a .inc file for expected violations of a single
 * coding standard. Expected errors and warnings that are not found, or
 * warnings and errors that are not expected, are considered test failures.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
abstract class AbstractSniffTestCase extends \PHPUnit_Framework_TestCase
{

    /**
     * Enable or disable the backup and restoration of the $GLOBALS array.
     * Overwrite this attribute in a child class of TestCase.
     * Setting this attribute in setUp() has no effect!
     *
     * @var boolean
     */
    protected $backupGlobals = false;

    /**
     * Tests the extending classes Sniff class.
     *
     * @param TestSet $testset
     *
     * @throws \PHP_CodeSniffer_Exception
     */
    public final function execute(TestSet $testset)
    {
        $sniff    = $testset->getSniff();
        $testFile = $testset->getTestFile();
        $filename = basename($testFile);

        $phpcsFile = $this->processFile($testFile, $sniff, $testset->getCliValues());
        $messages = $this->processMessages($phpcsFile, $testset->getExpectedErrors(), $testset->getExpectedWarnings());

        if ($phpcsFile->getFixableCount() > 0) {
            $phpcsFile->fixer->fixFile();
            $fixable = $phpcsFile->getFixableCount();
            if ($fixable > 0) {
                $messages[] = "Failed to fix $fixable fixable violations in $filename";
            }

            $fixedFile = $testset->getExpectedFile();
            if (!empty($fixedFile) && file_exists($fixedFile)) {
                $diff = $phpcsFile->fixer->generateDiff($fixedFile);
                if (trim($diff) !== '') {
                    $fixedFilename     = basename($fixedFile);
                    $messages[] = "Fixed version of $filename does not match expected version in $fixedFilename; the diff is\n$diff";
                }
            }
        }

        $this->assertEmpty($messages, implode(PHP_EOL, $messages));
    }

    /**
     * Generate a list of test failures for a given sniffed file.
     *
     * @param \PHP_CodeSniffer_File $file The file being tested.
     * @param array                 $expectedErrors
     * @param array                 $expectedWarnings
     *
     * @return array
     */
    private function processMessages(\PHP_CodeSniffer_File $file, array $expectedErrors = [], array $expectedWarnings = [])
    {
        $testFile = $file->getFilename();
        $foundErrors   = $file->getErrors();
        $foundWarnings = $file->getWarnings();

        $failureMessages = array();

        $allProblems = array();
        $allProblems = $this->processErrors($expectedErrors, $foundErrors, $allProblems);
        $allProblems = $this->processWarnings($expectedWarnings, $foundWarnings, $allProblems);

        // Order the messages by line number.
        ksort($allProblems);

        foreach ($allProblems as $line => $problems) {
            $numErrors        = count($problems['found_errors']);
            $numWarnings      = count($problems['found_warnings']);
            $expErrors   = $problems['expected_errors'];
            $expWarnings = $problems['expected_warnings'];

            $errors      = '';
            $foundString = '';

            if ($expErrors !== $numErrors || $expWarnings !== $numWarnings) {
                $lineMessage     = "[LINE $line]";
                $expectedMessage = 'Expected ';
                $foundMessage    = 'in ' . basename($testFile) . ' but found ';

                if ($expErrors !== $numErrors) {
                    $expectedMessage .= "$expErrors error(s)";
                    $foundMessage .= "$numErrors error(s)";
                    if ($numErrors !== 0) {
                        $foundString .= 'error(s)';
                        $errors .= implode(PHP_EOL . ' -> ', $problems['found_errors']);
                    }

                    if ($expWarnings !== $numWarnings) {
                        $expectedMessage .= ' and ';
                        $foundMessage .= ' and ';
                        if ($numWarnings !== 0) {
                            if ($foundString !== '') {
                                $foundString .= ' and ';
                            }
                        }
                    }
                }

                if ($expWarnings !== $numWarnings) {
                    $expectedMessage .= "$expWarnings warning(s)";
                    $foundMessage .= "$numWarnings warning(s)";
                    if ($numWarnings !== 0) {
                        $foundString .= 'warning(s)';
                        if (empty($errors) === false) {
                            $errors .= PHP_EOL . ' -> ';
                        }

                        $errors .= implode(PHP_EOL . ' -> ', $problems['found_warnings']);
                    }
                }

                $fullMessage = "$lineMessage $expectedMessage $foundMessage.";
                if ($errors !== '') {
                    $fullMessage .= " The $foundString found were:" . PHP_EOL . " -> $errors";
                }

                $failureMessages[] = $fullMessage;

            }
        }
        $this->addToAssertionCount(max(0, count($expectedErrors) + count($expectedWarnings) - count($failureMessages) - 1));

        return $failureMessages;
    }

    /**
     * @param $testFile
     * @param $sniffCode
     * @param $commandLineValues
     *
     * @return \PHP_CodeSniffer_File
     * @throws \PHP_CodeSniffer_Exception
     */
    private function processFile($testFile, $sniffCode, $commandLineValues)
    {
        list($standard, $sniffGroup, $sniffName) = explode('.', $sniffCode);
        $phpcs = new \PHP_CodeSniffer();
        $phpcs->initStandard($standard, [$sniffCode]);
        $phpcs->cli->setCommandLineValues($commandLineValues);

        /** @noinspection PhpIncludeInspection */
        require_once str_replace(
            'ruleset.xml',
            "Sniffs/{$sniffGroup}/{$sniffName}Sniff.php",
            $phpcs->getInstalledStandardPath($standard)
        );

        $phpcsFile = $phpcs->processFile($testFile);

        return $phpcsFile;
    }

    /**
     * @param array $expectedErrors
     * @param       $foundErrors
     * @param       $problems
     *
     * @return array
     */
    private function processErrors(array $expectedErrors, $foundErrors, $problems)
    {
        foreach ($foundErrors as $line => $lineErrors) {
            foreach ($lineErrors as $column => $errors) {
                if (isset($problems[$line]) === false) {
                    $problems[$line] = array(
                        'expected_errors'   => 0,
                        'expected_warnings' => 0,
                        'found_errors'      => array(),
                        'found_warnings'    => array(),
                    );
                }

                $foundErrorsTemp = array();
                foreach ($problems[$line]['found_errors'] as $foundError) {
                    $foundErrorsTemp[] = $foundError;
                }

                $errorsTemp = array();
                foreach ($errors as $foundError) {
                    $errorsTemp[] = $foundError['message'] . ' (' . $foundError['source'] . ')';

                    $source = $foundError['source'];
                    if (in_array($source, $GLOBALS['PHP_CODESNIFFER_SNIFF_CODES']) === false) {
                        $GLOBALS['PHP_CODESNIFFER_SNIFF_CODES'][] = $source;
                    }

                    if ($foundError['fixable'] === true
                        && in_array($source, $GLOBALS['PHP_CODESNIFFER_FIXABLE_CODES']) === false
                    ) {
                        $GLOBALS['PHP_CODESNIFFER_FIXABLE_CODES'][] = $source;
                    }
                }

                $problems[$line]['found_errors'] = array_merge($foundErrorsTemp, $errorsTemp);
            }//end foreach

            if (isset($expectedErrors[$line]) === true) {
                $problems[$line]['expected_errors'] = $expectedErrors[$line];
            } else {
                $problems[$line]['expected_errors'] = 0;
            }

            unset($expectedErrors[$line]);
        }//end foreach

        foreach ($expectedErrors as $line => $numErrors) {
            if (isset($problems[$line]) === false) {
                $problems[$line] = array(
                    'expected_errors'   => 0,
                    'expected_warnings' => 0,
                    'found_errors'      => array(),
                    'found_warnings'    => array(),
                );
            }

            $problems[$line]['expected_errors'] = $numErrors;
        }

        return $problems;
    }

    /**
     * @param array $expectedWarnings
     * @param       $foundWarnings
     * @param       $problems
     *
     * @return array
     */
    private function processWarnings(array $expectedWarnings, $foundWarnings, $problems)
    {
        foreach ($foundWarnings as $line => $lineWarnings) {
            foreach ($lineWarnings as $column => $warnings) {
                if (isset($problems[$line]) === false) {
                    $problems[$line] = array(
                        'expected_errors'   => 0,
                        'expected_warnings' => 0,
                        'found_errors'      => array(),
                        'found_warnings'    => array(),
                    );
                }

                $foundWarningsTemp = array();
                foreach ($problems[$line]['found_warnings'] as $foundWarning) {
                    $foundWarningsTemp[] = $foundWarning;
                }

                $warningsTemp = array();
                foreach ($warnings as $warning) {
                    $warningsTemp[] = $warning['message'] . ' (' . $warning['source'] . ')';
                }

                $problems[$line]['found_warnings'] = array_merge($foundWarningsTemp, $warningsTemp);
            }//end foreach

            if (isset($expectedWarnings[$line]) === true) {
                $problems[$line]['expected_warnings'] = $expectedWarnings[$line];
            } else {
                $problems[$line]['expected_warnings'] = 0;
            }

            unset($expectedWarnings[$line]);
        }//end foreach

        foreach ($expectedWarnings as $line => $numWarnings) {
            if (isset($problems[$line]) === false) {
                $problems[$line] = array(
                    'expected_errors'   => 0,
                    'expected_warnings' => 0,
                    'found_errors'      => array(),
                    'found_warnings'    => array(),
                );
            }

            $problems[$line]['expected_warnings'] = $numWarnings;
        }

        return $problems;
    }
}
