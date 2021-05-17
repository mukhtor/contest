
<li class="nav-item {{ Request::is('admin/groups*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('groups.index') !!}">
        <i class="nav-icon fa fa-building"></i>
        <p>{{__('menu.groups')}}</p>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/contests*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('contests.index') !!}">
        <i class="nav-icon fa fa-building"></i>
        <p>{{__('menu.contests')}}</p>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/subjects*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('subjects.index') !!}">
        <i class="nav-icon fa fa-building"></i>
        <p>{{__('menu.subjects')}}</p>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/questions*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('questions.index') !!}">
        <i class="nav-icon fa fa-building"></i>
        <p>{{__('menu.questions')}}</p>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/contestUsers*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('contestUsers.index') !!}">
        <i class="nav-icon fa fa-building"></i>
        <p>Contest Users</p>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/contestHistories*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('contestHistories.index') !!}">
        <i class="nav-icon fa fa-building"></i>
        <p>{{__('menu.contest_histories')}}</p>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('users.index') !!}">
        <i class="nav-icon fa fa-users"></i>
        <p>{{__('menu.users')}}</p>
    </a>
</li>
