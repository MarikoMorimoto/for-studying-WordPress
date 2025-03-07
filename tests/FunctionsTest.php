<?php
/**
 * テストケースは原則としてテスト対象クラスに対して1つ作成する。
 * テストケースは、PHPUnit\Framework\TestCase を継承して作成する。
 */
use PHPUnit\Framework\TestCase;

/**
 * テストするクラス名の末尾に「Test」という文字列を付与してクラスを定義し、それをファイル名とするのが一般的。
 */
class FunctionsTest extends TestCase {
	public function testFizzbuzz() {
		$this->assertEquals( 'Not FizzBuzz...', fizzbuzz(1 ) );
		$this->assertEquals( 'Not FizzBuzz...', fizzbuzz('0' ) );
		$this->assertEquals( 'Not FizzBuzz...', fizzbuzz('1234abcd' ) );
		$this->assertEquals( 'Fizz', fizzbuzz( 3 ) );
		$this->assertEquals( 'Fizz', fizzbuzz( '6' ) );
		$this->assertEquals( 'Buzz', fizzbuzz( '5' ) );
		$this->assertEquals( 'Buzz', fizzbuzz(500 ) );
		$this->assertEquals( 'FizzBuzz!', fizzbuzz(15 ) );
		$this->assertEquals( 'FizzBuzz!', fizzbuzz( '300' ) );
	}
}
