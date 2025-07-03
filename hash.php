<?php
echo 'Admin: ' . password_hash("admin123", PASSWORD_DEFAULT) . "<br>";
echo 'User : ' . password_hash("user123", PASSWORD_DEFAULT) . "<br>";
