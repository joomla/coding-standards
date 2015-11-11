<?php
/**
 * GreenCape Coding Standards - WordPress Tests
 *
 * @package greencape/coding-standards
 * @author  Niels Braczek <nbraczek@bsds.de>
 * @license MIT
 */

namespace GreenCape\CodingStandardsTests;

/**
 * Class WordPressUnitTest
 *
 * @package greencape/coding-standards
 */
class WordPressTest extends AbstractSniffTestCase
{
    public function testArrayAssignmentRestrictions()
    {
        \WordPress_Sniffs_Arrays_ArrayAssignmentRestrictionsSniff::$groups = array(
            'posts_per_page' => array(
                'type'    => 'error',
                'message' => 'Found assignment value of %s to be %s',
                'keys'    => array(
                    'foo',
                    'bar',
                ),
            ),
        );

        $this->execute((new TestSet())
            ->setSniff('WordPress.Arrays.ArrayAssignmentRestrictions')
            ->setTestFile('tests/Standards/WordPress/Arrays/ArrayAssignmentRestrictions.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3 => 1,
                5 => 1,
                7 => 2,
            ])
        );
    }

    public function testArrayDeclaration()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.Arrays.ArrayDeclaration')
            ->setTestFile('tests/Standards/WordPress/Arrays/ArrayDeclaration.inc')
            ->setExpectedFile('tests/Standards/WordPress/Arrays/ArrayDeclaration.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3   => 1,
                7   => 1,
                9   => 1,
                12  => 2,
                16  => 1,
                40  => 2,
                208 => 2,
            ])
        );
    }

    public function testArrayKeySpacingRestrictions()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.Arrays.ArrayKeySpacingRestrictions')
            ->setTestFile('tests/Standards/WordPress/Arrays/ArrayKeySpacingRestrictions.inc')
            ->setExpectedFile('tests/Standards/WordPress/Arrays/ArrayKeySpacingRestrictions.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                4  => 1,
                5  => 1,
                6  => 1,
                11 => 1,
                12 => 1,
                13 => 1,
                16 => 1,
                17 => 1,
                18 => 2,
                23 => 1,
                26 => 1,
                29 => 1,
                31 => 1,
            ])
        );
    }

    public function testValidClassName()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.Classes.ValidClassName')
            ->setTestFile('tests/Standards/WordPress/Classes/ValidClassName.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                7 => 1,
            ])
        );
    }

    public function testNonceVerification()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.CSRF.NonceVerification')
            ->setTestFile('tests/Standards/WordPress/CSRF/NonceVerification.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                5   => 1,
                9   => 1,
                31  => 1,
                44  => 1,
                48  => 1,
                69  => 1,
                89  => 1,
                113 => 1,
                114 => 1,
            ])
        );
    }

    public function testFileName()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.Files.FileName')
            ->setTestFile('tests/Standards/WordPress/Files/FileName.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([])
        );
    }

    public function testValidFunctionName()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.NamingConventions.ValidFunctionName')
            ->setTestFile('tests/Standards/WordPress/NamingConventions/ValidFunctionName.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3  => 1,
                13 => 1,
                15 => 1,
            ])
        );
    }

    public function testDiscouragedFunctions()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.PHP.DiscouragedFunctions')
            ->setTestFile('tests/Standards/WordPress/PHP/DiscouragedFunctions.inc')
            ->setExpectedWarnings([
                8  => 1,
                9  => 1,
                17 => 1,
                20 => 1,
                23 => 1,
                25 => 1,
                27 => 1,
                33 => 1,
                35 => 1,
                37 => 1,
                39 => 1,
                41 => 1,
                43 => 1,
                45 => 1,
                47 => 1,
                49 => 1,
                51 => 1,
                53 => 1,
                55 => 1,
                63 => 1,
                65 => 1,
                70 => 1,
                72 => 1,
            ])
            ->setExpectedErrors([])
        );
    }

    public function testStrictComparisons()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.PHP.StrictComparisons')
            ->setTestFile('tests/Standards/WordPress/PHP/StrictComparisons.inc')
            ->setExpectedWarnings([
                3  => 1,
                10 => 1,
                12 => 1,
            ])
            ->setExpectedErrors([])
        );
    }

    public function testYodaConditions()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.PHP.YodaConditions')
            ->setTestFile('tests/Standards/WordPress/PHP/YodaConditions.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                2  => 2,
                4  => 2,
                11 => 1,
                18 => 1,
                25 => 1,
                32 => 1,
                49 => 1,
                55 => 1,
                62 => 1,
                68 => 1,
                84 => 1,
            ])
        );
    }

    public function testGlobalVariables()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.Variables.GlobalVariables')
            ->setTestFile('tests/Standards/WordPress/Variables/GlobalVariables.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3 => 1,
                6 => 1,
            ])
        );
    }

    public function testVariableRestrictions()
    {
        \WordPress_Sniffs_Variables_VariableRestrictionsSniff::$groups = array(
            'test' => array(
                'type'          => 'error',
                'message'       => 'Detected usage of %s',
                'object_vars'   => array(
                    '$foo->bar',
                    'FOO::var',
                    'FOO::reg*',
                    'FOO::$static',
                ),
                'array_members' => array(
                    '$foo[\'test\']',
                ),
                'variables'     => array(
                    '$taz',
                ),

            ),
        );

        $this->execute((new TestSet())
            ->setSniff('WordPress.Variables.VariableRestrictions')
            ->setTestFile('tests/Standards/WordPress/Variables/VariableRestrictions.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3  => 1,
                5  => 1,
                11 => 1,
                15 => 1,
                17 => 1,
                21 => 1,
                23 => 1,
            ])
        );
    }

    public function testAdminBarRemoval()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.AdminBarRemoval')
            ->setTestFile('tests/Standards/WordPress/VIP/AdminBarRemoval.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3 => 1,
                5 => 1,
            ])
        );
    }

    public function testCronInterval()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.CronInterval')
            ->setTestFile('tests/Standards/WordPress/VIP/CronInterval.inc')
            ->setExpectedWarnings([
                37 => 1,
            ])
            ->setExpectedErrors([
                10 => 1,
                15 => 1,
                35 => 1,
                39 => 1,
            ])
        );
    }

    public function testDirectDatabaseQuery()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.DirectDatabaseQuery')
            ->setTestFile('tests/Standards/WordPress/VIP/DirectDatabaseQuery.inc')
            ->setExpectedWarnings([
                6  => 1,
                17 => 1,
                38 => 1,
                50 => 1,
            ])
            ->setExpectedErrors([
                6  => 1,
                8  => 1,
                32 => 1,
                34 => 1,
                50 => 1,
                78 => 1,
                79 => 1,
                80 => 1,
            ])
        );
    }

    public function testFileSystemWritesDisallow()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.FileSystemWritesDisallow')
            ->setTestFile('tests/Standards/WordPress/VIP/FileSystemWritesDisallow.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3  => 1,
                9  => 1,
                10 => 1,
                12 => 1,
            ])
        );
    }

    public function testOrderByRand()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.OrderByRand')
            ->setTestFile('tests/Standards/WordPress/VIP/OrderByRand.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                4  => 1,
                5  => 1,
                6  => 1,
                9  => 1,
                11 => 1,
            ])
        );
    }

    public function testPluginMenuSlug()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.PluginMenuSlug')
            ->setTestFile('tests/Standards/WordPress/VIP/PluginMenuSlug.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3 => 1,
                5 => 1,
            ])
        );
    }

    public function testPostsPerPage()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.PostsPerPage')
            ->setTestFile('tests/Standards/WordPress/VIP/PostsPerPage.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                4  => 1,
                5  => 1,
                6  => 1,
                11 => 2,
                13 => 1,
                16 => 1,
            ])
        );
    }

    public function testRestrictedFunctions()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.RestrictedFunctions')
            ->setTestFile('tests/Standards/WordPress/VIP/RestrictedFunctions.inc')
            ->setExpectedWarnings([
                7  => 1,
                9  => 1,
                11 => 1,
                13 => 1,
                15 => 1,
                17 => 1,
                19 => 1,
            ])
            ->setExpectedErrors([
                3  => 1,
                5  => 1,
                21 => 1,
                34 => version_compare(PHP_VERSION, '5.3.0', '>=') ? 0 : 1,
                36 => 1,
                38 => 1,
                40 => 1,
                42 => 1,
                44 => 1,
                46 => 1,
                48 => 1,
                50 => 1,
            ])
        );
    }

    public function testRestrictedVariables()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.RestrictedVariables')
            ->setTestFile('tests/Standards/WordPress/VIP/RestrictedVariables.inc')
            ->setExpectedWarnings([
                13 => 1,
                14 => 1,
                17 => 1,
            ])
            ->setExpectedErrors([
                3 => 1,
                5 => 1,
                7 => 1,
                9 => 1,
            ])
        );
    }

    public function testSessionFunctionsUsage()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.SessionFunctionsUsage')
            ->setTestFile('tests/Standards/WordPress/VIP/SessionFunctionsUsage.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3 => 1,
            ])
        );
    }

    public function testSessionVariableUsage()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.SessionVariableUsage')
            ->setTestFile('tests/Standards/WordPress/VIP/SessionVariableUsage.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3 => 1,
                4 => 1,
            ])
        );
    }

    /**
     * @testdox Slow DB query
     */
    public function testSlowDBQuery()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.SlowDBQuery')
            ->setTestFile('tests/Standards/WordPress/VIP/SlowDBQuery.inc')
            ->setExpectedWarnings([
                4  => 1,
                10 => 1,
                15 => 1,
                16 => 1,
                19 => 2,
            ])
            ->setExpectedErrors([])
        );
    }

    public function testSuperGlobalInputUsage()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.SuperGlobalInputUsage')
            ->setTestFile('tests/Standards/WordPress/VIP/SuperGlobalInputUsage.inc')
            ->setExpectedWarnings([
                3  => 1,
                11 => 1,
                13 => 1,
            ])
            ->setExpectedErrors([])
        );
    }

    public function testTimezoneChange()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.TimezoneChange')
            ->setTestFile('tests/Standards/WordPress/VIP/TimezoneChange.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3 => 1,
            ])
        );
    }

    public function testValidatedSanitizedInput()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.VIP.ValidatedSanitizedInput')
            ->setTestFile('tests/Standards/WordPress/VIP/ValidatedSanitizedInput.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                5   => 3,
                7   => 1,
                10  => 1,
                20  => 1,
                33  => 3,
                65  => 1,
                79  => 1,
                80  => 1,
                81  => 1,
                82  => 1,
                85  => 1,
                90  => 1,
                93  => 1,
                96  => 1,
                100 => 2,
                101 => 1,
                104 => 2,
                105 => 1,
                114 => 2,
            ])
        );
    }

    public function testCastStructureSpacing()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.WhiteSpace.CastStructureSpacing')
            ->setTestFile('tests/Standards/WordPress/WhiteSpace/CastStructureSpacing.inc')
            ->setExpectedWarnings([
                3  => 1,
                6  => 1,
                9  => 1,
                12 => 2,
                15 => 1,
                18 => 1,
                21 => 1,
            ])
            ->setExpectedErrors([])
        );
    }

    public function testControlStructureSpacing()
    {
        if (version_compare(PHP_VERSION, '5.3.0', '<')) {
            $this->markTestSkipped('Requires PHP >= 5.3');
        }

        $this->execute((new TestSet())
            ->setSniff('WordPress.WhiteSpace.ControlStructureSpacing')
            ->setTestFile('tests/Standards/WordPress/WhiteSpace/ControlStructureSpacing.inc')
            ->setExpectedFile('tests/Standards/WordPress/WhiteSpace/ControlStructureSpacing.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                4  => 2,
                17 => 2,
                29 => 5,
                37 => 1,
                41 => 1,
                42 => 1,
                49 => 5,
                58 => 3,
                67 => 1,
                68 => 1,
                69 => 1,
                71 => 1,
                72 => 1,
                81 => 3,
                82 => 1,
                85 => 1,
                91 => 2,
                92 => 1,
                94 => 1,
                95 => 1,
                97 => 1,
                98 => 1,
            ])
        );
    }

    public function testOperatorSpacing()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.WhiteSpace.OperatorSpacing')
            ->setTestFile('tests/Standards/WordPress/WhiteSpace/OperatorSpacing.inc')
            ->setExpectedFile('tests/Standards/WordPress/WhiteSpace/OperatorSpacing.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                5  => 4,
                18 => 1,
                45 => 1,
                49 => 1,
            ])
        );
    }

    public function testEnqueuedResources()
    {
        if (version_compare(PHP_VERSION, '5.3.0', '<')) {
            $this->markTestSkipped('Requires PHP >= 5.3');
        }

        $this->execute((new TestSet())
            ->setSniff('WordPress.WP.EnqueuedResources')
            ->setTestFile('tests/Standards/WordPress/WP/EnqueuedResources.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                1  => 1,
                2  => 1,
                6  => 1,
                7  => 1,
                10 => 1,
                11 => 1,
            ])
        );
    }

    /**
     * @testdox Prepared SQL
     */
    public function testPreparedSQL()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.WP.PreparedSQL')
            ->setTestFile('tests/Standards/WordPress/WP/PreparedSQL.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3  => 1,
                4  => 1,
                5  => 1,
                7  => 1,
                8  => 1,
                16 => 1,
                17 => 1,
                18 => 1,
            ])
        );
    }

    public function testEscapeOutput()
    {
        $this->execute((new TestSet())
            ->setSniff('WordPress.XSS.EscapeOutput')
            ->setTestFile('tests/Standards/WordPress/XSS/EscapeOutput.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                17  => 1,
                19  => 1,
                36  => 1,
                39  => 1,
                40  => 1,
                41  => 1,
                43  => 1,
                46  => 1,
                53  => 1,
                59  => 1,
                60  => 1,
                65  => 1,
                68  => 1,
                71  => 1,
                73  => 1,
                75  => 1,
                101 => 1,
                103 => 1,
                104 => 1,
                110 => 1,
                111 => 1,
                112 => 1,
                113 => 1,
                124 => 1,
                130 => 1,
                134 => 1,
                137 => 1,
                144 => 1,
                146 => 1,
                148 => 1,
                151 => 2,
                158 => 1,
                161 => 1,
                168 => 1,
                171 => 1,
                172 => 1,
            ])
        );
    }
}
