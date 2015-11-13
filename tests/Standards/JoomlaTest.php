<?php
/**
 * GreenCape Coding Standards - Joomla Tests
 *
 * @package greencape/coding-standards
 * @author  Niels Braczek <nbraczek@bsds.de>
 * @license MIT
 */

namespace GreenCape\CodingStandardsTests;

/**
 * Class JoomlaTest
 *
 * @package greencape/coding-standards
 */
class JoomlaTest extends AbstractSniffTestCase
{
    /**
     * @testdox Generic.CodeAnalysis.UselessOverridingMethod - An overriding method should extend functionality on a parent method
     * @group   CodeAnalysis
     */
    public function testUselessOverridingMethod()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.CodeAnalysis.UselessOverridingMethod')
            ->setTestFile('tests/Standards/Generic/CodeAnalysis/UselessOverridingMethod.inc')
            ->setExpectedWarnings([
                28 => 1,
            ])
            ->setExpectedErrors([])
        );
    }

    /**
     * @testdox Generic.ControlStructures.InlineControlStructure - Control Structures should use braces
     * @group   ControlStructures
     */
    public function testInlineControlStructure()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.ControlStructures.InlineControlStructure')
            ->setTestFile('tests/Standards/Generic/ControlStructures/InlineControlStructure.inc')
            ->setExpectedFile('tests/Standards/Generic/ControlStructures/InlineControlStructure.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                9 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.Files.ByteOrderMark - Use UTF-8 character encoding without BOM
     * @group   Files
     */
    public function testByteOrderMarkPresent()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Files.ByteOrderMark')
            ->setTestFile('tests/Standards/Generic/Files/ByteOrderMark-withBOM.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                1 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.Files.ByteOrderMark - Use UTF-8 character encoding without BOM
     * @group   Files
     */
    public function testByteOrderMarkNotPresent()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Files.ByteOrderMark')
            ->setTestFile('tests/Standards/Generic/Files/ByteOrderMark-withoutBOM.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([])
        );
    }

    /**
     * @testdox Generic.Files.EndFileNewline - File must end with a newline character
     * @group   Files
     */
    public function testEndFileNewlineWithoutLf()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Files.EndFileNewline')
            ->setTestFile('tests/Standards/Generic/Files/EndFileNewline-withoutLF.inc')
            ->setExpectedFile('tests/Standards/Generic/Files/EndFileNewline-withLF.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                8 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.Files.EndFileNewline - File must end with a newline character
     * @group   Files
     */
    public function testEndFileNewlineWithLf()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Files.EndFileNewline')
            ->setTestFile('tests/Standards/Generic/Files/EndFileNewline-withLF.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([])
        );
    }

    /**
     * @testdox Generic.Files.LineEndings - Use Unix newlines
     * @group   Files
     * @group   WhiteSpace
     */
    public function testWindowsLineEndings()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Files.LineEndings')
            ->setTestFile('tests/Standards/Generic/Files/LineEndings-windows.inc')
            ->setExpectedFile('tests/Standards/Generic/Files/LineEndings-unix.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                1 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.Files.LineEndings - Use Unix newlines
     * @group   Files
     * @group   WhiteSpace
     */
    public function testMacLineEndings()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Files.LineEndings')
            ->setTestFile('tests/Standards/Generic/Files/LineEndings-mac.inc')
            ->setExpectedFile('tests/Standards/Generic/Files/LineEndings-unix.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                1 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.Files.LineEndings - Use Unix newlines
     * @group   Files
     * @group   WhiteSpace
     */
    public function testUnixLineEndings()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Files.LineEndings')
            ->setTestFile('tests/Standards/Generic/Files/LineEndings-unix.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([])
        );
    }

    /**
     * @testdox Generic.Files.LineLength - Lines can be 150 chars long, but never show errors
     * @group   Files
     */
    public function testLineLength()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Files.LineLength')
            ->setTestFile('tests/Standards/Generic/Files/LineLength.inc')
            ->setExpectedWarnings([
                26 => 1,
            ])
            ->setExpectedErrors([])
        );
    }

    /**
     * @testdox Generic.Formatting.DisallowMultipleStatements - Each PHP statement must be on a line by itself
     * @group   Formatting
     */
    public function testDisallowMultipleStatements()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Formatting.DisallowMultipleStatements')
            ->setTestFile('tests/Standards/Generic/Formatting/DisallowMultipleStatements.inc')
            ->setTestFile('tests/Standards/Generic/Formatting/DisallowMultipleStatements.inc')
            ->setExpectedFile('tests/Standards/Generic/Formatting/DisallowMultipleStatements.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                9 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.Formatting.SpaceAfterCast - A cast statement must be followed by a single space
     * @group   Formatting
     * @group   WhiteSpace
     */
    public function testSpaceAfterCast()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Formatting.SpaceAfterCast')
            ->setTestFile('tests/Standards/Generic/Formatting/SpaceAfterCast.inc')
            ->setExpectedFile('tests/Standards/Generic/Formatting/SpaceAfterCast.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                7  => 1,
                10 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.Functions.FunctionCallArgumentSpacing - Function arguments should have one space after a comma, and single spaces surrounding the equals sign for default values
     * @group   Functions
     * @group   WhiteSpace
     */
    public function testFunctionCallArgumentSpacing()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Functions.FunctionCallArgumentSpacing')
            ->setTestFile('tests/Standards/Generic/Functions/FunctionCallArgumentSpacing.inc')
            ->setExpectedFile('tests/Standards/Generic/Functions/FunctionCallArgumentSpacing.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                7  => 1,
                10 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.NamingConventions.UpperCaseConstantName - Constants should always be all-uppercase, with underscores to separate words
     * @group   NamingConventions
     * @group   Constants
     */
    public function testUpperCaseConstantName()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.NamingConventions.UpperCaseConstantName')
            ->setTestFile('tests/Standards/Generic/NamingConventions/UpperCaseConstantName.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                15 => 1,
                19 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.PHP.DeprecatedFunctions - Deprecated functions should not be used
     * @group   PHP
     */
    public function testDeprecatedFunctions()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.PHP.DeprecatedFunctions')
            ->setTestFile('tests/Standards/Generic/PHP/DeprecatedFunctions.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                2  => 1,
                3  => 1,
                4  => 1,
                5  => 1,
                6  => 1,
                7  => 1,
                8  => 1,
                9  => 1,
                10 => 1,
                11 => 1,
                12 => 1,
                13 => 1,
                14 => 1,
                15 => 1,
                16 => 1,
                17 => 1,
                18 => 1,
                19 => 1,
                20 => 1,
                21 => 1,
                22 => 1,
                23 => 1,
                24 => 1,
                25 => 1,
                26 => 1,
                27 => 1,
                28 => 1,
                29 => 1,
                30 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.PHP.ForbiddenFunctions - The forbidden functions sizeof() and delete() should not be used
     * @group   PHP
     */
    public function testForbiddenFunctions()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.PHP.ForbiddenFunctions')
            ->setTestFile('tests/Standards/Generic/PHP/ForbiddenFunctions.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                9  => 1,
                17 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.PHP.LowerCaseConstant - TRUE, FALSE and NULL must be lowercase
     * @group   PHP
     */
    public function testLowerCaseConstant()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.PHP.LowerCaseConstant')
            ->setTestFile('tests/Standards/Generic/PHP/LowerCaseConstant.inc')
            ->setExpectedFile('tests/Standards/Generic/PHP/LowerCaseConstant.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                11 => 2,
                12 => 1,
            ])
        );
    }

    /**
     * @testdox Generic.Strings.UnnecessaryStringConcat - Literal strings should not be concatenated together
     * @group   Strings
     */
    public function testUnnecessaryStringConcat()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.Strings.UnnecessaryStringConcat')
            ->setTestFile('tests/Standards/Generic/Strings/UnnecessaryStringConcat.inc')
            ->setExpectedFile('tests/Standards/Generic/Strings/UnnecessaryStringConcat.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                9 => 2,
            ])
        );
    }

    /**
     * @testdox Generic.WhiteSpace.DisallowSpaceIndent - Tabs are used for indenting code (four spaces in length)
     * @group   WhiteSpace
     */
    public function testDisallowSpaceIndent()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Generic.WhiteSpace.DisallowSpaceIndent')
            ->setTestFile('tests/Standards/Generic/WhiteSpace/DisallowSpaceIndent.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                14 => 1,
                15 => 1,
                16 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Classes.InstantiateNewClasses - Instantiating new class without parameters does not require brackets
     * @group   Classes
     */
    public function testInstantiateNewClasses()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Classes.InstantiateNewClasses')
            ->setTestFile('tests/Standards/Joomla/Classes/InstantiateNewClasses.inc')
            ->setExpectedFile('tests/Standards/Joomla/Classes/InstantiateNewClasses.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                16 => 1,
                17 => 1,
                18 => 1,
                24 => 1,
                25 => 1,
                27 => 1,
                28 => 1,
                30 => 1,
                31 => 1,
                33 => 1,
                34 => 1,
                36 => 1,
                37 => 1,
                39 => 1,
                40 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.ClassComment - Classes must have a DocBlock comment
     * @group   Classes
     * @group   Commenting
     */
    public function testClassComment()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.ClassComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/ClassComment.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                5 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.FileComment - A hyphen must be used between the earliest and latest year
     * @group   Files
     * @group   Commenting
     */
    public function testFileComment()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.FileComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/FileComment.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                5 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.FunctionComment - Constructor and destructor comments must not have a return tag
     * @group   Functions
     * @group   Commenting
     */
    public function testFunctionCommentUselessReturn()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.FunctionComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/FunctionComment-uselessReturn.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                7  => 1,
                16 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.FunctionComment - Only one return tag is allowed in a function comment
     * @group   Functions
     * @group   Commenting
     */
    public function testFunctionCommentDuplicateReturn()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.FunctionComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/FunctionComment-duplicateReturn.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                10 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.FunctionComment - Return type must be specified for return tag in function comment
     * @group   Functions
     * @group   Commenting
     */
    public function testFunctionCommentMissingReturnType()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.FunctionComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/FunctionComment-missingReturnType.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                10 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.FunctionComment - Return type `integer` must not be abbreviated`
     * @group   Functions
     * @group   Commenting
     */
    public function testFunctionCommentInvalidReturn()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.FunctionComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/FunctionComment-invalidReturn.inc')
            ->setExpectedFile('tests/Standards/Joomla/Commenting/FunctionComment-invalidReturn.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                10 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.FunctionComment - Function comments other than Constructor and destructor must have a return tag
     * @group   Functions
     * @group   Commenting
     */
    public function testFunctionCommentMissingReturn()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.FunctionComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/FunctionComment-missingReturn.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                8 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.FunctionComment - Function parameters must be commented using param tag
     * @group   Functions
     * @group   Commenting
     */
    public function testFunctionCommentMissingParam()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.FunctionComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/FunctionComment-missingParam.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                10 => 1,
                19 => 1,
                23 => 1,
                32 => 1,
                36 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.FunctionComment - Variable types must align
     * @group   Functions
     * @group   Commenting
     * @group   WhiteSpace
     */
    public function testFunctionCommentBeforeParamType()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.FunctionComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/FunctionComment-beforeParamType.inc')
            ->setExpectedFile('tests/Standards/Joomla/Commenting/FunctionComment-beforeParamType.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                10 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.FunctionComment - Variable name in comment must match name in declaration
     * @group   Functions
     * @group   Commenting
     */
    public function testFunctionCommentParamNameMismatch()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.FunctionComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/FunctionComment-paramNameMismatch.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                6  => 1,
                10 => 1,
                19 => 1,
                23 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.FunctionComment - Variable name in comment must match name in declaration
     * @group   Functions
     * @group   Commenting
     */
    public function testFunctionCommentParameterAlignment()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.FunctionComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/FunctionComment-parameterAlignment.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                11 => 2,
                25 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.SingleComment - Hash comments are prohibited
     * @group   Commenting
     */
    public function testSingleCommentHashComment()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.SingleComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/SingleComment.HashComment.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                10 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.SingleComment - Comment must start with an upper case letter
     * @group   Commenting
     */
    public function testSingleCommentLowerCase()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.SingleComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/SingleComment.LowerCase.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                10 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.SingleComment - Multi-line comments must use (C) style
     * @group   Commenting
     */
    public function testSingleCommentMultiLine()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.SingleComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/SingleComment.MultiLine.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                19 => 1,
                20 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.SingleComment - Comments must precede code on a separate line
     * @group   Commenting
     */
    public function testSingleCommentInline()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.SingleComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/SingleComment.Inline.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                10 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Commenting.SingleComment - Some commenting issues can be fixed automatically
     * @group   Commenting
     */
    public function testSingleComment()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Commenting.SingleComment')
            ->setTestFile('tests/Standards/Joomla/Commenting/SingleComment.inc')
            ->setExpectedFile('tests/Standards/Joomla/Commenting/SingleComment.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                13 => 1,
                20 => 1,
                27 => 1,
                34 => 1,
                45 => 1,
                53 => 1,
                63 => 1,
                68 => 1,
                75 => 1,
                88 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.ControlStructures.ControlSignature - Control structures require certain formatting
     * @group   ControlStructures
     * @group   WhiteSpace
     */
    public function testControlSignature()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.ControlStructures.ControlSignature')
            ->setTestFile('tests/Standards/Joomla/ControlStructures/ControlSignature.inc')
            ->setExpectedFile('tests/Standards/Joomla/ControlStructures/ControlSignature.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                13 => 1,
                22 => 1,
                27 => 1,
                37 => 1,
                43 => 1,
                57 => 1,
                64 => 1,
                75 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.ControlStructures.ControlStructuresBrackets - Control structures require certain formatting
     * @group   ControlStructures
     * @group   WhiteSpace
     */
    public function testControlStructuresBrackets()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.ControlStructures.ControlStructuresBrackets')
            ->setTestFile('tests/Standards/Joomla/ControlStructures/ControlStructuresBrackets.inc')
            ->setExpectedFile('tests/Standards/Joomla/ControlStructures/ControlStructuresBrackets.inc.fixed')
            ->setExpectedWarnings([
                5 => 1,
            ])
            ->setExpectedErrors([
                9  => 1,
                15 => 1,
                20 => 1,
                26 => 1,
                31 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.ControlStructures.WhiteSpaceBefore - Control structures must be preceded by one blank line
     * @group   ControlStructures
     * @group   WhiteSpace
     */
    public function testWhiteSpaceBefore()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.ControlStructures.WhiteSpaceBefore')
            ->setTestFile('tests/Standards/Joomla/ControlStructures/WhiteSpaceBefore.inc')
            ->setExpectedFile('tests/Standards/Joomla/ControlStructures/WhiteSpaceBefore.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3  => 1,
                12 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Functions.StatementNotFunction - Don't use parenthesis for language constructs
     * @group   Functions
     */
    public function testStatementNotFunction()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Functions.StatementNotFunction')
            ->setTestFile('tests/Standards/Joomla/Functions/StatementNotFunction.inc')
            ->setExpectedFile('tests/Standards/Joomla/Functions/StatementNotFunction.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                5  => 1,
                6  => 1,
                7  => 1,
                8  => 1,
                9  => 1,
                10 => 1,
                12 => 1,
                14 => 1,
                16 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.NamingConventions.ValidFunctionName - Function names must be camelCaps
     * @group   NamingConventions
     * @group   Functions
     */
    public function testValidFunctionName()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.NamingConventions.ValidFunctionName')
            ->setTestFile('tests/Standards/Joomla/NamingConventions/ValidFunctionName.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                4  => 1,
                9  => 1,
                14 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.NamingConventions.ValidVariableName - Variable names must be camelCaps
     * @group   NamingConventions
     */
    public function testValidVariableName()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.NamingConventions.ValidVariableName')
            ->setTestFile('tests/Standards/Joomla/NamingConventions/ValidVariableName.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                4 => 1,
                6 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.Operators.ValidLogicalOperators - Use `&&` and `||` instead of `and` and `or`
     * @group   Operators
     */
    public function testValidLogicalOperators()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.Operators.ValidLogicalOperators')
            ->setTestFile('tests/Standards/Joomla/Operators/ValidLogicalOperators.inc')
            ->setExpectedFile('tests/Standards/Joomla/Operators/ValidLogicalOperators.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                6  => 1,
                11 => 1,
                16 => 2,
                21 => 1,
                22 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.PHP.DisallowShortOpenTag - Always use <?php ?> to delimit PHP code
     * @group   PHP
     */
    public function testDisallowShortOpenTag()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.PHP.DisallowShortOpenTag')
            ->setTestFile('tests/Standards/Joomla/PHP/DisallowShortOpenTag.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                9 => 1,
            ])
        );
    }

    /**
     * @testdox Joomla.WhiteSpace.MemberVarSpacing - Member variables must be formatted correctly
     * @group   WhiteSpace
     */
    public function testMemberVarSpacing()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Joomla.WhiteSpace.MemberVarSpacing')
            ->setTestFile('tests/Standards/Joomla/WhiteSpace/MemberVarSpacing.inc')
            ->setExpectedFile('tests/Standards/Joomla/WhiteSpace/MemberVarSpacing.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                5   => 1,
                8   => 1,
                23  => 1,
                28  => 1,
                42  => 1,
                45  => 1,
                51  => 1,
                54  => 1,
                69  => 1,
                74  => 1,
                88  => 1,
                91  => 1,
                103 => 1,
                106 => 1,
            ])
        );
    }

    /**
     * @testdox PEAR.Classes.ClassDeclaration - The opening brace of a class must be on the line after the definition by itself
     * @group   Classes
     */
    public function testClassDeclaration()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PEAR.Classes.ClassDeclaration')
            ->setTestFile('tests/Standards/PEAR/Classes/ClassDeclaration.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                12 => 1,
            ])
        );
    }

    /**
     * @testdox PEAR.Commenting.InlineComment - Perl-style comments are not allowed
     * @group   Classes
     */
    public function testInlineComment()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PEAR.Commenting.InlineComment')
            ->setTestFile('tests/Standards/PEAR/Commenting/InlineComment.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                7 => 1,
            ])
        );
    }

    /**
     * @testdox PEAR.ControlStructures.MultiLineCondition - Multi-line if conditions should be indented one level and each line should begin with a boolean operator, the end parenthesis should be on a new line
     * @group   ControlStructures
     */
    public function testMultiLineCondition()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PEAR.ControlStructures.MultiLineCondition')
            ->setTestFile('tests/Standards/PEAR/ControlStructures/MultiLineCondition.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                11 => 1,
                23 => 1,
                35 => 1,
            ])
        );
    }

    /**
     * @testdox PEAR.Formatting.MultiLineAssignment - Multi-line assignment should have the equals sign be the first item on the second line indented correctly
     * @group   Formatting
     */
    public function testMultiLineAssignment()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PEAR.Formatting.MultiLineAssignment')
            ->setTestFile('tests/Standards/PEAR/Formatting/MultiLineAssignment.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                11 => 1,
                16 => 1,
            ])
        );
    }

    /**
     * @testdox PEAR.Functions.FunctionCallSignature - Functions should be called with no spaces between the function name, the opening parenthesis, and the first parameter; and no space between the last parameter, the closing parenthesis, and the semicolon
     * @group   Functions
     */
    public function testFunctionCallSignature()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PEAR.Functions.FunctionCallSignature')
            ->setTestFile('tests/Standards/PEAR/Functions/FunctionCallSignature.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                7  => 2,
                10 => 2,
                22 => 1,
            ])
        );
    }

    /**
     * @testdox PEAR.Functions.FunctionDeclaration - There should be exactly 1 space after the function keyword and 1 space on each side of the use keyword.  Closures should use the Kernighan/Ritchie Brace style and other single-line functions should use the BSD/Allman style.  Multi-line function declarations should have the parameter lists indented one level with the closing parenthesis on a newline followed by a single space and the opening brace of the function
     * @group   Functions
     */
    public function testFunctionDeclaration()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PEAR.Functions.FunctionDeclaration')
            ->setTestFile('tests/Standards/PEAR/Functions/FunctionDeclaration.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                8  => 4,
                20 => 1,
                21 => 3,
            ])
        );
    }

    /**
     * @testdox PEAR.Functions.ValidDefaultValue - Arguments with default values must be at the end of the argument list
     * @group   Functions
     */
    public function testValidDefaultValue()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PEAR.Functions.ValidDefaultValue')
            ->setTestFile('tests/Standards/PEAR/Functions/ValidDefaultValue.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                12 => 1,
            ])
        );
    }

    /**
     * @testdox PEAR.NamingConventions.ValidClassName - Class name must begin with a capital letter
     * @group   NamingConventions
     */
    public function testValidClassName()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PEAR.NamingConventions.ValidClassName')
            ->setTestFile('tests/Standards/PEAR/NamingConventions/ValidClassName.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                11 => 1,
            ])
        );
    }

    /**
     * @testdox PEAR.WhiteSpace.ObjectOperatorIndent - Chained object operators when spread out over multiple lines should be the first thing on the line and be indented by 1 level
     * @group   WhiteSpace
     */
    public function testObjectOperatorIndent()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PEAR.WhiteSpace.ObjectOperatorIndent')
            ->setTestFile('tests/Standards/PEAR/WhiteSpace/ObjectOperatorIndent.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                10 => 1,
                15 => 1,
                16 => 1,
            ])
        );
    }

    /**
     * @testdox PSR1.Files.SideEffects - A file should not contain class and side effects
     * @group   Files
     */
    public function testSideEffectsBoth()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PSR1.Files.SideEffects')
            ->setTestFile('tests/Standards/PSR1/Files/SideEffects-both.inc')
            ->setExpectedWarnings([
                1 => 1,
            ])
            ->setExpectedErrors([])
        );
    }

    /**
     * @testdox PSR1.Files.SideEffects - A file should not contain class and side effects
     * @group   Files
     */
    public function testSideEffectsClass()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PSR1.Files.SideEffects')
            ->setTestFile('tests/Standards/PSR1/Files/SideEffects-class.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([])
        );
    }

    /**
     * @testdox PSR1.Files.SideEffects - A file should not contain class and side effects
     * @group   Files
     */
    public function testSideEffectsSideEffect()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PSR1.Files.SideEffects')
            ->setTestFile('tests/Standards/PSR1/Files/SideEffects-sideEffect.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([])
        );
    }

    /**
     * @testdox PSR2.ControlStructures.ElseIfDeclaration - elseif keyword should be used instead of else if
     * @group   ControlStructures
     */
    public function testElseIfDeclaration()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('PSR2.ControlStructures.ElseIfDeclaration')
            ->setTestFile('tests/Standards/PSR2/ControlStructures/ElseIfDeclaration.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                13 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.CSS.ColonSpacing - No space before and one space after a colon in a style definition
     * @group   CSS
     */
    public function testColonSpacing()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.CSS.ColonSpacing')
            ->setTestFile('tests/Standards/Squiz/CSS/ColonSpacing.css')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                12 => 1,
                17 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.CSS.DuplicateClassDefinition - CSS classes should not be defined twice
     * @group   CSS
     */
    public function testDuplicateClassDefinition()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.CSS.DuplicateClassDefinition')
            ->setTestFile('tests/Standards/Squiz/CSS/DuplicateClassDefinition.css')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                11 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.CSS.EmptyClassDefinition - CSS classes should not be empty
     * @group   CSS
     */
    public function testEmptyClassDefinition()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.CSS.EmptyClassDefinition')
            ->setTestFile('tests/Standards/Squiz/CSS/EmptyClassDefinition.css')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                11 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.CSS.EmptyStyleDefinition - CSS styles should not be empty
     * @group   CSS
     */
    public function testEmptyStyleDefinition()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.CSS.EmptyStyleDefinition')
            ->setTestFile('tests/Standards/Squiz/CSS/EmptyStyleDefinition.css')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                12 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.CSS.MissingColon - Styles must be assigned using colon
     * @group   CSS
     */
    public function testMissingColon()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.CSS.MissingColon')
            ->setTestFile('tests/Standards/Squiz/CSS/MissingColon.css')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                12 => 1,
                16 => 1,
                20 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.CSS.SemicolonSpacing - Style definitions must end with a semicolon
     * @group   CSS
     */
    public function testSemicolonSpacingCss()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.CSS.SemicolonSpacing')
            ->setTestFile('tests/Standards/Squiz/CSS/SemicolonSpacing.css')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                12 => 1,
                16 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.Classes.SelfMemberReference - Must use "self::" for local static member reference
     * @group   Classes
     */
    public function testSelfMemberReference()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.Classes.SelfMemberReference')
            ->setTestFile('tests/Standards/Squiz/Classes/SelfMemberReference.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                14 => 1,
                17 => 2,
                44 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.Commenting.BlockComment - Block comments must be formatted properly
     * @group   Commenting
     */
    public function testBlockComment()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.Commenting.BlockComment')
            ->setTestFile('tests/Standards/Squiz/Commenting/BlockComment.inc')
            ->setExpectedFile('tests/Standards/Squiz/Commenting/BlockComment.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                15 => 1,
                22 => 1,
                46 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.Commenting.DocCommentAlignment - DocBlock comments must be formatted properly
     * @group   Commenting
     * @group   Formatting
     * @group   WhiteSpace
     */
    public function testDocCommentAlignment()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.Commenting.DocCommentAlignment')
            ->setTestFile('tests/Standards/Squiz/Commenting/DocCommentAlignment.inc')
            ->setExpectedFile('tests/Standards/Squiz/Commenting/DocCommentAlignment.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                13 => 1,
                14 => 1,
                18 => 1,
                23 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.Commenting.VariableComment - Skipped, sniff does not work
     * @group   Commenting
     */
    public function testVariableComment()
    {
        $this->markTestSkipped('Sniff does not work');

        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.Commenting.VariableComment')
            ->setTestFile('tests/Standards/Squiz/Commenting/VariableComment.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
            ])
        );
    }

    /**
     * @testdox Squiz.Operators.IncrementDecrementUsage - Increment and decrement operators must be bracketed when used in string concatenation
     * @group   Operators
     */
    public function testIncrementDecrementUsage()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.Operators.IncrementDecrementUsage')
            ->setTestFile('tests/Standards/Squiz/Operators/IncrementDecrementUsage.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                17 => 1,
                18 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.PHP.CommentedOutCode - Code should be commented out
     * @group   PHP
     * @group   Commenting
     */
    public function testCommentedOutCode()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.PHP.CommentedOutCode')
            ->setTestFile('tests/Standards/Squiz/PHP/CommentedOutCode.inc')
            ->setExpectedWarnings([
                3 => 1,
            ])
            ->setExpectedErrors([])
        );
    }

    /**
     * @testdox Squiz.PHP.GlobalKeyword - Use of the `global` keyword is forbidden
     * @group   PHP
     * @group   Commenting
     */
    public function testGlobalKeyword()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.PHP.GlobalKeyword')
            ->setTestFile('tests/Standards/Squiz/PHP/GlobalKeyword.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                4 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.Scope.MemberVarScope - Scope modifier must be specified for member variable
     * @group   Scope
     * @group   PHP
     */
    public function testMemberVarScope()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.Scope.MemberVarScope')
            ->setTestFile('tests/Standards/Squiz/Scope/MemberVarScope.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                9 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.Scope.MethodScope - Scope modifier must be specified for methods
     * @group   Scope
     * @group   PHP
     */
    public function testMethodScope()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.Scope.MethodScope')
            ->setTestFile('tests/Standards/Squiz/Scope/MethodScope.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                9 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.Scope.StaticThisUsage - Usage of "$this" in static methods is forbidden
     * @group   Scope
     * @group   PHP
     */
    public function testStaticThisUsage()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.Scope.StaticThisUsage')
            ->setTestFile('tests/Standards/Squiz/Scope/StaticThisUsage.inc')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                24 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.Strings.ConcatenationSpacing - Concat operator must be surrounded by a single space
     * @group   Strings
     * @group   WhiteSpace
     */
    public function testConcatenationSpacing()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.Strings.ConcatenationSpacing')
            ->setTestFile('tests/Standards/Squiz/Strings/ConcatenationSpacing.inc')
            ->setExpectedFile('tests/Standards/Squiz/Strings/ConcatenationSpacing.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                7 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.WhiteSpace.CastSpacing - Casts should not have whitespace inside the parentheses
     * @group   WhiteSpace
     */
    public function testCastSpacing()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.WhiteSpace.CastSpacing')
            ->setTestFile('tests/Standards/Squiz/WhiteSpace/CastSpacing.inc')
            ->setExpectedFile('tests/Standards/Squiz/WhiteSpace/CastSpacing.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                7 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.WhiteSpace.ControlStructureSpacing - No empty lines around control structure bodies
     * @group   WhiteSpace
     * @group   ControlStructures
     */
    public function testControlStructureSpacing()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.WhiteSpace.ControlStructureSpacing')
            ->setTestFile('tests/Standards/Squiz/WhiteSpace/ControlStructureSpacing.inc')
            ->setExpectedFile('tests/Standards/Squiz/WhiteSpace/ControlStructureSpacing.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                8  => 1,
                16 => 1,
                28 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.WhiteSpace.OperatorSpacing - Dual operators must be surrounded with one space
     * @group   WhiteSpace
     * @group   Operators
     */
    public function testOperatorSpacing()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.WhiteSpace.OperatorSpacing')
            ->setTestFile('tests/Standards/Squiz/WhiteSpace/OperatorSpacing.inc')
            ->setExpectedFile('tests/Standards/Squiz/WhiteSpace/OperatorSpacing.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                5 => 4,
                9 => 2,
            ])
        );
    }

    /**
     * @testdox Squiz.WhiteSpace.ScopeClosingBrace - Closing brace must be on a line by itself
     * @group   WhiteSpace
     */
    public function testScopeClosingBrace()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.WhiteSpace.ScopeClosingBrace')
            ->setTestFile('tests/Standards/Squiz/WhiteSpace/ScopeClosingBrace.inc')
            ->setExpectedFile('tests/Standards/Squiz/WhiteSpace/ScopeClosingBrace.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                3  => 1,
                13 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.WhiteSpace.SemicolonSpacing - No space before semicolon
     * @group   WhiteSpace
     */
    public function testSemicolonSpacing()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.WhiteSpace.SemicolonSpacing')
            ->setTestFile('tests/Standards/Squiz/WhiteSpace/SemicolonSpacing.inc')
            ->setExpectedFile('tests/Standards/Squiz/WhiteSpace/SemicolonSpacing.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                5 => 1,
                9 => 1,
            ])
        );
    }

    /**
     * @testdox Squiz.WhiteSpace.SuperfluousWhitespace - Avoid superfluous whitespace
     * @group   WhiteSpace
     */
    public function testSuperfluousWhitespace()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Squiz.WhiteSpace.SuperfluousWhitespace')
            ->setTestFile('tests/Standards/Squiz/WhiteSpace/SuperfluousWhitespace.inc')
            ->setExpectedFile('tests/Standards/Squiz/WhiteSpace/SuperfluousWhitespace.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                7  => 1,
                13 => 1,
            ])
        );
    }

    /**
     * @testdox Zend.Files.ClosingTag - A closing tag is not permitted at the end of a PHP file
     * @group   Files
     */
    public function testClosingTag()
    {
        $this->execute((new TestSet('Joomla'))
            ->setSniff('Zend.Files.ClosingTag')
            ->setTestFile('tests/Standards/Zend/Files/ClosingTag.inc')
            ->setExpectedFile('tests/Standards/Zend/Files/ClosingTag.inc.fixed')
            ->setExpectedWarnings([])
            ->setExpectedErrors([
                4 => 1,
            ])
        );
    }
}
