<?php

namespace App\Utils;

use PDO;

class System {

	/**
	 * Header rewrite function
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public static function redirect(string $path) : void {
		if (isset($path)) {
			header("Location: " . $path);
		} else {
			header("Refresh: 0");
		}
		exit;
	}

	/**
	 * UID function generator
	 *
	 * @param int $size UID length
	 * @param string $table Database table to check for existing UID
	 *
	 * @return string
	 */
	public static function uidGen(int $size = 16, string $table = null) : string {
		$char = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_";
		$uid = "";
		$randomByte = random_bytes($size);

		foreach (str_split($randomByte) as $byte) {
			$random = ord($byte) % strlen($char);
			$uid .= $char[$random];
		}

		if (!empty($table)) {
			while ($uid == null) {
				$query = "SELECT uid FROM " . $table . " WHERE uid = :uid";
				$stmt = DATABASE->prepare($query);
				$stmt->bindParam(":uid", $uid);
				$stmt->execute();
				$uid = $stmt->fetchAll(PDO::FETCH_COLUMN)[0] ?? NULL;
			}
		}
		return $uid;
	}
}
