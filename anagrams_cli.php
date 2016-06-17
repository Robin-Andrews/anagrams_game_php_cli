<?php
/*PHP Command Line Anagram Game
Author: Robin Andrews 2016*/

// get Game class
require "game.php";

class Anagrams extends Game{
	
	private $dictionary; // array
	private $anagram; // string
	private $answer; // string
	private $guess; // string

	public function __construct(){
		$this->populate_dictionary();
		$this->new_game();
	}

	public function new_game(){
		game::start_game_class();
		$this->set_answer();
		$this->set_anagram();
		$this->main();
	}

	public function populate_dictionary(){
		$this->dictionary = explode("\n", file_get_contents('my_words.txt'));
	}

	public function set_answer(){
		//$this->answer = "cat"; // for debugging
		$this->answer = $this->dictionary[array_rand($this->dictionary)];
	}

	public function set_anagram(){
		$this->anagram = str_shuffle($this->answer);
		if($this->anagram == $this->answer){
			$this->set_anagram();
		}
	}

	public function game_over(){
		if ($this->won){
			echo "\n";
			echo "Well done";
		} else { // may need later if timer implemented
			echo "\n";
			echo "Bad luck";
		}

		// Play again? logic
		while(true){
			echo "\n";
			echo "Play again (y/n)? ";
			$play_again = trim(fgets(STDIN));
			if(strcmp($play_again, "y") == 0){
				//$this->new_game();
				echo "you chose yes" . "\n";
			} else if(strcmp($play_again, "n") == 0){
				echo "bye";
				echo "\n\n";
				exit(0);
			} else {
				echo "Please enter y or n" . "\n";
			}
		}
	}

	public function main(){

		// check if game has ended
		if($this->is_over()){
			$this->game_over();
		}

		// otherwise proceed
		echo "\n";
		echo "This is an anagram: ";
		echo $this->anagram;
		echo "\n\n" . "What is the original word? ";
		$player_guess = trim(fgets(STDIN));
		if(strcmp($player_guess, $this->answer) == 0){
			$this->won = true;
			$this->over = true;
			$this->set_score(1);
			$this->game_over();
		} else {
			echo "\n";
			echo "Sorry, that's not the answer" . "\n";
			$this->main();
		}
	}
	
}
$game = (new Anagrams);

/*
Add tests as needed
function test($game){
	echo $game->answer; echo "\n";
	echo $game->anagram; echo "\n";
	$game->won = true;
	$game->game_over();
}*/
?>