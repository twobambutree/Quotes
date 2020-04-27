<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

class Quotes extends Controller
{
	public function index(Quote $quote)
	{
		//
	}
	
	public function getQuotes(Quote $quote)
	{
		$quotes = $quote->get();
		dd($quotes);
	}
	
	public function setQuotes()
	{
		$data = array();
		$prevText = null;
		$new_quote = array();
		for ($x = 0; $x <= 39; $x++) {
			$content = json_decode(file_get_contents('http://api.forismatic.com/api/1.0/?format=json&lang=en&method=getQuote'), true);
			if ($content == null) {
				$x--;
			} else if (($prevText != null) && ($content['quoteText'] == $prevText)){
				$x--;
			} else {
				$prevText = $content['quoteText'];
				$data[$x] = $content;
				
//				$quote = new Quote;
//				$quote->text = $data[$x]['quoteText'];
//				$quote->author = $data[$x]['quoteAuthor'];
//				$quote->save();
			}
		}
		dd($data);
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
	
	public function search()
	{
		//
	}
}
