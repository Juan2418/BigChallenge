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
@endphp

@section('content')
@endsection

