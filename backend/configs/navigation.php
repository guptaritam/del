<nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>

            <div class="search" data-search-path="Pages.Search.html?q=">
                <input placeholder="Search...">
                <span class="search-icon">
                    <i class="simple-icon-magnifier"></i>
                </span>
            </div>
        </div>


        <a class="navbar-logo" href="dashboard.php">
            <span class="logo d-none d-xs-block" style="background-image: url(img/logo.jpg);background-size: cover;"></span>
            <span class="logo-mobile d-block d-xs-none" style="background-image: url(img/pater.png);background-size: contain;"></span>
        </a>

        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                <div class="position-relative d-none d-sm-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="iconMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-grid"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3  position-absolute" id="iconMenuDropdown">
                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-equalizer d-block"></i>
                            <span>Settings</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-male-female d-block"></i>
                            <span>Users</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-puzzle d-block"></i>
                            <span>Components</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-bar-chart-4 d-block"></i>
                            <span>Profits</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-file d-block"></i>
                            <span>Surveys</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-suitcase d-block"></i>
                            <span>Tasks</span>
                        </a>

                    </div>
                </div>

                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-bell"></i>
                        <span class="count">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 scroll position-absolute" id="notificationDropdown">

                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="img/patar.png" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                            </a>
                            <div class="pl-3 pr-2">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">Joisse Kaycee just sent a new comment!</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="img/notification-thumb.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                            </a>
                            <div class="pl-3 pr-2">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">1 item is out of stock!</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>


                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="img/notification-thumb-2.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                            </a>
                            <div class="pl-3 pr-2">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">New order received! It is total $147,20.</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex flex-row mb-3 pb-3 ">
                            <a href="#">
                                <img src="img/notification-thumb-3.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                            </a>
                            <div class="pl-3 pr-2">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">3 items just added to wish list by a user!</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>

            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="name"><?php echo $pdo_auth['name']; ?></span>
                    <span>
                        <img alt="Profile Picture" src="img/profile-pic-l.jpg" />
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-3">
                    <a class="dropdown-item" href="#">Account</a>
                    <a class="dropdown-item" href="#">Features</a>
                    <a class="dropdown-item" href="#">History</a>
                    <a class="dropdown-item" href="#">Support</a>
                    <a class="dropdown-item" href="#">Sign out</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="sidebar">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li class="active">
                        <a href="dashboard.php">
                            <i class="fa fa-tachometer"></i>
                            <span>Dashboards</span>
                        </a>
                    </li>
                    <li>
                        <a href="#enquiry">
                            <i class="fa fa-pencil"></i> Enquiry
                        </a>
                    </li>
                     <li>
                        <a href="#membership">
                            <i class="fa fa-list-ul"></i><p style="margin-left: 20px;">Primary Membership
                        </p></a>
                    </li>
                    <li>
                        <a href="#members">
                            <i class="fa fa-user-circle-o"></i> Members
                        </a>
                    </li>
                    <li>
                        <a href="#staff">
                            <i class="fa fa-users"></i> Staff
                        </a>
                    </li>
                    <li>
                        <a href="#payment">
                            <i class="fa fa-money"></i> Payment
                        </a>
                    </li>
                    <li>
                        <a href="#dietchart">
                            <i class="fa fa-bar-chart"></i> Diet Chart
                        </a>
                    </li>
                    <li>
                        <a href="#Exercise">
                            <i class="fa fa-bicycle"></i> Exercise
                        </a>
                    </li>
                    <li>
                        <a href="#supplement">
                            <i class="fa fa-product-hunt"></i><p style="margin-left: 15px;">Products & Supplements</p>
                        </a>
                    </li>
                     <li>
                        <a href="#expense">
                            <i class="fa fa-credit-card"></i> Expense
                        </a>
                    </li>
                    <li>
                        <a href="#machine">
                           <span class="iconify" data-icon="fa-solid:dumbbell" data-inline="false" style="font-size: 20px";></span> Machine
                        </a>
                    </li>
                    <li>
                        <a href="#notification">
                           <i class="fa fa-bell"></i> Notification
                        </a>
                    </li>
                    <li>
                        <a href="#report">
                           <i class="fa fa-file"></i> Report
                        </a>
                    </li>

                    <li>
                        <a href="view_contact_data.php">
                           <i class="fa fa-address-book-o"></i> Contact
                        </a>
                    </li>
                    <li>
                        <a href="#video">
                           <i class="fa fa-caret-square-o-right"></i> Video
                        </a>
                    </li>

                    <li>
                        <a href="#tesimonial">
                           <i class="fa fa-line-chart"></i> Tesimonials
                        </a>
                    </li>

                    <li>
                        <a href="#gallery">
                            <i class="fa fa-picture-o"></i> Gallery
                        </a>
                    </li>
                    <li>
                        <a href="#blog">
                            <i class="fa fa-picture-o"></i> Blog
                        </a>
                    </li>
                    
                    <li>
                        <a href="#applications">
                            <i class="iconsminds-air-balloon-1"></i> Organization
                        </a>
                    </li>
                    <li>
                        <a href="#ui">
                            <i class="iconsminds-pantone"></i> Offers
                        </a>
                    </li>
                    <li>
                        <a href="#menu">
                            <i class="iconsminds-three-arrow-fork"></i> Others
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
                <!-- <ul class="list-unstyled" data-link="dashboard">
                    <li>
                        <a href="Dashboard.Default.html">
                            <i class="simple-icon-rocket"></i> Default
                        </a>
                    </li>
                    <li class="active">
                        <a href="Dashboard.Analytics.html">
                            <i class="simple-icon-pie-chart"></i>Analytics
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Ecommerce.html">
                            <i class="simple-icon-basket-loaded"></i> Ecommerce
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Content.html">
                            <i class="simple-icon-doc"></i> Content
                        </a>
                    </li>
                </ul>
 -->
                <ul class="list-unstyled" data-link="enquiry">
                    <li>
                        <a href="add_new_enquiry.php">
                            <i class="fa fa-plus-square"></i> Add Enquiry 
                        </a>
                    </li>
                    <li>
                        <a href="view_new_enquiry.php">
                            <i class="simple-icon-list"></i> List Enquiries
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="membership">
                    <li>
                        <a href="add_membership.php">
                            <i class="fa fa-plus-square"></i> Add Membership 
                        </a>
                    </li>
                    <li>
                        <a href="view_membership.php">
                            <i class="simple-icon-list"></i> Membership List
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="members">
                    <li>
                        <a href="add_member.php">
                            <i class="fa fa-plus-square"></i>  Add Member 
                         </a>
                    </li>
                    <li>
                        <a href="view_members.php">
                            <i class="simple-icon-list"></i> Member List
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="staff">
                    <li>
                        <a href="add_staff.php">
                            <i class="fa fa-plus-square"></i> Add Staff 
                        </a>
                    </li>
                    <li>
                        <a href="view_staff.php">
                            <i class="simple-icon-list"></i> Staff List
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="payment">
                    <li>
                        <a href="add_payment.php">
                            <i class="fa fa-plus-square"></i> Add Payment 
                        </a>
                    </li>
                    <li>
                        <a href="view_payment_list.php">
                            <i class="simple-icon-list"></i> Payment List
                        </a>
                    </li>
                    <li>
                        <a href="view_pending_payment.php">
                            <i class="simple-icon-list"></i> Pending Payment
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="dietchart">
                    <li>
                        <a href="diet_weight_loss.php">
                            For Weight Loss 
                        </a>
                    </li>
                    <li>
                        <a href="diet_body_building.php">
                             For Body Building
                        </a>
                    </li>
                    <li>
                        <a href="diet_weight_gain.php">
                            For Weight Gain
                        </a>
                    </li>
                    <li>
                        <a href="diet_fitness.php">
                             For Fitness
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="Exercise">
                    <li>
                        <a href="exercise_weight_loss.php">
                            For Weight Loss 
                        </a>
                    </li>
                    <li>
                        <a href="exercise_body_building.php">
                             For Body Building
                        </a>
                    </li>
                    <li>
                        <a href="exercise_weight_gain.php">
                            For Weight Gain
                        </a>
                    </li>
                    <li>
                        <a href="exercise_fitness.php">
                             For Fitness
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="supplement">
                    <li>
                        <a href="add_supplement.php">
                            <i class="fa fa-plus-square"></i>Add and View Supplement 
                        </a>
                    </li>
                    <!-- <li>
                        <a href="diet_body_building.php">
                             For Body Building
                        </a>
                    </li>
                    <li>
                        <a href="diet_weight_gain.php">
                            For Weight Gain
                        </a>
                    </li>
                    <li>
                        <a href="diet_fitness.php">
                             For Fitness
                        </a>
                    </li> -->
                </ul>

                <ul class="list-unstyled" data-link="expense">
                    <li>
                        <a href="add_expense.php">
                            <i class="fa fa-plus-square"></i>  Add Expense 
                        </a>
                    </li>
                    <li>
                        <a href="view_expense.php">
                            <i class="simple-icon-list"></i>  Expense List 
                        </a>
                    </li>
                    <li>
                        <a href="add_expense_type.php">
                            <i class="fa fa-plus-square"></i>  Add Expense Type 
                        </a>
                    </li>
                    <li>
                        <a href="view_expensetype.php">
                            <i class="simple-icon-list"></i>  Expense Type List 
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="machine">
                    <li>
                        <a href="add_machine.php">
                            <i class="fa fa-plus-square"></i>  Add Machine 
                        </a>
                    </li>
                    <li>
                        <a href="view_machine.php">
                            <i class="simple-icon-list"></i>  Machine List 
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="notification">
                    <li>
                        <a href="notification_sms.php">
                            <i class="fa fa-plus-square"></i> Send Notification 
                        </a>
                    </li>
                    <li>
                        <a href="view_notification.php">
                            <i class="simple-icon-list"></i>  Notification List 
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="report">
                    <li>
                        <a href="sales_report.php">
                            <i class="fa fa-file-text-o"></i> Sales History 
                        </a>
                    </li>
                </ul>  

                 <ul class="list-unstyled" data-link="video">
                    <li>
                        <a href="add_video.php">
                           <i class="fa fa-plus-square"></i> Add Video
                        </a>
                    </li>
                    <li>
                        <a href="view_video.php">
                            <i class="simple-icon-list"></i>  Videos List 
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="tesimonial">
                    <li>
                        <a href="add_testimonials.php">
                           <i class="fa fa-plus-square"></i> Add Testimonial
                        </a>
                    </li>
                    <li>
                        <a href="view_testimonials.php">
                            <i class="simple-icon-list"></i>  Testimonial List 
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="gallery">
                    <li>
                        <a href="add_category.php">
                            <i class="fa fa-plus-square"></i>  Add Category 
                        </a>
                    </li>
                    <li>
 
                        <a href="view_gallery_category.php">
                            <i class="simple-icon-list"></i>  Category List 
                        </a>
                    </li>
                    <li>
                        <a href="add_gallery.php">
                            <i class="fa fa-plus-square"></i>  Add Gallery 
                        </a>
                    </li>
                    <li>
                        <a href="view_gallery.php">
                            <i class="simple-icon-list"></i>  Gallery List 
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="blog">
                    <li>
                        <a href="add_blog_category.php">
                            <i class="fa fa-plus-square"></i>  Add Category 
                        </a>
                    </li>
                    <li>
 
                        <a href="view_blog_category.php">
                            <i class="simple-icon-list"></i>  Category List 
                        </a>
                    </li>
                    <li>
                        <a href="add_blog.php">
                            <i class="fa fa-plus-square"></i>  Add Blog 
                        </a>
                    </li>
                    <li>
                        <a href="view_blog.php">
                            <i class="simple-icon-list"></i>  Blog List 
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="layouts">
                    <li>
                        <a href="#">
                            <i class="simple-icon-grid"></i> Registered Members
                        </a>
                    </li>
                    <li>
                        <a href="#layouts" id="">
                            <i class="simple-icon-book-open"></i> Membership Type
                        </a>
                    </li>
                    <li>
                        <a href="Pages.Mailing.html">
                            <i class="simple-icon-envelope-open"></i> Accounts
                        </a>
                    </li>
                    <li>
                        <a href="Pages.Invoice.html">
                            <i class="simple-icon-bag"></i> Invoices
                        </a>
                    </li>
                </ul>


                <ul class="list-unstyled" data-link="applications">
                    <li>
                        <a href="view_services.php">
                            <i class="simple-icon-picture"></i> Services
                        </a>
                    </li>
                    <li>
                        <a href="Apps.Todo.List.html">
                            <i class="simple-icon-check"></i> Todo
                        </a>
                    </li>
                    <li>
                        <a href="Apps.Survey.List.html">
                            <i class="simple-icon-calculator"></i> Survey
                        </a>
                    </li>
                    <li>
                        <a href="Apps.Chat.html">
                            <i class="simple-icon-bubbles"></i> Chat
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="ui">
                    <li>
                        <a href="Ui.Alerts.html">
                            <i class="simple-icon-bell"></i> Alerts
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Badges.html">
                            <i class="simple-icon-badge"></i> Badges
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Buttons.html">
                            <i class="simple-icon-control-play"></i> Buttons
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Cards.html">
                            <i class="simple-icon-layers"></i> Cards
                        </a>
                    </li>

                    <li>
                        <a href="Ui.Carousel.html">
                            <i class="simple-icon-picture"></i> Carousel
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Charts.html">
                            <i class="simple-icon-chart"></i> Charts
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Collapse.html">
                            <i class="simple-icon-arrow-up"></i> Collapse
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Dropdowns.html">
                            <i class="simple-icon-arrow-down"></i> Dropdowns
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Editors.html">
                            <i class="simple-icon-book-open"></i> Editors
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Forms.html">
                            <i class="simple-icon-check mi-forms"></i> Forms
                        </a>
                    </li>
                    <li>
                        <a href="Ui.FormComponents.html">
                            <i class="simple-icon-puzzle"></i> Form Components
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Icons.html">
                            <i class="simple-icon-star"></i> Icons
                        </a>
                    </li>
                    <li>
                        <a href="Ui.InputGroups.html">
                            <i class="simple-icon-note"></i> Input Groups
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Jumbotron.html">
                            <i class="simple-icon-screen-desktop"></i> Jumbotron
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Modal.html">
                            <i class="simple-icon-docs"></i> Modal
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Navigation.html">
                            <i class="simple-icon-cursor"></i> Navigation
                        </a>
                    </li>

                    <li>
                        <a href="Ui.PopoverandTooltip.html">
                            <i class="simple-icon-pin"></i> Popover & Tooltip
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Sortable.html">
                            <i class="simple-icon-shuffle"></i> Sortable
                        </a>
                    </li>
                    <li>
                        <a href="Ui.Tables.html">
                            <i class="simple-icon-grid"></i> Tables
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="menu">
                    <li>
                        <a href="Menu.Default.html">
                            <i class="simple-icon-control-pause"></i> Default
                        </a>
                    </li>
                    <li>
                        <a href="Menu.Subhidden.html">
                            <i class="simple-icon-arrow-left mi-subhidden"></i> Subhidden
                        </a>
                    </li>
                    <li>
                        <a href="Menu.Hidden.html">
                            <i class="simple-icon-control-start mi-hidden"></i> Hidden
                        </a>
                    </li>
                    <li>
                        <a href="Menu.Mainhidden.html">
                            <i class="simple-icon-control-rewind mi-hidden"></i> Mainhidden
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


