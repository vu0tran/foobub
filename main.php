<html>
<head>
<style>
body {
	margin:0;
		font-family: 'helvetica';
}

#header-bar{
	margin: 0 auto;
	width: 860px;
	height: 50px;
	background: #DDD;
	margin-bottom: 10px;
}

#search {
	width: 500px;
	height: 40px;
	margin: 0 auto;
	font-size: 18px;
	color: #777;
	margin-top: 5px;
	position:relative;
	left: 170px;
}

#container {
	width: 860px;
	margin: 0 auto;
}

.result-col {
	width:400px;
	float:left;
	margin-right:30px;
}

.result .header {
	width:100%;
	padding-bottom: 15px;
}

.result .click {

}

.result {
	width: 380px;
	background: #CCC;
	background-color:rgba(.8, .5, .5, 0.3);
	padding:20px;
	cursor:pointer;
	color:#111;
	margin-bottom: 13px;
}

.result:hover {
	background: #333;
	background-color:rgba(.8, .5, .5, 0.3);
	color:#ccc;
	padding:20px;
}

.logo {
	width: 100px;
	height: 100px;
	background: url('quora.png');
	margin-bottom:10px;
}
.title {
	position:relative;
	font-size: 18px;
	font-style: italic;
	overflow: hidden;
}

.description {
	font-size: 25px;
	font-weight: 100;

}

</style>
</head>
<body>
 <div id='header-bar'>
 	<form name="input" action="." method="get">
 	<input id='search' name='s'  placeholder="<?php echo htmlspecialchars(urldecode($search)) ?>" type='text'></input>
 </form>
 </div>
  <div id='container'>
 <!--    <div class='result-col'>
      <div class='logo'></div>

	  <div class='result'>
	  	<div class='header'>
	  		<div class='title'>en.wikipedia.org/wiki/<b>Cat</b></div>
	  	</div>
	  		<div class='description'>"<b>Cats</b> are valued by humans for companionship and ability to hunt vermin and household pests. A group of <b>cats</b> is known as either a "Glaring" or "Clowder" of <b>cats</b>."</div>
	  </div>

	  <div class='result'>
	  	<div class='header'>
	  		<div class='title'>"en.wikipedia.org/wiki/<b>Cats</b>_(musical)"</div>
	  	</div>
	  		<div class='description'>"<b>Cats</b> (stylized as <b>CATS</b>) is a musical composed by Andrew Lloyd Webber, based on Old Possum's Book of Practical <b>Cats</b> by T. S. Eliot. It introduced the song standard ..."</div>
	  </div>
	</div> 


	<div class='result-col'>
      <div class='logo'></div>

	  <div class='result'>
	  	<div class='header'>
	  		<div class='title'>en.wikipedia.org/wiki/<b>Cat</b></div>
	  	</div>
	  		<div class='description'>"<b>Cats</b> are valued by humans for companionship and ability to hunt vermin and household pests. A group of <b>cats</b> is known as either a "Glaring" or "Clowder" of <b>cats</b>."</div>
	  </div>

	  <div class='result'>
	  	<div class='header'>
	  		<div class='title'>"en.wikipedia.org/wiki/<b>Cats</b>_(musical)"</div>
	  	</div>
	  		<div class='description'>"<b>Cats</b> (stylized as <b>CATS</b>) is a musical composed by Andrew Lloyd Webber, based on Old Possum's Book of Practical <b>Cats</b> by T. S. Eliot. It introduced the song standard ..."</div>
	  </div>
	</div>  -->

  </div>

</body>

</html>
<script src='http://code.jquery.com/jquery-1.8.2.min.js'></script>
<script>
var results = <?php echo $json ?>;
if(results.length == 0){
	document.location.href = "http://www.google.com/search?q="+ '<?php echo $search ?>';
}
// var results = [{"website": "google", "high": 5, "results": [{"data": {"dispurl": "answers.google.com/answers/threadview/id/747703.html", "title": "Google Answers: <b>Network</b> <b>Solutions</b> Limited is <b>a scam</b> or real ...", "url": "http://answers.google.com/answers/threadview/id/747703.html", "abstract": "Subject: <b>Network</b> <b>Solutions</b> Limited is <b>a scam</b> or real company ??? Category: Business and Money &gt; eCommerce Asked by: agausling-ga List Price: $15.00", "clickurl": "http://answers.google.com/answers/threadview/id/747703.html", "date": ""}, "rank": 5}]}, {"website": "wikipedia", "high": 30, "results": [{"data": {"dispurl": "en.wikipedia.org/wiki/<b>Network</b>_<b>Solutions</b>", "title": "<b>Network</b> <b>Solutions</b> - Wikipedia, the free encyclopedia", "url": "http://en.wikipedia.org/wiki/Network_Solutions", "abstract": "In 1995, the domain sex.com was hijacked by Stephen M. Cohen through a lapse in <b>Network</b> <b>Solutions</b> security. A protracted and expensive lawsuit resulted as the <b>legitimate</b> ...", "clickurl": "http://en.wikipedia.org/wiki/Network_Solutions", "date": ""}, "rank": 30}, {"data": {"dispurl": "en.wikipedia.org/wiki/Domain_name_<b>scams</b>", "title": "Domain name scams - Wikipedia, the free encyclopedia", "url": "http://en.wikipedia.org/wiki/Domain_name_scams", "abstract": "In March 2008, PC News Digest reports \u201c<b>Network</b> <b>Solutions</b> <b>Scam</b>\u201d. When searching on the <b>Network</b> <b>Solutions</b> website to see if a name was available for registration ...", "clickurl": "http://en.wikipedia.org/wiki/Domain_name_scams", "date": ""}, "rank": 31}]}];

console.log(results);

for (i=0; i<results.length; i++){
	var column = document.createElement('div');
	column.className = 'result-col';
	var logo = document.createElement('div');
	logo.className = 'logo';
	logo.style.background = "url('" +  results[i]['website'] + '.png' + "')";

	column.appendChild(logo);
	for(j=0; j<results[i].results.length; j++){

		(function(e){
			var result = document.createElement('div');
			result.className = 'result';
			url = results[i].results[j].data.clickurl;
			result.onclick = function(){document.location.href = e};

			var header = document.createElement('div');
			header.className = 'header';

			var title = document.createElement('div');

			title.className = 'title';
			title.innerHTML = results[i].results[j].data.dispurl;
			


			var description = document.createElement('div');
			description.className = 'description';
			description.innerHTML = results[i].results[j].data.abstract;

			header.appendChild(title);

			result.appendChild(header);
			result.appendChild(description);

			column.appendChild(result);
		})(results[i].results[j].data.clickurl)
	}

	document.getElementById('container').appendChild(column);
}

console.log(results);
</script>

