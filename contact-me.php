<link rel="stylesheet" href="styles/contact-me.style.css">

<section id="contact-me">
    <div id="contact-content" class="section-content">
        <form id="contact-me-form" class="rounded" action="includes/contact-me/submit-msg.inc.php" method="post">
            <h2 class="form-title">Contact Me</h2>

            <div class="form-input-wrapper">
                <input class="input" type="text" name="name" placeholder="Name">
                <input class="input" type="email" name="email" placeholder="E-mail">

                <textarea id="message" class="rounded" name="message" resize="none"></textarea>

                <button id="contact-submit-btn" class="circle small-box" type="submit" name="contact-submit">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </div>
</section>