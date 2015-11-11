<?php
namespace GreenCape\CodingStandardsTests;

class TestSet
{
    /** @var  string Dot notated name of the sniff to be used in this set */
    protected $sniff;

    /** @var  string Name of the test file */
    protected $testFile;

    /** @var  array<string $args> Commandline arguments for this set */
    protected $cliValues = [];

   /** @var  string Name of the fixed file */
    protected $expectedFile;

    /** @var  array<int $line><int $expectedNumber> Expected warnings */
    protected $expectedWarnings;

    /** @var  array<int $line><int $expectedNumber> Expected errors */
    protected $expectedErrors;

    /**
     * @return string
     */
    public function getSniff()
    {
        return $this->sniff;
    }

    /**
     * @param string $sniff
     *
     * @return TestSet
     */
    public function setSniff($sniff)
    {
        $this->sniff = $sniff;

        return $this;
    }

    /**
     * @return string
     */
    public function getTestFile()
    {
        return $this->testFile;
    }

    /**
     * @param string $testFile
     *
     * @return TestSet
     */
    public function setTestFile($testFile)
    {
        $this->testFile = $testFile;

        return $this;
    }

    /**
     * @return array
     */
    public function getCliValues()
    {
        $cliValues = $this->cliValues;
        if (!in_array('-s', $cliValues)) {
            $cliValues[] = '-s';
        }

        return $cliValues;
    }

    /**
     * @param array $cliValues
     *
     * @return TestSet
     */
    public function setCliValues($cliValues)
    {
        $this->cliValues = $cliValues;

        return $this;
    }

    /**
     * @return string
     */
    public function getExpectedFile()
    {
        return $this->expectedFile;
    }

    /**
     * @param string $expectedFile
     *
     * @return TestSet
     */
    public function setExpectedFile($expectedFile)
    {
        $this->expectedFile = $expectedFile;

        return $this;
    }

    /**
     * @return array
     */
    public function getExpectedWarnings()
    {
        return $this->expectedWarnings;
    }

    /**
     * @param array $expectedWarnings
     *
     * @return TestSet
     */
    public function setExpectedWarnings($expectedWarnings)
    {
        $this->expectedWarnings = $expectedWarnings;

        return $this;
    }

    /**
     * @return array
     */
    public function getExpectedErrors()
    {
        return $this->expectedErrors;
    }

    /**
     * @param array $expectedErrors
     *
     * @return TestSet
     */
    public function setExpectedErrors($expectedErrors)
    {
        $this->expectedErrors = $expectedErrors;

        return $this;
    }
}
