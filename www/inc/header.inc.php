<?php 
$query="select * from info where id=1";
$result_info=execute($link, $query);
$data_info=mysqli_fetch_assoc($result_info);
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
//if(isset($_POST['submit'])){
if(isset($_POST['voice'])){
	include 'inc/check_voice.inc.php';
	if (strcmp($_POST['voice'],"Coffe machine:ON" )==0)
	{
		$query="update devices set Device_Status='1' where Device_name='Coffee Machine' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Coffee Machine turn on.',now())";
    	execute($link,$insert);
	}
	elseif(strcmp($_POST['voice'],"Air conditioner:ON" )==0)
	{
		$query="update devices set Device_Status='1' where Device_name='Air Conditioner' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Air Conditioner turn on.',now())";
    	execute($link,$insert);
	}
	elseif(strcmp($_POST['voice'],"Light:ON" )==0)
	{
		$query="update devices set Device_Status='1' where Device_name='Light' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Light turn on.',now())";
    	execute($link,$insert);
	}	
	elseif(strcmp($_POST['voice'],"Light:0.75" )==0)
	{
		$query="update devices set brightness='75' where Device_name='Light' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','brightness is 75.',now())";
    	execute($link,$insert);
	}	
	elseif(strcmp($_POST['voice'],"Light:OFF" )==0)
	{
		$query="update devices set Device_Status='0' where Device_name='Light' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Light turn off.',now())";
    	execute($link,$insert);
	}	
	elseif(strcmp($_POST['voice'],"Speakers:ON" )==0)
	{
		$query="update devices set Device_Status='1' where Device_name='Speakers' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Speaker turn on.',now())";
    	execute($link,$insert);
	}	
	elseif(strcmp($_POST['voice'],"Speakers:OFF" )==0)
	{
		$query="update devices set Device_Status='0' where Device_name='Speakers' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Speaker turn off.',now())";
    	execute($link,$insert);
	}	
	elseif(strcmp($_POST['voice'],"Socket:ON" )==0)
	{
		$query="update devices set Device_Status='1' where Device_name='Sockets' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Sockets turn on.',now())";
    	execute($link,$insert);
	}	
	elseif(strcmp($_POST['voice'],"Socket:OFF" )==0)
	{
		$query="update devices set Device_Status='0' where Device_name='Socket' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Sockets turn off.',now())";
    	execute($link,$insert);
	}	
	elseif(strcmp($_POST['voice'],"Curtains:ON" )==0)
	{
		$query="update devices set Device_Status='1' where Device_name='Curtain' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Curtain turn on.',now())";
    	execute($link,$insert);
	}	
	elseif(strcmp($_POST['voice'],"Curtains:OFF" )==0)
	{
		$query="update devices set Device_Status='0' where Device_name='Curtain' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Curtain turn off.',now())";
    	execute($link,$insert);
	}	
	elseif(strcmp($_POST['voice'],"Bathtub:ON" )==0)
	{
		$query="update devices set Device_Status='1' where Device_name='Bathtub' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Bathtub turn on.',now())";
    	execute($link,$insert);
	}	
	elseif(strcmp($_POST['voice'],"Bathtub:+2" )==0)
	{
		$query="update devices set Temperature=Temperature + '2' where Device_name='Bathtub' and User_id='{$member_id}'";
		execute($link,$query);
		$insert="insert into log(User,detail,Times) values('$user','Bathtub temperature + 2.',now())";
    	execute($link,$insert);
	}
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
<!--body onload="autoSubmit();"-->
<body onload="startVoice()">
	<div class="header_wrap">
		<div id="header" class="auto">
			<div class="logo">Wholelink</div>
			<div class="nav">
				<a class="hover" href="dashboard.php">Dashboard</a>
			</div>
			<div class="serarch">
				<form action="#" method="post" name="s2t" id="s2t">
					<input name="voice" id="voices" class="voices"/>
					<!--input class="pbottom" name="submit" type="submit" value="post"-->
					<!--span class="click" onclick="startVoice();$(this).hide();">Click here to start</span-->
					<div class="login">
				</form>
				<?php 
				if(isset($member_id) && $member_id){
$str=<<<A
					<a href="member.php">Hello！{$_COOKIE['name']}</a> <span style="color:#fff;">|</span> <a href="logout.php">logout</a>
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
							//document.getElementById("voices").value = event.results[i][0].transcript;
							$('#you_said_header').html('You said:');
							var response = matchResponse(event.results[i][0].transcript);
							if (!response) response = 0;
							$('#interpretation').html(responses[response].title);
							$('#response').html(responses[response].response);
							document.getElementById("voices").value = responses[response].response;
							s2t.submit();
						}
					}
				};
			};
		};



		//This is the data structure for finding matches and their associated responses
		var responses = [{
			title: 'Null hypothesis',
			matches: ['', 'blah', 'random input'],
			response: 'Did not compute'
		},{
			title: 'Coffe',
			matches: ['give me a coffe','turn on the coffe machine',"I want more energy"],
			response: 'Coffe machine:ON'
		},{
			title: 'Air_conditioner',
			matches: ['increase the room temperature','turn on the air conditioner','it is so hot','make the room comfortable'],
			response: 'Air conditioner:ON'
		},{
			title: 'Light1',
			matches: ['Make my kitchen brighter','Turn on all the lights',"Lumos"],
			response: 'Light:ON'
		},{
			title: 'Light2',
			matches: ['Brighten the lights in the living room to 75%'],
			response: 'Light:0.75'
		},{
			title: 'Light3',
			matches: ['Turn off all the lights'],
			response: 'Light:OFF'
		},{
			title: 'Speakers1',
			matches: ['play a song','I feel like hearing something','party mode','entertain me','turn on the speakers'],
			response: 'Speakers:ON'
		},{
			title: 'Speakers2',
			matches: ['turn off the speaker'],
			response: 'Speakers:OFF'
		},{
			title: 'Sockets1',
			matches: ['turn on the sockets'],
			response: 'Socket:ON'
		},{
			title: 'Sockets2',
			matches: ['turn off the sockets'],
			response: 'Socket:OFF'
		},{
			title: 'Curtains1',
			matches: ['good morning','open curtain','room is dark'],
			response: 'Curtains:ON'
		},{
			title: 'Curtains2',
			matches: ['close curtain','feels like sleeping'],
			response: 'Curtains:OFF'
		},{
			title: 'Bathtub1',
			matches: ['need to take a bath','want to get refreshed','fill the bathtub','want to take a shower','turn on the tap'],
			response: 'Bathtub:ON'
		},{
			title: 'Bathtub2',
			matches: ['change water temperature'],
			response: 'Bathtub:+2'
		}
	];



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