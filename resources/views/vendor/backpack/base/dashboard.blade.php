@extends(backpack_view('blank'))

@php
    /*$widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('logout'),
        'button_text' => trans('backpack::base.logout'),
    ];*/
   Widget::add([
      'type'       => 'chart',
      'controller' => \App\Http\Controllers\Admin\Charts\MonthlyOrdersChartController::class,

      // OPTIONALS

      'class'   => 'card mb-2',
      'wrapper' => ['class'=> 'col-md-6'] ,
      'content' => [
            'header' => 'Orders',
            'body'   => 'This chart displays the order flow in the past 15 days.<br><br>',
       ],
  ]);
   Widget::add([
      'type'       => 'chart',
      'controller' => \App\Http\Controllers\Admin\Charts\WeeklyIncomeChartController::class,

      // OPTIONALS

      'class'   => 'card mb-2',
      'wrapper' => ['class'=> 'col-md-6'] ,
      'content' => [
            'header' => 'Income',
            'body'   => 'This chart displays the income in the past 7 days.<br><br>',
       ],
  ]);
   Widget::add([
      'type'       => 'chart',
      'controller' => \App\Http\Controllers\Admin\Charts\WeeklyPopularProductChartController::class,

      // OPTIONALS

      'class'   => 'card mb-2',
      'wrapper' => ['class'=> 'col-md-6'] ,
      'content' => [
            'header' => 'Products',
            'body'   => 'This chart displays the most popular products.<br><br>',
       ],
  ]);
@endphp

@section('content')
@endsection

