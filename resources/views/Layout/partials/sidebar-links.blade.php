<ul class="nav flex-column px-2 mt-3">
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}">
      <i class="uil uil-apps"></i> Dashboard
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#studentsCollapse" role="button"
      aria-expanded="false" aria-controls="studentsCollapse">
      <i class="uil uil-users-alt"></i> Students
      <i class="uil uil-angle-down float-end"></i>
    </a>
    <div class="collapse" id="studentsCollapse">
      <ul class="nav flex-column ms-3">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.students.index') }}">All Students</a>
        </li>
      </ul>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}" href="{{ route('admin.courses.index') }}">
      <i class="uil uil-book-open"></i> Courses
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.certificates.index') }}">
      <i class="uil uil-award"></i> Certificates
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}"
      href="{{ route('admin.announcements.index') }}">
      <i class="uil uil-megaphone"></i> Announcements
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.settings.index') }}">
      <i class="uil uil-setting"></i> Settings
    </a>
  </li>
</ul>

<div class="mt-auto p-3">
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-outline-light w-100">
      <i class="uil uil-signout"></i> Logout
    </button>
  </form>
</div>
