<?php

use TEST\Group;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

$howLongItWork = 100000;
$counter = 0;

for ($i = 0; $i < $howLongItWork; $i++) {
    $group = new Group();
    if ($group->getIncidentInGroup()) {
        $counter++;
    }
}

echo('<pre>Шанс ' . $counter / $howLongItWork * 100 . '%</pre>');
echo('<a href="index.html">Вернуться</a>');
