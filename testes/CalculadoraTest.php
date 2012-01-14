<?php

require_once "../classes/Calculadora.php";
require_once "/usr/share/php/PHPUnit/Framework.php";

class CalculadoraTest extends PHPUnit_Framework_TestCase {
	
	private $calculadora;

	public function setUp()
	{
		$this->calculadora = new Calculadora;	
	}

	public function tearDown()
	{
		unset($this->calculadora);
	}

	public function testSoma()
	{
		// soma valores inteiros
		$this->assertEquals('4',$this->calculadora->soma(2,2));
		// soma valores 0, 0
		$this->assertEquals('0', $this->calculadora->soma(0,0));
		// soma numeros negativos
		$this->assertEquals('-2', $this->calculadora->soma(-1,-1));
		// soma numeros reais
		$this->assertEquals('1', $this->calculadora->soma(0.3, 0.7));
		// soma errada
		$this->assertFalse($this->calculadora->soma(2, 2)==10);
		$this->assertFalse($this->calculadora->soma(1));
		$this->assertFalse($this->calculadora->soma());

		// retorna falso se qualqeur valor for string
		$this->assertFalse($this->calculadora->soma('a'));
		$this->assertFalse($this->calculadora->soma('a','a'));
		$this->assertFalse($this->calculadora->soma('a',1));

		// soma várias entradas
		$this->assertEquals('5', $this->calculadora->soma(1,1,1,1,1));

	}

	public function testSubtracao()
	{
		$this->assertEquals('0',$this->calculadora->subtracao(2,2));
		$this->assertEquals('0',$this->calculadora->subtracao(0,0));
		$this->assertEquals('0',$this->calculadora->subtracao(-1,-1));
		$this->assertEquals('-4',$this->calculadora->subtracao(-2,-2,4));

		$this->assertFalse($this->calculadora->subtracao(1,5)==0);
		$this->assertFalse($this->calculadora->subtracao(-1));
		$this->assertFalse($this->calculadora->subtracao());

		$this->assertFalse($this->calculadora->subtracao('a'));
		$this->assertFalse($this->calculadora->subtracao('a','a'));
		$this->assertFalse($this->calculadora->subtracao('a',-1));
	}

	public function testMultiplicacao()
	{
		$this->assertEquals('9', $this->calculadora->multiplicacao(3, 3));
		$this->assertEquals('0', $this->calculadora->multiplicacao(0, 3));
		$this->assertEquals('0', $this->calculadora->multiplicacao(3, 0));
		$this->assertEquals('0', $this->calculadora->multiplicacao(0, 0));

		$this->assertEquals('9', $this->calculadora->multiplicacao(-3, -3));
		$this->assertEquals('-2', $this->calculadora->multiplicacao(1, -2));
		$this->assertEquals('27', $this->calculadora->multiplicacao(3, 3, 3));
		
		$this->assertFalse($this->calculadora->multiplicacao('a'));
		$this->assertFalse($this->calculadora->multiplicacao('a', 'a'));
		$this->assertFalse($this->calculadora->multiplicacao('a', 5));
		$this->assertFalse($this->calculadora->multiplicacao());
		$this->assertFalse($this->calculadora->multiplicacao(3,3)==7);
	}

	public function testDivisao()
	{
		$this->assertEquals('5', $this->calculadora->divisao(10,2));
		$this->assertFalse($this->calculadora->divisao(-10,2));
		$this->assertFalse($this->calculadora->divisao(10,-2));
		$this->assertFalse($this->calculadora->divisao(-10,-2));
		$this->assertFalse($this->calculadora->divisao(0,2));
		$this->assertFalse($this->calculadora->divisao(2,0));
		$this->assertFalse($this->calculadora->divisao('a',2));
		$this->assertFalse($this->calculadora->divisao(2,'a'));
		$this->assertFalse($this->calculadora->divisao('a','a'));
		$this->assertFalse($this->calculadora->divisao('a'));
		$this->assertFalse($this->calculadora->divisao(2));
		$this->assertFalse($this->calculadora->divisao());
		$this->assertFalse($this->calculadora->divisao(10,2) == 2);

	}
}