#!/bin/bash

unit_test_result=`curl http://localhost:10888/index.php?num=10\&rowlen=1`
unit_test_expected='<html><body>0<br>1<br>1<br>2<br>3<br>5<br>8<br>13<br>21<br>34<br><a href="index.php">Go Back</a></body></html>'

if [ "$unit_test_result" == "$unit_test_expected" ]; then
  echo "Test success, curl results match expected results"
else
  echo "Test failed, curl results do not match expected results"
fi 
echo "Expected: "$unit_test_expected
echo "Result: "$unit_test_result

