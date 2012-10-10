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
	margin-top: 400px;
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
 

  </div>

</body>

</html>

