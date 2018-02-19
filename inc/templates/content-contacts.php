<?php
/**
 *  work with contacts form
 */
$query_args = [
    'post_type' => 'naturlith_contacts',
];
$contacts_query = new WP_Query($query_args);
$contacts = $contacts_query->get_posts();

$emailSent = false;

if (isset($_POST['user_sendsubmit'], $_POST['user_name'], $_POST['user_email'], $_POST['user_message']) and is_email(trim($_POST['user_email']))) {

    $name = trim($_POST['user_name']);
    $email = trim($_POST['user_email']);
    $message = trim($_POST['user_message']);

    if (function_exists('stripslashes')) {
        $message = stripslashes($message);
    }

    $emailTo = get_option('tz_email');
    if (!isset($emailTo) || ($emailTo == '')) {
        $emailTo = get_option('admin_email');
    }

    $subject = __('Naturlith Contacts From ', 'naturlith') . $name;
    $body = __("Name: ", 'naturlith') . "$name \n\n" . __("Email:", 'naturlith') . " $email \n\n" . __("Message:", 'naturlith') . " $message";
    $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;

    mail($emailTo, $subject, $body, $headers);
    $emailSent = true;

}

?>

<section id="main">
    <div class="container py-5">
        <h1 class="text-center mb-5 py-3"><?php the_title(); ?></h1>
        <div class="row">
            <?php foreach ($contacts as $contact) : ?>
                <div class="contact-item col-12 col-md-6 col-lg-4 mb-5">
                    <div class="row">
                        <div class="col-6 col-sm-5 align-self-center">
                            <?php echo get_the_post_thumbnail($contact->ID, 'large', array("class" => "w-100 rounded-circle")); ?>
                        </div>
                        <div class="col-6 col-sm-7 pl-0 align-self-center">
                            <h4 class="text-uppercase"><?php echo $contact->post_title; ?></h4>
                            <p class="my-2"><?php echo get_post_meta($contact->ID, 'naturlith_contact_role', true); ?></p>
                            <p class="phone mb-0">
                                <i class="fas fa-phone mr-2"></i>
                                <?php echo get_post_meta($contact->ID, 'naturlith_contact_phone', true); ?>
                            </p>
                            <p class="email mb-0"><i class="fas fa-envelope mr-2"></i>
                                <?php echo get_post_meta($contact->ID, 'naturlith_contact_email', true); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h3 class="text-uppercase text-center my-4"><?php echo __('Send Message', 'naturlith'); ?></h3>
        <?php if ($emailSent): ?>
            <p class="text-center text-success"><?php echo __('Message send successful', 'naturlith'); ?></p>
        <?php endif; ?>
        <form id="contactForm" action="<?php the_permalink(); ?>" method="post" class="w-75 m-auto">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="validationName">name</label>
                        <input type="text" class="form-control" id="validationName" placeholder="Name"
                               name="user_name">
                        <div class="valid-feedback">
                            <?php echo __('Name looks good!', 'naturlith'); ?>
                        </div>
                        <div class="invalid-feedback">
                            <?php echo __('Invalid name!', 'naturlith'); ?>
                        </div>
                    </div>
                    <div>
                        <label for="validationEmail" class="form-email">e-mail</label>
                        <input type="text" class="form-control" id="validationEmail" placeholder="e-mail"
                               name="user_email">
                        <div class="valid-feedback">
                            <?php echo __('Email looks good!', 'naturlith'); ?>
                        </div>
                        <div class="invalid-feedback">
                            <?php echo __('Invalid email!', 'naturlith'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-1 pl-md-4 mb-3">
                    <label for="validationMessage">message</label>
                    <textarea class="form-control" id="validationMessage" name="user_message" rows="5"
                              placeholder="message"></textarea>
                    <div class="valid-feedback">
                        <?php echo __('Message is OK!', 'naturlith'); ?>
                    </div>
                    <div class="invalid-feedback">
                        <?php echo __('Message must be more 10 characters!', 'naturlith'); ?>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button id="send-button" class="btn btn-success rounded-0 px-4 mt-2"
                        type="submit"><?php echo __('Send', 'naturlith'); ?></button>
            </div>
            <input type="hidden" value="user_sendsubmit" name="user_sendsubmit">
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

