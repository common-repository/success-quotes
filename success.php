<?php
/**
 * @package Success_Quotes
 * @version 1.0
 */
/*
Plugin Name: Success Quotes
Plugin URI: http://www.plugine.com/plugine-wordpress-plugins/
Description: Need some inspiration? When activated you will randomly see a success quote in the upper right of your admin screen on every page.
Author: Rojish Roy
Version: 1.0
Author URI: http://www.rojish.com
*/

function success_quotes() {
	
	$quotes = "A successful man is one who can lay a firm foundation with the bricks others have thrown at him.
Defeat is not the worst of failures. Not to have tried is the true failure.
Don't aim for success if you want it; just do what you love and believe in, and it will come naturally.
Formal education will make you a living; self-education will make you a fortune.
Formula for success: rise early, work hard, strike oil.
If at first you don't succeed, try, try again. Then quit. There's no point in being a damn fool about it.
In order to succeed, your desire for success should be greater than your fear of failure.
Obedience is the mother of success and is wedded to safety.
There are three ingredients in the good life: learning, earning and yearning.
Success doesn't come to you?you go to it.
Success is a journey, not a destination.
The difference between failure and success is doing a thing nearly right and doing a thing exactly right.
Success is not permanent. The same is also true of failure.
The most practical, beautiful, workable philosophy in the world won't work - if you won't. 
Success often comes to those who have the aptitude to see way down the road.
There's no limit to what a man can achieve, if he doesn't care who gets the credit.
Success has a simple formula: do your best, and people may like it.
A successful man continues to look for work after he has found a job
It is easy to get to the top after you get through the crowd at the bottom . 
Success is a science; if you have the conditions, you get the result.";


	$quotes = explode("\n", $quotes);

	// randomly choose a line
	return wptexturize( $quotes[ mt_rand(0, count($quotes) - 1) ] );
}

// This function show the chosen line
function show_quotes() {
	$line = success_quotes();
	echo "<p id='quotes'>$line</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'show_quotes');

// The CSS to position the paragraph
function quotes_css() {
	// This makes sure that the posinioning is also good for right-to-left languages
	$x = ( is_rtl() ) ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#quotes {
		position: absolute;
		top: 4.5em;
		margin: 0;
		padding: 0;
		$x: 215px;
		font-size: 11px;
		color: green;
	}
	</style>
	";
}

add_action('admin_head', 'quotes_css');

?>
