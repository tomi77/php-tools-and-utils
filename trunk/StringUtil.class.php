<?php

/**
 * A set of string utilities
 *
 * @author Tomasz Jakub Rup
 */
class StringUtil {

	/**
	 * Creates a HMAC-SHA1 hash
	 *
	 * This uses the hash extension if loaded
	 *
	 * @param string $string String to sign
	 * @return string
	 */
	public static function getHash($string) {
		return base64_encode(extension_loaded('hash') ?
						hash_hmac('sha1', $string, $this->secretKey, true) : pack('H*', sha1(
										(str_pad($this->secretKey, 64, chr(0x00)) ^ (str_repeat(chr(0x5c), 64))) .
										pack('H*', sha1((str_pad($this->secretKey, 64, chr(0x00)) ^
														(str_repeat(chr(0x36), 64))) . $string)))));
	}

}
