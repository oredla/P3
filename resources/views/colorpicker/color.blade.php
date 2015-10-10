@extends('layouts.master')

@section('title')
Color Picker
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    <link href="/css/colorpicker.css" type='text/css' rel='stylesheet'>
@stop


@section('content')
    <?php
    $color = new Color(0xFF9900);

    echo $color;

    $color1 = new Color(0xFFFFFF);
    $color2 = new Color(0xFFFFFE);

    $distance = $color1->getDistanceRgbFrom($color2);

    echo " spacing : " . $distance;

    ?>
    <div style="color:<?=$color?>"> Selected Color </div>
    <form>
      <input type="color" value="<?=$color?>">
    </form>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src="/js/books/show.js"></script> --}}
@stop
