<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$from = 'podcast@darkmoonherald.com';
		$to = 'podcast@darkmoonherald.com';
		$subject = 'Website Contact Submission';

		$body ="From: $name\nE-Mail: $email\nPhone: $phone\nMessage:\n$message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name.';
		}

		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address.';
		}

// If there are no errors, send the email
if (!$errName && !$errEmail) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! We will be in touch.</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again.</div>';
	}
}
	}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Darkmoon Herald Podcast</title>
  <meta name="description" content="dark moon hearld, darkmoon herald, podcast, world of warcraft podcast, wow, world of warcraft, podcast">
  <meta name="author" content="Rodney Gauna">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Sancreek" rel="stylesheet">
  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- Socicon -->
  <link rel="stylesheet" href="https://s3.amazonaws.com/icomoon.io/114779/Socicon/style.css?rd5re8">
  <!-- Custom DMH Style -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Full Story Analysis -->
	<script>
		window['_fs_debug'] = false;
			window['_fs_host'] = 'fullstory.com';
			window['_fs_org'] = '8CAFT';
			window['_fs_namespace'] = 'FS';
			(function(m,n,e,t,l,o,g,y){
				if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;}
				g=m[e]=function(a,b){g.q?g.q.push([a,b]):g._api(a,b);};g.q=[];
				o=n.createElement(t);o.async=1;o.src='https://'+_fs_host+'/s/fs.js';
				y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
				g.identify=function(i,v){g(l,{uid:i});if(v)g(l,v)};g.setUserVars=function(v){g(l,v)};
				g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
				g.clearUserCookie=function(c,d,i){if(!c || document.cookie.match('fs_uid=[`;`]*`[`;`]*`[`;`]*`')){
					d=n.domain;while(1){n.cookie='fs_uid=;domain='+d+
					';path=/;expires='+new Date(0).toUTCString();i=d.indexOf('.');if(i<0)break;d=d.slice(i+1)}}};
				})(window,document,window['_fs_namespace'],'script','user');
		</script>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        <a class="navbar-brand" href="index.html"><img class="navbar-img" src="img/dmh_logo.png" /></a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">Hosts</a></li>
          <li><a href="episodes.html">Episodes</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="div-header-chunk text-center" style="margin-top: 60px">
      <h1><strong>Contact Us</strong></h1>
    </div>
    <div>
        <?php echo $result; ?>
    </div>
    <!-- Form -->
    <form role="form" method="post" action="contact.php">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="* First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
            <?php echo "<p class='text-danger'>$errName</p>";?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="* example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
            <?php echo "<p class='text-danger'>$errEmail</p>";?>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" rows="4" name="message" placeholder="Add your message here." value="<?php echo htmlspecialchars($_POST['message']); ?>"></textarea>
        </div>
        <div class="form-group">
            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
        </div>
    </form>
		<div class="row footer">
      <div class="col-sm-4">
        <a href="index.html">Home</a><br>
        <a href="about.html">Hosts</a><br>
        <a href="episodes.html">Episodes</a><br>
        <a href="contact.php">Contact Us</a>
      </div>
      <div class="col-sm-4">
        <img src="img/dmh_logo_title.png" alt="logo" style="max-height:140px;display:block;margin:0 auto">
      </div>
      <div class="col-sm-4 text-right" style="font-size:28px">
				<a href="mailto:podcast@darkmoonherald.com" target="_blank" class="socicon-mail" style="padding:8px"></a>
        <a href="http://twitter.com/darkmoonherald" target="_blank" class="socicon-twitter" style="padding:8px"></a>
        <a href="http://facebook.com/darkmoonherald" target="_blank" class="socicon-facebook" style="padding:8px"></a>
        <a href="http://discord.darkmoonherald.com" target="_blank" class="socicon-discord" style="padding:8px"></a>
        <a href="http://twitch.tv/darkmoonherald" target="_blank" class="socicon-twitch" style="padding:8px"></a>
      </div>
    </div>
  </div>

  <!-- JQuery CDN -->
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="js/bootstrap.js"></script>

</body>

</html>
