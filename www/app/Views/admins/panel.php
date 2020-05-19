<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../CSS/admin_style.css" />
    <title>Admin Login</title>
</head>

<body>
    <div class="login-page">
        <div class="admin-form">
            <form class="login-form" action="<?php echo URLROOT; ?>admins/panel" method="POST">
                <input type="text" name="username" placeholder="username" />
                <input type="password" name="password" placeholder="password" />
                <button>login</button>
            </form>
        </div>
    </div>
</body>

</html>