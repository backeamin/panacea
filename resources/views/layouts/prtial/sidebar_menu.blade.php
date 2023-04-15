<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('home')}}">
                        <i class="fe-airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('category.index')}}">
                        <i class="fe-list"></i>
                        <span> Category </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-briefcase"></i>
                        <span> Product </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('product.index')}}">Product List</a></li>
                        <li><a href="{{route('product.create')}}">Add Product</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('writer.index')}}">
                        <i class="fe-edit-1"></i>
                        <span> Writer </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('book_shop.index')}}">
                        <i class="fe-shopping-bag"></i>
                        <span> Book Shop </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('model_test.index')}}">
                        <i class="fe-book-open"></i>
                        <span> Model Test </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="dripicons-question"></i>
                        <span> Questions </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('questions.index')}}">Question List</a></li>
                        <li><a href="{{route('questions.create')}}">Add Question</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('review.index')}}">
                        <i class="fe-star"></i>
                        <span> Review </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('slider.index')}}">
                        <i class="fe-sliders"></i>
                        <span> Slider </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('message.index')}}">
                        <i class="fe-message-square"></i>
                        <span> Message </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('options.index')}}">
                        <i class="fe-settings"></i>
                        <span> Site Option </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
