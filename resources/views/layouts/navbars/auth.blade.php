<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            <div class="logo-image">
                <img src="/images/logo.png" style="height: 30px">
            </div>
        </a>
    </div>
    <div class="sidebar-wrapper" style="overflow-x:hidden">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'models' || $elementActive == 'consumers' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="false" href="#usersManagement">
                    <i class="nc-icon nc-single-02"></i>
                    <p>
                        {{ __('Users Management') }}
                        <b class="caret mt-1"></b>
                    </p>
                </a>
                <div class="collapse {{ $elementActive == 'models' || $elementActive == 'consumers' ? 'show' : 'hide'  }}"
                    id="usersManagement">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'models' ? 'active' : '' }}">
                            <a href="{{ route('users', ['type' => 'model']) }}">
                                <span class="sidebar-mini-icon">{{ __('M') }}</span>
                                <span class="sidebar-normal">{{ __(' Model') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'consumers' ? 'active' : '' }}">
                            <a href="{{ route('users', ['type' => 'consumer']) }}">
                                <span class="sidebar-mini-icon">{{ __('C') }}</span>
                                <span class="sidebar-normal">{{ __(' Consumer') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>

            <!-- <li class="active-pro {{ $elementActive == 'upgrade' ? 'active' : '' }}">
                sdwd
            </li> -->
        </ul>
    </div>
</div>