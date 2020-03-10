<?php
/**
 * Created by PhpStorm.
 * User: nicolasbottari
 * Date: 2020/03/04
 * Time: 17:18
 */

namespace zenbustudio\japanesedate\variables;

use DateTime;
use zenbustudio\japanesedate\JapaneseDate;
use zenbustudio\japanesedate\models\YearModel;

class JapaneseDateVariable {

	/**
	 * @param $date
	 *
	 * @return \zenbustudio\japanesedate\models\YearModel
	 */
	public function getEra($date): YearModel
	{
		if($date instanceof DateTime)
		{
			$dateObject = $date;
		}
		elseif(is_numeric($date) && strlen($date) == 4)
		{
			$dateObject = new DateTime($date.'-01-01');
		}
		else
		{
			$dateObject = new DateTime($date);
		}

		$year = $dateObject->format('Y');
		$era = JapaneseDate::getInstance()->JapaneseDate->findEra($year);
		return $era;
	}

	/**
	 * @param $date
	 *
	 * @return string
	 */
	public function getAlphaEra($date): string
	{
		return $this->getEra($date)->alpha_name;
	}

	/**
	 * @param $date
	 *
	 * @return string
	 */
	public function getKanjiEra($date): string
	{
		return $this->getEra($date)->kanji_name;
	}

	/**
	 * @param $date
	 *
	 * @return string
	 */
	public function getShortEra($date): string
	{
		return $this->getEra($date)->short_name;
	}

	/**
	 * @param $date
	 *
	 * @return \zenbustudio\japanesedate\models\YearModel
	 */
	public function getYear($date): YearModel
	{
		return $this->getEra($date);
	}

	/**
	 * @param $date
	 *
	 * @return string
	 */
	public function getShortYear($date): string
	{
		$yearModel = $this->getEra($date);
		return $yearModel->short_name . $yearModel->years_in_era;
	}

	/**
	 * @param      $date
	 * @param bool $use_gannen
	 *
	 * @return string
	 */
	public function getKanjiYear($date, bool $use_gannen = false): string
	{
		$yearModel = $this->getEra($date);

		if($use_gannen && $yearModel->years_in_era == 1)
		{
			return $yearModel->kanji_name . $yearModel::KANJI_FIRST_ERA_YEAR . $yearModel::KANJI_YEAR;
		}

		return $yearModel->kanji_name . $yearModel->years_in_era . $yearModel::KANJI_YEAR;
	}

	/**
	 * @param      $date
	 * @param bool $use_gannen
	 *
	 * @return string
	 */
	public function getDate($date, bool $use_gannen = false): string
	{
		if($date instanceof DateTime)
		{
			$dateObject = $date;
		}
		elseif(is_numeric($date) && strlen($date) == 4)
		{
			$dateObject = new DateTime($date.'-01-01');
		}
		else
		{
			$dateObject = new DateTime($date);
		}

		$month = $dateObject->format('m');
		$day = $dateObject->format('d');

		return $this->getKanjiYear($date, $use_gannen) . $month . '月' . $day . '日';
	}
}