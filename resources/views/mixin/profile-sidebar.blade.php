<nav class="list-group customer-nav">
    <a class="active list-group-item d-flex justify-content-between align-items-center" href="customer-orders.html"><span>
        <svg class="svg-icon svg-icon-heavy mr-2">
          <use xlink:href="#paper-bag-1"> </use>
        </svg>所有訂單</span>
      <div class="badge badge-pill badge-light font-weight-normal px-3">5</div>
    </a>
    <a class="list-group-item d-flex justify-content-between align-items-center" href="customer-account.html"><span>
        <svg class="svg-icon svg-icon-heavy mr-2">
          <use xlink:href="#male-user-1"> </use>
        </svg>個人資訊</span>
    </a>
    <a class="list-group-item d-flex justify-content-between align-items-center" href="javascript:void(0)"  onclick="document.getElementById('logout-form').submit()"><span>
        <svg class="svg-icon svg-icon-heavy mr-2">
          <use xlink:href="#exit-1"> </use>
        </svg>登出</span>
    </a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
     @csrf
     </form>
  </nav>
