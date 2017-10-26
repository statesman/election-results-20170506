Election results May 6th, 2017 general and joint elections
==================================================

[@achavez](https://github.com/achavez) built this in 2014 and we've been modifying (and improving) it each election since.

## Origin

* This repo was copied from [2016 November general](https://github.com/statesman/election-results-20161108) repo. There were significant changes for the 2016 election, fixing some problems with candidate keys and the showSupport function.

## Travis Elections

Arrange to get the `consolidatedexportwithoversandunders` file from [Travis county elections](mailto:elections@traviscountytx.gov). I typically reach out to Ginny Ballard in advance and ask her to ftp it to ftp.statesman.com, though it can be emailed, too.

It really, really helps to get a "zeros" file days in advance so you can figure out cleaning and such ahead of election day. There is quite a bit of work to set up in advance.

>Ginny Ballard CERA
>Ginny.Ballard@traviscountytx.gov
>Public Information Coordinator  
>Travis County Clerk – Elections Division  
>512-854-4177  

Note that there are precincts on both Williamson and Hays counties that are in the City of Austin, and those results will be in the Travis results. They can be dealt with through queries and the results processing script, as noted below.

- Williamson precincts in Travis results are designated with a "W" at the beginning of the precinct name.
- Hays precincts in Travis results are designated with a "H" at the beginning of the precinct name.


## Williamson Elections

For Williamson county, to get the ASCII dump file, use the [Voter Information Request form](Williamson_Voter_Request_Form_2016.pdf). (We got this after 2016 runoff and haven't used it yet.) 

>Brandon Jenkins  
>Williamson County - Elections Department  
>brandon.jenkins@wilco.org  

Again, get a zeros file in advance.

## Cleaning and processing results: Travis

This ought to be done in a Jupyter Notebook some day, but my (@crit) familiarity is with sql, so this is how we'll do this.

* The _Travis_ file comes as something like `20160507unconsolidatedtallyexportwithoversandunders.txt`

### OpenRefine cleaning

In 20161108 this was really only necessary to fix a bad character in a name in the Travis results. It was this result that was inserted into MySQL.

- You could use Open Refine to filter out the Williamson and Hays results, but it is better to do that in SQL.
- It can help to export the Open Refine steps as JSON so you can rework it later.  
- For 20161108 I did a text transform to clean up a non-UTF-8 character ine one candidate's name: `column candidate_name: grel:replace(value,"R�bago","Rabago")`.

### Setting up MySQL results

I uploaded the cleaned file into MySQL to consolidate precincts and get the results in the format we want. I used a local version of MySQL, but there are SQL dump structures which can be used to create the tables:
- `travis_table_structure.sql`
- `williamson_table_structure.sql`

#### Removing unopposed races

I first created a view of just the opposed races, as there are results for unopposed races as well. It basically counts the number of distinct candidate names for each race, then filters that list to those with more than one candidate.

Note: For runoffs, it is only contested races, so there is no need for this step.

view `travis_opposed_races_20161108`:

``` sql
SELECT
    `Contest_Id`,
    `Contest_title`,
    count(
        DISTINCT `candidate_name`
    ) AS `candidates`
FROM
    `travis_20170506` /* update table name */
GROUP BY
    1
HAVING
    (`candidates` > 1)
ORDER BY
    2 DESC ,
    1
```

#### Making a results query

I then used an INNER JOIN to filter the result table based on only the contest_Id's in the opposed races view.

- It is here that I filtered out the "W" and "H" races as needed.
- If a runoff election, you don't need to join to the contested races view

``` sql
SELECT
    Travis_20170506.Precinct_name ,
    Travis_20170506.Contest_title ,
    Travis_20170506.candidate_name ,
    Travis_20170506.Party_Code ,
    sum(
        `Travis_20170506`.`total_votes`
    ) AS total_votes
FROM
    Travis_20170506
JOIN travis_opposed_20170506 ON Travis_20170506.Contest_Id = travis_opposed_20170506.Contest_Id
    # excludes Hays and Williamson spillover precincts 
    WHERE left(Precinct_name,1) not in ("W","H")
GROUP BY
    1 ,
    2 ,
    3 ,
    4
```


* I then exported that to `/results/travis_results_20161108.csv`, making sure that two things were selected (using Navicat):
    - Include column titles
    - Text qualifier as doublequotes. (There were problems if this is left out)
* In 20160507 there was a race name that had a `Contest_title` that included escaped characters as ""No"" and that record failed to build in the races script. I had to change that to single quotes in the `races.py` file for it to work.

#### Random numbers for testing

If you are working with a "zeros" file, the races.py processing won't work quite right. I set the test data with random numbers so I could get some results I could see, which had to be done to set the lat/long focus.

``` sql
update table_name
set `total_votes` = (
    SELECT FLOOR(RAND()*(1000-10+1))+10
);
```

### Williamson county precincts in Travis results

Parts of the City of Austin dips into Williamson county and you have to be cognizant of which file you will gather the results from, because sometimes they are in both Travis and Williamson returns.

* If you are pulling from the Travis results, then you can put those results in your `williamsons_results_YYYYMMDD.csv` file with the "W" removed from the precinct name, so they can be processed by the `results.py` script, which will add the W back as needed. If you want only the Williamson precincts, then you can include `left(Precinct_name,1) in ("W")` in the WHERE statement to filter for them.
* NOTE: If there are no Williamson county results at all, you have to keep/make that `williamsons_results_YYYYMMDD.csv` file with a header or edit the the `races.py` script to not consider the williamson file. Williamson County Elections take longer to get precinct-level results to us. You might want to run with the Travis version of their results while you wait on the rest of their races.

### Hays county precincts in Travis results

Parts of the City of Austin also dips into Hays County. The precinct name will be prepended with "H".

* If you are pulling from the Travis results, then you can put those results in your `hays_results_YYYYMMDD.csv` file with the "H" removed from the precinct name, so they can be processed by the `results.py` script, which will add the H back as needed.
* OF NOTE: If there are no Hays county results at all, you either have to keep the `hays_results_YYYYMMDD.csv` with a header or remove those parts from races.py.

## Processing Williamson results

### Converting to csv

The Williamson races come in a fixed-width file called something like `Pct det TEXT.ASC`, which can we saved as a .txt file.

I used [csvkit's in2csv](https://csvkit.readthedocs.io/en/0.9.1/scripts/in2csv.html) for fixed width files to convert to a .csv that could be uploaded into MySQL. I created a schema, which is saved in `results/processing/williamson-results-ffs.csv`. It was built using the `williamson-raw-filelayout.pdf` record layout, which is in the same folder.

If you are inside the the processing folder, you can use the following command to process, with the filenames adjusted:

``` bash
$ in2csv -e iso-8859-1 -f fixed -s williamson-results-ffs.csv results_file.txt > results_file_converted.csv
```

### Cleaning in OpenRefine

Since these results get combined with the Travis County results for the same races, the candidate names have to match. This may necessitate some kind of cleaning, and it's probably unique to each election.

For 20161108 I did this in OpenRefine. The goals were:

- Rename candidate_name Yes, No, For, Against to take out Spanish translation
- I fixed contest_titles for Pflugerville ISD to make them consistent.
- Rename candidate_names to remove " Party" to match Travis

For 20161213 runoff I didn't use OpenRefine because I just excluded the extra titles in the mysql query later.

It makes sense to work out the steps with a "Zeros" file, then save the steps out of Open Refine as a JSON file.

The cleaned file is what is inserted into MySQL. A table schema is saved in `results/processing/williamson_table_structure.sql`.

#### A View to exclude unopposed races

I created a view that includes only races that have more than one candidate similar to the one in Travis.

``` sql
SELECT
    `contest_id`,
    count(
        DISTINCT `candidate_name`
    ) AS `candidates`
FROM
    `williamson_20161108` /* update table name */
WHERE
    (
        `candidate_name` NOT IN(
            'OVER VOTES' ,
            'UNDER VOTES' ,
            'BALLOTS CAST - TOTAL' ,
            'WRITE-IN'
        )
    )
GROUP BY
    1
HAVING
    (`candidates` > 1)
```

#### Results query

This is the results query that adds up all the number_votes into a total votes for each precinct. It uses an INNER JOIN to the `williamson_opposed_20161108` table so the unopposed races are dropped.

``` sql
SELECT
    precinct_name ,
    contest_title ,
    candidate_name ,
    party_code ,
    sum(
        number_votes
    ) as total_votes
FROM
    williamson_20161108
JOIN williamson_opposed_20161108 ON williamson_20161108.contest_id = williamson_opposed_20161108.contest_id
WHERE
    candidate_name NOT IN(
        "OVER VOTES" ,
        "UNDER VOTES" ,
        "BALLOTS CAST - TOTAL" ,
        "WRITE-IN"
    )
GROUP BY
    1 ,
    2 ,
    3 ,
    4
```

The results of this file are exported as csv into the `results` directory, making sure that two things were selected (using Navicat):
    - Include column titles
    - Text qualifier as doublequotes.

The result was then referenced in the `races.py` script for the williamson portion.

## Contest titles

We need a list of contest titles for two reason: to build the array for the `races.py` script, and for the select options in `index.php`.

### Travis

`travis_titles_20161108` in my local mysql gets the Travis version:

``` sql
SELECT DISTINCT
    `Travis_20170506`.Contest_title
FROM
    Travis_20170506
JOIN travis_opposed_20170506 ON Travis_20170506.Contest_Id = travis_opposed_20170506.Contest_Id
```

### Williamson

We do the same for Williamson:

``` sql
SELECT DISTINCT
    williamson_20161108.Contest_title
FROM
    williamson_20161108
JOIN williamson_opposed_20161108 ON williamson_20161108.contest_id = williamson_opposed_20161108.contest_id
```

## Title arrays for `races.py`

I then took each line of that file and started creating the python array in a file called `travis_titles_array_20161108.py` which is saved. It looks something like this:

``` python
<option data-zoom="-1" data-center="30.329632, -97.758797" value="p-d">PRESIDENT - DEM</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rd35-d">DISTRICT 35, UNITED STATES REPRESENTATIVE - DEM</option>
```

Regex find:
```
^(".*")
```

Regex replace:
```
build_race_file([\1], 'uniqueID')
```

I then set `uniqueID` to something unique to each race that I decided myself. It is used to match the JSON file, and for the dropdown in the map (contest_selects below).

This list of races goes at the bottom of the `races.py` file.

### Adding Williamson

If there are races in both Travis and Williamson counties, you have to add the Williamson title to the array"

``` python
<option data-zoom="-1" data-center="30.329632, -97.758797" value="pres">PRESIDENT", "President and Vice-President FEDERAL</option>

```

Then you need to list new 'build_race_file' arrays parts for the races that are only in Williamson.

Williamson Round Rock ISD `30.512731, -97.686667`

## Titles for `index.php` races dropdown

I used the titles python array and regex to create the select form options in `index.php`, which is formatted like this:

``` html
<option data-zoom="-1" data-center="30.329632, -97.758797" value="p-d">PRESIDENT - DEM</option>
<option data-zoom="-1" data-center="30.329632, -97.758797" value="rd35-d">DISTRICT 35, UNITED STATES REPRESENTATIVE - DEM</option>

```

I used regexes to help me build these from the python arrah BEFORE the Williamson title values were added.

The regex search string:
```
^build_race_file\(\["(.*)"\], '(.*)'\)
```

The regex replace string:
```
<option data-zoom="-1" data-center="30.329632, -97.758797" value="\2">\1</option>
```

The `data-zoom` and `data-center` options there can be used to center the map for that race, which I did after everything else was done.

## Creating the JSON files usings `races.py`

### Python environment

#### Conda for elections

In 20161108, I created an Anaconda environment with the necessary packages to run the election scripts for `races.py` 

To launch the conda package if you already have it:

```
# source activate election
```

If you don't already have the conda environment created, then you can use this:

```
$ conda create --name election beautifulsoup4 ecdsa Fabric paramiko pycrypto simplejson wheel
```

#### Virutual env

Before 20161108 we used virutal env:

``` bash
source venv/bin/activate
pip install -r requirements.txt
```

### Running the races script

The script `races.py` walks through the `results/travis.csv` (or whatever you have exported from MySQL) and `results/williamson.csv` files to connect to the geojson file and then writes them into `race-data/` as their `[uniqueid].json`.

- If there are no Williamson results and that file `williamson.csv` is empty, it will fail. Just put headers only in that file and it will be OK.
- Hays hasn't voted. It's in the races.py for now, but perhaps we can remove that if they don't vote there again.

### Precincts geography

Inside the `precincts` folder are:

- `[county].geojson` files for each county. There were created in QGIS from shapefiles supplied by each county.
- a `combiner.py` script that puts those county files together into one file.
- `combined.geojson` which is the result of the combiner.
- `combined-simplified.geojson` which is the result of running `combeined.geojson` through QGIS > Vector > Geometry Tools > Simplify Geometries. This smooths the shapes and makes them smaller data-wise.

After doing that, I had to go into `combined-simplified.geojson` and manually remove the `null` demographic fields from the "H" and "W" precincts.

```
"properties": { "SUM_HISP_1": null, "SUM_HISPAN": null, "SUM_BH": null, "PCTCODE": null, "SUM_ANGLOV": null, "SUM_BHVAP": null, "SUM_BLACK": null, "SUM_OTHER": null, "PCT": "H441", "SUM_OTHERV": null, "SUM_BLACKV": null, "SUM_ANGLO": null, "Shape_Area": null, "Shape_Leng": null, "COUNT_TOTA": null, "SUM_VAP": null, "SUM_TOTAL": null }
```

needed to be:

```
"properties": { PCT": "H441" }
```

## Runoff races

When adding the runoff races, you are basically doing these steps:

- upload the results into MySQL
- Group them
- Export them
- Create/edit/use a races-runoff.py file with the races listed. This will create the neede json files
- Update the index to list the new races in the dropdown
- Update any chatter needed

## Other analysis of races

### Use CASE to isolate a candidate

Using this string in a select field is helpful to isolate a candidate

`SUM(CASE WHEN candidate_name = "Hillary Clinton / Tim Kaine" THEN total_votes ELSE 0 END) as 'Clinton'`

You can have multiple filters in the CASE statement.

I have many various csv's and xslx files in the repo that were various analysis. They have the data on the file name.

### Undervotes
Undervote are hard to figure because they number for the race is in each row for each candidate. To solve, I had to make a couple of views:

view `travis_under_precinct`:

``` sql
SELECT DISTINCT
    `travis_20161108`.`Precinct_name` AS `Precinct` ,
    `travis_20161108`.`Contest_title` AS `Contest tite` ,
    `travis_20161108`.`total_under_votes` AS `Under vote`
FROM
    `travis_20161108`
```

view `travis_under`

```sql
SELECT
    `travis_under_precinct_20161108`.`Contest tite` AS `Contest tite` ,
    sum(
        `travis_under_precinct_20161108`.`Under vote`
    ) AS `Unders`
FROM
    `travis_under_precinct_20161108`
GROUP BY
    `travis_under_precinct_20161108`.`Contest tite`
```

Only then could I make a query by title `travis_undervote`

``` sql
SELECT
    Travis_20161108.Contest_title,
    sum(`Travis_20161108`.`total_votes`) as Votes,
    `travis_under_20161108`.`Unders`,
    sum(`Travis_20161108`.`total_votes`) + `travis_under_20161108`.`Unders` as VotesCast,
    ROUND(`travis_under_20161108`.`Unders` / (sum(`Travis_20161108`.`total_votes`) + `travis_under_20161108`.`Unders`)*100,1) as PrcUnder
FROM
    Travis_20161108
    JOIN travis_under_20161108
    ON Travis_20161108.Contest_title = travis_under_20161108.`Contest tite`
GROUP BY 1
ORDER BY PrcUnder desc
```

## The interactive

So that was all about the data ... I have very little to say about the template itself.

- The default race is set in `main.js` at `map.drawWinners("pres")`
- The default map zoom level and lat/long is near the top in  `map.js`
- palette.js sets up the key as well as the colors.

## TO-DO

- I (@crit) would like to take the effort that is done in sql and do that in python in a jupyter notebook. Probably won't happen.
- I'd like to move the races.py into a notebook as well.
- Should remove the rail line stuff from the Javascript since that was from 2014.

