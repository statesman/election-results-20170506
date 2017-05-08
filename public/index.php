<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <?php
  $meta = array(
    "title" => "May 6, 2017 general and special election results by precinct  | Statesman.com",
    "description" => "Precinct-level results for the May. 6, 2017 general and special elections for Travis and Williamson counties.",
    "thumbnail" => "http://projects.statesman.com/databases/election-map-20170506/assets/precinct-map-share-image.jpg",
    "shortcut_icon" => "http://projects.statesman.com/databases/election-map-20170506/assets/favicon.ico",
    "apple_touch_icon" => "http://projects.statesman.com/databases/election-map-20170506/assets/apple-touch-icon.png",
    "url" => "http://projects.statesman.com/databases/election-map-20170506/",
    "twitter" => "AASInterative"
  );
?>

  <title>Interactive: <?php print $meta['title']; ?> | Austin American-Statesman</title>
  <link rel="shortcut icon" href="<?php print $meta['shortcut_icon']; ?>" />
  <link rel="apple-touch-icon" href="<?php print $meta['apple_touch_icon']; ?>" />

  <link rel="canonical" href="<?php print $meta['url']; ?>" />

  <meta name="description" content="<?php print $meta['description']; ?>">

  <meta property="og:title" content="<?php print $meta['title']; ?>"/>
  <meta property="og:description" content="<?php print $meta['description']; ?>"/>
  <meta property="og:image" content="<?php print $meta['thumbnail']; ?>"/>
  <meta property="og:url" content="<?php print $meta['url']; ?>"/>

  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@<?php print $meta['twitter']; ?>" />
  <meta name="twitter:title" content="<?php print $meta['title']; ?>" />
  <meta name="twitter:description" content="<?php print $meta['description']; ?>" />
  <meta name="twitter:image" content="<?php print $meta['thumbnail']; ?>" />
  <meta name="twitter:url" content="<?php print $meta['url']; ?>" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="dist/style.css">

  <link href='http://fonts.googleapis.com/css?family=Lusitana:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,300italic,400italic,700italic,700,800,800italic' rel='stylesheet' type='text/css'>
 

  <?php /* CMG advertising and analytics */ ?>
  <?php include "includes/advertising.inc"; ?>
  <?php include "includes/metrics-head.inc"; ?>

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

        <a class="navbar-brand" href="http://www.statesman.com/" target="_blank">
        <img class="visible-xs visible-sm" width="103" height="26" src="assets/logo-short-black.png" />
        <img class="hidden-xs hidden-sm" width="273" height="26" src="assets/logo.png" />
        </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./">Precinct results <span class="sr-only">(current)</span></a></li>
        <li><a href="http://www.statesman.com/news/local-govt--politics/may-2017-election-results/KFRkz1Vr4MDbgWsa31vDBJ/" target="_blank">Full results</a></li>
        <li><a href="http://www.statesman.com/elections" target="_blank">More election coverage</a></li>
        <li class="visible-xs small-social"><a target"><i class="fa fa-facebook-square"></i></a><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode($meta['url']); ?>&via=<?php print urlencode($meta['twitter']); ?>&text=<?php print urlencode($meta['title']); ?>"><i class="fa fa-twitter"></i></a><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode($meta['url']); ?>"><i class="fa fa-google-plus"></i></a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right social hidden-xs">
          <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode($meta['url']); ?>"><i class="fa fa-facebook-square"></i></a></li>
          <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode($meta['url']); ?>&via=<?php print urlencode($meta['twitter']); ?>&text=<?php print urlencode($meta['title']); ?>"><i class="fa fa-twitter"></i></a></li>
          <li><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode($meta['url']); ?>"><i class="fa fa-google-plus"></i></a></li>
        </ul>
    </div>
  </div>
</nav>

  <article class="container">
  <br>
    <div class="row">
      <div class="col-xs-12 interactive-header">
        <h4>May 6, 2017 Joint General and Special Elections</h4>
        <h1 class="page-title">Precinct-by-precinct results</h1>
        <p class="author">By <a href="http://www.twitter.com/AASInteractive">Statesman Interactives</a>, Updated May 8, 2017</p>
        <p>Text  <span style="font-weight: bold;"></span>>> <a href="http://www.statesman.com/news/gen-politics/2016-election-results/tKBwLAaC2OX47zcP0GVTiM/" target="_blank">Full election results</a></p>
      </div>

      <div class="form-group clearfix">
        <div class="col-lg-6">
          <label for="race" class="control-label">Choose a race:</label>
          <select class="form-control" id="race" name="race">


<!-- CITY ELECTIONS -->

<option data-zoom="-1" data-center="30.329632, -97.758797" value="bcc">COUNCIL MEMBER, CITY OF BEE CAVE</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="bcp">PROPOSITION, CITY OF BEE CAVE</option>

<option data-zoom="-1" data-center="30.329632, -97.758797" value="wlhp3">PLACE 3, CITY COUNCIL, CITY OF WEST LAKE HILLS</option>


<option data-zoom="-1" data-center="30.329632, -97.758797" value="cpp1">PLACE 1, COUNCIL, CITY OF CEDAR PARK</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="cpp3">PLACE 3, COUNCIL, CITY OF CEDAR PARK</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="cpp5">PLACE 5, COUNCIL, CITY OF CEDAR PARK</option>


<option data-zoom="-1" data-center="30.329632, -97.758797" value="fa">ALDERPERSONS, CITY OF FLORENCE</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="grm">MAYOR, CITY OF GRANGER</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="grcm">COUNCIL MEMBER, CITY OF GRANGER</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp1">City of Hutto, Council, Place 1</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp4">City of Hutto, Council, Place 4</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp1">City of Hutto, Proposition 1</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp2">City of Hutto, Proposition 2</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp3">City of Hutto, Proposition 3</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp4">City of Hutto, Proposition 4</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp5">City of Hutto, Proposition 5</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp6">City of Hutto, Proposition 6</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp7">City of Hutto, Proposition 7</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp8">City of Hutto, Proposition 8</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp9">City of Hutto, Proposition 9</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp10">City of Hutto, Proposition 10</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp11">City of Hutto, Proposition 11</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp12">City of Hutto, Proposition 12</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp13">City of Hutto, Proposition 13</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp14">City of Hutto, Proposition 14</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp15">City of Hutto, Proposition 15</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp16">City of Hutto, Proposition 16</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp17">City of Hutto, Proposition 17</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp18">City of Hutto, Proposition 18</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp19">City of Hutto, Proposition 19</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp20">City of Hutto, Proposition 20</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="hp21">City of Hutto, Proposition 21</option>


<option data-zoom="-1" data-center="30.329632, -97.758797" value="lwcc">COUNCILMEMBERS, CITY OF LAKEWAY</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="lwp1">PROP. 1, CITY OF LAKEWAY</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="lwp2">PROP. 2, CITY OF LAKEWAY</option>


<option data-zoom="-1" data-center="30.329632, -97.758797" value="rrm">MAYOR, CITY OF ROUND ROCK</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rrcp1">PLACE 1, COUNCIL, CITY OF ROUND ROCK</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rrcp4">PLACE 4, COUNCIL, CITY OF ROUND ROCK</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rrp1">PROPOSITION 1, CITY OF ROUND ROCK</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rrp2">PROPOSITION 2, CITY OF ROUND ROCK</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rrp3">PROPOSITION 3, CITY OF ROUND ROCK</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rrp4">PROPOSITION 4, CITY OF ROUND ROCK</option>

<option data-zoom="-1" data-center="30.329632, -97.758797" value="tc">City of Taylor, City Council At Large</option>

<!-- ISD ELECTIONS -->

<option data-zoom="-1" data-center="30.329632, -97.758797" value="pisdp2">PLACE 2, BOARD OF TRUSTEES, UNEXPIRED TERM, PFLUGERVILLE ISD</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="pisdp7">PLACE 7, BOARD OF TRUSTEES, PFLUGERVILLE ISD</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="pisdp6">PLACE 6, BOARD OF TRUSTEES, PFLUGERVILLE ISD</option>

<option data-zoom="-1" data-center="30.329632, -97.758797" value="hisdt">Hutto ISD, Board of Trustees</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="tisdt">Thrall ISD, Trustees (At Large)</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="lhisdp1">Liberty Hill ISD, Trustee, Place 1</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="lhisdp2">Liberty Hill ISD, Trustee, Place 2</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="gisdp4">Georgetown ISD, Trustee, Place 4</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="gisdp5">Georgetown ISD, Trustee, Place 5</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="gisdt">Granger ISD, Trustees</option>

<option data-zoom="-1" data-center="30.329632, -97.758797" value="rrisdp1">PROPOSITION NO. 1, ROUND ROCK ISD</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rrisdp2">PROPOSITION NO. 2, ROUND ROCK ISD</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rrisdp3">PROPOSITION NO. 3, ROUND ROCK ISD</option>

<!-- UTILITY DISTRICTS -->



<option data-zoom="-1" data-center="30.329632, -97.758797" value="m23d">PERMANENT DIRECTORS, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m23p1">PROP. 1, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m23p2">PROP. 2, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m23p3">PROP. 3, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m23p4">PROP. 4, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m23p5">PROP. 5, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m23p6">PROP. 6, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m24d">PERMANENT DIRECTORS, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m24p1">PROP. 1, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m24p2">PROP. 2, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m24p3">PROP. 3, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m24p4">PROP. 4, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m24p5">PROP. 5, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m24p6">PROP. 6, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="tes9p1">PROP. 1, TRAVIS COUNTY EMERGENCY SERVICES DISTRICT NO. 9</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="tes14p1">PROP. 1, TRAVIS COUNTY EMERGENCY SERVICES DISTRICT NO. 14</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="tes15p">PROPOSITON, TRAVIS COUNTY EMERGENCY SERVICES DISTRICT NO. 15</option>



# williamson only


<option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p1">MUD 34 Proposition 1 WILLIAMSON COUNTY MUD 34</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p2">MUD 34 Proposition 2 WILLIAMSON COUNTY MUD 34</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p3">MUD 34 Proposition 3 WILLIAMSON COUNTY MUD 34</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p4">MUD 34 Proposition 4 WILLIAMSON COUNTY MUD 34</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p5">MUD 34 Proposition 5 WILLIAMSON COUNTY MUD 34</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p6">MUD 34 Proposition 6 WILLIAMSON COUNTY MUD 34</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="esd8">Emergency Services District 8 EMERGENCY SERVICES</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="esd8a">Emergency Services District 8 ANNEX ANNEX EMERGENCY</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="esd9">Emergency Services District 9 EMERGENCY SERVICES</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="esd9a">Emergency Services District 9 ANNEX ANNEX EMERGENCY</option>


          </optgroup>
          </select>
        </div>
        <div class="col-lg-6">
          <label for="address" class="control-label">Find an address:</label>
          <input name="address" id="address" type="text" class="form-control">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-push-4">
        <div id="map" style="width:100%;min-height:350px;"></div>
      </div>
      <div class="col-xs-12 col-sm-4 col-sm-pull-8">
        <ul id="key" class="list-group"></ul>
        <div id="results"></div>
        <p><small>Data source: Travis County Clerk, Elections Division; Williamson County Clerk, Elections Department</small></p>
      </div>
    </div>
  </div>
  <br>

  </article>


    <!-- bottom matter -->
    <?php include "includes/banner-ad.inc";?>
    <?php include "includes/legal.inc";?>
    <?php include "includes/project-metrics.inc"; ?>
    <?php include "includes/metrics.inc"; ?>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBFqzY0Bf4VMn4Wtx-EEb9S-cVkvzm8RFE  &libraries=places"></script>
    <script src="dist/scripts.js"></script>


  <?php if($_SERVER['SERVER_NAME'] === 'localhost'): ?>
    <script src="//localhost:35729/livereload.js"></script>
  <?php endif; ?>
</body>
</html>
