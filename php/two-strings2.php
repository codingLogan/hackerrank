<?php

// Complete the twoStrings function below.
function twoStrings($s1, $s2) {
    // Build our range of values to search for
    $range = range(chr(97), chr(122));
    $s1HasChar = [];
    foreach( $range as $index => $character)
    {
        $s1HasChar[$character] = false;
    }

    foreach ($range as $character)
    {
        $s1HasChar[$character] = strpos($s1, $character) !== false ? true : false;
    }

    foreach ($range as $character)
    {
        if ( strpos($s2, $character) !== false &&
          $s1HasChar[$character] === true )
        {
                return "YES";
        }
    }

    return "NO";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $q);

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s1 = '';
    fscanf($stdin, "%[^\n]", $s1);

    $s2 = '';
    fscanf($stdin, "%[^\n]", $s2);

    $result = twoStrings($s1, $s2);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
