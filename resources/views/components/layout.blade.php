<!DOCTYPE html>

<title>My Blog</title>

<!--acts like a root file only need to add files once and the extends this file in the post.blade -->
<link rel="stylesheet" href="/app.css">

<body>
    <!--if we want a default template we can use the keyword $slot instead of using x-slot in the actual view -->
    {{ $slot }}
</body>