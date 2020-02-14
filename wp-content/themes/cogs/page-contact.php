<?php /* Template Name: Contact */ ?>

<?php include 'includes/header.php'; ?>

<section id="main-section" class="content row">
    <div class="index-list column xs-12">
      <!-- Contact -->
      <div id="contact" data-theme="dark" data-panel-title="Contact">
          <?php
              $contact = get_field('contact');

              $contact_imgurl = wp_get_attachment_image_src($contact['image'], 'large')[0];
              $contact_alt = get_post_meta($contact['image'], '_wp_attachment_image_alt', true);

              if($detect_device->isMobile() && !$detect_device->isTablet()) {
                $contact_imgurl = wp_get_attachment_image_src($contact['image'], 'medium_large')[0];
              }

              if($detect_device->isTablet()) {
                $contact_imgurl = wp_get_attachment_image_src($contact['image'], 'medium')[0];
              }
          ?>

          <div class="panel-section-inner">
              <h3 class="index-title">
                  <span>Contact</span>
              </h3>
              <div class="row">
                  <div class="column xs-12 sm-10 md-9 contact-photo">
                      <img class="img-responsive" src="<?php echo $contact_imgurl; ?>" alt="<?php echo $contact_alt; ?>" title="<?php echo $contact_alt; ?>">
                  </div>
              </div>
              <ul>
                  <?php if($contact['location'] && $contact['address']) { ?>
                  <li class="index-item"><a href="https://www.google.pt/maps/place/<?php echo $contact['location']['address']; ?>" target="_blank" rel="noopener" title="View on Google maps"><?php echo $contact['address']; ?></li>
                  <?php } ?>

                  <?php if($contact['email']) { ?>
                  <li class="index-item"><a href="mailto:<?php echo $contact['email']; ?>@dannyforster.com" title="Email"><?php echo $contact['email']; ?>@<span class="hidden-break-line"></span>dannyforster.com</a></li>
                  <?php } ?>

                  <?php if($contact['phone_number']) { ?>
                  <li class="index-item"><a href="tel:<?php echo $contact['phone_number']; ?>" title="Phone number"><?php echo $contact['phone_number']; ?></a></li>
                  <?php } ?>

                  <?php if($contact['newsletter_link']) { ?>
                  <li class="index-item"><a href="<?php echo $contact['newsletter_link']; ?>" target="_blank" rel="noopener">Newsletter</a></li>
                  <?php } ?>

                  <?php if($contact['instagram']) { ?>
                  <li class="index-item"><a href="<?php echo $contact['instagram']; ?>" target="_blank" rel="noopener" title="Danny Forster & Architects on Instagram">Instagram</a></li>
                  <?php } ?>

                  <?php if($contact['instagram']) { ?>
                  <li class="index-item"><a href="<?php echo $contact['linkedin']; ?>" target="_blank" rel="noopener" title="Danny Forster & Architects on LinkedIn">Linkedin</a></li>
                  <?php } ?>

                  <?php if($contact['instagram']) { ?>
                  <li class="index-item"><a href="<?php echo $contact['twitter']; ?>" target="_blank" rel="noopener" title="Danny Forster & Architects on Twitter">Twitter</a></li>
                  <?php } ?>

                  <?php if($contact['instagram']) { ?>
                  <li class="index-item"><a href="<?php echo $contact['facebook']; ?>" target="_blank" rel="noopener" title="Danny Forster & Architects on Facebook">Facebook</a></li>
                  <?php } ?>

                  <?php if($contact['instagram']) { ?>
                  <li class="index-item"><a href="<?php echo $contact['vimeo']; ?>" target="_blank" rel="noopener" title="Danny Forster & Architects on Vimeo">Vimeo</a></li>
                  <?php } ?>
              </ul>
          </div>
      </div>
      <!-- End Contact -->
    </div>
</section>

<?php include 'includes/footer.php'; ?>
