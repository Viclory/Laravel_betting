<?php
namespace app\Helpers;

use App\StaygamingBO;

class Functions {

	public static function getCurrencies()
	{
		$currencies = StaygamingBO::getCurrencies();

		return $currencies;
	}

	public static function getCountries()
	{
		$countries = StaygamingBO::getCountries();

		return $countries;
	}


	public static function getGameVendors()
	{
		$games_vendors = StaygamingBO::getGamesVendors();

		return $games_vendors;
	}

	public static function getBonusesList()
	{
		$bonuses = [];
		if (\Auth::user() != null) {
			$bonuses = StaygamingBO::getBonusList(\Auth::user()->player_id);
			if($bonuses->status=='1'){
				$bonuses = $bonuses->result;
			}else{
				$bonuses = [];
			}
		}

		return $bonuses;
	}

	public static function getDepositUrl()
	{
		//env('BO_URL') . "payment/pay/" . $user_id . "/" . $amount  . "/" . $bonus_id . "/1/" . $payment_method;
		$url = env('BO_URL') . "payment/pay/" . \Auth::user()->player_id . DIRECTORY_SEPARATOR;
		return $url;
	}

	public static function getPlayerInfo()
	{
		//$player_id = \Auth::user()->player_id;
		$player_info = StaygamingBO::getPlayerInfo(\Auth::user());
		$player_obj = json_decode($player_info);
		if ($player_obj->status > 0) {
			return $player_obj->result;
		} else {
			return null;
		}

	}
}