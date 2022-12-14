<?php 
$query="select * from info where id=1";
$result_info=execute($link, $query);
$data_info=mysqli_fetch_assoc($result_info);
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
if(isset($_POST['submit'])){
	include 'inc/check_voice.inc.php';
	$query="insert into commands(Command_Text) values('{$_POST['voice']}')";
	execute($link,$query);
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<meta charset="utf-8" />
<title><?php echo $template['title'] ?> - <?php echo $data_info['title']?></title>
<meta name="keywords" content="<?php echo $data_info['keywords']?>" />
<meta name="description" content="<?php echo $data_info['description']?>" />
<?php 
foreach ($template['css'] as $val){
	echo "<link rel='stylesheet' type='text/css' href='{$val}' />";
}
?>
</head>
<body>
	<div class="header_wrap">
		<div id="header" class="auto">
			<div class="logo">Wholelink</div>
			<div class="nav">
				<a class="hover" href="index.php">index</a>
			</div>
			<div class="serarch">
				<form action="#" method="post">
					<input name="voice" id="voices">
					<input class="btn" name="submit" type="submit" value="post" />
					<span style="text-decoration:underline;cursor:pointer;" onclick="startVoice();$(this).hide();">Click here to start</span>
					<div class="login">
				</form>
				<?php 
				if(isset($member_id) && $member_id){
$str=<<<A
					<a href="#?id={$member_id}" target="_blank">Hello！{$_COOKIE['sfk']['name']}</a> <span style="color:#fff;">|</span> <a href="logout.php">logout</a>
A;
					echo $str;		
				}else{
$str=<<<A
					<a href="login.php">login</a>&nbsp;
					<a href="register.php">register</a>
A;
					echo $str;
				}
				?>
				
			</div>
			</div>
		</div>
	</div>
	<div style="margin-top:55px;"></div>

<script>
		var recognition;
		
		function startVoice(){
			// Adapted from https://www.google.com/intl/en/chrome/demos/speech.html
			var cont=$("#you_said1");
			if (recognition) return;
			if (!('webkitSpeechRecognition' in window)) {
				alert('Sorry, your browser isn\'t compatible. Try switching to Chrome.');
			} else {
				$('#you_said_header').html('Listening...');
				$('#you_said').html('Speak clearly and loudly. It takes a couple seconds to interpret after you stop talking.')
				
				recognition = new webkitSpeechRecognition();
				recognition.continuous = true;
				recognition.interimResults = true;
				recognition.lang = 'en-US';
				recognition.start();
				
				recognition.onstart = function() {
					console.log('started listening');
				};
				
				recognition.onerror = function(event) {
					console.log(event.error)
				};
				
				recognition.onend = function() {
					recognition.start();
				};
				
				recognition.onresult = function(event) {
					var interim_transcript = '';
					if (typeof(event.results) == 'undefined') {
						recognition.onend = null;
						recognition.stop();
						alert('Sorry, this only works on newer versions of Chrome')
						return;
					}
					for (var i = event.resultIndex; i < event.results.length; ++i) {
						if (event.results[i].isFinal) {
							$('#you_said').html(event.results[i][0].transcript);
							document.getElementById("voices").value = event.results[i][0].transcript;
							$('#you_said_header').html('You said:');
							var response = matchResponse(event.results[i][0].transcript);
							if (!response) response = 0;
							$('#interpretation').html(responses[response].title);
							$('#response').html(responses[response].response);
						}
					}
				};
			};
		};



		//This is the data structure for finding matches and their associated responses
		//Each response that you have should be a new object in the array with a title, a match array of strings to match against, and a response string. The title is not really necessary but worked for my implementation to give feedback on the nature of input it recognized instead of simply sending a response.
		var responses = [{
			title: 'Null hypothesis',
			matches: ['', 'blah', 'random input'],
			response: 'Did not compute'
		},{
			title: 'Greeting',
			matches: ['hi', 'hello', 'howdy', 'hi there'],
			response: 'Hello!'
		},{
			title: 'Wellness status',
			matches: ['how are you', 'how are you doing', 'how goes it'],
			response: 'I am doing well'
		}];



		function matchResponse(input){
			//all the added trailing spaces are for easier tokenization of words so that "the" doesn't match to "thematic":
			var best_score = [-1, -1];
			input = input.toLowerCase() + ' ';
			var split_input = input.split(' ');
			for (var i = 0; i < responses.length; i++) {
				for (var j = 0; j < responses[i].matches.length; j++) {
					var match_to = responses[i].matches[j] + ' ';
					//grab levenshtein distance (lower is better) and subtract from 20, which is derived from typical input lengths:
					var score = 20 - levDist(input, match_to);
					//go through each word and see if it's in the match_to text:
					for (var k = 0; k < split_input.length; k++) {
						if (match_to.indexOf(split_input[k] + ' ') != -1){
							//add length of string to score, so that "the" is worth less than "antidisestablishmentarianism" matches:
							score += split_input[k].length;
						}
					}
					//store the highest score:
					if (score > best_score[0]) best_score = [score, i];
				}
			}
			console.log(input + ' matched: ' + best_score[0] + ': ' + responses[best_score[1]].title);
			//see if it's within minimum score tolerance of 17 points:
			if (best_score[0] < 17) {
				return 0;
			} else {
				return best_score[1];
			}
		}


		//http://www.merriampark.com/ld.htm, http://www.mgilleland.com/ld/ldjavascript.htm
		var levDist = function(s, t) {
		    var d = [];
		    var n = s.length;
		    var m = t.length;
		    if (n == 0) return m;
		    if (m == 0) return n;
		    for (var i = n; i >= 0; i--) d[i] = [];
		    for (var i = n; i >= 0; i--) d[i][0] = i;
		    for (var j = m; j >= 0; j--) d[0][j] = j;
		    for (var i = 1; i <= n; i++) {
		        var s_i = s.charAt(i - 1);
		        for (var j = 1; j <= m; j++) {
		            if (i == j && d[i][j] > 4) return n;
		            var t_j = t.charAt(j - 1);
		            var cost = (s_i == t_j) ? 0 : 1;
		            var mi = d[i - 1][j] + 1;
		            var b = d[i][j - 1] + 1;
		            var c = d[i - 1][j - 1] + cost;
		            if (b < mi) mi = b;
		            if (c < mi) mi = c;
		            d[i][j] = mi;
		            if (i > 1 && j > 1 && s_i == t.charAt(j - 2) && s.charAt(i - 2) == t_j) {
		                d[i][j] = Math.min(d[i][j], d[i - 2][j - 2] + cost);
		            }
		        }
		    }
		    return d[n][m];
		}

</script>