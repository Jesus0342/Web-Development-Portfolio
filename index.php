<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Jesus Sanchez | Web Development Portfolio</title>
</head>
<body>
    <nav>
        <div class="heading-wrapper">

        </div>
        
        <ul class="nav">
            <a class="nav-item" href="#welcome"><li>Welcome</li></a>
            <a class="nav-item" href="#projects"><li>Projects</li></a>
            <a class="nav-item" href="#contact-me"><li>Contact Me</li></a>
        </ul>
    </nav>

    <div class="sections-wrapper">
        <?php 
            include 'welcome.php';
            include 'projects.php';
            include 'contact-me.php';
        ?>
    </div>
</body>
</html>

<script>
    $(document).ready(function()
    {
        alert("a");
    });
</script>