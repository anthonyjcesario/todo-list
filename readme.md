# Todo List in PHP

## Fun little first PHP project for Github.

This todo list was originally written in just one index.php file. I set up a basic switch/case router and
allowed the user to move to different pages with if statements. I want to give the code some room to breathe,
so I think that I am going to try to develop a little framework that I can use to make this more of an MCV 
architecture. Ignore my shitty css. I am trying my best lol.

# Installation Instructions / Contributing:

This isn't really meant to be used or messed with by people who aren't looking to contribute. I will be making some of those projects in the future, but this one is mostly just to push out my first project.

If you want to contribute, there are a couple of things that you need to do.

In the db folder, there is a .sql file. You can load this into whatever sql thingy that you use. Then, fire up the index.php file and at the top, you will find the following variables:

$DB_HOST
$DB_USER
$DB_PASSWORD
$DB_NAME

You can go ahead and use localhost as the host, and the username/password for your DB user as well. For the DB_NAME, the answer is going to be todolist.

Once that is up and running, you should be able to start gettin' busy.