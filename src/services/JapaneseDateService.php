<?php
/**
 * Created by PhpStorm.
 * User: nicolasbottari
 * Date: 2020/03/04
 * Time: 23:02
 */

namespace zenbustudio\japanesedate\services;

use Craft;
use zenbustudio\japanesedate\models\YearModel;

class JapaneseDateService {

	public $start_years = [
		1868 => 'meiji',
		1912 => 'taisho',
		1926 => 'showa',
		1989 => 'heisei',
		2019 => 'reiwa',
	];

	public $era_data = [
		'meiji'  => [
			'alpha_name' => 'Meiji',
			'kanji' => '明治',
			'short' => 'M',
		],
		'taisho' => [
			'alpha_name' => 'Taisho',
			'kanji' => '大正',
			'short' => 'T',
		],
		'showa'  => [
			'alpha_name' => 'Showa',
			'kanji' => '昭和',
			'short' => 'S',
		],
		'heisei' => [
			'alpha_name' => 'Heisei',
			'kanji' => '平成',
			'short' => 'H',
		],
		'reiwa'  => [
			'alpha_name' => 'Reiwa',
			'kanji' => '令和',
			'short' => 'R',
		],
	];

	/**
	 * @param string $year
	 *
	 * @return \zenbustudio\japanesedate\models\YearModel
	 */
	public function findEra(string $year): YearModel
	{
		$found_era_name = null;

		foreach($this->start_years as $start_year => $era_name)
		{
			if($year >= $start_year)
			{
				$found_era_name = $era_name;
			}
		}

		$yearModel = new YearModel;

		if(isset($this->era_data[$found_era_name]))
		{
			$start_year = array_search($found_era_name, $this->start_years);
			$yearModel->kanji_name = $this->era_data[$found_era_name]['kanji'];
			$yearModel->alpha_name = $this->era_data[$found_era_name]['alpha_name'];
			$yearModel->short_name = $this->era_data[$found_era_name]['short'];
			$yearModel->start_year = $start_year;
			$yearModel->years_in_era = $year - $start_year + 1;
			$yearModel->is_first_year = $this->isFirstYear($year);
		}

		return $yearModel;
	}

	/**
	 * @param string $year
	 *
	 * @return bool
	 */
	public function isFirstYear(string $year): bool
	{
		foreach($this->start_years as $start_year => $era_name)
		{
			if($year == $start_year)
			{
				return true;
			}
		}

		return false;
	}
}