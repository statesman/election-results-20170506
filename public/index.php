<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <?php
  $meta = array(
    "title" => "May 6, 2017 election results by precinct  | Statesman.com",
    "description" => "Precinct-level results for the May. 6, 2017 joint general and special elections for Travis and Williamson counties.",
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
        <p>Use the dropdown to choose a race to see the vote breakdown for each precinct in the May 6th election. Roll your cursor over each precinct on the map to see votes for all candidates in the selected race. Hover over a candidate's name in the map legend to see the level of support for a candidate or proposition in each precinct. Results are from Travis and Williamson counties.  <span style="font-weight: bold;"></span>>> <a href="http://www.statesman.com/news/local-govt--politics/may-2017-election-results/KFRkz1Vr4MDbgWsa31vDBJ/" target="_blank">Full election results</a></p>
      </div>

      <div class="form-group clearfix">
        <div class="col-lg-6">
          <label for="race" class="control-label">Choose a race:</label>
          <select class="form-control" id="race" name="race">


<!-- CITY ELECTIONS -->
    <optgroup label="City governments">

<option data-zoom="1" data-center="30.310548, -97.966494" value="bcc">COUNCIL MEMBER, CITY OF BEE CAVE</option>
<option data-zoom="1" data-center="30.310548, -97.966494" value="bcp">PROPOSITION, CITY OF BEE CAVE</option>

<option data-zoom="1" data-center="30.516190, -97.816178" value="cpp1">PLACE 1, COUNCIL, CITY OF CEDAR PARK</option>
<option data-zoom="1" data-center="30.516190, -97.816178" value="cpp3">PLACE 3, COUNCIL, CITY OF CEDAR PARK</option>
<option data-zoom="1" data-center="30.516190, -97.816178" value="cpp5">PLACE 5, COUNCIL, CITY OF CEDAR PARK</option>

<!-- <option data-zoom="-1" data-center="30.329632, -97.758797" value="fa">ALDERPERSONS, CITY OF FLORENCE</option> -->
<!-- <option data-zoom="-1" data-center="30.329632, -97.758797" value="grm">MAYOR, CITY OF GRANGER</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="grcm">COUNCIL MEMBER, CITY OF GRANGER</option>
 -->
<option data-zoom="1" data-center="30.537251, -97.550303" value="hccp1">PLACE 1, COUNCIL, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hccp4">PLACE 4, COUNCIL, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp1">PROP. 1, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp2">PROP. 2, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp3">PROP. 3, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp4">PROP. 4, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp5">PROP. 5, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp6">PROP. 6, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp7">PROP. 7, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp8">PROP. 8, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp9">PROP. 9, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp10">PROP. 10, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp11">PROP. 11, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp12">PROP. 12, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp13">PROP. 13, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp14">PROP. 14, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp15">PROP. 15, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp16">PROP. 16, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp17">PROP. 17, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp18">PROP. 18, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp19">PROP. 19, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp20">PROP. 20, CITY OF HUTTO</option>
<option data-zoom="1" data-center="30.537251, -97.550303" value="hp21">PROP. 21, CITY OF HUTTO</option>

<option data-zoom="1" data-center="30.354910, -97.978074" value="lwcc">COUNCILMEMBERS, CITY OF LAKEWAY</option>
<option data-zoom="1" data-center="30.354910, -97.978074" value="lwp1">PROP. 1, CITY OF LAKEWAY</option>
<option data-zoom="1" data-center="30.354910, -97.978074" value="lwp2">PROP. 2, CITY OF LAKEWAY</option>

<option data-zoom="1" data-center="30.519349, -97.658259" value="rrm">MAYOR, CITY OF ROUND ROCK</option>
<option data-zoom="1" data-center="30.519349, -97.658259" value="rrcp1">PLACE 1, COUNCIL, CITY OF ROUND ROCK</option>
<option data-zoom="1" data-center="30.519349, -97.658259" value="rrcp4">PLACE 4, COUNCIL, CITY OF ROUND ROCK</option>
<option data-zoom="1" data-center="30.519349, -97.658259" value="rrp1">PROP. 1, CITY OF ROUND ROCK</option>
<option data-zoom="1" data-center="30.519349, -97.658259" value="rrp2">PROP. 2, CITY OF ROUND ROCK</option>
<option data-zoom="1" data-center="30.519349, -97.658259" value="rrp3">PROP. 3, CITY OF ROUND ROCK</option>
<option data-zoom="1" data-center="30.519349, -97.658259" value="rrp4">PROP. 4, CITY OF ROUND ROCK</option>

<option data-zoom="1" data-center="30.570777, -97.404174" value="tc">CITY COUNCIL AT LARGE, CITY OF TAYLOR</option>

<option data-zoom="2" data-center="30.291624, -97.807488" value="wlhp3">PLACE 3, CITY COUNCIL, CITY OF WEST LAKE HILLS</option>
    </optgroup>
<!-- ISD ELECTIONS -->
    <optgroup label="School districts">
<option data-zoom="0" data-center="30.664183, -97.604925" value="gisdp4">PLACE 4, TRUSTEE, GEORGETOWN ISD</option>
<option data-zoom="0" data-center="30.664183, -97.604925" value="gisdp5">PLACE 5, TRUSTEE, GEORGETOWN ISD</option>
<option data-zoom="1" data-center="30.713897, -97.444614" value="gisdt">TRUSTEES, GRANGER ISD</option>

<option data-zoom="1" data-center="30.537251, -97.550303" value="hisdt">BOARD OF TRUSTEES, HUTTO ISD</option>

<option data-zoom="1" data-center="30.663138, -97.897926" value="lhisdp1">PLACE 1, TRUSTEE, LIBERTY HILL ISD</option>
<option data-zoom="1" data-center="30.663138, -97.897926" value="lhisdp2">PLACE 2, TRUSTEE, LIBERTY HILL ISD</option>

<option data-zoom="1" data-center="30.400446, -97.544370" value="pisdp2">PLACE 2, BOARD OF TRUSTEES, UNEXPIRED TERM, PFLUGERVILLE ISD</option>
<option data-zoom="1" data-center="30.400446, -97.544370" value="pisdp7">PLACE 7, BOARD OF TRUSTEES, PFLUGERVILLE ISD</option>
<option data-zoom="1" data-center="30.400446, -97.544370" value="pisdp6">PLACE 6, BOARD OF TRUSTEES, PFLUGERVILLE ISD</option>

<option data-zoom="1" data-center="30.512731, -97.686667" value="rrisdp1">PROP. 1, ROUND ROCK ISD</option>
<option data-zoom="1" data-center="30.512731, -97.686667" value="rrisdp2">PROP. 2, ROUND ROCK ISD</option>
<option data-zoom="1" data-center="30.512731, -97.686667" value="rrisdp3">PROP. 3, ROUND ROCK ISD</option>

<option data-zoom="1" data-center="30.587394, -97.298329" value="tisdt">TRUSTEES (AT LARGE), THRALL ISD</option>
    </optgroup>
<!-- UTILITY DISTRICTS -->
    <optgroup label="Utility districts">
<option data-zoom="1" data-center="30.696756, -97.654383" value="esd8">EMERGENCY SERVICES, EMERGENCY SERVICES DISTRICT 8</option>
<option data-zoom="2" data-center="30.594562, -97.775233" value="esd8a">ANNEX ANNEX EMERGENCY, EMERGENCY SERVICES DISTRICT 8</option>
<option data-zoom="1" data-center="30.521537, -97.661993" value="esd9">EMERGENCY SERVICES, EMERGENCY SERVICES DISTRICT 9</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="esd9a">ANNEX ANNEX EMERGENCY, EMERGENCY SERVICES DISTRICT 9</option>
<option data-zoom="1" data-center="30.309775, -97.807579" value="tes9p1">PROP. 1, TRAVIS COUNTY EMERGENCY SERVICES DISTRICT NO. 9</option>
<option data-zoom="1" data-center="30.458112, -97.885159" value="tes14p1">PROP. 1, TRAVIS COUNTY EMERGENCY SERVICES DISTRICT NO. 14</option>
<option data-zoom="1" data-center="30.148458, -97.697331" value="tes15p">PROPOSITON, TRAVIS COUNTY EMERGENCY SERVICES DISTRICT NO. 15</option>
<option data-zoom="2" data-center="30.425641, -97.542582" value="m23d">PERMANENT DIRECTORS, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m23p1">PROP. 1, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m23p2">PROP. 2, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m23p3">PROP. 3, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m23p4">PROP. 4, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m23p5">PROP. 5, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m23p6">PROP. 6, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 23</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m24d">PERMANENT DIRECTORS, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m24p1">PROP. 1, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m24p2">PROP. 2, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m24p3">PROP. 3, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m24p4">PROP. 4, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m24p5">PROP. 5, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<option data-zoom="1" data-center="30.425641, -97.542582" value="m24p6">PROP. 6, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 24</option>
<!-- <option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p1">MUD 34 PROP. 1 WILLIAMSON COUNTY MUD 34</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p2">MUD 34 PROP. 2 WILLIAMSON COUNTY MUD 34</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p3">MUD 34 PROP. 3 WILLIAMSON COUNTY MUD 34</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p4">MUD 34 PROP. 4 WILLIAMSON COUNTY MUD 34</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p5">MUD 34 PROP. 5 WILLIAMSON COUNTY MUD 34</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="m34p6">MUD 34 PROP. 6 WILLIAMSON COUNTY MUD 34</option>
 -->    </optgroup>

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
