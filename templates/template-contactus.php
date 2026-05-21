<?php
/*
Template Name: Contact Us
*/
get_header();
?>
<section class="contact-us-section section-gaps">
    <div class="container">
        <div class="row">
            <div class="map-section">

                <iframe
                    width="600"
                    height="450"
                    style="border:0"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.4800421192103!2d85.4356751761266!3d27.671554427067985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb0552d98d7459%3A0x593bd678d8de9a5e!2sFnClick!5e0!3m2!1sen!2snp!4v1779336084216!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
          
                    <div class="contact-form">
                        <?php echo do_shortcode('[contact-form-7 id="859f642" title="Contact form 1"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>