<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                {{-- USER PROFILE (STATIC – OK) --}}
                <li>
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{ asset('template/images/mbi_logo.png') }}" alt="users" class="rounded-circle img-fluid">
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">{{ auth()->user()->name ?? 'Pencadang' }}</h5>
                            <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false"><i class="ti-settings"></i></a>
                            {{-- <a href="javascript:void(0)" title="Logout" class="btn btn-circle btn-sm">
                                <i class="ti-power-off"></i>
                            </a> --}}
                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-user m-r-5 m-l-5"></i> Admin</a>
                                {{-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div> --}}
                        </div>
                    </div>
                </li>

                {{-- LOOP COMPONENT --}}
                {{-- @foreach($components as $component => $items)


                    @php
                        $isOpen = $items->pluck('sub_components')->contains(Request::segment(1));
                    @endphp

                    <li class="sidebar-item {{ $isOpen ? 'selected' : '' }}">
                        <a class="sidebar-link has-arrow waves-effect waves-dark"
                           href="javascript:void(0)"
                           aria-expanded="{{ $isOpen ? 'true' : 'false' }}">
                            <i class="{{ $items->first()->comp_icon }}"></i>
                            <span class="hide-menu">{{ $component }}</span>
                        </a>

                        <ul class="collapse first-level {{ $isOpen ? 'in' : '' }}">
                            @foreach($items as $item)
                                <li class="sidebar-item">
                                    <a href="{{ $item->route ? route($item->route) : '#' }}"
                                       class="sidebar-link {{ Request::segment(1) == $item->sub_components ? 'active' : '' }}">
                                        <i class="mdi mdi-record"></i>
                                        <span class="hide-menu">{{ $item->sub_components_name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                @endforeach --}}

            </ul>
        </nav>
    </div>
</aside>
