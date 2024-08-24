<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            .bg-brightRed {
  --tw-bg-opacity: 1;
  background-color: rgb(242 95 58 / var(--tw-bg-opacity));
}
        </style>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- SITE PAGE TITLE -->
        <title><?=$title?></title>
        <!-- SITE PAGE DESCRIPTION -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@500&display=swap" rel="stylesheet">
    </head>
    <body class="font-BeVietnamPro">

        <!-- NAV BAR -->
        <!-- HERO SECTION -->
        <section id="hero">
            <!-- FLEX CONTAINER -->
            <div class="container flex flex-col-reverse items-center px-12 mx-auto mt-10 space-y-0 md:flex-row md:space-y-0">
                <!-- LEFT COLUMN -->
                <div class="flex flex-col mb-2 space-y-12 md:mb-32 md:w-1/2">
                    <h1 class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left">Bring everyone together to build better products.</h1>
                    <p class="max-w-sm text-center text-darkGrayishBlue sm:mx-auto lg:mx-0 md:text-left">Manage makes it simple for software teams to plan day-to-day tasks while keeping the larger team goals in view.</p>
                    <div class="button flex justify-center md:justify-start">
                        <a href="#" class="cta-button p-3 px-6 pt-2 text-veryLightGray bg-brightRed rounded-full baseline transition ease-in drop-shadow-2xl shadow-brightRed hover:bg-brightRedLight">Get Started</a>
                    </div>
                </div>
                <!-- RIGHT COLUMN -->
                <div class="md:w-1/2">
                    <img src="https://source.unsplash.com/random/800x600/?company">
                </div>
            </div>
        </section>
        
        <!-- FEATURES SECTION -->
        <section id="features" class="md:py-40 xl:py-10">
            <!-- FLEX CONTAINER -->
            <div class="container flex flex-col mx-auto mt-10 space-y-12 sm:px-2 md:space-y-0 md:px-12 md:flex-row">
                <!-- LEFT INFO COLUMN -->
                <div class="flex-col space-y-12 h-full md:w-1/2">
                    <h2 class="max-w-md text-4xl font-bold text-center lg:mx-0 sm:mx-auto md:text-left">
                        What’s different about Manage?
                    </h2>
                    <p class="max-w-sm text-center text-darkGrayishBlue lg:mx-0 sm:mx-auto md:text-left">
                        Manage provides all the functionality your team needs, without the complexity. Our software is tailor-made for modern digital product teams.
                    </p>
                </div>

                <!-- FEATURES LIST COLUMN -->
                <div class="flex flex-col space-y-12 md:px-12 md:w-1/2">

                    <!-- LIST ITEM 1 -->
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <!-- HEADING -->
                        <div class="rounded-l-full bg-brightRedSuperLight md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <!-- NUMBER LOZENGE -->
                                <div class="px-5 py-2 font-bold text-veryLightGray rounded-full bg-brightRed md:py-1">
                                    01
                                </div>
                                <h3 class="text-base font-bold md:mb-4 md:hidden">
                                    Track company-wide progress
                                </h3>
                            </div>
                        </div>
                        <div>
                            <h3 class="hidden mb-4 text-lg font-bold md:block">
                                Track company-wide progress
                            </h3>
                            <p class="text-darkGrayishBlue text-center lg:mx-0 sm:mx-auto md:text-left">
                                See how your day-to-day tasks fit into the wider vision. Go from tracking progress at the milestone level all the way done to the smallest of details. Never lose sight of the bigger picture again.</p>
                        </div>
                    </div>

                    <!-- LIST ITEM 2 -->
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <!-- HEADING -->
                        <div class="rounded-l-full bg-brightRedSuperLight md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <!-- NUMBER LOZENGE -->
                                <div class="px-5 py-2 font-bold text-veryLightGray rounded-full bg-brightRed md:py-1">
                                    02
                                </div>
                                <h3 class="text-base font-bold md:mb-4 md:hidden">
                                    Advanced built-in reports
                                </h3>
                            </div>
                        </div>
                        <div>
                            <h3 class="hidden mb-4 text-lg font-bold md:block">
                                Advanced built-in reports
                            </h3>
                            <p class="text-darkGrayishBlue text-center lg:mx-0 sm:mx-auto md:text-left">
                                Set internal delivery estimates and track progress toward company goals. Our customisable dashboard helps you build out the reports you need to keep key stakeholders informed.</p>                      
                            </div>
                    </div>

                    <!-- LIST ITEM 3 -->
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <!-- HEADING -->
                        <div class="rounded-l-full bg-brightRedSuperLight md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <!-- NUMBER LOZENGE -->
                                <div class="px-5 py-2 font-bold text-veryLightGray rounded-full bg-brightRed md:py-1">
                                    03
                                </div>
                                <h3 class="text-base font-bold md:mb-4 md:hidden">
                                    Everything you need in one place
                                </h3>
                            </div>
                        </div>
                        <div>
                            <h3 class="hidden mb-4 text-lg font-bold md:block">
                                Everything you need in one place
                            </h3>
                            <p class="text-darkGrayishBlue text-center lg:mx-0 sm:mx-auto md:text-left">
                                Stop jumping from one service to another to communicate, store files, track tasks and share documents. Manage offers an all-in-one team productivity solution.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </body>