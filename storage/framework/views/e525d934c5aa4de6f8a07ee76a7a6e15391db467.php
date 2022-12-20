
<!-- What is virmil's dynamic caching? -->

<!-- 1. saves heavy and light data for reuse
2. lessens redundancy of ajax request GET/POST
3. renews saved data individualy after 8 mins
4. loads cache in advance and updates it in the background -->

<script type="text/javascript">
	var currfuncrunnedlast = [];
	function IsCacheExpired(cache_name,functorun = function(){}){

			// DATE FORMAT '2021/06/15 13:00'
			var cacheallowedmins = 10;
			var justcached = false;
			if(localStorage.getItem("lastcached_" + cache_name) == null){
			justcached = true;
			localStorage.setItem("lastcached_" + cache_name,new Date())
			}

			if(localStorage.getItem(cache_name) == null){
			justcached = true;
			}
			// if(!currfuncrunnedlast.includes(cache_name)  || hasrepeat == true){
				console.log("UltraCacheSaver: advance displayed " + cache_name);
				functorun(localStorage.getItem(cache_name));
				// currfuncrunnedlast.push(cache_name);
			// }
			// alert(JSON.stringify(currfuncrunnedlast));

			var startTime = new Date(localStorage.getItem("lastcached_" + cache_name));
			var endTime =new Date();
			var difference = endTime.getTime() - startTime.getTime(); // This will give difference in milliseconds
			var resultInMinutes = Math.round(difference / 60000);
			var allowupdatecache = true;

			if(resultInMinutes < cacheallowedmins && justcached == false){
			allowupdatecache = false;
					console.log("UltraCacheSaver: saved " + cache_name);
			}else{
					console.log("UltraCacheSaver: (updated) " + cache_name);
			}

			return allowupdatecache;
	}
	function UpdateCache(cache_name,to_cache){
			localStorage.setItem(cache_name, to_cache);
			localStorage.setItem( "lastcached_" + cache_name,new Date());
	}

	function ResetCacheItem(cache_name){
		localStorage.removeItem(cache_name);
		localStorage.removeItem( "lastcached_" + cache_name);
	}


	function ComputeTime(sdate){
		var startTime = new Date(sdate);
			var endTime =new Date();
			var difference = endTime.getTime() - startTime.getTime(); // This will give difference in milliseconds
			var resultInMinutes = Math.round(difference / 60000);
			return resultInMinutes;
	}

</script>