<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<head>
	
</head>
<body style="font-family:sans-serif;font-size:12pt;background-color:#EEEEEE">
  <header style="position: fixed; left: 0; top: 0; width: 100%;">
			<div style="justify-content: space-between; overflow: hidden; background-color: #000000; height: 50px; align-items: center; display: flex;">
				<div style="margin-top: auto; margin-bottom: auto;">
					<img src="logo.png" height="25px" width="25px" style= " margin-left: 15px; margin-top :5px;" alt="MyBlog logo" ></img>
					<span style="color: white; font-size: 22px;margin-left: 15px"> Myblog.com</span>
		  			<a href = "home.php" style="padding: 25px 30px;color:#FFFFFF;font-size: 17px;font-weight:bold;margin-top: 8px;text-decoration: none;">HOME </a>
		  			<a href = "write.php" style="padding: 25px 30px;color:#FFFFFF;font-size: 17px;font-weight:bold;margin-top: 8px;text-decoration: none;">WRITE BLOG</a>
		  			
				</div>
				<div style="float: right;">
					<a href = "login.php" ><img src="profile.png" height="28px" width="28px" alt="MyBlog logo"></img></a>
				</div>
			</div>	
	</header>
   	<div class="about">
		<xsl:for-each select="faq/heading">
			<h1 class="heading" align="center"><xsl:value-of select="topic"/> </h1><br></br>
		</xsl:for-each>
	  </div>
	<xsl:for-each select="faq/doubt">
	  <div style="background-color:teal;color:white;padding:4px">
	    <span style="font-weight:bold"><xsl:value-of select="name"/> - </span>
	    <xsl:value-of select="ques"/>
	   </div>
	  <div style="margin-left:20px;margin-bottom:1em;font-size:10pt">
	    <p>
	    	<xsl:value-of select="ans"/>
	    </p>
  </div>

</xsl:for-each>
    
<footer style="overflow: hidden;background-color: #000000;height: 50px;position: fixed;left: 0;bottom: 0;width: 100%;display: flex;align-items: center;">
			<div class="foot" align="left">
				<a href="tandc.xml" style="margin-left: 20px;margin-right: 20px;color:#FFFFFF;font-family: sans-serif;font-size: 15px;"> Terms and condition</a>
				<a href="sitemap.php" style="margin-left: 20px;margin-right: 20px;color:#FFFFFF;font-family: sans-serif;font-size: 15px;">Site map</a>
				<a href="FAQ.xml" style="margin-left: 20px;margin-right: 20px;color:#FFFFFF;font-family: sans-serif;font-size: 15px;"> FAQs</a>
				<a href="contactus.php" style="margin-left: 20px;margin-right: 20px;color:#FFFFFF;font-family: sans-serif;font-size: 15px;"> Contact us</a>
				<a href="aboutus.xml" style="margin-left: 20px;margin-right: 20px;color:#FFFFFF;font-family: sans-serif;font-size: 15px;"> About us</a> 
			</div>

</footer>
</body>
</html> 
</xsl:template>
</xsl:stylesheet>