<?php

// Function to return array for Q1.1
function generate()
{
    $result = [];
    for ($i = 0; $i < 5; $i++) {
        $tmpArr = [];
        for ($j = 1; $j < 4; $j++) {
            do {
                $item = rand(0,9);
            } while (in_array($item, $tmpArr));
            $tmpArr[] = $item;
        }
        $result[] = implode('.', $tmpArr);
    }
    return $result;
}

// Function to return array for Q1.1
function filter()
{
    $array = generate();
    $filtered = [];
    foreach ($array as $item) {
        if(preg_match('/^[02468](.|\d)*$/', $item)) {
            $filtered[] = $item;
        }
    }
    return $filtered;
}

print_r(filter());