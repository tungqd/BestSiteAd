Loc Dang, Tung Dang, Khanh Nguyen

1. Run create.php to create the initial database for this homework:
You need to run this file using php version in XAMPP to avoid conflicts with other php versions in your machine. 
	Option A: Make sure XAMPP is your current directory. From command line, run this:
		bin/php [path to HomeworkFolder]/config/create.php
	Option B: In your browser, type in the following URL
		localhost/[path to HomeworkFolder]/config/create.php

2. In order to speed up the waiting time interval between two featured poems, please modify line 161 in model.php file. Notice that unit is in minute. 

3. When submit a poem, please make sure you enter new line for every line of your poem in "Content".

4. When submit a poem, please keep in mind that metaphone() and soundex() do not work perfectly to verify rhyme schema. If your test poem doesn't pass, please use this one:
C A
C A
C B
C B
C A

