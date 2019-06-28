<?php 
	namespace Databank\OnlineService;
	use Illuminate\Support\ServiceProvider;

	class OnlineServiceServiceProvider extends ServiceProvider
	{
		
		function boot()
		{
			$this->loadRoutesFrom(__DIR__.'/routes/web.php');
			$this->loadViewsFrom(__DIR__.'/views', 'onlineservice');
		}

		function register()
		{
		}
	}