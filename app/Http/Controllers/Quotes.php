<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use App\Repositories\Repository;

class Quotes extends Controller
{
	public function index(Quote $quote)
	{
		return view('home');
	}
	
	public function getQuotes(Quote $quote)
	{
		return Quote::latest()->get();
	}
	
	/*
	 * -reset the data in the database to new set of 40 Quotes
	 * -this takes about 1 minute to run due to the API speed
	 * */
	public function setQuotes()
	{
		Quote::truncate();
		$data = array();
		$prevText = null;
		for ($x = 0; $x <= 39; $x++) {
			$content = json_decode(file_get_contents('http://api.forismatic.com/api/1.0/?format=json&lang=en&method=getQuote'), true);
			if ($content == null) {
				$x--;
			} else if (($prevText != null) && ($content['quoteText'] == $prevText)){
				$x--;
			} else {
				$prevText = $content['quoteText'];
				$data[$x] = $content;
				
				$quote = new Quote;
				$quote->text = $data[$x]['quoteText'];
				$quote->author = $data[$x]['quoteAuthor'];
				$quote->save();
			}
		}
		return Quote::latest()->get();
	}
	
	public function quotd(Quote $quote)
	{
		return Quote::findOrFail($quote);
	}
	
	public function random()
	{
		$rNUM = random_int(1, 40);
		return Quote::findOrFail($rNUM);
	}
	
	public function search($word)
	{
		return Quote::search($word)->get();
	}
}
