<!DOCTYPE html>
<html lang="ru">
@section('title', 'Блог')
@include('layouts.catalog')
@include('layouts.header')
@section('content')

<section class="url">
  <div class="url__text"><a href="/">{{__('index.main')}}</a></div>
  <div style="cursor: pointer;" class="url__text" onclick="opensb()">{{__('blog-show.Catalog')}}</div>
  <div class="url__text">{{ __('index.blog')}}</div>
</section>

<section class="blog">
  <div class="blog__title subtitle">{{ __('index.blog')}}</div>
  <div class="blog__wrapper">
    @foreach ($blogs as $blog)
    <div class="blog__wrapper-card" @if($loop->index >= 2)  style="display:none" @endif>
      <div class="blog__wrapper-top">
        <img src="/storage/{{ $blog->image }}" alt="">
      </div>
      <div class="blog__wrapper-bottom">
        <div class="blog__wrapper-subtitle">{{ $blog->name }}</div>
        <div class="blog__wrapper-text">
          {!! $blog->description !!}
        </div>
        <div class="blog__button">
          <a href="/blog/{{ $blog->slug }}" class="blog__button-link">{{ __('index.read') }}</a>
          <div class="blog__button-time">{{ date('d.m.Y', strtotime($blog->created_at)) }}</div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <button class="blog__btn" onclick="toggle()" id="btn-more">{{__('index.showMore')}}</button>
</section>
<style>
  .not-visible{
    display:none
  }
  .visible{
    display:block
  }
</style>
<script>
  let blocks = Array.from(document.querySelectorAll('.blog__wrapper-card'))
  let btn = document.querySelector('#btn-more')
  function toggle(){
      blocks.forEach((block,index) => {
        if(index >= 1){
          if(block.style.display == 'none'){
            block.style.display = 'block'
          }else if(block.style.display == 'block'){
            block.style.display = 'none'
          }
        }
    })
  }
  
    
  if(blocks.length<=2){
    document.getElementById('btn-more').style.display = "none"
  }

</script>
@include('layouts.footer')
</html>
