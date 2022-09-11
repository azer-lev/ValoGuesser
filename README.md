# ValoGuesser

This repository contains the code for a custom Website called 'ValoGuesser'. This project is still under development.

## Description

Implementation of the project

- web-server
- gameplay-servers

### Dependencies

- Install the latest drivers
- Install php, mysql-server, Nodejs (with the needed frameworks)

``` $ sudo npm install express axios ```

## Project Structure


### 1. Webserver

The webserver contains all needed files to set up the website for this project.
- The webserver also contains a request sections (web-server/requests/...)
- All data is going to be saved with the web-server
- The gameplay-servers will connect to the web-server and POST their information to the REST-API
- V1 does not support device resizing until now, for the second version is this feature in planning

![Webserver](https://github.com/azer-lev/ValoGuesser/blob/main/web-server/assets/img/github-images/starting-page.PNG?raw=true)

### 2. Gameplay Server

The gameplay server runs as a Node.js project, using express as the main framework to receive the client requests.

Idea:

- the gameplay server can be run on a different device then the webserver
- also it is possible to use multiple gameplay-server and connect them all to the same webserver, for a better resource management
- the gameplay-server is created with a predefined number of lobby-rooms, for the webserver


## References

Tim Wernecke, Pascal Bednarek, 2022. *ValoGuesser*.