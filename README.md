# Fibonacci Project

The Fibonacci project is a RESTful web application written in php.  It takes *num* and *rowlen* as URL encoded parameters to the base index.php to print out *num* quantity of integers of the well known Fibonacci sequence.  For example, the following URL in your browser will print out the first 50 numbers of the Fibonacci sequence with 5 numbers in each row, for a total of 10 rows:

```
http://x.x.x.x:10888/index.php?num=50&rowlen=5
```

### Requirements
- A webserver such as Apache or Nginx (the Apache virtualhost file is included)
- The php module enabled for Apache or Nginx
- You must know the IP address of the webserver

### Installation
1. Create a webroot directory for the *index.php* file, and copy *index.php* to that location.  The default included Apache virtualhost file uses */var/www/fibonacci/index.php*.  Note: if you put the index.php file in a different location on your server, you must edit the *DocumentRoot* parameter in the *fibonacci.conf* virtualhost file.
2. Copy the *fibonacci.conf* virtualhost file to the Apache virtualhosts directory.  By default on Apache2 installations this should be */etc/apache2/sites-available/*
3. By default the virtualhost file listens on port 10888, so the website address will be http://x.x.x.x:10888/.  If you want this on a different port, edit the fibonacci.conf virtual host file.
4. Create a symlink to make the virtualhost file available to Apache with the following command *ln -s /etc/apache2/sites-available/fibonacci.conf /etc/apache2/sites-enabled/fibonacci.conf*`
5. Restart or reload Apache.

### Limitations
- The *num* parameter must be a number greater than zero (we need to print *something*) and less than 1478.  The reason it needs to be less than 1478 (1477 or lower) is because php will represent any numbers higher than this in the Fibonacci sequence as the *INF* constant which means its too large for a single php variable to handle.
- The *rowlen* parameter needs to be a number greater than 0, and is optional.  If the *rowlen* parameter is not passed, a default of 10 is used.  

### Running the Unit Test
Running the following unit test (included in fib_test.sh) will produce the result below.

Test:
```
$ curl http://x.x.x.x:10888/index.php?num=10&rowlen=1
```
Result:
```
<html><body>0<br>1<br>1<br>2<br>3<br>5<br>8<br>13<br>21<br>34<br><a href="index.php">Go Back</a></body></html>
```

