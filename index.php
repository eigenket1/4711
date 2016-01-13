<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tic Tac Toe</title>

    <style type="text/css">
    table {
		table-layout: fixed;
		width: 300px;
    }
    td {
		border: 1px solid #c2c2c2;
		text-align:center;
		vertical-align: middle;
		height: 100px;
    }

    </style>
</head>
<body>
    <?php
    //initalizes the game
    class Game {
     
		var $position;
		var $finished;
		
		public function __construct($position) {
			$board = $position;
			if (empty($position))
			$board = "---------";
			$this->position = str_split($board);
		}
		// starts the game
		public function play() {
			$message = null;
			echo 'Tic­Tac­Toe Game.<br/>';
			echo '<a href="?">New Game</a>';
        
        if ($this->winner('x')) {
			$this->finished = true;
			$message = 'You win.';
        }  
        else {
			$this->pick_move();
         
			if ($this->winner('o')) {
				$this->finished = true;
				$message = 'I win.';
			}
        }
        if (!$this->finished && $this->tied()) {
			$message = 'Tied game.';
        }
		$this->display();
        echo $message;
		}
		//displays the game
		private function display() {
			echo '<table cols="3">';
			echo '<tr width="1">';
			for ($cur = 0; $cur < 9; $cur ++) {
				echo $this->show_cell($cur);
				if ($cur % 3 == 2) {
					echo '</tr><tr>';
				}
			}
			echo '</tr>';
			echo '</table>';
		}
		//prints the game
		private function show_cell($which) {
			$token = $this->position[$which];
			if ($this->finished || $token != '-')
				return '<td>' . $token . '</td>';
			$new_position = $this->position;
			$new_position[$which] = 'x';
			$move = implode($new_position);
			$link = '?board=' . $move;
			return '<td class="choose"><a href="' . $link . '">-</a></td>';
		}
		//picks a move for the computer
		private function pick_move() {
			$valid_move = false;
			$pos = -1;
			do {
				$pos++;
				if ($this->position[$pos] == '-')
					$valid_move = true;
			} while (!$valid_move);
			$this->position[$pos] = "o";
		}
		//checks if the game is tied
		private function tied() {
			for ($i = 0; $i < 9; $i++) {
				if ($this->position[$i] == '-')
				return false;
			}
			return true;
		}
		//check if there is a winner
		private function winner($token) {
			for ($row = 0; $row < 3; $row++) {
				if (($this->position[3 * $row]     == $token) &&
					($this->position[3 * $row + 1] == $token) &&
					($this->position[3 * $row + 2] == $token))
				return true;
			}
			for ($col = 0; $col < 3; $col++) {
				if (($this->position[$col] == $token) &&
					($this->position[$col + 3] == $token) &&
					($this->position[$col + 6] == $token))
				return true;
			}
			if ($this->position[0] == $token &&
				($this->position[4] == $token) &&
				($this->position[8] == $token)) {
				return true;
			}
			else if ($this->position[2] == $token &&
				($this->position[4] == $token) &&
				($this->position[6] == $token)) {
				return true;
			}
			return false;
		}
    }
    // Initialize the board if there is no previous state from the url
    $position = (isset($_GET['board'])) ? $_GET['board'] : null;
    $game = new Game($position);
    $game->play();
	?>
</body>
</html>