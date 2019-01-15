# Listy
Grocery list completely overengineered
Requires MySQL and PHP on a web server

Ok I got sick of OneNote trashing a shared list on a page. It would ovrelay updates from another login, it would restore deleted lines and drop others.
My wife suggested I make something better.
I have a webserver...

Ok it has a main index.php which calls 3 other php files.
We have inserto.php which adds entries to the database.
Next remticked.php which clears the display flag on the line in the database. We are not monsters so items are not deleted immediately.
Finally checks.php which updates the checkboxes in the database.

Structure of the database is:
Display, boolean with a default of true
Checked, boolean
Item, varchar(150)
Shop, varchar(75)
Timestamp, timestamp with a default of now and changed to current on update

Interface is simple and intended for phone use.
It shows the database table rows in a html table. It has an entry form with a dropdown populated with common shops with most frequently used as default. 
You can set flags and submit updates of them to the database. There is also the remove checked button.
