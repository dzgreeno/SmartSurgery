<?php

function fixFile($file) {
    if (!file_exists($file)) return;
    $c = file_get_contents($file);
    $c = str_replace("auth()->user()->role", "session('firebase_role', 'guest')", $c);
    $c = str_replace("auth()->user()->name", "trim(session('firebase_user.fname', 'زائر') . ' ' . session('firebase_user.lname', ''))", $c);
    $c = str_replace("auth()->user()->id", "session('firebase_uid', 'null')", $c);
    file_put_contents($file, $c);
}

fixFile('resources/views/surgery-women.blade.php');

$women = file_get_contents('resources/views/surgery-women.blade.php');
$men = str_replace(
    ['جراحة النساء', 'النساء والتوليد', 'قسم النساء', 'head_women', 'staff_women', 'surgery.women', 'surgery.head_women', 'adminsurgerywomen'], 
    ['جراحة الرجال', 'جراحة الرجال', 'قسم الرجال', 'head_men', 'staff_men', 'surgery.men', 'surgery.head_men', 'adminsurgerymen'], 
$women);
file_put_contents('resources/views/surgery_men.blade.php', $men);

echo "Done\n";
