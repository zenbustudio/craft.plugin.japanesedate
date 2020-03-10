<?php
/**
 * Created by PhpStorm.
 * User: nicolasbottari
 * Date: 2020/03/09
 * Time: 15:12
 */

namespace zenbustudio\japanesedate\models;

class YearModel {

	public $alpha_name = null;
	public $kanji_name = null;
	public $short_name = null;
	public $start_year = null;
	public $years_in_era = null;
	public $is_first_year = false;
	const KANJI_YEAR = '年';
	const KANJI_FIRST_ERA_YEAR = '元';

	/**
	 * @return string
	 */
	public function __toString()
	{
		if($this->is_first_year && $this->years_in_era == 1)
		{
			$this->years_in_era = self::KANJI_FIRST_ERA_YEAR;
		}

		return $this->kanji_name . $this->years_in_era . self::KANJI_YEAR;
	}
}