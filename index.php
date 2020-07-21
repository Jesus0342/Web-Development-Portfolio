<?php
    include 'includes/class-autoload.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Jesus Sanchez | Web Development Portfolio</title>
</head>
<body>
    <nav>
        <div class="heading-wrapper">

        </div>
        
        <ul class="nav">
            <a id="welcome-link" class="nav-item carousel-link carousel-link-1"><li>Welcome</li></a>
            <a id="projects-link" class="nav-item carousel-link carousel-link-2"><li>Projects</li></a>
            <a id="contact-link" class="nav-item" href="mailto:j.sanchez0342@gmail.com"><li>Contact Me</li></a>
        </ul>
    </nav>

    <!-- carousel-page -->

    <div class="sections-wrapper">
        <?php 
            include 'welcome.php';
            include 'projects.php';
            // include 'contact-me.php';
        ?>

        <div class="carousel-nav-wrappper">
            <div id="welcome-pg-indicator" class="circle small-box carousel-page-indicator page-indicator-1"></div>
            <div id="projects-pg-indicator" class="circle small-box carousel-page-indicator page-indicator-2"></div>
        </div>

        <button id="section-carousel-prev" class="circle small-box carousel-btn">
            <i class="fa fa-angle-left"></i>
        </button>

        <button id="section-carousel-next" class="circle small-box carousel-btn">
            <i class="fa fa-angle-right"></i>
        </button>
    </div>
</body>
</html>

<script>
    $(document).ready(function()
    {
        let lastPageIndex = 2;
        let carouselPages = $(".carousel-page");
        let carouselLinks = $(".carousel-link");
        let carouselIndicators = $(".carousel-page-indicator");

        let prevPageBtn = $("#section-carousel-prev");
        let nextPageBtn = $("#section-carousel-next");

        // Sets the welcome section to the current page on intial load.
        let currentPage = $(".page-1");
        let currentLink = $("#welcome-link");
        let currentIndicator = $(".page-indicator-1");

        // Previous and next page on load.
        let prevPage = $("#contact-pg");
        let nextPage = $("#projects-pg");

        currentPage.css("display", "flex");
        currentLink.css("text-shadow", "0 0 10px #fff");
        currentIndicator.css("background", "#fff");

        carouselLinks.click(function()
        {
            let clickedLink = this;

            let linkID = clickedLink.classList.item(2).split("-")[2];

            currentPage = $(".page-" + linkID);

            togglePages(currentPage);

            toggleAllIndicators($(".page-indicator-" + linkID));
            toggleAllLinks($(".carousel-link-" + linkID));

            $(".carousel-link-" + newCurrIndex).css("color", "#ff0");

        });

        prevPageBtn.click(function()
        {
            currentPage = changeCarouselPagesWithButton(currentPage, lastPageIndex, "prev", true, true);
        });

        nextPageBtn.click(function()
        {
            currentPage = changeCarouselPagesWithButton(currentPage, lastPageIndex, "next", true, true);
        });

        function changeCarouselPagesWithButton(currentPage, lastPageIndex, direction, hasIndicator, hasLink)
        {
            // Class list of current 
            let classList = currentPage.attr("class").split(/\s+/);

            // Get current page index from class list of current page.
            let currIndex = parseInt(classList[0].split("-")[1]);
            var newCurrIndex;

            // Previous and next index.
            var nextIndex;
            var prevIndex;

            // Sets the new current index at 1 if the current index is on the last page of the carousel.
            if(direction == "next")
            {
                if(currIndex == lastPageIndex)
                {
                    newCurrIndex = 1;
                }
                else
                {
                    newCurrIndex = currIndex + 1;
                }
            }
            else if(direction == "prev")
            {
                if(currIndex == 1)
                {
                    newCurrIndex = lastPageIndex;
                }
                else
                {
                    newCurrIndex = currIndex - 1;
                }            
            }

            // Set new previous and next indexes.
            switch(newCurrIndex)
            {
                case 1:
                {
                    prevIndex = lastPageIndex;
                    nextIndex = newCurrIndex + 1;
                }
                    break;
                case lastPageIndex:
                {
                    prevIndex = newCurrIndex - 1;
                    nextIndex = 1;
                }
                    break;
                default:
                {
                    prevIndex = newCurrIndex - 1;
                    nextIndex = newCurrIndex + 1;
                }
            }

            // Assign currentPage, nextPage, and prevPage variables
            currentPage = $(".page-" + newCurrIndex);
            prevPage = $(".page-" + prevIndex);
            nextPage = $(".page-" + nextIndex);

            togglePages(currentPage);

            if(hasIndicator)
            {
                $(".page-indicator-" + newCurrIndex).css("background", "#fff");

                if(direction == "next")
                {
                    $(".page-indicator-" + prevIndex).css("background", "#7c8ea2");
                }
                else if(direction == "prev")
                {
                    $(".page-indicator-" + nextIndex).css("background", "#7c8ea2");
                }
            }

            if(hasLink)
            {
                $(".carousel-link-" + newCurrIndex).css("text-shadow", "0 0 10px #fff");

                if(direction == "next")
                {
                    $(".carousel-link-" + prevIndex).css("text-shadow", "none");
                }
                else if(direction == "prev")
                {
                    $(".carousel-link-" + nextIndex).css("text-shadow", "none");
                }
            }
            
            return currentPage;
        }

        function togglePages(currentPage)
        {
            $.each(carouselPages, function(index, value)
            {
                if(value.id != currentPage.attr("id"))
                {
                    value.style.display = "none";
                }
                else
                {
                    value.style.display = "flex";
                }
            });
        }

        function toggleAllIndicators(indicatorObj)
        {
            $.each(carouselIndicators, function(index, value)
            {
                if(value.id != indicatorObj.attr("id"))
                {
                    value.style.background = "#7c8ea2";
                }
                else
                {
                    value.style.background = "#fff";
                }
            });       
        }

        function toggleAllLinks(linkObj)
        {
            $.each(carouselLinks, function(index, value)
            {
                if(value.id != linkObj.attr("id"))
                {
                    value.style.textShadow = "none";
                }
                else
                {
                    value.style.textShadow = "0 0 10px #fff";
                }
            });       
        }
    });
</script>