<div id="ecs-con">
	<div id="ecs">
		<ul>

			<?php $count = 1; ?>

			@foreach($property_images as $property_image)
			
				@if($count === 1)
				    <li id="slide-1" class="slides">
				@elseif($count === 9)
					<li id="slide-2" class="slides">
				@elseif($count === 17)
					<li id="slide-3" class="slides">
				@endif

			    <div class="images <?php echo ($count === 1 || $count === 5 || $count === 9 || $count === 13 || $count === 17 || $count === 21 ? 'first-image' : ''); ?>   ">
					<a href="{{ action('properties@property', array($property_image->property->id)) }}">
						<img src="{{ asset('uploads/properties/' . $property_image->name); }}" width="163" height="163">
					</a>
				</div>

				@if($count === 8)
				    </li>
				@elseif($count === 16)
					</li>
				@elseif($count === 24)
					</li>
				@endif


				<?php $count++; ?>

			    
			@endforeach




			

			

			


		</ul>
		
	</div><!-- ecs -->

	<div id="ecs-nav">
		<button id="prev-btn" class="with-hover" data-dir="prev">&lt; previous</button>
		<button id="next-btn" class="with-hover" data-dir="next">next &gt;</button>
	</div>

</div><!-- ecs-con -->


