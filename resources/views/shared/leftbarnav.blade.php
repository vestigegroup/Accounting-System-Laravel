<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 rasxod-menu">
    <div class="list-group">
        <a href="{{ route('income.index') }}" class="list-group-item"> 
            <i class="text-center fa fa-arrow-down fa-fw" style="background-color: #0db72d;"></i> <span class="text-uppercase">Приход</span>
        </a>
        <a href="{{ route('outgo.index') }}" class="list-group-item"> 
            <i class="text-center fa fa-arrow-up fa-fw" style="background-color: #8f111a;"></i>  <span class="text-uppercase">Расход</span>
        </a>
        <a href="{{ route('klienty.index') }}" class="list-group-item"> 
            <i class="text-center fa fa-users fa-fw" style="background-color: #00917e;"></i>  <span class="text-uppercase">Клиенты</span>
        </a>
        <a href="{{ route('sotrudniki.index') }}" class="list-group-item"> 
            <i class="text-center fa fa-user fa-fw" style="background-color: #2851aa;"></i>  <span class="text-uppercase">Сотрудники</span>
        </a>
        <a href="{{ route('dolgi.index') }}" class="list-group-item">
            <i class="text-center fa fa-usd fa-fw" style="background-color: #0094c9;"></i>  <span class="text-uppercase">Долги</span>
        </a>
        <a href="{{ route('prosrochniye.index') }}" class="list-group-item">
            <i class="text-center fa fa-exclamation-triangle fa-fw" style="background-color: #ef9e2d;"></i>  <span class="text-uppercase">Просрочнные</span>
        </a>
        <a href="{{ route('ramz.index') }}" class="list-group-item">
            <i class="text-center fa fa-circle fa-fw" style="background-color: #abd745;"></i>  <span class="text-uppercase">Рамз</span>
        </a>
        <a href="{{ route('partner.index') }}" class="list-group-item">
            <i class="text-center fa fa-list fa-fw" style="background-color: #6d2890;"></i>  <span class="text-uppercase">Партнёры</span>
        </a>
        <!-- TODO -->
        <a href="{{ route('plan.index')  }}" class="list-group-item">
            <i class="text-center fa fa-check-circle fa-fw" style="background-color: #fe3400;"></i>  <span class="text-uppercase">план</span>
        </a>
        <!-- <a href="" class="list-group-item">
            <i class="text-center fa fa-trash fa-fw" style="background-color: #494948;"></i>  <span class="text-uppercase">Корзина</span>
        </a> -->
    </div>
</div>