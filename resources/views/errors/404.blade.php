<!DOCTYPE html>
<html>
    <head>
        <title>Saniharto 404 page</title>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                /*font-family: 'Lato';*/
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
                font: bold;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
            a{
            	font-size: 35px;
            	color: black;
            	font: bold;
                text-decoration: none;
            }
            .not{
            	font-size: 30px;
            	/*color: black;
            	font: bold;*/
            	font-family: 'Baloo Paaji', cursive;
            }
        </style>
    </head>
    <body>
        <div class="container">
        	<div class="not">
        		404 Page Not Found.
        	</div>
            <div class="content">
                <div class="title">Oops! Something goes wrong</div>
                <a href="{{route('home')}}">Back to home!</a>
            </div>
        </div>
    </body>
</html>
