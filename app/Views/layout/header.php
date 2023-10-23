<header class="header">
    <div class="header_logo">
        <!-- logo -->
    </div>
    <nav class="header_nav">
        <ul class="header_nav">
            <li><a href="/">Home</a></li>
            <li><a href="/profile/<?= session()->get('user_id'); ?>">Profile</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
    </nav>
</header>