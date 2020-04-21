<?php

/** 
 * Help Page Template
 * 
 * @author Alisha Garric
 * @since 4/2020
 */

/*************************************/

?>

<style>
    section.lmnt-help-page, img {
        max-width: 600px;
        height: auto;
    }

    .lmnt-help-page h1 {
        font-size: 36px;
    }

    .lmnt-help-page summary {
        font-size: 24px;
        font-weight: bold;
        line-height: 1.6;
    }

    .lmnt-help-page details details summary{
        font-size: 18px;
        line-height: 1.2;
    }

    .lmnt-help-page details details {
        padding-left: 40px;
    }

    .lmnt-help-page summary:focus {
        outline:none;
    }

    .lmnt-help-page ul, details p, details h2, details h3, details h4, details ul  {
        padding-left: 40px;
        list-style-type: circle;
    }

</style>

<section class="lmnt-help-page">
    <h1> Help </h1>
    <p>
        This site uses posts created under your custom post types (Events, Memberships, Staff, Press, Blog Posts and Programs), pages built using the <i>Sections Builder</i> and fields set under the Options Tab to build its content.
    </p>
    <p>
        Get familiar with the <i>Sections Builder</i>, you’ll be using it a lot! Then go through the Options Tab to make sure your site-wide settings are accurate. Lastly add/edit pages and posts.
    </p>

    <details>
        <summary>🔧 <i>Sections Builder</i></summary>
        <p> We use the <i>Sections Builder</i> to add content to your site. In posts and pages where it is available, you’ll see the “Add Section” button (shown in screenshot below). After pressing this, you’ll get a list of sections you can add to your page. The sections and their descriptions are listed below. After adding sections, you can drag and drop to rearrange them.</p>
        <img src=" <?php echo plugins_url(basename(plugin_dir_path(__FILE__))) . '/images/add-section.png' ?>" alt="add section">
    </details>

    <details>
        <summary>🎛 Dashboard Menu</summary>
        <p>This is the sidebar menu shown on the left side of your dashboard. The tabs and their descriptions are listed below.</p>

        <details>
            <summary>Options Tab</summary>
            <ul>
                <li> These fields are pretty intuitive and are used throughout the whole site</li>
                <li> The Newsletter Row fields are applied to the Newsletter Row section which is automatically included in many templates (as listed under Templates) and any additional page you add it to using the <i>Sections Builder</i></li>
                <li> The Block Row fields are applied to the Block Row section which is automatically included in many templates (as listed under Templates), and any additional page you add it tp using the <i>Sections Builder</i> (unless you override these fields on the page level)</li>
                <li> The Google maps API key needs to be changed to your own key before launch and is used to generate the maps on the Event posts</li>
                <li> You shouldn’t have to change the Google Analytics ID unless your Google Analytics account changes</li>
            </ul>
        </details>

        <details>
            <summary>Instagram Feed</summary>
            <ul>
                <li>The account listed needs to be changed to your own before launch and is used to generate the instagram posts in the Instagram Row section</li>
                <li>Click the Big Blue Connect an Instagram Account Button and follow the steps</li>
                <li>Add it to the primary feed and remove our Instagram account from it</li>
            </ul>
        </details>

        <details>
            <summary>Appearance → Menus</summary>
            <ul>
                <li>This is where you edit the items shown in your navigation bar (Primary Navigation)</li>
                <li>Only nest primary navigation items one layer </li>
                <li>This is also where you edit the legal links shown in the footer (Legal)</li>
            </ul>
        </details>

        <details>
            <summary>WPforms</summary>
            <ul>
                <li>Create forms for your site. Instructions and references found here</li>
                <li>Add forms to pages/post by copy and pasting the shortcode each form generates into the Shortcode section within the <i>Sections Builder</i>. Check the “This is a Form” checkbox</li>
            </ul>
        </details>

        <details>
            <summary>Media</summary>
            <ul><li>Edit previously uploaded images/files or load new images/files you plan on using</li></ul>
        </details>

        <details>
            <summary>Pages</summary>
            <ul>
                <li>Where you create general pages for your site</li>
                <li>Make sure to add them to your navigation when you make new ones!</li>
            </ul>
        </details>

        <details>
            <summary>Staff</summary>
            <ul>
                <li>Create posts for each staff member</li>
                <li>Users won’t be able to navigate to these posts on the site</li>
                <li>The data from these posts will show in the Staff Listings section</li>
                <li>You only need to fill out the post title, featured image, and the fields labeled “Title” and “Description”</li>
            </ul>
        </details>

        <details>
            <summary>Press</summary>
            <ul>
                <li>Create posts for each press article item</li>
                <li>Users won’t be able to navigate to these posts on the site</li>
                <li>The data from these posts will show in the Press Listings section</li>
                <li>You only need to fill out the post title, featured image, and the fields labeled “Date” (date article was published) and “Publisher” and “Link” (link to article)</li>
            </ul>
        </details>

        <details>
            <summary>Programs</summary>
            <ul>
                <li>Create program pages for each program</li>
                <li>Don’t forget to add new program pages to the navigation nested under “Programs”</li>
                <li>You don’t need to add a page hero, it is automatically added from the Program template. The page hero gets its data from the featured image, excerpt and post title</li>
                <li>The rest of each page is built using the <i>Sections Builder</i></li>
            </ul>
        </details>

        <details>
            <summary>Memberships</summary>
            <ul>
                <li>Create posts for each membership</li>
                <li>Users won’t be able to navigate to these posts on the site</li>
                <li>The data from these posts will show in the Memberships Listing section</li>
                <li>Fill out the post title and all the fields listed that apply</li>
            </ul>
        </details>

        <details>
            <summary>Events</summary>
            <ul>
                <li>Create posts for event</li>
                <li>Users can navigate to each event post</li>
                <li>Additionally, the data from these posts will show in the Events Row and the Events Listings sections</li>
                <li>Fill out the post title, featured image, excerpt and all the fields listed that apply</li>
                <li>You can add post body content that will display beneath the map, but it is not required. You should add the specific details to the “Detail Items” field, the main description to the excerpt, and the secondary description to the “Additional Description” field</li>
            </ul>
        </details>

        <details>
            <summary>Posts</summary>
            <ul>
                <li>Create blog article posts</li>
                <li>Users can navigate to each blog post</li>
                <li>Additionally, the data from these posts will show in the News Listings and Featured News Slider sections</li>
                <li>Additionally, these posts will be listed on whatever page you set as your “Posts Page”, which is currently set to “News & Press”, and can be changed under the Settings tab → Reading</li>
                <li>Fill out the post title, featured image, tags and the post body</li>
            </ul>
        </details>

        <details>
            <summary>Homepage</summary>
            <ul>
                <li>Another place besides the pages tab where you can edit the homepage</li>
                <li>You can change the page title</li>
                <li>Build the page using the <i>Sections Builder</i></li>
            </ul>
        </details>

    </details>

    <details>
        <summary>📄 Templates</summary>
        <p>If you’re ever wondering why content exists on any page, where the data for it is coming from and if you can edit the data, look at the appropriate template below. Each template lists its content in order. Each content item cannot be removed from the template and is automatically included. Unless the data comes from the <i>Sections Builder</i>, options settings, post fields or post body, it is not directly editable.</p>

        <details>
            <summary>Standard Page</summary>
            <ol>
                <li><i>Sections Builder</i></li>
            </ol>
        </details>

        <details>
            <summary>Program Page</summary>
            <ol>
                <li>Page Hero (data comes from title, excerpt and featured image)</li>
                <li><i>Sections Builder</i></li>
                <li>Block Row (data comes from Options settings)</li>
                <li>Newsletter Row (data comes from Options settings)</li>
            </ol>
        </details>

        <details>
            <summary>Event Post</summary>
            <ol>
                <li>Header (data comes from post fields)</li>
                <li>Description and Image (data comes from post fields and featured image)</li>
                <li>Map (data comes from post fields)</li>
                <li>General Content (data comes from post body)</li>
                <li>Next and Previous Post Navigation</li>
                <li>Newsletter Row (data comes from Options settings)</li>
            </ol>
        </details>

        <details>
            <summary>Blog Post</summary>
            <ol>
                <li>Header (data comes from post fields)</li>
                <li>Featured Image</li>
                <li>General Content (data comes from post body)</li>
                <li>Next and Previous Post Navigation</li>
                <li>News Listings (data comes from 6 most recents blog posts)</li>
                <li>Newsletter Row (data comes from Options settings)</li>
            </ol>
        </details>

        <details>
            <summary>Blog Page/Post Page</summary>
            <ol>
                <li>News Slider (data comes from 6 most recents blog posts)</li>
                <li>News Listings (data comes from blog posts in published date order)</li>
                <li>You can change which page page is the post page by going to the Settings tab → Reading</li>
                <li>Pagination</li>
                <li><i>Sections Builder</i></li>
            </ol>
        </details>
    </details>

    <details>
        <summary>📷 Image Sizes</summary>
        TODO
    </details>

    <details>
        <summary>🗝 Also...</summary>

        <h3>Icon IDs</h3>
        <p>The website uses Font Awesome to add icons to various sections. If a section asks for an Icon ID, click on the <a href="https://fontawesome.com/icons?d=gallery">Select an icon ID here</a> link<p>
        <ul>
            <li>Search for the icon you’re thinking of</li>
            <li>Choose one that’s free (you can click the free filter on the left if you’d like)</li>
            <li>Copy the id shown below the icon and paste it in the “Icon ID” field</li>
            <li>It’s always a good idea to make sure the Icon ID generated properly by previewing the page/section you used it in. Every once in awhile a Font Awesome ID doesn’t generate and you have to choose a different one</li>
        </ul>

        </br>

        <h3>Featured Images and Excerpts</h3>
        <p> They are used for SEO and opengraphs on each page, so try to add those whenever possible</p>

    </details>


</section>
