<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script defer src="js/face-api.min.js"></script>
  <script defer src="js/script.js"></script>
  <style>
   html, body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
	
    canvas ,#video  {
      position: fixed;
	height:100%;
	width:100%;
	object-fit:cover;
    }
	#submit{
	width:200px;
	background-color: black;
    	color: white;
   	font-size: 16px;
    	border-radius: 30px;
    	border: none;
    	padding: 15px 20px;
    	text-align: center;
    	box-shadow: 0 5px 10px 0 rgba(0,0,0,0.2);
    	position: fixed;
    	bottom: 30px;
    	left: calc(50% - 100px);

	}
  </style>
</head>
<body>
<!--<main id="camera">-->

  <video id="video" width="100%" height="100%"  autoplay muted autoinline ></video>
  <button id="submit">Submit</button>
<!--</main>-->
</body>
</html>
