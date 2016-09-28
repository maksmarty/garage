<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                        <img src="img/avatars/sunny.png" alt="me" class="online" />
						<span>
							{{Auth::user()->getFullName()}}
						</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
					
				</span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive

    To make this navigation dynamic please make sure to link the node
    (the reference to the nav > ul) after page load. Or the navigation
    will not initialize.
    -->
    <nav>
        <!-- NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->

        <ul>
            <li class="active">
                <a href="{{route('dashboard')}}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
            </li>


            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Categories</span></a>
                <ul>
                    <li>
                        <a href="{{route('category')}}">Categories</a>
                    </li>
                    <li>
                        <a href="{{route('category.add')}}">Add Category</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Items</span></a>
                <ul>
                    <li>
                        <a href="{{route('item')}}">Items</a>
                    </li>
                    <li>
                        <a href="{{route('item.add')}}">Add Item</a>
                    </li>

                </ul>
            </li>


            <hr>
            <span style="color: #FFF;font-weight: 400;font-size: 18px;padding-left: 10px;">Static data</span>
            <hr>


            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">Scrap</span></a>
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">American</span></a>

                        <ul>
                            <li>

                                <a href="{{route('american')}}">List American</a>
                            </li>
                            <li>
                                <a href="{{route('american.add')}}">Add American</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">European</span></a>

                        <ul>
                            <li>

                                <a href="{{route('european')}}">List European</a>
                            </li>
                            <li>
                                <a href="{{route('european.add')}}">Add European</a>
                            </li>

                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">Asian</span></a>

                        <ul>
                            <li>

                                <a href="{{route('asian')}}">List Asian</a>
                            </li>
                            <li>
                                <a href="{{route('asian.add')}}">Add Asian</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">Delivery</span></a>

                        <ul>
                            <li>

                                <a href="{{route('delivery')}}">List Delivery</a>
                            </li>
                            <li>
                                <a href="{{route('delivery.add')}}">Add Delivery</a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>



            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">Garage</span></a>

                <ul>
                    <li>

                        <a href="{{route('garage')}}">List Garage</a>
                    </li>
                    <li>
                        <a href="{{route('garage.add')}}">Add Garage</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">General Services</span></a>

                <ul>
                    <li>

                        <a href="{{route('generalservices')}}">List General Services</a>
                    </li>
                    <li>
                        <a href="{{route('generalservices.add')}}">Add General Services</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">Help in road</span></a>

                <ul>
                    <li>

                        <a href="{{route('helpinroad')}}">List Help in road</a>
                    </li>
                    <li>
                        <a href="{{route('helpinroad.add')}}">Add Help in road</a>
                    </li>

                </ul>
            </li>




            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">Technical Inspection</span></a>

                <ul>
                    <li>

                        <a href="{{route('technicalinspection')}}">List Technical Inspection</a>
                    </li>
                    <li>
                        <a href="{{route('technicalinspection.add')}}">Add Technical Inspection</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">Tintin Car</span></a>

                <ul>
                    <li>

                        <a href="{{route('talsywahamayatwatajlil')}}">List Tintin Car</a>
                    </li>
                    <li>
                        <a href="{{route('talsywahamayatwatajlil.add')}}">Add Tintin Car</a>
                    </li>

                </ul>
            </li>






            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">Taxi</span></a>

                <ul>
                    <li>

                        <a href="{{route('taxi')}}">List Taxi</a>
                    </li>
                    <li>
                        <a href="{{route('taxi.add')}}">Add Taxi</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-trash-o"></i> <span class="menu-item-parent">Movable wash</span></a>

                <ul>
                    <li>

                        <a href="{{route('movablewash')}}">List Movable wash</a>
                    </li>
                    <li>
                        <a href="{{route('movablewash.add')}}">Add Movable wash</a>
                    </li>

                </ul>
            </li>

















            <hr>
            <span style="color: #FFF;font-weight: 400;font-size: 18px;padding-left: 10px;">Dynamic data</span>
            <hr>


            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Show Rooms</span></a>
                <ul>
                    <li>
                        <a href="{{route('showroom')}}">Show Rooms</a>
                    </li>
                    <li>
                        <a href="{{route('showroom.add')}}">Add Show Room</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Spare Parts</span></a>
                <ul>
                    <li>
                        <a href="{{route('sparepart')}}">Spare Parts</a>
                    </li>
                    <li>
                        <a href="{{route('sparepart.add')}}">Add Spare Part</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Service Center</span></a>
                <ul>
                    <li>
                        <a href="{{route('servicecenter')}}">Service Centers</a>
                    </li>
                    <li>
                        <a href="{{route('servicecenter.add')}}">Add Service Center</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Boat Fishing</span></a>
                <ul>
                    <li>
                        <a href="{{route('boatfishing')}}">Boat Fishing</a>
                    </li>
                    <li>
                        <a href="{{route('boatfishing.add')}}">Add Boat Fishing</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Car Wash</span></a>
                <ul>
                    <li>
                        <a href="{{route('carwash')}}">Car Wash</a>
                    </li>
                    <li>
                        <a href="{{route('carwash.add')}}">Add Car Wash</a>
                    </li>

                </ul>
            </li>


            {{--<li>--}}
                {{--<a href="inbox.html"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Inbox</span><span class="badge pull-right inbox-badge">14</span></a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Graphs</span></a>--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<a href="flot.html">Flot Chart</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="morris.html">Morris Charts</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="inline-charts.html">Inline Charts</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="dygraphs.html">Dygraphs <span class="badge pull-right inbox-badge bg-color-yellow">new</span></a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">Tables</span></a>--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<a href="table.html">Normal Tables</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="datatables.html">Data Tables <span class="badge inbox-badge bg-color-greenLight">v1.10</span></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="jqgrid.html">Jquery Grid</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Forms</span></a>--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<a href="form-elements.html">Smart Form Elements</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="form-templates.html">Smart Form Layouts</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="validation.html">Smart Form Validation</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="bootstrap-forms.html">Bootstrap Form Elements</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="plugins.html">Form Plugins</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="wizard.html">Wizards</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="other-editors.html">Bootstrap Editors</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="dropzone.html">Dropzone </a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="image-editor.html">Image Cropping <span class="badge pull-right inbox-badge bg-color-yellow">new</span></a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">UI Elements</span></a>--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<a href="general-elements.html">General Elements</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="buttons.html">Buttons</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Icons</a>--}}
                        {{--<ul>--}}
                            {{--<li>--}}
                                {{--<a href="fa.html"><i class="fa fa-plane"></i> Font Awesome</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="glyph.html"><i class="glyphicon glyphicon-plane"></i> Glyph Icons</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="flags.html"><i class="fa fa-flag"></i> Flags</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="grid.html">Grid</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="treeview.html">Tree View</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="nestable-list.html">Nestable Lists</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="jqui.html">JQuery UI</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="typography.html">Typography</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Six Level Menu</a>--}}
                        {{--<ul>--}}
                            {{--<li>--}}
                                {{--<a href="#"><i class="fa fa-fw fa-folder-open"></i> Item #2</a>--}}
                                {{--<ul>--}}
                                    {{--<li>--}}
                                        {{--<a href="#"><i class="fa fa-fw fa-folder-open"></i> Sub #2.1 </a>--}}
                                        {{--<ul>--}}
                                            {{--<li>--}}
                                                {{--<a href="#"><i class="fa fa-fw fa-file-text"></i> Item #2.1.1</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a href="#"><i class="fa fa-fw fa-plus"></i> Expand</a>--}}
                                                {{--<ul>--}}
                                                    {{--<li>--}}
                                                        {{--<a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a href="#"><i class="fa fa-fw fa-trash-o"></i> Delete</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#"><i class="fa fa-fw fa-folder-open"></i> Item #3</a>--}}

                                {{--<ul>--}}
                                    {{--<li>--}}
                                        {{--<a href="#"><i class="fa fa-fw fa-folder-open"></i> 3ed Level </a>--}}
                                        {{--<ul>--}}
                                            {{--<li>--}}
                                                {{--<a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}

                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--<li>--}}
                {{--<a href="calendar.html"><i class="fa fa-lg fa-fw fa-calendar"><em>3</em></i> <span class="menu-item-parent">Calendar</span></a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="widgets.html"><i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">Widgets</span></a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="gallery.html"><i class="fa fa-lg fa-fw fa-picture-o"></i> <span class="menu-item-parent">Gallery</span></a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="gmap-xml.html"><i class="fa fa-lg fa-fw fa-map-marker"></i> <span class="menu-item-parent">GMap Skins</span><span class="badge bg-color-greenLight pull-right inbox-badge">9</span></a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#"><i class="fa fa-lg fa-fw fa-windows"></i> <span class="menu-item-parent">Miscellaneous</span></a>--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-lg fa-fw fa-file"></i> Other Pages</a>--}}
                        {{--<ul>--}}
                            {{--<li>--}}
                                {{--<a href="forum.html">Forum Layout</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="profile.html">Profile</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="timeline.html">Timeline</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pricing-table.html">Pricing Tables</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="invoice.html">Invoice</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="login.html" target="_top">Login</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="register.html" target="_top">Register</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="lock.html" target="_top">Locked Screen</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="error404.html">Error 404</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="error500.html">Error 500</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="blank_.html">Blank Page</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="email-template.html">Email Template</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="search.html">Search Page</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="ckeditor.html">CK Editor</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="top-menu-hidden">--}}
                {{--<a href="#"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">SmartAdmin Intel</span></a>--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<a href="difver.html"><i class="fa fa-stack-overflow"></i> Different Versions</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="applayout.html"><i class="fa fa-cube"></i> App Settings</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="http://bootstraphunter.com/smartadmin/BUGTRACK/track_/documentation/index.html" target="_blank"><i class="fa fa-book"></i> Documentation</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="http://bootstraphunter.com/smartadmin/BUGTRACK/track_/" target="_blank"><i class="fa fa-bug"></i> Bug Tracker</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

        </ul>
    </nav>
			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

</aside>
<!-- END NAVIGATION -->
