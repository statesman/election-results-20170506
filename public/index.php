<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <?php
  $meta = array(
    "title" => "2016 general and runoff election results by precinct  | Statesman.com",
    "description" => "Precinct-level results for the Nov. 8, 2016 general and Dec. 13th, 2016 runoff elections for Travis and Williamson counties.",
    "thumbnail" => "http://projects.statesman.com/databases/election-map-20161108/assets/precinct-map-share-image.jpg",
    "shortcut_icon" => "http://projects.statesman.com/databases/election-map-20161108/assets/favicon.ico",
    "apple_touch_icon" => "http://projects.statesman.com/databases/election-map-20161108/assets/apple-touch-icon.png",
    "url" => "http://projects.statesman.com/databases/election-map-20161108/",
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
        <li><a href="http://www.statesman.com/news/gen-politics/2016-election-results/tKBwLAaC2OX47zcP0GVTiM/" target="_blank">Full results</a></li>
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
        <h4>2016 General and Runoff Elections</h4>
        <h1 class="page-title">Precinct-by-precinct results</h1>
        <p class="author">By <a href="http://www.twitter.com/AASInteractive">Statesman Interactives</a>, Updated December 14, 2016</p>
        <p>Use the dropdown to choose a race to see the highest vote-getter for each precinct in the Nov. 8th general and Dec. 13th runoff elections. Roll your cursor over each precinct on the map to see votes for all candidates in the selected race. Hover over a candidate's name in the map legend to see his or her support in each precinct. Results are from Travis and Williamson counties.  <span style="font-weight: bold;"></span>>> <a href="http://www.statesman.com/news/gen-politics/2016-election-results/tKBwLAaC2OX47zcP0GVTiM/" target="_blank">Full election results</a></p>
      </div>

      <div class="form-group clearfix">
        <div class="col-lg-6">
          <label for="race" class="control-label">Choose a race:</label>
          <select class="form-control" id="race" name="race">
          <optgroup label="Dec. 13th runoffs">

<option data-zoom="+2" data-center="30.351410, -97.795411" value="r-auscc-d10">Austin: City Council, District 10 runoff</option>
<option data-zoom="0" data-center="30.329632, -97.758797" value="r-acc-p4">ACC: Trustee, Place 4 runoff</option>
<option data-zoom="0" data-center="30.329632, -97.758797" value="r-acc-p9">ACC: Trustee, Place 9 runoff</option>

          </optgroup>          
          <optgroup label="President and Congress">
<option data-zoom="0" data-center="30.469047, -97.677752" value="pres">President</option>
<option data-zoom="0" data-center="30.469047, -97.677752" value="stpty">Straight party</option>
<option data-zoom="+1" data-center="30.351310, -97.691772" value="usr-d10">U.S. Representative, District 10</option>
<option data-zoom="+1" data-center="30.461760, -97.594955" value="usr-d17">U.S. Representative, District 17</option>
<option data-zoom="+1" data-center="30.224133, -97.816055" value="usr-d21">U.S. Representative, District 21</option>
<option data-zoom="0" data-center="30.323318, -97.878711" value="usr-d25">U.S. Representative, District 25</option>
<!-- W --><option data-zoom="0" data-center="30.635027, -97.620189" value="usr-d31">U.S. Representative, District 31</option>
<option data-zoom="+1" data-center="30.199120, -97.659069" value="usr-d35">U.S. Representative, District 35</option>

          </optgroup>
          <optgroup label="Statewide and Legislature">

<option data-zoom="0" data-center="30.469047, -97.677752" value="rr">Railroad Commissioner</option>
<option data-zoom="+1" data-center="30.346656, -97.964842" value="ss-d24">State Senator, District 24</option>
<option data-zoom="+1" data-center="30.355937, -97.609366" value="sr-d46">State Representative, District 46</option>
<option data-zoom="0" data-center="30.334021, -97.921480" value="sr-d47">State Representative, District 47</option>
<option data-zoom="+1" data-center="30.269838, -97.788122" value="sr-d48">State Representative, District 48</option>
<option data-zoom="+1" data-center="30.269838, -97.788122" value="sr-d49">State Representative, District 49</option>
<option data-zoom="+1" data-center="30.351162, -97.576453" value="sr-d50">State Representative, District 50</option>
<option data-zoom="+1" data-center="30.157539, -97.683139" value="sr-d51">State Representative, District 51</option>
<!-- W --><option data-zoom="+1" data-center="30.538538, -97.575318" value="sr-d52">State Representative, District 52</option>
<!-- W --><option data-zoom="+2" data-center="30.525219, -97.815077" value="sr-d136">State Representative, District 136</option>

          </optgroup>
          <optgroup label="State judicial">

<option data-zoom="0" data-center="30.469047, -97.677752" value="scj-p3">Supreme Court Justice, Place 3</option>
<option data-zoom="0" data-center="30.469047, -97.677752" value="scj-p5">Supreme Court Justice, Place 5</option>
<option data-zoom="0" data-center="30.469047, -97.677752" value="scj-p9">Supreme Court Justice, Place 9</option>
<option data-zoom="0" data-center="30.469047, -97.677752" value="ccaj-p2">Court of Criminal Appeals Judge, Place 2</option>
<option data-zoom="0" data-center="30.469047, -97.677752" value="ccaj-p5">Court of Criminal Appeals Judge, Place 5</option>
<option data-zoom="0" data-center="30.469047, -97.677752" value="ccaj-p6">Court of Criminal Appeals Judge, Place 6</option>

          </optgroup>
          <optgroup label="Travis county">
<option data-zoom="0" data-center="30.329632, -97.758797" value="da-d53">District Attorney, 53rd Judicial District</option>
<option data-zoom="0" data-center="30.329632, -97.758797" value="s">Sheriff</option>
<option data-zoom="0" data-center="30.329632, -97.758797" value="ctax">Tax Assessor-Collector</option>
<option data-zoom="+1" data-center="30.340756, -97.590640" value="cc-p1">County Commissioner, Precinct 1</option>
<option data-zoom="0" data-center="30.365730, -97.992982" value="cc-p3">County Commissioner, Precinct 3</option>
<option data-zoom="0" data-center="30.394981, -97.762302" value="c-p2">Constable, Precinct 2</option>

          </optgroup>
          <!-- W --><optgroup label="Williamson county">

<option data-zoom="+2" data-center="30.504441, -97.733644" value="wccc-p1">County Commissioner, Precinct 1</option>
<option data-zoom="+1" data-center="30.702746, -97.749534" value="wccc-p3">County Commissioner, Precinct 3</option>

          </optgroup>
          <optgroup label="Municipal races">

<option data-zoom="0" data-center="30.329632, -97.758797" value="coa-p1">Austin: Transportation bond</option>
<option data-zoom="+1" data-center="30.177041, -97.665263" value="auscc-d2">Austin: City Council, District 2</option>
<option data-zoom="+2" data-center="30.337310, -97.699833" value="auscc-d4">Austin: City Council, District 4</option>
<option data-zoom="+1" data-center="30.420838, -97.809350" value="auscc-d6">Austin: City Council, District 6</option>
<option data-zoom="+2" data-center="30.394302, -97.671168" value="auscc-d7">Austin: City Council, District 7</option>
<option data-zoom="+2" data-center="30.351410, -97.795411" value="auscc-d10">Austin: City Council, District 10</option>

<!-- W --><option data-zoom="+1" data-center="30.820405, -97.60786" value="jarrell">Jarrell: Proposition</option>

<option data-zoom="+1" data-center="30.468094, -97.988777" value="coja-p3">Jonestown: Alderman, Place 3</option>
<option data-zoom="+1" data-center="30.468094, -97.988777" value="coja-p5">Jonestown: Alderman, Place 5</option>

<option data-zoom="+1" data-center="30.468094, -97.988777" value="lvcc-p2">Lago Vista: Councilmember, Place 2</option>
<option data-zoom="+1" data-center="30.468094, -97.988777" value="lvcc-p4">Lago Vista: Councilmember, Place 4</option>
<option data-zoom="+1" data-center="30.468094, -97.988777" value="lvcc-p6">Lago Vista: Councilmember, Place 6</option>
<option data-zoom="+1" data-center="30.468094, -97.988777" value="lv-p1">Lago Vista: Prop. 1, Cap Metro</option>
<option data-zoom="+1" data-center="30.468094, -97.988777" value="lv-p2">Lago Vista: Prop. 2, Local sales tax</option>
<option data-zoom="+1" data-center="30.468094, -97.988777" value="lv-p3">Lago Vista: Prop. 3. Type B sales tax</option>

<option data-zoom="+1" data-center="30.340176, -97.582970" value="manor-p6">Manor: City Council, Place 6</option>

<option data-zoom="+1" data-center="30.420145, -97.516365" value="pflm">Pflugerville: Mayor</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pflcc-p1">Pflugerville: Council Member, Place 1</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p1">Pflugerville: Prop. 1</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p2">Pflugerville: Prop. 2</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p3">Pflugerville: Prop. 3</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p4">Pflugerville: Prop. 4</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p5">Pflugerville: Prop. 5</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p6">Pflugerville: Prop. 6</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p7">Pflugerville: Prop. 7</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p8">Pflugerville: Prop. 8</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p9">Pflugerville: Prop. 9</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p10">Pflugerville: Prop. 10</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p11">Pflugerville: Prop. 11</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p12">Pflugerville: Prop. 12</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p13">Pflugerville: Prop. 13</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p14">Pflugerville: Prop. 14</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p15">Pflugerville: Prop. 15</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p16">Pflugerville: Prop. 16</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p17">Pflugerville: Prop. 17</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p18">Pflugerville: Prop. 18</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p19">Pflugerville: Prop. 19</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p20">Pflugerville: Prop. 20</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p21">Pflugerville: Prop. 21</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p22">Pflugerville: Prop. 22</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p23">Pflugerville: Prop. 23</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p24">Pflugerville: Prop. 24</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p25">Pflugerville: Prop. 25</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p26">Pflugerville: Prop. 26</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p27">Pflugerville: Prop. 27</option>
<option data-zoom="+1" data-center="30.420145, -97.516365" value="pfl-p28">Pflugerville: Prop. 28</option>

<option data-zoom="+2" data-center="30.427250, -97.981911" value="vpv-2">Point Venture: Council, 2-year term</option>
<option data-zoom="+2" data-center="30.427250, -97.981911" value="vpv-1">Point Venture: Council, 1-year term</option>

<option data-zoom="+3" data-center="30.222914, -97.815196" value="sv-m">Sunset Valley: Mayor</option>
<option data-zoom="+3" data-center="30.222914, -97.815196" value="sv-cc">Sunset Valley: City Council</option>
<option data-zoom="+3" data-center="30.222914, -97.815196" value="sv-scc">Sunset Valley: City Council, Special Election</option>
<option data-zoom="+3" data-center="30.222914, -97.815196" value="sv-p1">Sunset Valley: Prop. 1, new district, tax</option>

<!-- W --><option data-zoom="+1" data-center="30.559026, -97.300132" value="thrall">Thrall: Proposition</option>

<option data-zoom="+2" data-center="30.443733, -97.900603" value="vov-cm">Volente: Council Members</option>

          </optgroup>
          <optgroup label="Education">

<option data-zoom="+1" data-center="30.209030, -97.740615" value="sboe-d5">State Board of Education, District  5</option>
<option data-zoom="0" data-center="30.532489, -97.682250" value="sboe-d10">State Board of Education, District 10</option>
<option data-zoom="0" data-center="30.329632, -97.758797" value="acc-p4">ACC: Trustee, Place 4</option>
<option data-zoom="0" data-center="30.329632, -97.758797" value="acc-p5">ACC: Trustee, Place 5</option>
<option data-zoom="0" data-center="30.329632, -97.758797" value="acc-p6">ACC: Trustee, Place 6</option>
<option data-zoom="0" data-center="30.329632, -97.758797" value="acc-p9">ACC: Trustee, Place 9</option>
<option data-zoom="+2" data-center="30.180320, -97.707999" value="aisd-d2">AISD: Trustee, District 2</option>
<option data-zoom="+1" data-center="30.267981, -97.781127" value="aisd-p8">AISD: Trustee, Position 8</option>
<option data-zoom="+1" data-center="30.340176, -97.582970" value="msb">Manor ISD: Trustee</option>
<option data-zoom="+1" data-center="30.477248, -97.702849" value="rrisd-p7">Round Rock ISD: Trustee, Place 7</option>
<option data-zoom="+1" data-center="30.500177, -97.865241" value="lisd-p3">Leander ISD: Trustee, Place 3</option>
<option data-zoom="+1" data-center="30.500177, -97.865241" value="lisd-p4">Leander ISD: Trustee, Place 4</option>
<option data-zoom="+1" data-center="30.500177, -97.865241" value="lisd-p5">Leander ISD: Trustee, Place 5</option>

          </optgroup>
          <optgroup label="Utility districts">

<!-- W --><option data-zoom="+4" data-center="30.548960, -97.826278" value="bhmd-d">Block House MUD: Directors</option>
<option data-zoom="+2" data-center="30.111966, -97.802374" value="cmud1-d">Cascades MUD No. 1: Directors</option>
<option data-zoom="+2" data-center="30.111966, -97.802374" value="cmud1-p1">Cascades MUD No. 1: Prop. 1</option>
<option data-zoom="+2" data-center="30.111966, -97.802374" value="cmud1-p2">Cascades MUD No. 1: Prop. 2</option>
<option data-zoom="+2" data-center="30.111966, -97.802374" value="cmud1-p3">Cascades MUD No. 1: Prop. 3</option>
<option data-zoom="+2" data-center="30.111966, -97.802374" value="cmud1-p4">Cascades MUD No. 1: Prop. 4</option>
<option data-zoom="+2" data-center="30.111966, -97.802374" value="cmud1-p5">Cascades MUD No. 1: Prop. 5</option>
<option data-zoom="+2" data-center="30.111966, -97.802374" value="cmud1-p6">Cascades MUD No. 1: Prop. 6</option>
<option data-zoom="+2" data-center="30.111966, -97.802374" value="cmud1-p7">Cascades MUD No. 1: Prop. 7</option>
<option data-zoom="+2" data-center="30.450545, -97.737830" value="namud1-p1">North Austin MUD No. 1, Place 1</option>
<option data-zoom="+2" data-center="30.283568, -97.837326" value="lcld-d">Lost Creek Limited District: Directors</option>
<option data-zoom="+3" data-center="30.177242, -97.830985" value="twld-d">Tanglewood Limited District: Directors</option>
<option data-zoom="+1" data-center="30.506762, -97.964423" value="tcesd7-p1">Travis County ESD No. 7: Prop. 1, tax</option>
<option data-zoom="+2" data-center="30.437521, -97.866232" value="tcsed14-p1">Travis County ESD No. 14: Prop. 1, Cap Metro</option>
<option data-zoom="+1" data-center="30.410877, -98.072226" value="scmud11-d">Travis County MUD No. 11: Directors</option>
<option data-zoom="+2" data-center="30.442462, -97.679558" value="wblib">Wells Branch Library District: Trustee</option>
<option data-zoom="+2" data-center="30.442462, -97.679558" value="wbmud-p2">Wells Branch MUD: Director, Place 2</option>
<option data-zoom="+2" data-center="30.442462, -97.679558" value="wbmud-p4">Wells Branch MUD: Director, Place 4</option>
<!-- W to end -->
<option data-zoom="+2" data-center="30.483327, -97.856363" value="wtmud1-d">Williamson-Travis MUD No. 1: Directors</option>
<option data-zoom="+1" data-center="30.699072, -97.806368" value="wcm17-p1">Williamson County MUD 17: Prop. 1</option>
<option data-zoom="+1" data-center="30.699072, -97.806368" value="wcm17-p2">Williamson County MUD 17 Prop. 2</option>
<option data-zoom="+1" data-center="30.699072, -97.806368" value="wcm17-p3">Williamson County MUD 17 Prop. 3</option>
<option data-zoom="+1" data-center="30.699072, -97.806368" value="wcm17-p4">Williamson County MUD 17 Prop. 4</option>
<option data-zoom="+1" data-center="30.699072, -97.806368" value="wcm21-p1">Williamson County MUD 21 Prop. 1</option>
<option data-zoom="+1" data-center="30.699072, -97.806368" value="wcm21-p2">Williamson County MUD 21 Prop. 2</option>
<option data-zoom="+1" data-center="30.699072, -97.806368" value="wcm21-p3">Williamson County MUD 21 Prop. 3</option>
<option data-zoom="+1" data-center="30.699072, -97.806368" value="wcm21-p4">Williamson County MUD 21 Prop. 4</option>
<option data-zoom="+1" data-center="30.699072, -97.806368" value="wcm21-d">Williamson County MUD 21: Directors</option>
<option data-zoom="0" data-center="30.780215, -97.586807" value="esd5">Williamson ESD No. 5: Proposition, sales tax</option>

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
