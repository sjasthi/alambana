<?php
function generate_header_styling()
{
    ?>
    <style>
        .navbar {
            background-color: rgb(102, 221, 247);
            color: white;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            position: fixed;
            width: 100%;
            z-index: 2;
            top: 0;
            right: 0;
        }

        .navbar .logo-container {
            width: 200px;
            max-width: 33%;
            padding-left: 8px;
        }

        .navbar .link-container {
            width: calc(100% - 420px);
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }

        .navbar .info-container {
            width: 200px;
        }

        .navbar a {
            color: white;
        }

        .button-container {
            background-color: rgb(72, 191, 217);
            display: none;
            padding: 4px;
            border-radius: 8px;
        }

        .burger-bar {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 5px 2px;
        }

        .about-dropdown {
            background-color: rgb(72, 191, 217);
            display: none;
            position: absolute;
            transform: translateX(-25%);
            padding-right: 16px;
            border-radius: 4px;
        }

        .community-dropdown {
            background-color: rgb(72, 191, 217);
            display: none;
            position: absolute;
            transform: translateX(-25%);
            padding-right: 16px;
            border-radius: 4px;
        }

        .events-dropdown {
            background-color: rgb(72, 191, 217);
            display: none;
            position: absolute;
            transform: translateX(-25%);
            padding-right: 16px;
            border-radius: 4px;
        }

        .blogs-dropdown {
            background-color: rgb(72, 191, 217);
            display: none;
            position: absolute;
            transform: translateX(-25%);
            padding-right: 16px;
            border-radius: 4px;
            z-index: 3;
        }

        .navbar ul {
            list-style-type: none;
        }

        .full-screen-menu {
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgb(215, 247, 253);
            display: none;
            flex-direction: column;
            align-items: center;
            font-size: 20px;
            z-index: 4;
            overflow-y: scroll;
        }

        .full-screen-menu ul {
            list-style-type: none;
        }

        .full-screen-menu ul li {
            margin: 8px 0 8px 0;
        }

        .full-screen-menu ul li a {
            color: black;
        }

        .full-screen-menu ul li ul {
            list-style-type: none;
        }

        .full-screen-menu ul li ul li {
            font-size: 16px;
        }

        .full-screen-menu-header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .full-screen-menu button {
            font-size: 16px;
            margin: 8px 8px 0 8px;
        }
    </style>
    <?php
}
?>