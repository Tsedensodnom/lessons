<div class="col-lg-4">
 	<h4>Хайх</h4>
 	<div class="hline"></div>
 	<p>
 		<br/>
 		<input type="text" class="form-control" placeholder="Түлхүүр үг">
 	</p>
 	<div class="spacing"></div>
 	
 	<h4>Ангилал</h4>
 	<div class="hline"></div>
 	<?php 
 	    if (!isset($categories)) {
 	        $categories = \Cache::remember('sidebar_categories', 60, function() {
                return \App\Category::orderby('name')->get(); 
            });
 	    } 
    ?>
 	@foreach ($categories as $category)
 	    <p>
 	        <a href="{{ route('category', ['id' => $category->id]) }}">
 	            <i class="fa fa-angle-right"></i> {{ $category->name }}
     	    </a>
     	    <span class="badge badge-theme pull-right">{{ $category->postsCount }}</span>
     	</p>
 	@endforeach
 	<div class="spacing"></div>
 </div>