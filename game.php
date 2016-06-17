<?php
/***
* File: oop/class.game.php
* Author: design1online.com, LLC
* Created: 5.11.2011
* License: Public GNU
* Modified by Robin Andrews June 2016. Changed some function and variable names
***/

class Game {

	public $health;	//int - player's health
	public $over;	//bool - toggle game over
	public $score;	//int - player's score
	public $won;	//bool - toggle game won

	/**
	* Purpose: setup game environment variables
	* Preconditions: turn the debugger on (optional)
	* Postconditions: the game environment is ready to start a game
	**/
	function start_game_class()
	{
		$this->score = 0;
		$this->health = 100;
		$this->over = false;
		$this->won = false;
	}
	
	/**
	* Purpose: end the game
	* Preconditions: turns on the game over flag
	* Postconditions: game over flag is true
	**/
	function end()
	{
		$this->over = true;
	}
	
	/**
	* Purpose: change or retrieve the player's score
	* Preconditions: amount (optional)
	* Postconditions: returns the player's updated score
	**/
	function set_score($amount = 0)
	{
		return $this->score += $amount;
	}
	
	/**
	* Purpose: change or retrieve the player's health
	* Preconditions: amount (optional)
	* Postconditions: returns the player's updated health
	**/
	function set_health($amount = 0)
	{			
		return ceil($this->health += $amount);
	}
	
	/**
	* Purpose: return bool to indiciate whether or not the game is over
	* Preconditions: none
	* Postconditions: returns true or flase
	**/
	function is_over()
	{
		if ($this->won)
			return true;
			
		if ($this->over)
			return true;
			
		if ($this->health < 0) 
			return true;
			
		return false;
	}

} //end game class

/**
* Purpose: display a formatted debug message
* Preconditions: the object or message to display
* Postconditions: message is displayed
**/
function debug($object = NULL, $msg = "")
{
	if (isset($object) || isset($msg))
	{
		echo "<pre>";
		
		if (isset($object))
			print_r($object);
			
		if (isset($msg))
			echo "\n\t$msg\n";
		
		echo "\n</pre>";
	}
}

/**
* Purpose: return a formatted error message
* Preconditions: the message to format
* Postconditions: formatted message is returned
**/
function error_msg($msg)
{
	return "<div class=\"error_msg\">$msg</div>";
}

/**
* Purpose: return a formatted success message
* Preconditions: the message to format
* Postconditions: formatted message is returned
**/
function success_msg($msg)
{
	return "<div class=\"success_msg\">$msg</div>";
}