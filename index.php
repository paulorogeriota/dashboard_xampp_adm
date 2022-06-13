<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Welcome to XAMPP Shystech</title>

    <meta name="description" content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl." />
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />

    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>


    <link href="/dashboard/images/favicon.png" rel="icon" type="image/png" />

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
<script language=javascript type= "text/javascript">
	function abrirPop(id_project){		
		window.open("pop.php?id_project="+id_project,"","toolbar=no,status=no,menubar=no,location=center,scrollbars=no,resizable=no,height=500,width=657"); 		
	}
</script>

  </head>

  <body class="index">
 
  
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=277385395761685";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="contain-to-grid">
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1><a href="/dashboard/index.html">Apache Friends (SystechPrime - PHP)</a></h1>
          </li>
          <li class="toggle-topbar menu-icon">
            <a href="#">
              <span>Menu</span>
            </a>
          </li>
        </ul>

        <section class="top-bar-section">
          <!-- Right Nav Section -->
          <ul class="right">
              <li class=""><a href="/applications.html">Applications</a></li>
              <li class=""><a href="/dashboard/faq.html">FAQs</a></li>
              <li class=""><a href="/dashboard/howto.html">HOW-TO Guides</a></li>
              <li class=""><a target="_blank" href="/dashboard/phpinfo.php">PHPInfo</a></li>
              <li class=""><a target="_blank" href="/phpmyadmin/">phpMyAdmin</a></li>
          </ul>
        </section>
      </nav>
    </div>

    <div id="wrapper">
      <div class="hero">
  <div class="row">
    <div class="large-12 columns">
      <h1><img src="/dashboard/images/xampp-logo.svg" />XAMPP <span>Apache + MariaDB + PHP + Perl</span></h1>
    </div>
  </div>
</div>


<?php


	include ("config.php");
	$stmt = $db->query("select * from project ");
	$stmt->execute();
	$a = $stmt->fetchAll(PDO::FETCH_OBJ);
	
	
	function retProgress($idProjeto, $db){
		$sql = "select *, (count(*)* (SELECT round(100/Count(*)) as a 
		FROM `vproject_progress` where id_project = $idProjeto)) as prg 
		from vproject_progress where concluded = 1 and id_project = $idProjeto;";
		$stmt2 = $db->query($sql);
		$stmt2->execute();
		$a2= $stmt2->fetch(PDO::FETCH_OBJ);
		return $a2->prg;
		
	}
	
	echo "<div class='row'>
		<div class='large-12 columns'>
			<h2>Projetos </h2>
		</div>
	</div>";
	
	

	if($a){
		foreach ( $a as $b ){
			echo "<div class='row' >
				<div class='large-12 columns' style='background:#816a6a2b'>
					<p>	
						<a href='".$b->directory."' target ='_blank' >Projetos : ".$b->project."</a>
						<a onclick='abrirPop(".$b->id.")'>
							<div class='w3-border'>
								<div class='w3-green' style='height:24px;width:". retProgress($b->id, $db) ."%'> 
									".retProgress($b->id, $db)."%
								</div>
							</div>
						</a>					
					</p>
				</div>
			</div>";
			
			$c[] = $b->directory;
				
		}
	}
	
	
	$itens = new DirectoryIterator('../');
    foreach($itens as $item){
        if($item->gettype() === 'dir'){
            $diretorios[] = $item->getFilename();
        }else{
            $arquivos[] = $item->getFilename();
        }

    }
		 
	echo "<div class='row'>
		<div class='large-12 columns'>
			<h2>Diretorios</h2>
		</div>
	</div>";

	if($diretorios <> ''){ 
		foreach($diretorios as $diretorio){
			if(($diretorio <> '.') && ($diretorio <> '..')){
				
				$dir = '../'.$diretorio;
				
				if(!in_array( $dir, $c )){					
					echo "<div class='row' >
						<div class='large-12 columns' style='background:#816a6a2b'>
							<p>	
								<a href='../".$diretorio."' target ='_blank' >
									Diretorios : ".$diretorio."
								</a>							
							</p>
						</div>
					</div>";										
				}
			}
		}
	}	

	

	
	
	echo "<div class='row'>
		<div class='large-12 columns' >
			<h2>Arquivos </h2>
		</div>
	</div>";

	if ($arquivos <> '') {
		foreach($arquivos as $arquivo){
			echo "<div class='row'>
				<div class='large-12 columns' style='background:#416a6a2b'>
					<p>	
						<a href='../$arquivo' target ='_blank'>Arquivos : $arquivo</a>
					</p>
				</div>
			</div>";
		}
	}
	
?>

<br>
<br>
<br>


<div class="row">
  <div class="large-12 columns">
    <h2>Welcome to XAMPP for Windows 8.0.2</h2>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <p>
      You have successfully installed XAMPP on this system! Now you can start using Apache, MariaDB, PHP and other components.
      You can find more info in the <a href="/dashboard/faq.html">FAQs</a> section or check the <a href="/dashboard/howto.html">HOW-TO Guides</a> for getting started with PHP applications.
    </p>
    <p>
      XAMPP is meant only for development purposes. It has certain configuration settings that make it easy to develop locally but that are insecure if you want to have your installation accessible to others.
      If you want have your XAMPP accessible from the internet, make sure you understand the implications and you checked the <a href="/dashboard/faq.html">FAQs</a> to learn how to protect your site. Alternatively you can use <a href="https://bitnami.com/stack/wamp">WAMP</a>, <a href="https://bitnami.com/stack/mamp">MAMP</a> or <a href="https://bitnami.com/stack/lamp">LAMP</a> which are similar packages which are more suitable for production.
    </p>
    <p>
      Start the XAMPP Control Panel to check the server status.
    </p>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <h3>Community</h3>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <p>
      XAMPP has been around for more than 10 years &ndash; there is a huge community behind it. You can get involved by joining our <a href="https://community.apachefriends.org">Forums</a>, adding yourself to the <a href="https://www.apachefriends.org/community.html#mailing_list">Mailing List</a>, and liking us on <a href="https://www.facebook.com/we.are.xampp">Facebook</a>, following our exploits on <a href="https://twitter.com/apachefriends">Twitter</a>, or adding us to your <a href="https://plus.google.com/+xampp/posts">Google+</a> circles.
    </p>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <h3>Contribute to XAMPP translation at <a href="https://translate.apachefriends.org/">translate.apachefriends.org</a>.</h3>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <p>
      Can you help translate XAMPP for other community members? We need your help to translate XAMPP into different languages. We have set up a site, <a href="https://translate.apachefriends.org/">translate.apachefriends.org</a>, where users can contribute translations.
    </p>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <h3>Install applications on XAMPP using Bitnami</h3>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <p>
    Apache Friends and Bitnami are cooperating to make dozens of open source applications available on XAMPP, for free. Bitnami-packaged applications include Wordpress, Drupal, Joomla! and dozens of others and can be deployed with one-click installers.
    Visit the <a target="_blank" href="http://bitnami.com/stack/xampp?utm_source=bitnami&amp;utm_medium=installer&amp;utm_campaign=XAMPP%2BModule">Bitnami XAMPP page</a> for details on the currently available apps.
    </p>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <a href="http://bitnami.com/stack/xampp?utm_source=bitnami&utm_medium=installer&utm_campaign=XAMPP%2BModule" target="_blank"><img alt="Bitnami XAMPP page" src="/dashboard/images/bitnami-xampp.png" /></a>
  </div>
</div>

    </div>

    <footer>
      <div class="row">
        <div class="large-12 columns">
          <div class="row">
            <div class="large-8 columns">
              <ul class="social">
  <li class="twitter"><a href="https://twitter.com/apachefriends">Follow us on Twitter</a></li>
  <li class="facebook"><a href="https://www.facebook.com/we.are.xampp">Like us on Facebook</a></li>
  <li class="google"><a href="https://plus.google.com/+xampp/posts">Add us to your G+ Circles</a></li>
</ul>

              <ul class="inline-list">
                <li><a href="https://www.apachefriends.org/blog.html">Blog</a></li>
                <li><a href="https://www.apachefriends.org/privacy_policy.html">Privacy Policy</a></li>
                <li>
<a target="_blank" href="http://www.fastly.com/">                    CDN provided by
                    <img width="48" data-2x="/dashboard/images/fastly-logo@2x.png" src="/dashboard/images/fastly-logo.png" />
</a>                </li>
              </ul>
            </div>
            <div class="large-4 columns">
              <p class="text-right">Copyright (c) 2018, Apache Friends</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
  </body>
</html>
