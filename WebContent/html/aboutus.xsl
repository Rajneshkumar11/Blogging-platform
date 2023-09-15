<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">

<html>
	<head>
		<link rel = "stylesheet" href= '../Css/about.css'></link>
		<title>myblog/about us</title>
	</head>
		<body background="bck1.jpg" >
		<header >
			<div class="tab" >
				<div style="margin-top: auto; margin-bottom: auto;">
					<img src="logo.png" height="25px" width="25px" style= " margin-left: 15px; margin-top :5px;" alt="MyBlog logo" ></img>
					<span style="color: white; font-size: 22px;margin-left: 15px"> Myblog.com</span>
		  			<a href = "home.php">HOME </a>
		  			<a href = "write.php">WRITE BLOG</a>
		  			
				</div>
				<div style="float: right;">
					<a href = "login.php" ><img src="profile.png" height="28px" width="28px" alt="MyBlog logo"></img></a>
				</div>
			</div>	
	   	</header>
	   	<article class="about">
	   		<p style=" font-size: 40px; text-style: bold ;" >About us</p>
			<xsl:for-each select="aboutus/topic">
				<p class="heading"><xsl:value-of select="heading"/> </p><br></br>
				<p class="context"> <xsl:value-of select="content"/></p><br></br>
			</xsl:for-each>
		</article>

		<footer >
			<div class="foot" align="left">
				<a href="tandc.xml" > Terms and condition</a>
				<a href="sitemap.php">Site map</a>
				<a href="FAQ.xml"> FAQs</a>
				<a href="contactus.php"> Contact us</a>
				<a href="aboutus.xml"> About us</a> 
			</div>

		</footer>
	</body>
</html>
</xsl:template>
</xsl:stylesheet>