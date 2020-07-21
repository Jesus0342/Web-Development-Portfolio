<link rel="stylesheet" href="styles/projects.style.css">

<section id="projects-pg" class="page-2 carousel-page">
    <div id="projects-content" class="section-content">
        <div id="project-carousel">
            <?php
                $projectObj = new Project();

                $projectArray = $projectObj->getProjects();

                $i = 1;

                foreach($projectArray as $project)
                {
                    echo '<div class="project-card project-page-'.$i.'">
                            <div id="project-'.$i.'" class="project-img-wrapper">';

                            if($project["pic_url"] != "")
                            {
                                echo '<img class="project-img" src="'.$project["pic_url"].'" alt="">';
                            }
                            else
                            {
                                echo '<img class="project-img" src="project-img/placeholder.jpeg" alt="">';
                            }
                                

                        echo '<div id="description-'.$i.'" class="opaque-bg project-description-wrapper">
                                    <div class="project-description">
                                        '.$project["description"].'
                                    </div>

                                    <div class="link-wrapper project-links">
                                        <a class="circle small-box my-links" href="'.$project["source_link"].'" target="blank"><i class="fa fa-code" aria-hidden="true"></i></a>
                                        <a class="circle small-box my-links" href="'.$project["demo_link"].'" target="blank"><i class="fa fa-link" aria-hidden="true"></i></a>
                                    </div>
                                </div> <!-- end of .opaque-bg -->
                            </div> <!-- end of .project-img-wrapper -->
                        </div> <!-- end of .project-card -->';

                    $i += 1;
                }
            ?>
        </div> <!-- end of #projects-carousel -->
    </div> <!-- end of #projects-content -->
</section>

<script>
    $(document).ready(function()
    {
        let projectPgCount = $(".project-card").length;

        let imgWrapper = $(".project-img-wrapper");

        let currentPage = $(".project-page-1");
        currentPage.css("display", "flex");
        currentPage.toggleClass("current-page");

        var prevPage;
        var nextPage;

        if(projectPgCount == 2) // Make prev & next page the same.
        {
            prevPage = $(".project-page-2");
            prevPage.css("display", "flex");
            prevPage.toggleClass("prev-page");
        }
        else if(projectPgCount > 2) // Seperate prev & next pages
        {
            prevPage = $(".project-page-2");
            prevPage.css("display", "flex");
            prevPage.toggleClass("prev-page"); 

            nextPage = $(".project-page-" + projectPgCount);
            nextPage.css("display", "flex");
            nextPage.toggleClass("next-page"); 
        }

        // Show/Hide project info on hover.
        imgWrapper.mouseenter(function()
        {
            let description = getDescription(this);
            
            if(this.parentElement.className.includes("current-page"))
            {
                description.css("display", "flex");
                this.style.boxShadow = "none";
            }
            else
            {
                this.style.boxShadow = "0 0 10px white";
            }
        }).mouseleave(function()
        {
            let description = getDescription(this);

            if(this.parentElement.className.includes("current-page"))
            {
                description.css("display", "none");
                this.style.boxShadow = "none";
            }
            else
            {
                this.style.boxShadow = "none";
            }
        });

        imgWrapper.click(function()
        {
            let parentClasses = this.parentElement.className;

            let classArr = parentClasses.split(/\s+/);
            let selectedPageNum = parseInt(classArr[1].split("-")[2]);

            changeProjectCarouselPage(selectedPageNum, projectPgCount);
        });
    });

    function getDescription(imgWrapper)
    {
        let projectID = imgWrapper.id.split("-")[1];

        return $("#description-" + projectID);
    }

    function changeProjectCarouselPage(selectedIndex, lastPageIndex)
    {
        currentPage = $(".current-page");
        prevPage = $(".prev-page");
        nextPage = $(".next-page");

        let classList = currentPage.attr("class").split(/\s+/);
        let currIndex = parseInt(classList[1].split("-")[2]);

        // Previous and next index.
        var nextIndex;
        var prevIndex;

        if(lastPageIndex == 2)
        {
            currentPage = $(".project-page-2");
            nextPage = $(".project-page-" + projectPgCount);
        }
        else
        {
            // Set new previous and next indexes.
            switch(selectedIndex)
            {
                case 1:
                {
                    prevIndex = lastPageIndex;
                    nextIndex = selectedIndex + 1;
                }
                    break;
                case lastPageIndex:
                {
                    prevIndex = selectedIndex - 1;
                    nextIndex = 1;
                }
                    break;
                default:
                {
                    prevIndex = selectedIndex - 1;
                    nextIndex = selectedIndex + 1;
                }
            }

            currentPage.css("display", "none");
            currentPage.toggleClass("current-page");

            prevPage.css("display", "none");
            prevPage.toggleClass("prev-page");

            nextPage.css("display", "none");
            nextPage.toggleClass("next-page");
            
            // Assign currentPage, nextPage, and prevPage variables.
            currentPage = $(".project-page-" + selectedIndex);
            prevPage = $(".project-page-" + prevIndex);
            nextPage = $(".project-page-" + nextIndex);

            currentPage.css("display", "flex");
            currentPage.css("box-shadow", "none");
            currentPage.toggleClass("current-page");

            prevPage.css("display", "flex");
            prevPage.toggleClass("prev-page");

            nextPage.css("display", "flex");
            nextPage.toggleClass("next-page");
        }

        return currentPage;
    }
</script>