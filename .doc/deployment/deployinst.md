<h1 style="text-align: center;">Alambana Deployment Instructions</h1>

# Table of Contents 
- [Install Xampp](#install-xampp)
- [GitHub](#clone-the-repository)
- [Starting the Application](#start-xampp)
- [SQL Configuration](#configure-mysql)
- [Final Steps](#finishing-up)

## Install Xampp
Navigate to the [xampp download page](https://www.apachefriends.org/index.html)<br>
![](xampp_download.jpg)<br>
Select the download for your operating system<br>
run the installer<br>

## Clone the repository
[github repo](https://github.com/sjasthi/alambana)
### Cli
```bash
git clone https://github.com/sjasthi/alambana.git </PATH/TO/xampp/htdocs/alambana>
```
### Github Desktop(Gui)
click **File** in the application menubar -> **Clone Repository**<br>
![](clone_desktop.jpg)

in the popup window select **URL** <br>
paste ``sjasthi/alambana`` in the **Repository URL** box <br>
paste ``<PATH/TO/xampp/htdocs>/alambana`` in the **Local Path** box<br>
![](github_desktop.png)


## Start Xampp
### Cli
```bash
xampp start
```
### Gui
open xampp click the start button next to apache and mysql<br>
![](startxampp.jpg)

## Configure MySql
Navigate to [phpMyAdmin control panel](http://localhost/phpmyadmin/index.php)
![](phpmyadmin.jpg)
Navigate to the [import page](http://localhost/phpmyadmin/index.php?route=/server/import) located on the topbar

![](createdb.jpg)<br>
create a database named: `aalambana_db` with the collation: `utf8_general_ci` 

![](importmysql.jpg)
select browse and find the file `aalambana_db.sql` located in the github repo at `xampp/htdocs/alambana/sql/aalambana_db.sql` and then click import at the bottom of the page

## Finishing up
you can now view the deployed page here: [alambana](http://localhost/alambana) 

