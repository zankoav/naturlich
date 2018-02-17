<?php
/**
 *  work with contacts form
 */
$query_args = [
    'post_type' => 'naturlith_contacts',
];
$contacts_query = new WP_Query($query_args);
$contacts = $contacts_query->get_posts();
?>

<section id="main">
    <div class="container py-5">
        <h1 class="text-center mb-5"><?php the_title(); ?></h1>
        <div class="row">
            <?php foreach ($contacts as $contact) : ?>
                <div class="contact-item col-12 col-md-6 col-lg-4 mb-5">
                    <div class="row">
                        <div class="col-6 col-sm-5">
                            <?php echo get_the_post_thumbnail($contact->ID, 'large', array("class" => "w-100 rounded-circle")); ?>
                        </div>
                        <div class="col-6 col-sm-7 pl-0">
                            <h4 class="text-uppercase"><?php echo $contact->post_title; ?></h4>
                            <p class="my-2"><?php echo get_post_meta($contact->ID, 'naturlith_contact_role', true); ?></p>
                            <p class="phone mb-0">
                                <i class="fas fa-phone mr-2"></i>
                                <?php echo get_post_meta($contact->ID, 'naturlith_contact_phone', true); ?>
                            </p>
                            <p class="email"><i class="fas fa-envelope mr-2"></i>
                                <?php echo get_post_meta($contact->ID, 'naturlith_contact_email', true); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h3 class="text-uppercase text-center my-4">Send Message</h3>
        <p class="text-center text-success">Message send successful</p>
        <form id="contactForm" action="<?php the_permalink(); ?>" method="post" class="w-75 m-auto">
            <div class="form-row">
                <div class="col-md-6 pr-3 mb-3">
                    <label for="validationServer01">name</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Name"
                           name="name"
                           required>
                    <div class="valid-feedback">
                        Name looks good!
                    </div>
                    <label for="validationServer02" class="mt-3">e-mail</label>
                    <input type="text" class="form-control is-valid" id="validationServer02" placeholder="e-mail"
                           name="email" required>
                    <div class="valid-feedback">
                        Email looks good!
                    </div>
                    <button class="btn btn-success position-absolute" type="submit">Send</button>
                </div>
                <div class="col-md-6 pl-3 mb-3">
                    <label for="validationServerUsername">message</label>
                    <textarea class="form-control is-invalid" id="validationServerUsername" name="message" rows="8"
                              placeholder="message" required></textarea>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <input type="hidden" value="send-submit" name="send-submit">
        </form>
    </div>
</section>

<section id="bottom-widget">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <?php dynamic_sidebar('contacts-page-left'); ?>
            </div>
            <div class="col-12 col-md-6">
                <?php dynamic_sidebar('contacts-page-right'); ?>
            </div>
        </div>
    </div>
</section>

