<?php

class SniffTest extends PHPUnit_Framework_TestCase
{
	public function ruleTestDescription()
	{
		$cases = [
			/* ## Basic Guidelines */

			/* ### File Format */
			'ByteOrderMark.valid' => [
				'Generic.Files',
			],
			'ByteOrderMark.invalid' => [
				'Generic.Files',
				1 => 'ERROR'
			],
			'LineEndings.valid' => [
				'Generic.Files',
			],
			'LineEndings.invalid.mac' => [
				'Generic.Files',
				1 => 'ERROR'
			],
			'LineEndings.invalid.win' => [
				'Generic.Files',
				1 => 'ERROR'
			],
			/* ### Spelling */

			/* ### Indenting */
			'DisallowSpaceIndent' => [
				'Generic.WhiteSpace',
				14 => 'ERROR',
				15 => 'ERROR',
				16 => 'ERROR'
			],

			/* ### Line Length */
			'LineLength' => [
				'Generic.Files',
				10 => 'WARNING'
			],

			/* ## Inline Code Comments */

			/* ### Formatting of Comments */
			'SingleComment' => [
				'Joomla.Commenting',
				10 => 'ERROR',
				15 => 'ERROR',
				34 => 'ERROR',
				42 => 'ERROR'
			],

			/* ### Content of comments */


			// -------------------------------------------------------------------------------------------

			'SideEffects.valid' => [
				'PSR1.Files',
			],
			'SideEffects.invalid' => [
				'PSR1.Files',
				1 => 'WARNING'
			],


			'ClassComment'                => [
				'Joomla.Commenting',
			],
			'ClassDeclaration'            => [
				'PEAR.Classes',
				12 => 'ERROR'
			],
			'ClosingTag'                  => [
				'Zend.Files',
			],
			'ColonSpacing'                => [
				'Squiz.CSS',
				12 => 'ERROR',
				17 => 'ERROR'
			],
			'ControlSignature'            => [
				'Joomla.ControlStructures',
			],
			'DeprecatedFunctions'         => [
				'Generic.PHP',
				12 => 'ERROR'
			],
			'DisallowMultipleStatements'  => [
				'Generic.Formatting',
				9 => 'ERROR'
			],
			'DisallowShortOpenTag'        => [
				'Generic.PHP',
				9 => 'ERROR'
			],
			'DocCommentAlignment'         => [
				'Squiz.Commenting',
				13 => 'ERROR',
				14 => 'ERROR',
				18 => 'ERROR',
				23 => 'ERROR'
			],
			'DuplicateClassDefinition'    => [
				'Squiz.CSS',
				11 => 'ERROR'
			],
			'ElseIfDeclaration'           => [
				'Joomla.ControlStructures',
			],
			'EmptyClassDefinition'        => [
				'Squiz.CSS',
				11 => 'ERROR'
			],
			'EmptyStyleDefinition'        => [
				'Squiz.CSS',
				12 => 'ERROR'
			],
			'EndFileNewline'              => [
				'Generic.Files',
				11 => 'ERROR'
			],
			'FileComment'                 => [
				'Joomla.Commenting',
			],
			'FunctionCallArgumentSpacing' => [
				'Generic.Functions',
				12 => 'ERROR',
				22 => 'ERROR'
			],
			'FunctionCallSignature'       => [
				'Joomla.Functions',
			],
			'FunctionComment'             => [
				'Joomla.Commenting',
			],
			'FunctionDeclaration'         => [
				'Joomla.Functions',
			],
			'IncrementDecrementUsage'     => [
				'Squiz.Operators',
				17 => 'ERROR',
				18 => 'ERROR'
			],
			'InlineComment'               => [
				'PEAR.Commenting',
				10 => 'ERROR'
			],
			'InlineControlStructure'      => [
				'Joomla.ControlStructures',
			],
			'InstantiateNewClasses'       => [
				'Joomla.Classes',
				11 => 'ERROR'
			],
			'LowerCaseConstant'           => [
				'Joomla.PHP',
			],
			'MemberVarScope'              => [
				'Joomla.Classes',
				9 => 'WARNING'
			],
			'MethodScope'                 => [
				'Joomla.Classes',
				9 => 'WARNING'
			],
			'MissingColon'                => [
				'Squiz.CSS',
				12 => 'ERROR',
				16 => 'ERROR',
				20 => 'ERROR'
			],
			'MultiLineAssignment'         => [
				'PEAR.Formatting',
				11 => 'ERROR',
				16 => 'ERROR'
			],
			'MultiLineCondition'          => [
				'Joomla.ControlStructures',
			],
			'SelfMemberReference'         => [
				'Squiz.Classes',
				14 => 'ERROR',
				17 => 'ERROR',
				44 => 'ERROR'
			],
			'SemicolonSpacing.CSS'      => [
				'Squiz.CSS',
				12 => 'ERROR',
				16 => 'ERROR'
			],
			'StatementNotFound'           => [
				'Joomla.Functions',
			],
			'UpperCaseConstantName'       => [
				'Generic.NamingConventions',
				15 => 'ERROR',
				19 => 'ERROR'
			],
			'UselessOverridingMethod'     => [
				'Generic.CodeAnalysis',
				28 => 'WARNING'
			],
			'ValidClassName'              => [
				'PEAR.NamingConventions',
				11 => 'ERROR',
				12 => 'ERROR',
				13 => 'ERROR'
			],
			'ValidDefaultValue'           => [
				'PEAR.Functions',
				12 => 'ERROR'
			],
			'ValidFunctionName'           => [
				'Joomla.NamingConventions',
			],
			'ValidVariableName'           => [
				'Joomla.NamingConventions',
			],
			'WhiteSpaceBefore'            => [
				'Joomla.ControlStructures',
			],
			'StaticThisUsage'             => [
				'Squiz.Scope',
				24 => 'ERROR'
			],
			'CastSpacing'                 => [
				'Joomla.WhiteSpace',
			],
			'ConcatenationSpacing'        => [
				'Joomla.WhiteSpace',
			],
			'ControlStructureSpacing'     => [
				'Joomla.WhiteSpace',
			],
			'MemberVarSpacing'            => [
				'Joomla.WhiteSpace',
			],
			'ObjectOperatorIndent'        => [
				'Joomla.WhiteSpace',
			],
			'OperatorSpacing'             => [
				'Joomla.WhiteSpace',
			],
			'ScopeClosingBrace'           => [
				'Squiz.WhiteSpace',
			],
			'SemicolonSpacing.PHP' => [
				'Joomla.WhiteSpace',
			],
			'SpaceAfterCast'              => [
				'Joomla.WhiteSpace',
			],
			'SuperfluousWhitespace'       => [
				'Joomla.WhiteSpace',
			],
		];

		$data = [];

		foreach ($cases as $basename => $expected)
		{
			if (empty($expected))
			{
				continue;
			}

			$standard = $expected[0];
			unset($expected[0]);

			$rule = preg_replace('~\..*~', '', $basename);
			echo "$basename => $standard.$rule\n";
			foreach (glob(__DIR__ . '/files/' . $basename . '.*') as $matchingFile)
			{
				echo "\t$matchingFile\n";
				$data[] = [
					'rulename' => "$standard.$rule",
					'testfile' => $matchingFile,
					'expected' => $expected
				];
			}
		}

		return $data;
	}

	/**
	 * @dataProvider ruleTestDescription
	 *
	 * @param  string $rulename
	 * @param  string $testfile
	 * @param         array <int $line, string $level>  $expected
	 */
	public function testSniff($rulename, $testfile, $expected)
	{
		if (!file_exists($testfile))
		{
			$this->markTestIncomplete("Test file '{$testfile}' is missing.");
		}

		$command = 'phpcs --standard=' . dirname(__DIR__) . '/Joomla';
		#$command .= ' -vvv';
		$command .= ' --sniffs=' . $rulename;
		$command .= ' ' . $testfile;

		exec($command, $output);

		#echo "\n" . implode("\n", $output) . "\n";

		$issues = [];
		foreach ($output as $line)
		{
			if (preg_match('~(\d+) \| (WARNING|ERROR)~', $line, $match))
			{
				$issues[$match[1]] = $match[2];
			}
		}

		$this->assertEquals($expected, $issues);
	}
}
