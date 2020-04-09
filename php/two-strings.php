<?php

// Complete the twoStrings function below.
function twoStrings($s1, $s2) {
    // Remove case where they are equal
    if ( $s1 == $s2 )
    {
        return "YES";
    }

    // Custom not fast way
    $s1Length = strlen($s1);
    $s2Length = strlen($s2);

    if ( $s1Length >= $s2Length )
    {
        $longString = $s1;
        unset($s1Length);

        $shortString = $s2;
        $shortLength = $s2Length;
        unset($s2Length);
    }
    else
    {
        $longString = $s2;
        unset($s2Length);

        $shortString = $s1;
        $shortLength = $s1Length;
        unset($s1Length);
    }

    // Build a loopable solutions using above concepts
    // Bounds: offset < $shortLength - $trimLength
    $subStringSize = $shortLength;
    for ($subStringSize; $subStringSize > 0; $subStringSize--)
    {
        // Pick pieces of the shortString
        // trim = 0
        // [abcd] - offset = 0 : offset + subStringSize <= shortLength 
        
        // trim = 1
        // [abc]d - offset = 0 : 0 + 3 <= shortLength
        // a[bcd] - offset = 1 : 1 +  3 <= shortLength
        
        // trim = 2
        // [ab]cd - offset = 0
        // a[bc]d - offset = 1
        // ab[cd] - offset = 2
        
        // trim = 3
        // [a]bcd - offset = 0
        // a[b]cd - offset = 1
        // ab[c]d - offset = 2
        // abc[d] - offset = 3
        $offset = 0;
        for ( $offset = 0; $offset + $subStringSize <= $shortLength; $offset++)
        {
            $subString = substr($shortString, $offset, $subStringSize);
            if ( strpos($longString, $subString) !== false )
            {
                return "YES";
            }
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
