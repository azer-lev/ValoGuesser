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

## Project Structur


### 1. Webserver

The webserver contains all needed files to setup the website for this project.
- The webserver also contains a request sections (web-server/requests/...)
- All data is gonna be saved with the web-server
- The gameplay-servers will connect to the web-server and POST their information to the REST-API
- V1 doesnt not support device resizing until now, for the second version is this feature in planning

![Webserver](https://raw.githubusercontent.com/azer-lev/ValoGuesser/main/web-server/assets/img/github-images/login-page.PNG?token=GHSAT0AAAAAABYD4ALW4PNABQG62UR72XCKYYPIUIA)

### 2. Half-Edge Collapse

The technique chosen for vertex removal was the *Half-Edge Collapse* which works removing a vertex and reconnecting all its connections to another vertex:



Pseudo-code:

- Go to the vertex to be removed (v1 - defined on priority queue)
- Check all the vertex that are connected to that vertex
- Remove v1 and reconnect all its connections to v2  


## References


David Luebke, Benjamin Watson, Jonathan D. Cohen, Martin Reddy, and Amitabh Varshney. 2002. *Level of Detail for 3D Graphics*. Elsevier Science Inc., New York, NY, USA.

OpenGL Tutorials. *Tutorial 1: Opening a Window*, Available at: http://www.opengl-tutorial.org/beginners-tutorials/tutorial-1-opening-a-window/ (Accessed: 3rd April 2016).

Mesh Simplification. Standford course (CS 468-10-fall) Lecture Notes. Available on: http://graphics.stanford.edu/courses/cs468-10-fall/LectureSlides/08_Simplification.pdf

Shene, Ching-Kuang. *Mesh Simplification*. Classes notes. Michigan Technological University. Available on:
http://www.cs.mtu.edu/~shene/COURSES/cs3621/SLIDES/Simplification.pdf