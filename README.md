# laravel-assessment
Submitted a demo Laravel application for assessment test

# Getting Started:

>> First unzip the folder

>> Setup database with the db schema added 
here "laravel-assessment/database/database_schema/laraveldb.sql"

>> Map the folder to the Vagrant Box

>> Visit the vagrant repo in GitHub for steps on mapping folders

>> Start and SSH into your vagrant box

>> Change into the mapped directory within vagrant

>> cd laravel-assessment

>> Install composer dependencies by running below command

>> php composer.phar install

>> Browse site: http://laravel-assessment.localhost:8080

Pages:
1. Login:
http://laravel-assessment.localhost:8080/login
Username: deepak
Password: 123456

2. Register:
http://laravel-assessment.localhost:8080/register

3. Teams:
http://laravel-assessment.localhost:8080/teams
http://laravel-assessment.localhost:8080/teams/create
Add, edit, delete and List Teams

4. Players:
http://laravel-assessment.localhost:8080/players
http://laravel-assessment.localhost:8080/players/create
Add, edit, delete and List Players

5. Players assigned Respective to Team
http://laravel-assessment.localhost:8080/players/1

APIs:
List teams end point:
http://laravel-assessment.localhost:8080/api/v1/get/teams

List Players end point:
http://laravel-assessment.localhost:8080/api/v1/get/players