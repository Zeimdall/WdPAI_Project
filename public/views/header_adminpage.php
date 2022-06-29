<!DOCTYPE html>
<html>
<body>
    <div id="app-header">
        <nav class="nav-container">
            <a id="compname" class="nav_comp_name">CAR RENTAL</a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list" id="nav-list">
                    <li class="nav__item">
                        <a onclick="redirect('adminpage')" class="nav__link">Add cars</a>
                    </li>
                    <li class="nav__item">
                        <a onclick="redirect('choosecar')" class="nav__link">Cars</a>
                    </li>
                    <li class="nav__item">
                        <a onclick="redirect('logout')" class="nav__link">Sign out</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>
</html>
