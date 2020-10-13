<li class="nav-item">
    <a href="{{url("/home")}}  " class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
            LC Records
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route("Lcnumber.index")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All LC Records</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("addlc")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add new Record</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview" onclick="{{Session::put('menuTest', "stock")}}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-car"></i>
        <p>
            Stock
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route("Product.index")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Stocks</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("Product.create")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add new Stock</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview" onclick="{{Session::put('menuTest', "customers")}}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-baby"></i>
        <p>
            Customers
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route("Clint.index")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Clients</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("Clint.create")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Client</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("addCustomerMoneyView")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Money</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url("/clientTransistionReport")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Show Transitions</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{url("/buyProduct")}}  " class="nav-link">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>Sell</p>
    </a>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-credit-card"></i>
        <p>
            Company Account
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route("addCompanyMoneyView")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Balance</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url("/companyTransistionReport")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Show Transitions</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item">
    <a href="{{route("ExpensesRecord.index")}}" class="nav-link">
        <i class="nav-icon fas fa-minus-circle"></i>
        <p>Expenses</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route("rep")}}" class="nav-link">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>Reports</p>
    </a>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user-alt"></i>
        <p>
            Users
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url("/showUsers")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Show Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url("/addUsers")}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Users</p>
            </a>
        </li>
    </ul>
</li>
