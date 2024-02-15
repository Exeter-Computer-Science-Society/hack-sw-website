<?php

    require_once "headless-cms.php";

    // Requests must be GET
    if($_SERVER["REQUEST_METHOD"] !== "GET") {
        http_response_code(405);
        exit;
    }

    $page = handle_request();

    // If request comes from the client side router, then the whole page does not need to be sent
    if(isset($_GET["csr"]) && $_GET["csr"] == 'true') {
        header('Content-type: application/json');
        echo json_encode($page);
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Import the Client Side Router -->
    <script defer src="/headless-cms-scripts/client-side-router.js"></script>

    <!-- Import Alpine JS -->
    <!-- Remove this if you don't wish to use Alpine JS within you webpages -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Page Title -->
    <title><?php
        echo isset($page->settings['title']) ? $page->settings['title'] : 'Default Title'
    ?></title>

    <!-- Page Description -->
    <meta name="description" content="<?php
        echo isset($page->settings['description']) ? $page->settings['title'] : 'Default Description'
    ?>">
    
    <meta property="og:description" content="<?php
        echo isset($page->settings['description']) ? $page->settings['title'] : 'Default Description'
    ?>" />

    <?php

        if(isset($page->settings['og-image'])) {
            echo "<meta property='og:image' content='{$page->settings['og-image']}' />";
        }

    ?>

    
    <meta property="og:description" content="<?php
        echo isset($page->settings['description']) ? $page->settings['title'] : 'Default Description'
    ?>" />

    <?php

        if(isset($page->settings['og-image'])) {
            echo "<meta property='og:image' content='{$page->settings['og-image']}' />";
        }

    ?>

    <?php
        if(isset($page->settings['favicon'])) {
            echo "<link rel='shortcut icon' type='image' href='{$page->settings['favicon']}' />";
        } else {
            echo '<link rel="shortcut icon" type="image" href="/resources/favicon.png" />';
        }
    ?>

    <!-- Add script imports here -->
    <script defer src="/scripts/script.js"></script>
    <script defer src="/scripts/countdown.js"></script>
    <script defer src="/scripts/script.js"></script>
    <script defer src="/scripts/countdown.js"></script>


    <!-- Add stylesheet imports here -->
    <link rel="stylesheet" href="/resources/stylesheets/globals.css">
    <link rel="stylesheet" href="/resources/stylesheets/utils.css">
    <link rel="stylesheet" href="/resources/stylesheets/default-styles.css">
    <link rel="stylesheet" href="/resources/stylesheets/mobile-devices.css">
    <link rel="stylesheet" href="/resources/stylesheets/timeline.css">
    <link rel="stylesheet" href="/resources/stylesheets/default-styles.css">
    <link rel="stylesheet" href="/resources/stylesheets/mobile-devices.css">
    <link rel="stylesheet" href="/resources/stylesheets/timeline.css">

</head>
<body>
    <header>
        <nav>
            <a>
                <span class="col-10">1.</span>
                <b>Home</b>
            </a>
            <a>
                <span class="col-10">2.</span>
                <b>Register your place</b>
            </a>
            <a>
                <span class="col-10">3.</span>
                <b>EXCS</b>
            </a>
            <a>
                <span class="col-10">1.</span>
                <b>Home</b>
            </a>
            <a>
                <span class="col-10">2.</span>
                <b>Register your place</b>
            </a>
            <a>
                <span class="col-10">3.</span>
                <b>EXCS</b>
            </a>
        </nav>
    </header>

    <main>
        <!-- Insert the page body in here -->
        <?php echo $page->content; ?>
    </main>

    <footer>

        <div class="footer-top">

            <a href="https://excs.uk" target="_blank" id="organised-by">
                <div>
                    <p>Organised by:</p>
                    <img class="excs-logo" src="/resources/images/logos/excs-logo.svg">
                </div>
                <div class="society-name">
                    <img src="/resources/images/computer-s-s.svg">
                    <img src="/resources/images/c-science-s.svg">
                    <img src="/resources/images/c-s-society.svg">
                </div>
                <div class="uni">
                    <img class="icon" src="/resources/images/logos/exeter-no-bg.png">
                    <span>University of Exeter</span>
                </div>
            </a>

        </div>

        <div class="footer-btm">
            <p>Website designed & built by:</p>
            <div class="created-by">
                <a href="https://www.linkedin.com/in/edward-blewitt-a1b257224/" class="person" target="_blank">
                    <img class="profile-image" alt="Edward Blewitt" width="35" height="35" src="https://media.licdn.com/dms/image/D4E03AQETRyU3gAL7nA/profile-displayphoto-shrink_100_100/0/1682271196994?e=1698278400&v=beta&t=JwX4qb_zMF1N8JN_-LTXJIAW7su2D3QX7wmI9-L-Nhg">
                    <span>Edward Blewitt</span>
                    <img class="icon" src="/resources/images/logos/external-link-icon.svg">
                </a>

                <a href="https://www.linkedin.com/in/wiktor-wiejak-703b60206/" class="person" target="_blank">
                    <img class="profile-image" alt="Wiktor Wiejak" width="35" height="35" src="https://media.licdn.com/dms/image/D4E03AQEyKr52GPVpgw/profile-displayphoto-shrink_100_100/0/1680262370174?e=1698278400&v=beta&t=Yyfj4uAfRRFz2BQuK_o--kq9fzhc7kMgY0l_V6wagc8">
                    <span>Wiktor Wiejak</span>
                    <img class="icon" src="/resources/images/logos/external-link-icon.svg">
                </a>

                <a href="https://www.linkedin.com/in/callum-young-6b14b228a/" class="person" target="_blank">
                    <img class="profile-image" alt="Callum Young" width="35" height="35" src="/resources/images/callum-small.jpg">
                    <span>Callum Young</span>
                    <img class="icon" src="/resources/images/logos/external-link-icon.svg">
                </a>
            </div>
        </div>
    </footer>
    

</body>
</html>