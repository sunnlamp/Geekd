Geekd README


Geekd version 1.0


CONTENTS OF THIS FILE
---------------------
  
* Introduction
* Navigation
* Completed Modules
* Usernames and Passwords
* FAQ


INTRODUCTION
------------
How to run Geekd:
Any modern browser should be able to run Geekd. Internet Explorer users may experience issues with Geekd as support was not implemented for legacy browsers that are no longer being updated. However, considering the other options currently available this should not be a problem for anyone wishing to access the site.
Geekd will host information, reviews, and walkthroughs for current and upcoming videogames. Currently admin features have not been completely tooled into Geekd and any changes to the database by users must be handled manually through manipulation of administrators with access to the source code.


NAVIGATION
----------
FOR UNREGISTERED USERS:
The navigation bar will list “Home”, “Register”, “Sign In”, and “Reviews”.
The upper left corner of the site will identify if the visitor is an unregistered user by displaying “Welcome, Guest!”.
Home will take the user back to the index page.
Register will take the user to a page where they can register with the site for additional access. The user will be notified of problems with their input should any problems occur.
Sign In will take the user to a page where they can sign in using their credentials. The user will be notified of problems with their input should any problems occur.
Reviews will take the user to a listing of available games. These games will provide links to individual pages which are loaded dynamically according to the link that has been clicked.
FOR ADMIN USERS:
The navigation bar will list “Home”, “View Users”, “Change Password”, “Logout”, and “Reviews”.
The upper left corner of the site will identify the user by their username.
Home will take the admin back to the index page.
View Users will take the admin to a page that will proceed to list all users currently registered.
Log Out will end the session for the admin.
Reviews will take the admin to a listing of available games. These games will provide links to individual pages which are loaded dynamically according to the link that has been clicked.


FOR REGISTERED USERS:
The navigation bar will list “Home”, “Change Password”, “Logout”, and “Reviews”.
The upper left corner of the site will identify the user by their username.
Home will take the admin back to the index page.
Log Out will end the session for the admin.
Reviews will take the admin to a listing of available games. These games will provide links to individual pages which are loaded dynamically according to the link that has been clicked.


COMPLETE MODULES
----------------
Registration
Implemented by the base web application.
Reviews
Partially implemented but lacking some administration abilities such as approval and denial of user created content.
Unable to submit user reviews to the database.
Walkthroughs
Partially implemented but lacking some administration abilities such as approval and denial of user created content. Some components must be hardcoded to the database.


Usernames and Passwords
-----------------------
Admin:
Username: God
Email: god@example.com
Password: qwerty
User:
Username: LORDYLORD
Email: lordy@lord.com
Password: Password1


Problems and Challenges
-----------------------
Interoperability of MySQLi and PHP:
Not using an IDE or software suite that pairs the two together in a more natural way makes it difficult for beginners to approach programming. Tools such as ASP.NET, Django, or Ruby on Rails make use of frameworks that help to more easily replicate a production environment for the purposes of development.