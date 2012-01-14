<?php
class Calculadora{

	public function soma() {

		if(func_num_args() < 2) return false;
		
		$arr = func_get_args();

		$soma = 0;

		foreach ($arr as $num) 
			if (!is_numeric($num)) 
				return false;
			else
				$soma += $num;

		return $soma;
	}

	public function subtracao()
	{
		if(func_num_args() < 2) return false;

		$arr = func_get_args();

		$subtracao = array_shift($arr);

		foreach ($arr as $num)
			if (!is_numeric($num) || !is_numeric($subtracao))
				return false;
			else
				$subtracao -= $num;

		return $subtracao;
	}

	public function multiplicacao()
	{
		if(func_num_args() < 2) return false;

		$arr = func_get_args();

		$multiplicacao = array_shift($arr);

		foreach ($arr as $num)
			if (!is_numeric($num) || !is_numeric($multiplicacao))
				return false;
			else
				$multiplicacao *= $num;
		
		return $multiplicacao;
	}

	public function divisao()
	{
		if(func_num_args() < 2) return false;

		$arr = func_get_args();
		$divisao = array_shift($arr);
		
		foreach ($arr as $num)
			if(!is_numeric($num) || $num <= 0 || (!is_numeric($divisao)) || $divisao <= 0)
				return false;
			else
				$divisao /= $num;
	 	
	 	return $divisao;
	}
}