<?php

$name = $request->query->get('name', 'World');
?>

Hello <?php echo htmlspecialchars($name, ENT_QUOTES); ?>