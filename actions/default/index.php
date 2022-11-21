<?php

Page::set_title('Dashboard');
$conn = conn();
$db   = new Database($conn);

$statistics = $db->all('statistics');

return compact('statistics');