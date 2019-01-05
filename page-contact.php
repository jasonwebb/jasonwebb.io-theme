<?php get_header(); ?>

<div class="contact-page page">
    <h1 class="title">Interested in working together? Need help with a project? Coming to town and want to grab a coffee? Drop me a line!</h1>
    <p>You can also hit me up on <a href="http://twitter.com/jasonwebb" target="_blank">Twitter</a>, if that's what you're into.</p>

    <div class="form columns is-gapless">
        <form class="column is-6">
            <div class="field">
                <div class="control has-icons-left">
                    <input type="text" class="input" placeholder="Your name">
                    <span class="icon is-left">
                        <i class="fa fa-user"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control has-icons-left">
                    <input type="text" class="input" placeholder="Your email">
                    <span class="icon is-left">
                        <i class="fa fa-envelope"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <textarea class="textarea" placeholder="Your message"></textarea>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Send message</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php get_footer(); ?>