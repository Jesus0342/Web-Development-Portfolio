<link rel="stylesheet" href="styles/projects.style.css">

<section id="projects-pg" class="page-2 carousel-page">
    <div id="projects-content" class="section-content">
        <h2 style="margin-bottom: 15px">Projects</h2>

        <div id="projects-wrapper">
            <?php
                // $projectObj = new Project();

                // $projectArray = $projectObj->getProjects();

                // foreach($projectArray as $project)
                // {
                //     echo '<div class="project-card">
                //             <div id="project-'.$project["id"].'" class="project-img-wrapper">';

                //             if($project["pic_url"] != "")
                //             {
                //                 echo '<img class="project-img" src="'.$project["pic_url"].'" alt="">';
                //             }
                //             else
                //             {
                //                 echo '<img class="project-img" src="project-img/placeholder.jpeg" alt="">';
                //             }
                               

                //         echo '<div id="description-'.$project["id"].'" class="opaque-bg project-description-wrapper">
                //                     <div class="project-description">
                //                         '.$project["description"].'
                //                     </div>

                //                     <div class="link-wrapper project-links">
                //                         <a class="circle small-box my-links" href="'.$project["source_link"].'" target="blank"><i class="fa fa-code" aria-hidden="true"></i></a>
                //                         <a class="circle small-box my-links" href="'.$project["demo_link"].'" target="blank"><i class="fa fa-link" aria-hidden="true"></i></a>
                //                     </div>
                //                 </div> <!-- end of .opaque-bg -->
                //             </div> <!-- end of .project-img-wrapper -->
                //         </div> <!-- end of .project-card -->';
                // }
            ?>
        </div> <!-- end of #projects-wrapper -->
    </div> <!-- end of #projects-content -->
</section>

<script>
    $(document).ready(function()
    {
        let imgWrapper = $(".project-img-wrapper");

        // Show/Hide project info on hover.
        imgWrapper.mouseenter(function()
        {
            let description = getDescription(this);

            description.css("display", "flex");
        }).mouseleave(function()
        {
            let description = getDescription(this);

            description.css("display", "none");
        });
    });

    function getDescription(imgWrapper)
    {
        let projectID = imgWrapper.id.split("-")[1];

        return $("#description-" + projectID);
    }
</script>