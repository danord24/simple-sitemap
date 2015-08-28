<?php

	// Fill out your MySQL server details below.
	// Ideally you would store this info in a separate file and include it here instead
	$servername = "";
	$username = "";
	$password = "";
	$dbname = "";

	// Create the connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_select_db($conn,$dbname);

	// Set the correct header so browsers display properly.
	header( 'Content-Type: application/xml' );

	// Define the beginning of our xml and set some static pages if we have any.
	// If you don't have any static page I.e. ones that don't change just delete everything from lines 20 to 34
	$xml = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc>http://www.example.com</loc>
		<changefreq>never</changefreq>
		<priority>1</priority>
	</url>
	<url>
		<loc>http://www.example.com/test</loc>
		<changefreq>never</changefreq>
		<priority>1</priority>
	</url>
	<url>
		<loc>http://www.example.com/test2</loc>
		<changefreq>never</changefreq>
		<priority>1</priority>
	</url>';

	// Do your SQL here. This will select ALL the articles from my article table
	$sql = "SELECT * FROM articles WHERE active = '1'";
	$result = mysqli_query($conn, $sql);

	if ($result && mysqli_num_rows($result) > 0) {

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

			$xml .= '<url>
				<loc>http://www.example.com/article/'.$row['article_url'].'</loc>
				<changefreq>never</changefreq>
				<priority>1</priority>
			</url>';

		}

	}

	$xml .= '</urlset>';

	// Echo out the XML. All done!
	echo $xml;

?>