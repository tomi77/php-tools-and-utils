<?php
class Math {
	public static function mediana($array) {
		sort($array);
		$cnt = count($array);
		if ($cnt == 0) return null;
		$pos = ($cnt - 1) / 2;

		return $cnt % 2 ? $array[$pos] : ($array[$pos] + $array[$pos + 1]) / 2;
	}
}
