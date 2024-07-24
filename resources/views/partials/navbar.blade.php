<div class="top-header">
    <div class="header-bar d-flex justify-content-between border-bottom">
        <div class="d-flex align-items-center">
        </div>

        <ul class="list-unstyled mb-0">
            <li class="list-inline-item mb-0 ms-1">
                <div class="dropdown dropdown-primary">
                    <button type="button" class="btn btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/images/client/01.jpg') }}" class="avatar avatar-ex-small rounded"
                            alt="">
                    </button>

                    <div class="dropdown-menu dd-menu dropdown-menu-end shadow border-0 mt-3 py-3"
                        style="min-width: 200px;">
                        <a class="dropdown-item d-flex align-items-center text-dark pb-3" href="javascript:void(0)">
                            <img src="{{ asset('assets/images/client/01.jpg') }}"
                                class="avatar avatar-md-sm rounded-circle border shadow" alt="">

                            <div class="flex-1 ms-2">
                                <span class="d-block">
                                    {{ auth()->user()->email }}
                                </span>
                            </div>
                        </a>

                        <form id="formLogout" method="POST" action="{{ url('logout') }}">
                            @csrf

                            <a href="javascript:void(0)" class="dropdown-item text-dark"
                                onclick="document.getElementById('formLogout').submit()">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                Logout
                            </a>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
