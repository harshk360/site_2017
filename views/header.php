<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SITE @UIUC</title>
    <link rel="shortcut icon" type="image/x-icon" href="../views/images/ec.png" />


    <!-- Bootstrap -->
    <link href="../views/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../views/css/bootstrap.checkbox.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../views/css/jquery.webui-popover.css" rel="stylesheet" type="text/css">
    <link href="../views/css/timeline.css" rel="stylesheet" type="text/css">
    <link href="../views/css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="../views/css/slick.css" rel="stylesheet" type="text/css">
    <link href="../views/css/main.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,300,400italic,400,700' rel='stylesheet' type="text/css">

    <script id="member-template" type="text/x-handlebars-template">

        {{#each members}}

        <a class="head-shot" data-title="{{name}}, {{title}}"><img src="{{image}}"></a>
        <div class="webui-popover-content">
            <p>{{year}} {{major}}</p>
            <blockquote>{{about}}</blockquote>
            <p>{{email}}</p>
        </div>
        {{/each}}

    </script>

    <script id="timeline-template" type="text/x-handlebars-template">

        {{#each dates}}
            <li class="{{liClass}} ">
                <div class="timeline-badge {{bcolor}} wow rubberBand"></div>
                <div class="timeline-panel wow bounceInRight">
                    <div class="timeline-heading">
                        <h3 class="timeline-title">{{title}}</h3>
                    </div>
                </div>
                <h4 class="timeline-date wow bounceInLeft">{{date}}</h4>
            </li>
        {{/each}}

    </script>

    
   <script id="timetable-template" type="text/x-handlebars-template">

        {{#each days}}

        <div class="tab-pane fade in {{#if first}}active{{/if}}" id="{{id}}">
            <div class="row">
            <div class="col-sm-6"><h2>{{date}}</h2></div>
            </div>
            {{#events}}
            <hr>
            <div class="row">
            <div class="col-sm-2 text-center"><h1><i class="fa {{icon}}"></i></h1></div>
            <div class="col-sm-8"><p><b>{{title}}</b><br>{{time}}<br>{{location}}</p></div>
            </div>
            {{/events}}
        </div>
        {{/each}}

    </script>

</head>



<body id="page-top" data-spy="scroll" data-target=".navbar" data-offset="10">
    <!--BEGIN PAGE LOADER-->
    <div id="page-loader"></div>
    <!--END PAGE LOADER-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-top-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Site @uiuc</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-top-collapse">
                <ul class="nav navbar-nav navbar-right">