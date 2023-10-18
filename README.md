# DevOps Maturity Assessment

## Overview

This is a simple, survey-based tool, to help teams assess where they currently are on their DevOps journey and to help them identify next steps for further improvement.

## Run

This is a PHP application that can run on any server that supports PHP 5.5 with Mod_Rewrite enabled.
Anyway the application in shipped with a [Dockerfile](docker/Dockerfile) to be deployed on production servers and a [docker-compose](docker/docker-compose.yaml) file to be launched locally for development purposes.

## Technical Overview

* Survey questions are configured in [questions.json](https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/questions.json)
* When a user first accesses the survey, all the questions are loaded into session storage
* As the user completes the survey, their responses are saved in session storage
* Loading questions, processing responses, and generating summary results is all managed by the Survey class defined in [survey.php](https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/survey.php)
* Rendering of the survey is performed by [collectResponses.php](https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/collectResponses.php)
* Rendering of the survey results is performed by [viewResults.php](https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/viewResults.php)
* Layout uses customised [Bootstrap](http://getbootstrap.com/) 4.1.3
* Rendering charts uses [Chart.js](https://www.chartjs.org/) 2.7.2
* Icons from [Font Awesome Free](https://fontawesome.com/free) 5.3.1

## License

* [Bootstrap](http://getbootstrap.com/)
* [Chart.js](https://www.chartjs.org/)
* [Font Awesome Free](https://fontawesome.com/free)