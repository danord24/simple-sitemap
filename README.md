# simple-sitemap
A super simple MySQL driven XML sitemap in PHP.

Each time the script is loaded up, it will automatically ping the database and update the file with new pages or remove pages that no longer exist.

This is handy for Google Webmaster Tools, as each time its bot visits the url you specified, it will always be an updated list.

### Usage
Copy the code from the xml-sitemap.php file.

	- Add your databse connection details
	- Specifiy any static pages you want. I.e. ones that aren't database driven
	- Add your SQL. E.g. SELECT * FROM table WHERE page_is_active = '1'
	- Visit the page in your browser and Voila!