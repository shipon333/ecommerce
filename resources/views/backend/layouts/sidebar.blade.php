@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
     @if(Auth::user()->role=='Admin')
      <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Users
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('user.view')}}" class="nav-link {{($route =='user.view')?'active':''}} ">
              <i class="far fa-circle nav-icon"></i>
              <p>View User</p>
            </a>
          </li>
        </ul>
      </li>
      @endif
      <li class="nav-item has-treeview {{($prefix=='/profils')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Profile
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('profils.view')}}" class="nav-link {{($route =='profils.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Your Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('profils.password.view')}}" class="nav-link {{($route =='profils.password.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Change Password</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview {{($prefix=='/logos')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Logo
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('logos.view')}}" class="nav-link {{($route =='logos.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Logos</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview {{($prefix=='/banners')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Banner
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('banners.view')}}" class="nav-link {{($route =='banners.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Banners</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview {{($prefix=='/abouts')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage About
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('abouts.view')}}" class="nav-link {{($route =='abouts.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Abouts</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview {{($prefix=='/contacts')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Contact
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('contacts.view')}}" class="nav-link {{($route =='contacts.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Contact</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('communicate.view')}}" class="nav-link {{($route =='communicate.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Communicate</p>
            </a>
          </li>
        </ul>
      </li> 
      <li class="nav-item has-treeview {{($prefix=='/categorys')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Category
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('categorys.view')}}" class="nav-link {{($route =='categorys.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Categorys</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview {{($prefix=='/brands')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Brands
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('brands.view')}}" class="nav-link {{($route =='brands.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Brands</p>
            </a>
          </li>
        </ul>
      </li> 

      <li class="nav-item has-treeview {{($prefix=='/colors')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Colors
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('colors.view')}}" class="nav-link {{($route =='colors.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Colors</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview {{($prefix=='/sizes')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Size
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('sizes.view')}}" class="nav-link {{($route =='sizes.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Size</p>
            </a>
          </li>
        </ul>
      </li> 

      <li class="nav-item has-treeview {{($prefix=='/products')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Product
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('products.view')}}" class="nav-link {{($route =='products.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Product</p>
            </a>
          </li>
        </ul>
      </li> 

      <li class="nav-item has-treeview {{($prefix=='/customers')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Customer
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('customers.view')}}" class="nav-link {{($route =='customers.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Customer</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('customers.draft')}}" class="nav-link {{($route =='customers.draft')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Draft Customer</p>
            </a>
          </li>
        </ul>
      </li> 
      <li class="nav-item has-treeview {{($prefix=='/payments')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Order
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('orders.pandding.view')}}" class="nav-link {{($route =='methods.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Pandding Order</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('orders.approve.view')}}" class="nav-link {{($route =='payments.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Approve Order</p>
            </a>
          </li>
        </ul>
      </li> 
      <li class="nav-item has-treeview {{($prefix=='/payments')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Payment Method
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('methods.view')}}" class="nav-link {{($route =='methods.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Methode</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('payments.view')}}" class="nav-link {{($route =='payments.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Payment</p>
            </a>
          </li>
        </ul>
      </li> 
    </ul>
  </nav>