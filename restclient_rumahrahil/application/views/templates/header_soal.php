<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?php echo $title; ?></title>
    <style>
        .sidebar {
            height: 100%;
            /* 100% Full-height */
            width: 0;
            /* 0 width - change this with JavaScript */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Stay on top */
            top: 0;
            right: 0;
            background-color: #0275d8;
            /* Black*/
            overflow-x: hidden;
            /* Disable horizontal scroll */
            padding-top: 60px;
            /* Place content 60px from the top */
            transition: 0.5s;
            /* 0.5 second transition effect to slide in the sidebar */
        }

        /* The sidebar links */
        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #FFFF;
            display: block;
            transition: 0.3s;
        }

        /* When you mouse over the navigation links, change their color */
        .sidebar a:hover {
            color: #f1f1f1;
        }

        /* Position and style the close button (top right corner) */
        .sidebar .closebtn {
            position: absolute;
            top: 0;
            left: 25px;
            font-size: 36px;
            margin-right: 50px;
        }

        /* The button used to open the sidebar */
        .openbtn {
            font-size: 16px;
            cursor: pointer;
            background-color: #0275d8;
            color: white;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: skyblue;
        }

        /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
        #main {
            transition: margin-right .5s;
            /* If you want a transition effect */
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }

        #card-soal:hover {
            color: #0275d8;
        }
   
    </style>
</head>

<body id="main">
    <section>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url('assets'); ?>/img/cms.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    Rumah Rahil Education
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <span class="my-2 my-lg-0">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= base_url('assets'); ?>/img/boy.png" width="30" height="30" class="d-inline-block align-top mr-1" alt="">
                                    User
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
    </section>