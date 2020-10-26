<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('lead_access')
                <li class="{{ request()->is('admin/leads') || request()->is('admin/leads/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.leads.index") }}">
                        <i class="fa-fw fas fa-address-book">

                        </i>
                        <span>{{ trans('cruds.lead.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('crm_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-address-book">

                        </i>
                        <span>{{ trans('cruds.crm.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('customer_access')
                            <li class="{{ request()->is('admin/customers') || request()->is('admin/customers/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.customers.index") }}">
                                    <i class="fa-fw fas fa-address-book">

                                    </i>
                                    <span>{{ trans('cruds.customer.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('document_access')
                            <li class="{{ request()->is('admin/documents') || request()->is('admin/documents/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.documents.index") }}">
                                    <i class="fa-fw fas fa-file">

                                    </i>
                                    <span>{{ trans('cruds.document.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('provider_access')
                <li class="{{ request()->is('admin/providers') || request()->is('admin/providers/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.providers.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.provider.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('product_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cog">

                        </i>
                        <span>{{ trans('cruds.productManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('product_category_access')
                            <li class="{{ request()->is('admin/product-categories') || request()->is('admin/product-categories/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.product-categories.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.productCategory.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('product_tag_access')
                            <li class="{{ request()->is('admin/product-tags') || request()->is('admin/product-tags/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.product-tags.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.productTag.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('product_access')
                            <li class="{{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.products.index") }}">
                                    <i class="fa-fw fas fa-shopping-cart">

                                    </i>
                                    <span>{{ trans('cruds.product.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            
            <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.questionManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">

                            <li class="{{ request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.topics.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.topicManagement.title') }}</span>
                                </a>
                            </li> 
                        
                            <li class="{{ request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.questions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.createQuestion.title') }}</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.questions_options.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>@lang('quickadmin.questions-options.title')</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.tests.index') }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>@lang('quickadmin.test.new')</span>
                                </a>
                            </li>  
                             <li class="{{ request()->is('admin/questions') || request()->is('admin/results') || request()->is('admin/topics') || request()->is('admin/topics/*') || request()->is('admin/tests') || request()->is('admin/results/*') || request()->is('admin/questions_options') || request()->is('admin/questions_options/*')  || request()->is('admin/questions/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.results.index') }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>@lang('quickadmin.results.title')</span>
                                </a>
                            </li> 
                            
                        
                       
                    </ul>
                </li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>
