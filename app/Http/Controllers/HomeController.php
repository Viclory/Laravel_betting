<?php
namespace App\Http\Controllers;
use App\StaygamingBO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Player;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('index.home', compact('countries', 'currencies'));
    }

    public function contacts()
    {
        return view('');
    }

    public function about()
    {
        return view('index.about');
    }

    public function casino()
    {
        return view('index.casino');
    }

	public function sports(){
		$countries = StaygamingBO::getCountries();
		$bonuses = array();
	    $currencies = StaygamingBO::getCurrencies();
		if(\Auth::user() != null && isset( \Auth::user()->player_id )){
			$player_token = \Auth::user()->access_token;
		} else {
			$player_token = '';
		}
		return view('sports', compact('countries', 'currencies','bonuses','player_token'));
	}

	public function games(Request $request)
	{
		$res = StaygamingBO::games($request);

		return $res;
	}

	public function viewGames($games_type)
	{

		return view('games.view-games', ['type' => $games_type]);
	}

	public function getPlayerCards($pid,$ctype='test',Request $request){
		$ptype = $request->get('type');
		$boUrl = env('BO_URL');
		if($ptype) {
			$url = $boUrl.'player-cards/'.$pid.'/'.$ctype.'?type=refund';
		}else{
			$url=$boUrl.'player-cards/'.$pid.'/'.$ctype;
		}
		return file_get_contents($url);
	}

	public function makePayment(Request $request){
		$boUrl=env('BO_URL');
		$url=$boUrl.'lpspayment';
		return $this->curlPost($url,$request->all());
	}

	private function curlPost($url,$data){
		$curl     = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
		$response = curl_exec($curl);
		if (curl_error($curl)) {
			$json['error'] = 'CURL ERROR: ' . curl_errno($curl) . '::' . curl_error($curl);

			echo 'AUTHNET AIM CURL ERROR: ' . curl_errno($curl) . '::' . curl_error($curl);
		} elseif ($response) {
			return $response;
		}
		curl_close($curl);
	}

	public function contactUs(Request $request)
	{
		$data = array();
		$data['name'] = $request->name;
		$data['email'] = $request->email;
		$data['message'] = $request->message;

		// mail to support
		\Mail::send('emails.contact-us-support', ['data' => $data], function ($m) use ($data) {
			$m->from($data['email'], $data['name']);
			$m->to(env('SUPPORT_EMAIL'), 'SUPPORT')->subject('Contact Form Data');

		});

		// mail to user
		\Mail::send('emails.contact-us-user', ['data' => $data], function ($m) use ($data) {
			$m->from(env('SUPPORT_EMAIL'), 'SUPPORT');
			$m->to($data['email'], $data['name'])->subject('Contact Form');

		});


		$alert = [
			'type' => 'alert-success',
			'message' => 'Your message has been sent!'
		];
		return redirect()->to('/' . '?' . http_build_query($alert));
	}

	public function promotions()
    {
        return view('home.promotions');
    }
}
